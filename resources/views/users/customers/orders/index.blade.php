@extends('layout.layout')

@section('title', 'Order Dashboard')

@section('script')
@endsection

@section('content')


<div class="w-full min-h-screen bg-gray-50">
    @include('partials.customer_navbar')

    <h1 class="text-3xl font-bold mb-4">My Orders</h1>
    @foreach ($orders as $order)
    <div class="border p-4 mb-4 rounded">
        <p><strong>Order #{{ $order->id }}</strong> ({{ $order->created_at->format('Y-m-d') }})</p>
        <ul class="mt-2 ml-4 list-disc">
            @foreach ($order->products as $product)
            <li>{{ $product->name }} — Quantity: {{ $product->pivot->quantity }}</li>
            @endforeach
        </ul>
    </div>
    @endforeach

</div>

@endsection
