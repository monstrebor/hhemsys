@extends('layout.layout')

@section('title', 'My Delivery Dashboard')

@section('script')
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection

@section('content')
<div class="w-full min-h-screen bg-gray-50 flex">
    @include('partials.rider.sidebar')

    <div class="flex-1 p-6">
        @include('partials.rider.navbar')
        @include('layout.all_notif')

        <div class="flex-col p-[80px] justify-center">
            <h1 class="text-3xl font-bold text-indigo-700 mb-6">My Deliveries</h1>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
                <div class="bg-yellow-100 p-4 rounded-xl shadow-md text-center">
                    <p class="text-lg font-semibold">📦 Pending</p>
                    <p class="text-3xl font-bold text-yellow-600">2</p>
                </div>
                <div class="bg-blue-100 p-4 rounded-xl shadow-md text-center">
                    <p class="text-lg font-semibold">🚚 In Transit</p>
                    <p class="text-3xl font-bold text-blue-600">1</p>
                </div>
                <div class="bg-green-100 p-4 rounded-xl shadow-md text-center">
                    <p class="text-lg font-semibold">✅ Delivered</p>
                    <p class="text-3xl font-bold text-green-600">3</p>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Order #</th>
                            <th>Customer</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Assigned At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($assignments as $assignment)
                        <tr>
                            <td>#{{ $assignment->order->id }}</td>
                            <td>{{ $assignment->order->customer->name ?? 'N/A' }}</td>
                            <td>
                                {{ $assignment->order->customer->customerInfo->street ?? 'N/A' }},
                                {{ $assignment->order->customer->customerInfo->city ?? '' }},
                                {{ $assignment->order->customer->customerInfo->province ?? '' }}
                            </td>
                            <td>
                                <span class="badge bg-{{
                    $assignment->status === 'assigned' ? 'secondary' :
                    ($assignment->status === 'in_transit' ? 'warning' : 'success')
                }}">
                                    {{ ucfirst(str_replace('_', ' ', $assignment->status)) }}
                                </span>
                            </td>
                            <td>{{ $assignment->assigned_at ? $assignment->assigned_at->format('M d, Y h:i A') : '—' }}
                            </td>
                            <td>
                                @if ($assignment->status === 'assigned')
                                <form method="POST" action="{{ route('rider.delivery.accept') }}">
                                    @csrf
                                    <input type="hidden" name="assignment_id" value="{{ $assignment->id }}">
                                    <button class="btn btn-sm btn-success">Accept</button>
                                </form>
                                @elseif ($assignment->status === 'in_transit')
                                <form method="POST" action="{{ route('rider.delivery.complete') }}">
                                    @csrf
                                    <input type="hidden" name="assignment_id" value="{{ $assignment->id }}">
                                    @if ($assignment->order->selected_payment_method === 'cash')
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="payment_collected"
                                            value="1" required>
                                        <label class="form-check-label small">Collected COD</label>
                                    </div>
                                    @endif
                                    <button class="btn btn-sm btn-primary mt-1">Mark as Delivered</button>
                                </form @else <span class="text-muted">Completed</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
