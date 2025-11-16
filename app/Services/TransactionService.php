<?php

namespace App\Services;

use App\Models\Transaction;
use App\Models\Entry;
use Illuminate\Support\Facades\DB;

class TransactionService
{
    public function recordExpense($request, $account)
    {
        DB::transaction(function () use ($request, $account) {

            $transaction = Transaction::create([
                'household_id' => $account->household_id,
                'account_id'   => $account->id,
                'category_id'  => $request->category_id, 
                'description'  => $request->description,
                'amount'       => $request->amount,
                'type'         => 'expense',
                'date'         => $request->date,
            ]);

            Entry::create([
                'transaction_id' => $transaction->id,
                'account_id'     => $account->id,
                'entry_type'     => 'debit',
                'amount'         => $request->amount,
            ]);

            $account->decrement('balance', $request->amount);
        });
    }
}
