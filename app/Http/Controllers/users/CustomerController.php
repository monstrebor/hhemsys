<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\{User, CustomerHomeImages,Product};

class CustomerController extends Controller
{
    public function index()
    {
        $products = Product::where('qty', '>', 0)->latest()->get();
        $images = CustomerHomeImages::pluck('url')->toArray();
        $users = User::role('customer')->get();

        return view("users.customers.index", compact("users", "images","products"));
    }
}
