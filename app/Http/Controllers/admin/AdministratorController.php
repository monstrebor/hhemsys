<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdministratorController extends Controller
{
        public function index(){
        $users = User::role('customer')->get();
        return view("admin.index", compact("users"));
    }
}
