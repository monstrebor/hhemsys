<div class="modal fade" id="newOrderModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('walkins.store') }}" method="POST">
            @csrf
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">🛒 New Walk-in Order</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <p class="mb-3 text-muted">Select products for this walk-in order:</p>

                    <div class="row g-3">
                        @foreach($products as $product)
                        <div class="col-md-4">
                            <div class="card h-100 shadow-sm border hover-shadow-sm">
                                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top object-cover"
                                    style="height:150px;object-fit:cover" alt="{{ $product->name }}">

                                <div class="card-body p-2 text-center">
                                    <h6 class="fw-bold mb-1">{{ $product->name }}</h6>
                                    <p class="text-primary mb-2">₱{{ number_format($product->price, 2) }}</p>

                                    <div class="form-check d-flex justify-content-center align-items-center gap-2">
                                        <input type="checkbox" class="form-check-input product-checkbox"
                                            id="product-{{ $product->id }}" name="items[{{ $product->id }}][id]"
                                            value="{{ $product->id }}">

                                        <input type="number" name="items[{{ $product->id }}][qty]" value="1" min="1"
                                            class="form-control form-control-sm w-25 text-center qty-input d-none">

                                        <input type="hidden" name="items[{{ $product->id }}][price]"
                                            value="{{ $product->price }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="mt-4">
                        <label class="fw-bold">Total Amount:</label>
                        <input type="number" name="total_amount" step="0.01" required class="form-control" readonly>
                        <small class="text-muted">Total updates automatically based on selection</small>
                    </div>
                </div>

                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create Order</button>
                </div>
            </div>
        </form>
    </div>
</div>

@foreach($walkins as $walkin)
    @if($walkin->payment_status == 'paid')
    <div class="modal fade" id="receiptModal{{ $walkin->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content shadow-lg border-0">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Receipt #{{ $walkin->id }}</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <p><strong>Date:</strong> {{ $walkin->created_at->format('M d, Y h:i A') }}</p>
                    <p><strong>Cashier:</strong> {{ $walkin->cashier->name ?? 'N/A' }}</p>
                    <hr>

                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Qty</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($walkin->items as $item)
                            <tr>
                                <td>{{ $item->product->name ?? 'Deleted Product' }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>₱{{ number_format($item->price * $item->quantity, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <hr>
                    <h5 class="text-end">Total: ₱{{ number_format($walkin->total_amount,2) }}</h5>
                    <p class="text-end text-muted mb-0">
                        Payment Method: {{ ucfirst($walkin->transaction->payment_method ?? 'Cash') }}
                    </p>
                </div>

                <div class="modal-footer bg-light">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" onclick="printReceipt({{ $walkin->id }})">🖨 Print</button>
                    <a href="{{ route('walkins.download-receipt', $walkin->id) }}" class="btn btn-success">⬇ Download PDF</a>
                </div>
            </div>
        </div>
    </div>
    @endif
@endforeach

