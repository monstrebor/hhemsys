<?php

namespace App\Http\Controllers;

use App\Models\{Order, RiderAssignment};
use Illuminate\Http\Request;

class DeliveriesController extends Controller
{
    public function index()
    {
        return view("users.riders.deliveries.index");
    }

    public function assign(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'rider_id' => 'required|exists:users,id',
        ]);

        RiderAssignment::create([
            'order_id' => $validated['order_id'],
            'rider_id' => $validated['rider_id'],
            'status' => 'assigned',
            'assigned_at' => now(),
        ]);

        Order::where('id', $validated['order_id'])->update(['status' => 'assigned_to_rider']);

        return redirect()->back()->with('success', 'Rider assigned successfully.');
    }
}
