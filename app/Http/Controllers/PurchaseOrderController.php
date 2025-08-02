<?php

namespace App\Http\Controllers;

use App\Models\{Supplier, Product, PurchaseOrder, PurchaseOrderItem};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseOrderController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        $products = Product::where('qty', '<', 80)->get(); // Low stock products
        $purchaseOrders = PurchaseOrder::with('supplier')->latest()->take(5)->get();

        return view('admin.purchase-order.index', compact('suppliers', 'products', 'purchaseOrders'));
    }

    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            $purchaseOrder = PurchaseOrder::create([
                'supplier_id' => $request->supplier_id,
                'status'      => 'pending', // Stock will update only when received
                'order_date'  => now(),
            ]);

            foreach ($request->items ?? [] as $item) {
                if (!isset($item['id']) || !$item['qty']) continue;

                $product = Product::find($item['id']);
                if (!$product) continue;

                PurchaseOrderItem::create([
                    'purchase_order_id' => $purchaseOrder->id,
                    'product_id'        => $product->id,
                    'quantity'          => $item['qty'],
                    'price'             => $product->price,
                ]);
            }
        });

        return redirect()->route('purchase-order.index')
            ->with('success', 'Purchase Order created successfully! Pending delivery.');
    }

    public function receive(PurchaseOrder $purchaseOrder)
    {
        if ($purchaseOrder->status === 'received') {
            return back()->with('info', 'This purchase order has already been received.');
        }

        DB::transaction(function () use ($purchaseOrder) {
            foreach ($purchaseOrder->items as $item) {
                $item->product->increment('qty', $item->quantity);
            }

            $purchaseOrder->update(['status' => 'received']);
        });

        return back()->with('success', 'Purchase Order marked as received and stock updated!');
    }
}
