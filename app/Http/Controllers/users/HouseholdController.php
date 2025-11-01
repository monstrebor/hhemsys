<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\{Household, User, Account};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HouseholdController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        $household = Household::where('user_id', $user)->first();
        if (!$household) {
            return view('household.index', [
                'household' => null,
                'showCreateModal' => true
            ]);
        }

        $household->load('accounts', 'users');
        $household->invite_code = strtoupper(Str::random(8));
        $household->save();

        return view('household.index', compact('household'))
            ->with('showCreateModal', false);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'relation' => 'required|string|max:255',
            'expected_cash' => 'nullable|numeric',
        ]);

        $user = auth()->user();

        // Check if user is already part of a household
        if ($user->household_id || $user->ownedHousehold) {
            return redirect()
                ->route('user.household.index')
                ->with('error', 'You already belong to a household. You cannot create another one.');
        }

        try {
            // Create a new household
            $household = Household::create([
                'user_id' => $user->id,
                'name' => $request->name,
                'expected_monthly_income' => $request->expected_cash ?? 0,
                'invite_code' => strtoupper(Str::random(8)),
            ]);

            // Update user info to associate with household
            $user->update([
                'household_id' => $household->id,
                'relation' => $request->relation,
            ]);

            // If expected cash is provided, create account for household
            if ($request->expected_cash) {
                $household->accounts()->create([
                    'name' => "{$user->name}'s Account",
                    'balance' => $request->expected_cash,
                ]);
            }

            return redirect()
                ->route('user.household.index')
                ->with('success', 'Household created successfully!');

        } catch (\Exception $e) {
            \Log::error('Error creating household: ' . $e->getMessage());

            return redirect()->route('user.household.index')
                ->with('error', 'There was an issue creating your household. Please try again later.');
        }
    }

    public function sendInvite(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $household = Auth::user()->household;

        if (!$household->invite_code) {
            return back()->with('error', 'This household does not have an invite code yet!');
        }

        return back()->with('success', "Invite sent! Code: {$household->invite_code}");
    }


    public function join($code)
    {
        $household = Household::where('invite_code', $code)->firstOrFail();
        $user = Auth::user();

        if ($user->household) {
            return redirect()->route('user.household.index')
                ->with('error', 'You are already part of a household!');
        }

        $user->household()->associate($household);
        $user->save();

        return redirect()->route('user.household.index')
            ->with('success', 'You successfully joined the household!');
    }

    public function getInviteCode(Request $request)
    {
        $user = $request->user();
        $household = Household::where('user_id', $user->id)->first();

        if (!$household) {
            return response()->json([
                'message' => 'No household data found for this user.'
            ], 404);
        }

        $lastGeneratedAt = $household->updated_at;  
        $timeDifference = now()->diffInHours($lastGeneratedAt);

        if ($timeDifference >= 2) {
            $household->invite_code = strtoupper(Str::random(8));
            $household->save();

            return response()->json([
                'invite_code' => $household->invite_code,
                'message' => 'Invite code updated successfully.'
            ]);
        }

        return response()->json([
            'invite_code' => $household->invite_code,
            'message' => 'Invite code is still valid.'
        ]);
    }
}
