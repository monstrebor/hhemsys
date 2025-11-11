<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\{Household, User, Account, Invitation};
use Illuminate\Support\Facades\{Auth, DB, Mail};
use Illuminate\Http\Request;
use Exception;


class HouseholdController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $household = Household::with(['accounts', 'users', 'owner'])
            ->where('owner_id', $user->id)
            ->orWhereHas('users', function ($q) use ($user) {
                $q->where('user_id', $user->id);
            })
            ->first();

        $userCode = $user->invite_code;

        if (!$household) {
            return view('household.index', [
                'household' => null,
                'showCreateModal' => true,
                'userCode' => $userCode,
            ]);
        }

        return view('household.index', compact('household', 'userCode'))
            ->with('showCreateModal', false);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'relation' => 'required|string|max:255',
            'expected_cash' => 'nullable|numeric|min:0',
            'description' => 'nullable|string|max:500',
        ]);

        $user = auth()->user();

        $alreadyMember = DB::table('household_user')
            ->where('user_id', $user->id)
            ->exists();

        if ($alreadyMember) {
            return redirect()
                ->route('user.household.index')
                ->with('error', 'You already belong to a household. You cannot create another one.');
        }

        DB::beginTransaction();

        try {
            $household = Household::create([
                'owner_id' => $user->id,
                'name' => $request->name,
                'expected_monthly_income' => $request->expected_cash ?? 0,
                'description' => $request->description ?? null,
            ]);

            $household->users()->attach($user->id, [
                'relation' => $request->relation,
                'is_owner' => true,
                'role' => 'owner',
            ]);

            if ($request->expected_cash) {
                $household->accounts()->create([
                    'user_id' => $user->id,
                    'name' => "{$user->name}'s Account",
                    'type' => 'asset',
                    'balance' => $request->expected_cash,
                ]);
            }

            DB::commit();

            return redirect()
                ->route('user.household.index')
                ->with('success', 'Household created successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Error creating household: ' . $e->getMessage());

            return redirect()
                ->route('user.household.index')
                ->with('error', 'There was an issue creating your household. Please try again later.');
        }
    }


    public function update(Request $request, Household $household)
    {
        $user = auth()->user();

        if ($household->owner_id !== $user->id && $household->user_id !== $user->id) {
            return redirect()
                ->route('user.household.index')
                ->with('error', 'Unauthorized: Only the household owner can edit this.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'expected_monthly_income' => 'nullable|numeric|min:0',
            'description' => 'nullable|string|max:500',
        ]);

        try {
            $updateData = [
                'expected_monthly_income' => $request->expected_monthly_income ?? $household->expected_monthly_income,
                'description' => $request->description ?? $household->description,
            ];

            $lastUpdated = $household->updated_at;
            if (!$lastUpdated || $lastUpdated->diffInDays(now()) >= 30) {
                $updateData['name'] = $request->name;
            }

            $household->update($updateData);

            $message = isset($updateData['name'])
                ? 'Household information updated successfully!'
                : 'Household updated successfully (name change not allowed within 30 days).';

            return redirect()
                ->route('user.household.index')
                ->with('success', $message);

        } catch (\Exception $e) {
            \Log::error('Error updating household: ' . $e->getMessage());
            return redirect()
                ->route('user.household.index')
                ->with('error', 'An error occurred while updating the household.');
        }
    }
}
