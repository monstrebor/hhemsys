<?php

namespace App\Http\Controllers;

use App\Models\{Order, RiderAssignment, Transaction};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeliveriesController extends Controller
{
    public function index()
    {
        $assignments = RiderAssignment::all();
        return view("users.riders.deliveries.index", compact("assignments"));
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

    public function accept(Request $request)
    {
        $validated = $request->validate([
            'assignment_id' => 'required|exists:rider_assignments,id',
        ]);

        $assignment = RiderAssignment::findOrFail($validated['assignment_id']);

        if ($assignment->rider_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $assignment->update([
            'status' => 'in_transit',
            'assigned_at' => now(),
        ]);
        $assignment->order->update([
            'status' => 'in_transit',
        ]);

        return redirect()->back()->with('success', 'Delivery accepted.');
    }

    public function complete(Request $request)
    {
        $validated = $request->validate([
            'assignment_id' => 'required|exists:rider_assignments,id',
            'payment_collected' => 'sometimes|accepted',
        ]);

        $assignment = RiderAssignment::with('order')->findOrFail($validated['assignment_id']);

        if ($assignment->rider_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }
        if ($assignment->status === 'completed') {
            return redirect()->back()->with('warning', 'This delivery has already been completed.');
        }

        DB::transaction(function () use ($assignment, $validated) {
            $assignment->update([
                'status' => 'completed',
                'payment_collected' => isset($validated['payment_collected']),
                'payment_collected_at' => isset($validated['payment_collected']) ? now() : null,
            ]);

            $assignment->order->update([
                'status' => 'delivered',
            ]);

            Transaction::create([
                'order_id' => $assignment->order_id,
                'rider_id' => $assignment->rider_id,
                'total_price' => $this->calculateTotalPrice($assignment->order),
                'delivery_fee' => $assignment->order->delivery_fee ?? 0,
                'is_cod' => $assignment->order->selected_payment_method === 'cod',
                'is_paid' => isset($validated['payment_collected']),
                'paid_at' => isset($validated['payment_collected']) ? now() : null,
            ]);
        });

        return redirect()->back()->with('success', 'Delivery marked as complete.');
    }
    private function calculateTotalPrice($order)
    {
        $productTotal = $order->products->sum(function ($product) {
            return $product->pivot->quantity * $product->price;
        });

        $deliveryFee = $order->delivery_fee ?? 0;

        return $productTotal + $deliveryFee;
    }
}
