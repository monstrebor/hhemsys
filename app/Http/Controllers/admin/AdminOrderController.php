<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Order,User,RiderAssignment};

class AdminOrderController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->input('status', 'all');
        $riders = User::role('rider')->get();
        $orders = Order::when($status !== 'all', function ($query) use ($status) {
            return $query->where('status', $status);
        })->latest()->paginate(10);

        return view('admin.orders.index', compact('orders','riders'));
    }

    public function showAssignRiderForm($orderId)
    {
        $order = Order::findOrFail($orderId);
        $riders = User::role('rider')->get();

        return view('admin.orders.assign-rider', compact('order', 'riders'));
    }
}
