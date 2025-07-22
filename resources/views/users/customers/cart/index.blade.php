@extends('layout.layout')

@section('title', 'Cart Dashboard')

@section('script')
@endsection

@section('content')
<div class="w-full min-h-screen bg-gray-50">
    @include('partials.customer_navbar')

    <div class="container mx-auto px-4 py-6">
        <h2 class="text-2xl font-bold mb-6">My Cart</h2>
        @if ($cartItems->count())
        <table class="w-full text-left border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3">Product</th>
                    <th class="p-3">Price</th>
                    <th class="p-3">Quantity</th>
                    <th class="p-3">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach ($cartItems as $item)
                @php
                $subtotal = $item->product->price * $item->quantity;
                $total += $subtotal;
                @endphp
                <tr class="border-b">
                    <td class="p-3">{{ $item->product->name }}</td>
                    <td class="p-3">₱{{ number_format($item->product->price, 2) }}</td>
                    <td class="p-3">{{ $item->quantity }}</td>
                    <td class="p-3">₱{{ number_format($subtotal, 2) }}</td>
                </tr>
                @endforeach
                <tr class="font-bold">
                    <td colspan="3" class="p-3 text-right">Total:</td>
                    <td class="p-3">₱{{ number_format($total, 2) }}</td>
                </tr>
            </tbody>
        </table>
        @else
        <p class="text-gray-600">Your cart is empty.</p>
        @endif
    </div>

</div>
@endsection
