<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\{Invitation, User};
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class InviteController extends Controller
{
    public function updateInviteCode()
    {
        try {
            $userId = User::find(auth()->user()->id);
            $userId->invite_code = strtoupper(Str::random(8));
            $userId->save();

            return redirect()
                ->route('user.household.index')
                ->with('success', 'Invite code updated successfully!');
        } catch (\Exception $e) {
            \Log::error('Error creating household: ' . $e->getMessage());
            return redirect()->route('user.household.index')
                ->with('error', 'There was an issue updating your invite code. Please try again later.');
        }
    }

    public function storeInvite(Request $request)
    {
        $request->validate([
            'invite_code' => 'required|string|exists:users,invite_code',
        ]);

        $sender = auth()->user();
        $receiver = User::with('households')->where('invite_code', $request->invite_code)->first();

        if ($receiver && $receiver->id === $sender->id) {
            return back()->with('error', 'You cannot invite yourself.');
        }

        $senderHousehold = $sender->households()->first();
        if (!$senderHousehold) {
            return back()->with('error', 'You must have a household before inviting members.');
        }

        $receiverHousehold = $receiver ? $receiver->households()->first() : null;
        if ($receiverHousehold) {
            return back()->with('error', 'This user already belongs to another household.');
        }

        $existingInvite = Invitation::where('sender_id', $sender->id)
            ->where('receiver_id', $receiver->id)
            ->where('household_id', $senderHousehold->id)
            ->where('status', 'pending')
            ->first();

        if ($existingInvite) {
            return back()->with('warning', 'You have already sent an invitation to this user.');
        }

        try {
            Invitation::create([
                'sender_id' => $sender->id,
                'receiver_id' => $receiver->id,
                'household_id' => $senderHousehold->id,
                'status' => 'pending',
                'relation' => $request->relation,
            ]);

            return back()->with('success', 'Invitation sent successfully!');
        } catch (\Exception $e) {
            \Log::error('Error storing invitation: ' . $e->getMessage());
            return back()->with('error', 'An error occurred while sending the invitation. Please try again.');
        }
    }

    public function storeReply(Request $request)
    {
        $validated = $request->validate([
            'relation' => 'required|string|max:255',
            'action' => 'required|in:accept,cancel',
            'invitation_id' => 'required|exists:invitations,id',
        ]);

        try {
            $invitation = Invitation::findOrFail($validated['invitation_id']);
            $user = auth()->user();

            if ($validated['action'] === 'accept') {
                if ($invitation->household->users()->where('user_id', $user->id)->exists()) {
                    return back()->with('warning', 'You are already a member of this household.');
                }

                $invitation->household->users()->attach($user->id, [
                    'relation' => $validated['relation'],
                    'is_owner' => false,
                    'role' => 'member',
                ]);

                $invitation->update(['status' => 'accepted']);
                $message = 'Invitation accepted successfully.';
            } else {
                $invitation->update(['status' => 'declined']);
                $message = 'Invitation declined.';
            }

            return back()->with('status', $message);
        } catch (\Throwable $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
