<div class="max-w-6xl mx-auto px-6 py-8">
    <h1 class="text-3xl font-bold text-indigo-700 mb-6">Return / Exchange Report</h1>

    <div class="bg-white shadow-md rounded-xl overflow-hidden border border-gray-200">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-yellow-500 text-white">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-medium">ID</th>
                    <th class="px-4 py-3 text-left text-sm font-medium">Date</th>
                    <th class="px-4 py-3 text-left text-sm font-medium">Type</th>
                    <th class="px-4 py-3 text-left text-sm font-medium">Status</th>
                    <th class="px-4 py-3 text-left text-sm font-medium">Items Returned</th>
                    <th class="px-4 py-3 text-left text-sm font-medium">Reason</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 bg-white">
                @forelse($returnExchanges as $exchange)
                <tr>
                    <td class="px-4 py-3 font-medium">#{{ $exchange->id }}</td>
                    <td class="px-4 py-3">{{ $exchange->created_at->format('M d, Y h:i A') }}</td>
                    <td class="px-4 py-3 capitalize">{{ $exchange->type }}</td>
                    <td class="px-4 py-3 capitalize">{{ $exchange->status }}</td>
                    <td class="px-4 py-3">
                        <ul class="list-disc ml-4">
                            @foreach($exchange->items as $item)
                            <li>{{ $item->product->name }} (x{{ $item->quantity }})</li>
                            @endforeach
                        </ul>
                    </td>
                    <td class="px-4 py-3">{{ $exchange->reason ?? '-' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-4 py-3 text-center text-gray-500">
                        No return/exchange records found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
