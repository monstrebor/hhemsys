<?php

namespace App\Http\Controllers;

use App\Models\{Walkin, WalkinOrderItem, Product, WalkinTransaction};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class WalkinController extends Controller
{
    public function index()
    {
        $walkins = Walkin::with('items.product')->latest()->get();
        $products = Product::all();

        return view('users.cashiers.walk-in.index', compact('walkins', 'products'));
    }

    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            $walkin = Walkin::create([
                'status' => 'pending',
                'payment_status' => 'unpaid',
                'total_amount' => $request->total_amount,
                'created_by' => auth()->id(),
            ]);

            foreach ($request->items as $item) {
                if (!isset($item['id'])) {
                    continue;
                }

                WalkinOrderItem::create([
                    'walkin_id' => $walkin->id,
                    'product_id' => $item['id'],
                    'quantity' => $item['qty'],
                    'price' => $item['price'],
                ]);

                Product::where('id', $item['id'])->decrement('qty', $item['qty']);
            }
        });

        return redirect()->route('walkins.index')->with('success', 'Walk-in order created!');
    }


    public function confirmPayment(Request $request, Walkin $walkin)
    {
        DB::transaction(function () use ($request, $walkin) {
            $walkin->update([
                'payment_status' => 'paid',
                'status' => 'completed'
            ]);

            WalkinTransaction::create([
                'walkin_id' => $walkin->id,
                'amount' => $walkin->total_amount,
                'payment_method' => $request->payment_method,
                'is_paid' => true,
                'paid_at' => now(),
            ]);
        });

        return redirect()->route('walkins.index')->with('success', 'Payment confirmed!');
    }

    public function downloadReceipt(Walkin $walkin)
    {
        $walkin->load(['items.product', 'transaction', 'cashier']);

        $pdf = Pdf::loadView('users.cashiers.walk-in.receipt-pdf', compact('walkin'));

        return $pdf->download('receipt-' . $walkin->id . '.pdf');
    }
}
