<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Household;
use App\Models\Transaction;
use App\Services\TransactionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class TransactionController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        $household = Household::where('owner_id', $user)->first();
        if (! $household) {
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

    public function store(Request $request, TransactionService $transactionService)
    {
        $categories = include resource_path('views/transactions/categories.php');
        $categoryIds = array_column($categories, 'id');

        $validated = $request->validate([
            'category_id' => ['required', Rule::in($categoryIds)],
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0.01',
            'date' => 'required|date',
        ]);
        $household = Household::where('owner_id', auth()->id())->first();
        $account = Account::firstOrCreate(
            [
                'household_id' => $household->id,
                'user_id' => auth()->id(),
            ],
            [
                'balance' => $household->expected_monthly_income ?? 0,
            ]
        );

        $transactionService->recordExpense((object) $validated, $account);

        return back()->with('success', 'Expense recorded successfully!');
    }
}
