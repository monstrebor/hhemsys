<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\{User,Transaction};
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
            ->sum(DB::raw('total_price + delivery_fee'));

        $pendingCODCount = Transaction::where('is_cod', true)
            ->where('is_paid', false)
            ->count();

        return view("admin.index", compact("users", "totalPaidToday", "pendingCODCount"));
    }
}
