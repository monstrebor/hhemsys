<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Walkin, ReturnExchangeItem, ReturnExchange, WalkinOrderItem, Product};
use Illuminate\Support\Facades\DB;

class ReturnExchangeController extends Controller
{
    public function index()
    {
        $walkins = Walkin::with('items.product')
            ->where('payment_status', 'paid')
            ->orderBy('created_at', 'desc')
            ->get();

        $products = Product::orderBy('name')->get();

        return view('users.cashiers.return-exchange.index', compact('walkins', 'products'));
    }


    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {

            $returnExchange = ReturnExchange::create([
                'walkin_id' => $request->walkin_id,
                'type' => $request->type,
                'reason' => $request->reason,
                'status' => 'approved',
                'processed_by' => auth()->id(),
                'exchanged_product_id' => $request->type == 'exchange' ? $request->exchange_product_id : null,
            ]);

            foreach ($request->items ?? [] as $itemId => $itemData) {
                if (!isset($itemData['id'])) continue;

                $returnItem = ReturnExchangeItem::create([
                    'return_exchange_id' => $returnExchange->id,
                    'product_id' => $itemData['id'],
                    'quantity' => $itemData['qty'],
                    'exchanged_product_id' => $request->type == 'exchange' ? $request->exchange_product_id : null,
                ]);

                Product::where('id', $itemData['id'])
                    ->increment('qty', $itemData['qty']);
            }

            if ($request->type == 'exchange' && $request->exchange_product_id) {
                Product::where('id', $request->exchange_product_id)->decrement('qty', 1);
            }
        });

        return redirect()->route('cashier.return-exchange.dashboard')
            ->with('success', 'Return/Exchange processed successfully!');
    }
}
