@extends('layout.layout')

@section('title', 'Orders Dashboard')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@section('script')

@endsection

@section('content')
<div class="w-full h-full">
    @include('partials.admin.navbar')
    @include('partials.admin.sidebar')

    <div class="max-w-7xl mx-auto px-6 py-12">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Customer Orders</h1>
        @include('layout.all_notif')
        <div class="flex space-x-4 mb-4">
            <a href="{{ route('admin.orders.index', ['status' => 'all']) }}"
                class="px-4 py-2 bg-gray-100 rounded {{ request('status') === 'all' ? 'bg-blue-100 text-blue-700' : '' }}">
                All
            </a>
            <a href="{{ route('admin.orders.index', ['status' => 'pending']) }}"
                class="px-4 py-2 bg-gray-100 rounded {{ request('status') === 'pending' ? 'bg-blue-100 text-blue-700' : '' }}">
                Pending
            </a>
            <a href="{{ route('admin.orders.index', ['status' => 'assigned_to_rider']) }}"
                class="px-4 py-2 bg-gray-100 rounded {{ request('status') === 'assigned_to_rider' ? 'bg-blue-100 text-blue-700' : '' }}">
                Assigned
            </a>
            <a href="{{ route('admin.orders.index', ['status' => 'cancelled']) }}"
                class="px-4 py-2 bg-red-100 rounded {{ request('status') === 'cancelled' ? 'text-red-700 font-semibold' : '' }}">
                Cancelled
            </a>
        </div>
        <div class="overflow-x-auto bg-white rounded shadow">
            <table class="min-w-full divide-y divide-gray-200 text-sm text-left">
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-3">Order ID</th>
                        <th class="px-6 py-3">Payment Method</th>
                        <th class="px-6 py-3">Ordered By</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3">Rider</th>
                        <th class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($orders as $order)
                    <tr>
                        <td class="px-6 py-4 font-medium text-gray-900">#{{ $order->id }}</td>
                        <td class="px-6 py-4">{{ ucfirst($order->selected_payment_method) }}</td>
                        <td class="px-6 py-4">{{ $order->customer->name ?? 'N/A' }}</td>
                        <td class="px-6 py-4">
                            <span class="inline-block px-2 py-1 text-xs rounded
                            {{ match($order->status) {
                                'pending' => 'bg-yellow-100 text-yellow-800',
                                'assigned_to_rider' => 'bg-blue-100 text-blue-800',
                                'delivered' => 'bg-green-100 text-green-800',
                                default => 'bg-gray-100 text-gray-600',
                            } }}">
                                {{ ucfirst(str_replace('_', ' ', $order->status)) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            {{ $order->riderAssignment->rider->name ?? '-' }}
                        </td>
                        <td class="px-6 py-4 flex space-x-2">
                            @if($order->status === 'pending' || $order->status === 'preparing')
                            <button type="button"
                                class="bg-indigo-600 hover:bg-indigo-700 text-white text-xs px-3 py-1 rounded"
                                data-bs-toggle="modal" data-bs-target="#assignRiderModal"
                                data-order-id="{{ $order->id }}">
                                Assign Rider
                            </button>
                            @else
                            <span class="text-gray-500 text-xs">Assigned</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @include('admin.orders.modal')
        <div class="mt-6">
            {{ $orders->links() }}
        </div>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/adminOrders.js') }}"></script>


@endsection
