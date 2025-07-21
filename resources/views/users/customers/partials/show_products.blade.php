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
                        <span class="text-blue-600 font-bold text-lg">₱{{ number_format($product->price, 2) }}</span>
                        <span class="text-sm text-gray-500">Qty: {{ $product->qty }}</span>
                    </div>

                    <button
                        class="mt-4 w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded transition">Buy
                        Now</button>
                </div>
            </div>
        @endforeach
    </div>
</div>
