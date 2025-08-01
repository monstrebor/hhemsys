<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $redirectTo = '/customer';
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            session()->forget('url.intended');

            $user = Auth::user();

            if ($user->status === 'inactive') {
                Auth::logout();
                return back()->with('error', 'Your account is currently inactive. Please contact support.');
            }

            $role = $user->getRoleNames()->first();

            switch ($role) {
                case 'administrator':
                    return redirect()->route('administrator.dashboard')->with('success', 'Welcome, Admin!');
                case 'customer':
                    return redirect()->route('customer.dashboard')->with('success', 'Welcome, Customer!');
                case 'rider':
                    return redirect()->route('rider.dashboard')->with('success', 'Welcome, Rider!');
                case 'cashier':
                    return redirect()->route('cashier.dashboard')->with('success', 'Welcome, Cashier!');
                default:
                    Auth::logout();
                    return redirect()->route('login')->with('error', 'Unauthorized role.');
            }
        }

        return back()->with('error', 'Invalid email or password.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'You have been logged out.');
    }
}
