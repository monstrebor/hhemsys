<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\Invitation;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $invitation = Invitation::where('receiver_id', auth()->id())
            ->where('status', 'pending')
            ->first();

        if ($invitation) {
            return view("users.index", ['invitation' => $invitation, 'showInviteNotif' => true]);
        }

        return view("users.index");
    }
}
