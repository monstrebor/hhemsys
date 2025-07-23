<?php

namespace App\Http\Controllers;

use App\Models\{Order, Product};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('created_by', auth()->id())
            ->where('status', '!=', 'cancelled')
            ->with('products')
            ->latest()
            ->get();
        return view('users.customers.orders.index', compact('orders'));
    }


    public function store(Request $request)
    {
        $productIds = $request->product_id;
        $quantities = $request->quantity;

        $items = [];

        foreach ($productIds as $index => $id) {
            $qty = (int) $quantities[$index];

            if ($qty > 0) {
                $product = Product::find($id);

                if (!$product) {
                    return back()->with('error', 'Product not found.');
                }

                if ($qty > $product->qty) {
                    return back()->with('error', 'Not enough stock for ' . $product->name);
                }

                $items[$id] = ['quantity' => $qty];
            }
        }

        if (empty($items)) {
            return back()->with('error', 'Please select at least one product.');
        }

        $order = Order::create([
            'selected_payment_method' => 'cash', // Adjust as needed
            'created_by' => Auth::id(),
            'modified_by' => Auth::id(),
        ]);

        $order->products()->attach($items);

        foreach ($items as $productId => $details) {
            Product::where('id', $productId)->decrement('qty', $details['quantity']);
        }

        return redirect()->route('orders.index')->with('success', 'Order placed successfully!');
    }

    public function cancel(Order $order)
    {
        if ($order->created_by !== auth()->id()) {
            abort(403);
        }

        if ($order->status !== 'pending') {
            return back()->with('error', 'Only placed orders can be cancelled.');
        }

        $order->update(['status' => 'cancelled']);

        return back()->with('success', 'Order has been cancelled.');
    }
}
