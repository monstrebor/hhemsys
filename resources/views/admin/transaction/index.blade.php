@extends('layout.layout')

@section('title', 'Transaction Dashboard')

@section('script')

@endsection

@section('content')
<div class="w-full h-full">
    @include('partials.admin.navbar')
    @include('partials.admin.sidebar')

    <div class="w-full p-[110px]">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">All Transactions</h1>

        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full text-sm text-left text-gray-700">
                <thead class="bg-indigo-600 text-white text-xs uppercase">
                    <tr>
                        <th class="px-6 py-3">Order ID</th>
                        <th class="px-6 py-3">Rider</th>
                        <th class="px-6 py-3">Total Price</th>
                        <th class="px-6 py-3">Delivery Fee</th>
                        <th class="px-6 py-3">COD</th>
                        <th class="px-6 py-3">Paid</th>
                        <th class="px-6 py-3">Paid At</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse ($transactions as $transaction)
                    <tr class="hover:bg-gray-100">
                        <td class="px-6 py-4">{{ $transaction->order_id }}</td>
                        <td class="px-6 py-4">{{ $transaction->rider->name ?? '—' }}</td>
                        <td class="px-6 py-4">₱{{ number_format($transaction->total_price, 2) }}</td>
                        <td class="px-6 py-4">₱{{ number_format($transaction->delivery_fee, 2) }}</td>
                        <td class="px-6 py-4">
                            <span class="{{ $transaction->is_cod ? 'text-green-600' : 'text-gray-500' }}">
                                {{ $transaction->is_cod ? 'Yes' : 'No' }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="{{ $transaction->is_paid ? 'text-green-600' : 'text-red-600' }}">
                                {{ $transaction->is_paid ? 'Paid' : 'Unpaid' }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            {{ $transaction->paid_at ? $transaction->paid_at->format('M d, Y H:i') : '—' }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-6 text-gray-400">No transactions found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $transactions->links() }}
        </div>
    </div>

</div>

@endsection
