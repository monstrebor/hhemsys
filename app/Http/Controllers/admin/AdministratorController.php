<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\{User, Transaction, Walkin, ReturnExchange};
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdministratorController extends Controller
{
    public function index()
    {
        $users = User::role('customer')->get();
        $today = Carbon::today();

        $totalPaidToday = Transaction::where('is_paid', true)
            ->whereDate('paid_at', $today)
            ->sum('total_price');

        $pendingCODCount = Transaction::where('is_cod', true)
            ->where('is_paid', false)
            ->count();

        $totalWalkinPaidToday = Walkin::where('payment_status', 'paid')
            ->whereDate('created_at', $today)
            ->sum('total_amount');

        $walkinCountToday = Walkin::whereDate('created_at', $today)->count();

        $returnExchangeCountToday = ReturnExchange::whereDate('created_at', $today)->count();

        return view("admin.index", compact(
            "users",
            "totalPaidToday",
            "pendingCODCount",
            "totalWalkinPaidToday",
            "walkinCountToday",
            "returnExchangeCountToday"
        ));
    }

    public function walkinReport()
    {
        $walkins = Walkin::with('items.product')->orderBy('created_at', 'desc')->get();

        return view('admin.walk-in.index', compact('walkins'));
    }

    public function returnExchangeReport()
    {
        $returnExchanges = ReturnExchange::with(['items.product', 'walkin'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.return-exchange.index', compact('returnExchanges'));
    }
}
