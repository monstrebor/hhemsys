<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\RiderAssignment;

class AdminOrderController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->input('status', 'all');

        $orders = Order::when($status !== 'all', function ($query) use ($status) {
            return $query->where('status', $status);
        })->latest()->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }

    public function showAssignRiderForm($orderId)
    {
        $order = Order::findOrFail($orderId);
        $riders = User::role('rider')->get();

        return view('admin.orders.assign-rider', compact('order', 'riders'));
    }

    public function assignRider(Request $request, $orderId)
    {
        $request->validate([
            'rider_id' => 'required|exists:users,id',
        ]);

        RiderAssignment::create([
            'order_id' => $orderId,
            'rider_id' => $request->rider_id,
            'status' => 'assigned',
            'assigned_at' => now(),
        ]);

        Order::where('id', $orderId)->update(['status' => 'assigned_to_rider']);

        return redirect()->route('admin.orders.index')->with('success', 'Rider assigned successfully!');
    }
}
