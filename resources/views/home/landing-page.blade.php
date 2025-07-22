@extends('layout.layout')

@section('title', 'Landing Page')

@section('script')
@php
use App\Models\{Product, CustomerHomeImages, User};

$products = Product::where('qty', '>', 0)->latest()->get();
$images = CustomerHomeImages::pluck('url')->toArray();
$users = User::role('customer')->get();
@endphp
<script>
    window.customerHomeImages = @json($images);
</script>
@endsection

@section('content')

<div class="w-full min-h-screen bg-gray-50">
    @include('partials.customer_navbar')

    <div class="max-w-6xl mx-auto px-4 py-8">
        @include('users.customers.partials.image_ads')

        <div class="container mx-auto px-4 py-6">
            <h2 class="text-2xl font-bold mb-6">Our Products</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($products as $product)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                        class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold mb-1">{{ $product->name }}</h3>
                        <p class="text-gray-700 text-sm mb-2 truncate">{{ $product->description }}</p>
                        <div class="flex items-center justify-between mt-4">
                            <span class="text-blue-600 font-bold text-lg">₱{{ number_format($product->price, 2)
                                }}</span>
                            <span class="text-sm text-gray-500">Qty: {{ $product->qty }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        @if (auth()->check() && auth()->user()->is_new)
        <div class="mt-10">
            @include('settings.change-password')
        </div>
        @endif
    </div>

</div>

@endsection
