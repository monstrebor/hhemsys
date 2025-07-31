<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\{Hash, Mail};
use App\Models\{User, CustomerInfo};
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ManageUserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view("admin.users.index", compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'roles' => 'required|string|in:admin,cashier,customer,rider',
        ]);

        $randomPassword = Str::random(8);

        try {
            Mail::send('mails.account_created', [
                'details' => [
                    'name'     => strtoupper($request->name),
                    'email'    => $request->email,
                    'password' => $randomPassword,
                ]
            ], function ($message) use ($request) {
                $message->to($request->email)
                    ->subject('Welcome to Ordering & Billing System');
            });

            $user = User::create([
                'name'     => strtoupper($request->name),
                'email'    => $request->email,
                'password' => Hash::make($randomPassword),
                'is_new'   => true,
                'status'   => 'active',
            ]);

            $user->assignRole($request->roles);

            if ($request->roles === 'customer') {
                CustomerInfo::create([
                    'user_id'   => $user->id,
                    'full_name' => strtoupper($request->name),
                ]);
            }

            return back()->with('success', 'User created successfully! Password has been sent to the email.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'User creation failed. Error: ' . $e->getMessage());
        }
    }
}
