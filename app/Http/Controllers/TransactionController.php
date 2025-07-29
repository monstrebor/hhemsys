<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $transactions = Transaction::with(['order', 'rider'])
            ->latest()
            ->paginate(10);

        return view('admin.transaction.index', compact('transactions'));
    }
}
