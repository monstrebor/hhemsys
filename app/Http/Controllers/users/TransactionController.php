<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\{Transaction, Category};
use App\Models\Household;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        $household = Household::where('user_id', $user)->first();
        if (!$household) {
            return redirect()->route('user.household.index')
                ->with('warning', 'You need to create or join a household first.');
        }

        $transactions = Transaction::where('household_id', $household->id)
            ->latest()
            ->get();

        $todayTotal = $transactions->whereBetween('created_at', [now()->startOfDay(), now()->endOfDay()])->sum('amount');
        $weekTotal = $transactions->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->sum('amount');
        $monthTotal = $transactions->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])->sum('amount');

        return view('transactions.index', compact('transactions', 'todayTotal', 'weekTotal', 'monthTotal'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0.01',
            'date' => 'required|date',
        ]);

        Transaction::create([
            'household_id' => Auth::user()->household->id,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'amount' => $request->amount,
            'date' => $request->date,
        ]);

        return redirect()->back()->with('success', 'Expense recorded successfully!');
    }
}
