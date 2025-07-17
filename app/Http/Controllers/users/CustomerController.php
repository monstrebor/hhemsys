<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $users = User::role('customer')->get();
        return view("users.customers.index", compact("users"));
    }
}
