@extends('layout.layout')

@section('title', 'Return/Exchange Dashboard')

@section('script')
<script src="asset('js/returnExchangeHeader.js')"></script>
@endsection

@section('content')


<div class="w-full min-h-screen bg-gray-50">
    @include('partials.cashier.navbar')
    @include('partials.cashier.sidebar')

    <div class="max-w-6xl mx-auto px-4 py-8">
        @include('layout.all_notif')

        <h1 class="text-3xl font-bold text-indigo-700 mb-6 flex items-center gap-2">
            ♻ Return / Exchange Dashboard
        </h1>

        <div class="flex justify-between items-center mb-4">
            <input type="text" id="searchInput" onkeyup="filterOrders()"
                placeholder="🔍 Search by Receipt No. or Customer Name..."
                class="border rounded-lg px-4 py-2 w-1/2 focus:ring-2 focus:ring-indigo-400 outline-none">
        </div>

        <div class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-200">
            <table class="min-w-full divide-y divide-gray-200" id="ordersTable">
                <thead class="bg-indigo-600 text-white">
                    <tr>
                        <th class="px-4 py-3 text-left text-sm font-medium">Receipt #</th>
                        <th class="px-4 py-3 text-left text-sm font-medium">Date</th>
                        <th class="px-4 py-3 text-left text-sm font-medium">Customer</th>
                        <th class="px-4 py-3 text-left text-sm font-medium">Total</th>
                        <th class="px-4 py-3 text-left text-sm font-medium">Status</th>
                        <th class="px-4 py-3 text-center text-sm font-medium">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 bg-white">
                    @forelse($walkins as $walkin)
                    @if($walkin->payment_status == 'paid')
                    <tr>
                        <td class="px-4 py-3 font-medium">#{{ $walkin->id }}</td>
                        <td class="px-4 py-3">{{ $walkin->created_at->format('M d, Y h:i A') }}</td>
                        <td class="px-4 py-3">{{ $walkin->customer_name ?? 'Walk-in Customer' }}</td>
                        <td class="px-4 py-3">₱{{ number_format($walkin->total_amount,2) }}</td>
                        <td class="px-4 py-3">
                            <span
                                class="px-2 py-1 rounded-full text-xs
                                    {{ $walkin->status == 'completed' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                {{ ucfirst($walkin->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <button data-bs-toggle="modal" data-bs-target="#returnModal{{ $walkin->id }}"
                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-lg text-sm shadow">
                                ♻ Process
                            </button>
                        </td>
                    </tr>

                    <div class="modal fade" id="returnModal{{ $walkin->id }}" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <form action="{{ route('return-exchanges.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="walkin_id" value="{{ $walkin->id }}">
                                <div class="modal-content">
                                    <div class="modal-header bg-yellow-500 text-white">
                                        <h5 class="modal-title">Return / Exchange - Receipt #{{ $walkin->id }}</h5>
                                        <button type="button" class="btn-close btn-close-white"
                                            data-bs-dismiss="modal"></button>
                                    </div>

                                    <div class="modal-body space-y-3">
                                        <p class="font-medium">Select items to return:</p>
                                        <table class="table table-sm table-bordered">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Select</th>
                                                    <th>Product</th>
                                                    <th>Qty</th>
                                                    <th>Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($walkin->items as $item)
                                                <tr>
                                                    <td><input type="checkbox" name="items[{{ $item->id }}][id]"
                                                            value="{{ $item->product_id }}"></td>
                                                    <td>{{ $item->product->name }}</td>
                                                    <td><input type="number" name="items[{{ $item->id }}][qty]"
                                                            value="1" min="1" max="{{ $item->quantity }}"
                                                            class="w-16 border rounded px-1"></td>
                                                    <td>₱{{ number_format($item->price,2) }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <div class="mt-3">
                                            <label class="block font-medium">Reason for Return/Exchange:</label>
                                            <textarea name="reason" rows="2"
                                                class="w-full border rounded px-3 py-2"></textarea>
                                        </div>

                                        <div class="mt-3">
                                            <label class="block font-medium mb-1">Type:</label>
                                            <select name="type" id="typeSelect{{ $walkin->id }}" class="form-select"
                                                onchange="toggleExchangeProducts({{ $walkin->id }})">
                                                <option value="return">Return Only</option>
                                                <option value="exchange">Exchange</option>
                                            </select>
                                        </div>

                                        <div id="exchangeProducts{{ $walkin->id }}" class="mt-3 hidden">
                                            <label class="block font-medium mb-1">Select Exchange Product:</label>
                                            <select name="exchange_product_id" class="form-select">
                                                <option value="">-- Select Product --</option>
                                                @foreach($products as $product)
                                                <option value="{{ $product->id }}">
                                                    {{ $product->name }} (₱{{ number_format($product->price,2) }})
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>

                                    <div class="modal-footer bg-gray-50">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-warning">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endif
                    @empty
                    <tr>
                        <td colspan="6" class="px-4 py-3 text-center text-gray-500">
                            No walk-in orders available for return/exchange.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="{{ asset('js/returnExchangeToggle.js') }}"></script>
@endsection