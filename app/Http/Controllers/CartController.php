<?php

namespace App\Http\Controllers;

use App\Models\{Cart, Order};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('product') // eager load product info
            ->where('user_id', auth()->id())
            ->get();

        return view('users.customers.cart.index', compact('cartItems'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $user = auth()->user();

        $cartItem = Cart::where('user_id', $user->id)
            ->where('product_id', $request->product_id)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
            ]);
        }

        return back()->with('success', 'Item added to cart.');
    }

    public function checkout(Request $request)
    {
        $user = auth()->user();

        $cartItems = Cart::with('product')
            ->where('user_id', $user->id)
            ->get();

        if ($cartItems->isEmpty()) {
            return back()->with('error', 'Your cart is empty.');
        }

        $order = Order::create([
            'selected_payment_method' => 'cash', // Or dynamic
            'created_by' => $user->id,
            'modified_by' => $user->id,
        ]);

        foreach ($cartItems as $item) {
            if ($item->quantity > $item->product->qty) {
                return back()->with('error', 'Not enough stock for ' . $item->product->name);
            }

            $order->products()->attach($item->product_id, [
                'quantity' => $item->quantity,
            ]);

            // Decrease product stock
            $item->product->decrement('qty', $item->quantity);
        }

        Cart::where('user_id', $user->id)->delete();

        return redirect()->route('orders.index')->with('success', 'Order placed successfully!');
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $quantity = $request->input('quantity');

        $cartItem = Cart::findOrFail($id);
        $cartItem->quantity = $quantity;
        $cartItem->save();

        return redirect()->back()->with('success', 'Cart updated.');
    }

    public function destroy($id)
    {
        try {
            $product = Cart::findOrFail($id);
            $product->delete();

            return redirect()->back()->with('success', 'Cart item deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Failed to delete product: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to delete cart item. Please try again.');
        }
    }
}
