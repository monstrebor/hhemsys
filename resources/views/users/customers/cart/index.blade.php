@extends('layout.layout')

@section('title', 'Cart Dashboard')

@section('script')
@endsection

@section('content')
<div class="w-full min-h-screen bg-gray-50">
    @include('partials.customer.navbar')
    @include('users.customers.cart.edit-modal')

    <div class="max-w-5xl mx-auto px-4 py-8">
        <h2 class="text-3xl font-extrabold text-indigo-700 mb-8 flex items-center gap-2">
            🛒 My Cart
        </h2>

        @if ($cartItems->count())
        <div class="overflow-x-auto bg-white shadow-md rounded-lg border border-gray-200">
            @include('layout.all_notif')
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-3">Product</th>
                        <th class="px-6 py-3">Price</th>
                        <th class="px-6 py-3">Quantity</th>
                        <th class="px-6 py-3">Subtotal</th>
                        <th class="px-6 py-3">Action</th>
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
                        <td class="px-6 py-4">
                            <button class="text-blue-600 hover:text-blue-800 edit-btn" data-bs-toggle="modal"
                                data-bs-target="#editCartModal" data-id="{{ $item->id }}"
                                data-product="{{ $item->product->name }}" data-price="{{ $item->product->price }}"
                                data-quantity="{{ $item->quantity }}"
                                data-image="{{ $item->product->image ? asset('storage/' . $item->product->image) : '' }}">
                                <svg class="h-8 w-8 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15.232 5.232l3.536 3.536M9 13l6-6 3 3-6 6H9v-3z"></path>
                                </svg>
                            </button>

                            <form action="{{ route('cart.destroy', $item->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this product?');"
                                class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">
                                    <svg class="h-8 w-8 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m2 0a2 2 0 00-2-2H9a2 2 0 00-2 2h10z" />
                                    </svg>
                                </button>
                            </form>
                        </td>
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
