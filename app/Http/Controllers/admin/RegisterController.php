<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Str;
use Exception;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
        ]);

        $randomPassword = Str::random(5);

        try {
            Mail::send('mails.account_created', [
                'details' => [
                    'name' => strtoupper($request->name),
                    'email' => $request->email,
                    'password' => $randomPassword,
                ]
            ], function ($message) use ($request) {
                $message->to($request->email)
                    ->subject('Welcome to Ordering & Billing System');
            });

            User::create([
                'name' => strtoupper($request->name),
                'email' => $request->email,
                'password' => Hash::make($randomPassword),
                'is_new' => true,
                'status' => 'active',
            ]);

            return redirect('/')->with('success', 'Account created! Password has been sent to your email.');
        } catch (Exception $e) {
            return back()->withInput()->with('error', 'Registration failed. Please try again. Error: ' . $e->getMessage());
        }
    }
}
