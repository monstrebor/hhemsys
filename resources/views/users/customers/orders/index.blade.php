@extends('layout.layout')

@section('title', 'Order Dashboard')

@section('script')
@endsection

@section('content')


<div class="w-full min-h-screen bg-gray-50">
    @include('partials.customer_navbar')

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

            <div class="text-right">
                <span
                    class="inline-block text-sm text-green-600 bg-green-100 border border-green-200 px-3 py-1 rounded-full">
                    ✅ Status: Placed
                </span>
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
