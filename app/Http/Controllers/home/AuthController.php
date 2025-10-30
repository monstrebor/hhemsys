<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\{Hash, Mail, Auth};
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Exception;

class AuthController extends Controller
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

            $user = User::create([
                'name' => strtoupper($request->name),
                'email' => $request->email,
                'password' => Hash::make($randomPassword),
                'is_new' => true,
                'status' => 'active',
            ]);
            $user->assignRole('user');

            return redirect('/')->with('success', 'Account created! Password has been sent to your email.');
        } catch (Exception $e) {
            return back()->withInput()->with('error', 'Registration failed. Please try again. Error: ' . $e->getMessage());
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            session()->forget('url.intended');

            $user = Auth::user();
            $role = $user->getRoleNames()->first();
            if (!$role) {
                Auth::logout();
                return redirect()->route('login')->with('error', 'No role assigned.');
            }
            if ($role === 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Welcome, Admin!');
            }
            if ($role === 'user') {
                return redirect()->route('user.dashboard')->with('success', 'Welcome, User!');
            }
            Auth::logout();
            return redirect()->route('login')->with('error', 'Unauthorized role.');
        }
        return back()->withInput()->with('error', 'Invalid email or password.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'You have been logged out.');
    }
}
