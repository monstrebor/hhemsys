<div class="max-w-6xl mx-auto px-4 py-8">
    @include('layout.all_notif')

    <h1 class="text-3xl font-bold text-green-700 mb-6 flex items-center gap-2">
        🛒 Purchase Orders Dashboard
    </h1>

    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-md p-6 mb-8">
        <h2 class="text-2xl font-bold mb-4">➕ Create Purchase Order</h2>

        <form action="{{ route('purchase-orders.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="font-medium">Select Supplier</label>
                <select name="supplier_id" class="form-select w-full border rounded p-2" required>
                    @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <h2 class="font-medium mb-2">Select Products to Re-Order</h2>
                <table class="w-full border rounded-lg overflow-hidden">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-2 py-1">Product</th>
                            <th class="border px-2 py-1">Current Qty</th>
                            <th class="border px-2 py-1">Re-Order Qty</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($products as $product)

                        <tr class="hover:bg-gray-50">
                            <td class="border px-2 py-1">
                                <input type="checkbox" name="items[{{ $product->id }}][id]" value="{{ $product->id }}"
                                    onclick="toggleQty(this)">
                                {{ $product->name }}
                            </td>
                            <td class="border px-2 py-1 text-center">{{ $product->qty }}</td>
                            <td class="border px-2 py-1 text-center">
                                <input type="number" name="items[{{ $product->id }}][qty]" min="1" value="1"
                                    class="border w-20 p-1 rounded" disabled>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg mt-3">
                ✅ Create Purchase Order
            </button>
        </form>
    </div>

    <div class="bg-white rounded-xl shadow-md p-6">
        <h2 class="text-xl font-bold mb-4">📦 Recent Purchase Orders</h2>
        <table class="w-full border rounded-lg overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-2 py-2">PO #</th>
                    <th class="border px-2 py-2">Supplier</th>
                    <th class="border px-2 py-2">Status</th>
                    <th class="border px-2 py-2">Date</th>
                    <th class="border px-2 py-2">Products</th>
                </tr>
            </thead>
            <tbody>
                @forelse($purchaseOrders as $po)
                <tr class="hover:bg-gray-50 align-top">
                    <td class="border px-2 py-2 text-center">#{{ $po->id }}</td>
                    <td class="border px-2 py-2">{{ $po->supplier->name }}</td>
                    <td class="border px-2 py-2 capitalize">
                        @if($po->status == 'pending')
                        <span class="text-yellow-600 font-semibold">Pending</span>
                        <form action="{{ route('purchase-order.receive', $po->id) }}" method="POST" class="mt-1">
                            @csrf
                            @method('PATCH')
                            <button type="submit"
                                class="bg-green-600 hover:bg-green-700 text-white px-2 py-1 text-xs rounded">
                                ✅ Mark as Received
                            </button>
                        </form>
                        @else
                        <span class="text-green-600 font-semibold">Received</span>
                        @endif
                    </td>
                    <td class="border px-2 py-2">{{ $po->created_at->format('M d, Y') }}</td>
                    <td class="border px-2 py-2">
                        <ul class="list-disc pl-5">
                            @foreach($po->items as $item)
                            <li>{{ $item->product->name }} x {{ $item->quantity }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-gray-500 py-3">
                        No purchase orders yet.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
