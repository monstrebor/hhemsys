@extends('layout.layout')

@section('title', 'Cart Dashboard')

@section('script')
@endsection

@section('content')
<div class="w-full min-h-screen bg-gray-50">
    @include('partials.customer_navbar')

    <div class="max-w-5xl mx-auto px-4 py-8">
        <h2 class="text-3xl font-extrabold text-indigo-700 mb-8 flex items-center gap-2">
            🛒 My Cart
        </h2>

        @if ($cartItems->count())
        <div class="overflow-x-auto bg-white shadow-md rounded-lg border border-gray-200">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-3">Product</th>
                        <th class="px-6 py-3">Price</th>
                        <th class="px-6 py-3">Quantity</th>
                        <th class="px-6 py-3">Subtotal</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @php $total = 0; @endphp
                    @foreach ($cartItems as $item)
                    @php
                    $subtotal = $item->product->price * $item->quantity;
                    $total += $subtotal;
                    @endphp
                    <tr class="border-t">
                        <td class="px-6 py-4 font-medium flex items-center gap-3">
                            <img src="{{ asset('storage/' . $item->product->image) }}"
                                class="w-12 h-12 object-cover rounded" alt="{{ $item->product->name }}">
                            {{ $item->product->name }}
                        </td>
                        <td class="px-6 py-4">₱{{ number_format($item->product->price, 2) }}</td>
                        <td class="px-6 py-4">{{ $item->quantity }}</td>
                        <td class="px-6 py-4 font-semibold">₱{{ number_format($subtotal, 2) }}</td>
                    </tr>
                    @endforeach
                    <tr class="bg-gray-50 font-bold border-t-2">
                        <td colspan="3" class="px-6 py-4 text-right text-indigo-700">Total:</td>
                        <td class="px-6 py-4 text-indigo-700">₱{{ number_format($total, 2) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-6 flex justify-end">
            <form action="{{ route('checkout') }}" method="POST" class="mt-6 flex justify-end">
                @csrf
                <button type="submit"
                    class="inline-flex items-center gap-2 bg-green-600 text-white font-semibold px-6 py-3 rounded-lg shadow hover:bg-green-700 hover:shadow-md transition-all duration-200">
                    ✅ Proceed to Checkout
                </button>
            </form>
        </div>
        @else
        <div class="bg-yellow-100 border border-yellow-300 text-yellow-800 px-6 py-4 rounded-lg text-center">
            🛍️ Your cart is empty. Start shopping now!
        </div>
        @endif
    </div>


</div>
@endsection
