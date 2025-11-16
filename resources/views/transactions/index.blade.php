@extends('layout.layout')

@section('title', 'Transaction')

@section('script')

@endsection

@section('content')
    <div class="flex min-h-screen bg-gray-100">
        @include('partials.sidebar')

        <div class="flex-1 flex flex-col">
            @include('partials.navbar')
            @include('layout.all-notif')

            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Expense Tracker</h2>
                    <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700" data-bs-toggle="modal"
                        data-bs-target="#addExpenseModal">
                        + Record Expense
                    </button>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
                    <div class="bg-white p-4 rounded-lg shadow">
                        <h3 class="text-sm text-gray-500">Today</h3>
                        <p class="text-2xl font-bold text-indigo-600">₱{{ number_format($todayTotal, 2) }}</p>
                    </div>
                    <div class="bg-white p-4 rounded-lg shadow">
                        <h3 class="text-sm text-gray-500">This Week</h3>
                        <p class="text-2xl font-bold text-indigo-600">₱{{ number_format($weekTotal, 2) }}</p>
                    </div>
                    <div class="bg-white p-4 rounded-lg shadow">
                        <h3 class="text-sm text-gray-500">This Month</h3>
                        <p class="text-2xl font-bold text-indigo-600">₱{{ number_format($monthTotal, 2) }}</p>
                    </div>
                </div>

                <div class="bg-white shadow rounded-lg p-4">
                    <h3 class="text-lg font-semibold mb-3">Recent Transactions</h3>
                    <table class="min-w-full text-left text-sm text-gray-700">
                        <thead class="bg-gray-100">
                            <tr class="border-b">
                                <th class="py-2 px-4">Date</th>
                                <th class="py-2 px-4">Description</th>
                                <th class="py-2 px-4">Type</th>
                                <th class="py-2 px-4 text-right">Amount (₱)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transactions as $tx)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-2 px-4">{{ \Carbon\Carbon::parse($tx->date)->format('M d, Y') }}</td>
                                    <td class="py-2 px-4">{{ $tx->description ?? '—' }}</td>
                                    <td class="py-2 px-4">{{ $tx->type ?? '—' }}</td>
                                    <td class="py-2 px-4 text-right font-semibold text-red-600">
                                        -₱{{ number_format($tx->amount, 2) }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-gray-500 py-4">No expenses recorded yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            @include('transactions.add-expense-modal')

        </div>
    </div>
@endsection