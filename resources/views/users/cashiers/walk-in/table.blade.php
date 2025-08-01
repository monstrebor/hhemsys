<div>
    <h1 class="text-2xl font-bold mb-4">Walk-in Orders</h1>

    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#newOrderModal">+ New Walk-in
        Order</button>

    <table class="table table-bordered bg-white shadow-md">
        <thead>
            <tr>
                <th>ID</th>
                <th>Total</th>
                <th>Status</th>
                <th>Payment</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($walkins as $walkin)
            <tr>
                <td>{{ $walkin->id }}</td>
                <td>₱{{ number_format($walkin->total_amount,2) }}</td>
                <td>{{ ucfirst($walkin->status) }}</td>
                <td>{{ ucfirst($walkin->payment_status) }}</td>
                <td>
                    @if($walkin->payment_status == 'unpaid')
                    <form action="{{ route('walkins.confirm-payment',$walkin->id) }}" method="POST"
                        class="d-flex gap-1">
                        @csrf
                        <select name="payment_method" required class="form-select form-select-sm">
                            <option value="cash">Cash</option>
                            <option value="gcash">GCash</option>
                            <option value="card">Card</option>
                        </select>
                        <button type="submit" class="btn btn-success btn-sm">Confirm</button>
                    </form>
                    @else
                    <div class="flex">
                        <p class="text-green-600 mr-4">Paid</p>
                        <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                            data-bs-target="#receiptModal{{ $walkin->id }}">
                            🧾 View Receipt
                        </button>
                    </div>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">No walk-in orders yet</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
