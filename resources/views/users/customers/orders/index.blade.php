@extends('layout.layout')

@section('title', 'Order Dashboard')

@section('script')
@endsection

@section('content')
<div class="w-full min-h-screen bg-gray-50">
    @include('partials.customer.navbar')

    <div class="max-w-4xl mx-auto px-4 py-8">
        @include('layout.all_notif')

        <h1 class="text-4xl font-extrabold text-indigo-700 mb-8 text-center flex items-center justify-center gap-2">
            📦 <span>My Orders</span>
        </h1>

        @forelse ($orders as $order)
        <div class="bg-white border border-gray-300 shadow-lg rounded-xl p-6 mb-8">
            <div class="flex items-center justify-between border-b pb-3 mb-4">
                <h2 class="text-xl font-semibold text-indigo-800 flex items-center gap-2">
                    🧾 Order #{{ $order->id }}
                </h2>
                <span class="text-sm text-gray-500 flex items-center gap-1">
                    ⏰ {{ $order->created_at->format('F d, Y - h:i A') }}
                </span>
            </div>

            <div class="mb-4">
                <h3 class="text-gray-700 font-semibold mb-2 flex items-center gap-2">🛒 Ordered Items</h3>
                <ul class="space-y-2">
                    @foreach ($order->products as $product)
                    <li class="flex items-center justify-between px-3 py-2 bg-gray-50 rounded-md border">
                        <div class="flex items-center gap-2">
                            <span class="text-xl">📌</span>
                            <span class="text-gray-800 font-medium">{{ $product->name }}</span>
                        </div>
                        <span class="text-sm text-gray-600">Qty: {{ $product->pivot->quantity }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="mt-4 flex justify-end">
                <div class="text-right">
                    <div class="text-sm text-gray-600">🚚 Delivery Fee:</div>
                    <div class="text-lg font-semibold text-indigo-700">₱{{ number_format($order->delivery_fee, 2) }}
                    </div>
                </div>
            </div>
            <div class="mt-2 flex justify-end">
                <div class="text-right">
                    @php
                    $productTotal = $order->products->sum(function ($product) {
                    return $product->pivot->quantity * $product->price;
                    });
                    $totalAmount = $productTotal + $order->delivery_fee;
                    @endphp
                    <div class="text-sm text-gray-600">💰 Total Amount (incl. Delivery):</div>
                    <div class="text-xl font-bold text-green-700">₱{{ number_format($totalAmount, 2) }}</div>
                    @if ($order->status === 'delivered')
                    <div class="mt-2 text-end">
                        <span class="badge bg-success text-white px-3 py-2 rounded-pill">
                            ✅ Order Completed
                        </span>
                    </div>
                    @endif
                </div>
            </div>
            <div class="text-end mt-4">
                @php
                $status = $order->status;

                $badgeClass = match($status) {
                'placed' => 'bg-success text-white',
                'assigned_to_rider' => 'bg-primary text-white',
                'delivered' => 'bg-info text-white',
                'cancelled' => 'bg-danger text-white',
                default => 'bg-secondary text-white',
                };

                $statusLabel = match($status) {
                'placed' => '✅ Status: Placed',
                'assigned_to_rider' => '🛵 Assigned to Rider',
                'delivered' => '📦 Delivered',
                'cancelled' => '❌ Cancelled',
                default => ucfirst($status),
                };
                @endphp

                <span class="badge rounded-pill px-3 py-2 fw-semibold {{ $badgeClass }}">
                    {{ $statusLabel }}
                </span>

                @if (!in_array($status, ['cancelled', 'assigned_to_rider', 'delivered']))
                <button type="button" class="btn btn-outline-danger ms-3 d-inline-flex align-items-center gap-2"
                    data-bs-toggle="modal" data-bs-target="#cancelOrderModal-{{ $order->id }}">
                    <i class="bi bi-x-circle-fill"></i> Cancel Order
                </button>
                @endif
            </div>
        </div>

        <div class="modal fade" id="cancelOrderModal-{{ $order->id }}" tabindex="-1"
            aria-labelledby="cancelOrderModalLabel-{{ $order->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border border-danger">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title d-flex align-items-center gap-2"
                            id="cancelOrderModalLabel-{{ $order->id }}">
                            <i class="bi bi-exclamation-triangle-fill fs-5"></i>
                            Confirm Cancellation
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img src="https://img.icons8.com/?size=100&id=UwZKLuGHcwYk&format=png" alt="Cancel"
                            class="w-10 h-10 mb-3">
                        <p class="fs-5 fw-semibold text-danger">Are you sure you want to cancel this order?</p>
                        <small class="text-muted">This action cannot be undone.</small>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="bi bi-arrow-left-circle"></i> No, Keep Order
                        </button>
                        <form action="{{ route('orders.cancel', $order->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-x-circle-fill me-1"></i> Yes, Cancel Order
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="bg-yellow-100 border border-yellow-300 text-yellow-800 px-6 py-4 rounded-lg text-center">
            You have no orders yet. Start shopping now! 🛍️
        </div>
        @endforelse
    </div>
</div>
@endsection
