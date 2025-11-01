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

                <!-- Summary Cards -->
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

                <!-- Expense Table -->
                <div class="bg-white shadow rounded-lg p-4">
                    <h3 class="text-lg font-semibold mb-3">Recent Transactions</h3>
                    <table class="min-w-full text-left text-sm text-gray-700">
                        <thead>
                            <tr class="border-b">
                                <th class="py-2">Date</th>
                                <th class="py-2">Category</th>
                                <th class="py-2">Description</th>
                                <th class="py-2 text-right">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transactions as $tx)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-2">{{ $tx->date->format('M d, Y') }}</td>
                                    <td class="py-2">{{ $tx->category->name ?? '—' }}</td>
                                    <td class="py-2">{{ $tx->description }}</td>
                                    <td class="py-2 text-right font-semibold">₱{{ number_format($tx->amount, 2) }}</td>
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

            <!-- Modal -->
            <div class="modal fade" id="addExpenseModal" tabindex="-1" aria-labelledby="addExpenseModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form action="{{ route('transactions.store') }}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Record New Expense</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body space-y-3">
                                <div>
                                    <label class="block text-sm">Category</label>
                                    <select name="category_id" class="form-select" required>
                                        <option value="">Select Category</option>
                                        @foreach(App\Models\Category::all() as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm">Description</label>
                                    <input type="text" name="description" class="form-control" required>
                                </div>
                                <div>
                                    <label class="block text-sm">Amount</label>
                                    <input type="number" step="0.01" name="amount" class="form-control" required>
                                </div>
                                <div>
                                    <label class="block text-sm">Date</label>
                                    <input type="date" name="date" class="form-control" value="{{ now()->toDateString() }}"
                                        required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save Expense</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection