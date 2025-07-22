<form action="{{ route('orders.store') }}" method="POST">
    @csrf
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($products as $index => $product)
        <div class="bg-white shadow-md rounded-lg overflow-hidden p-4"
            x-data="{ qty{{ $index }}: 0, max: {{ $product->qty }} }">

            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                class="w-full h-48 object-cover mb-3">

            <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
            <p class="text-gray-700 text-sm truncate">{{ $product->description }}</p>
            <p class="text-blue-600 font-bold mt-2">₱{{ number_format($product->price, 2) }}</p>
            <p class="text-sm text-gray-500 mb-2">Available: {{ $product->qty }}</p>

            <input type="hidden" name="product_id[]" value="{{ $product->id }}">

            <div class="flex items-center space-x-2 mt-2">
                <button type="button" @click="if(qty{{ $index }} > 0) qty{{ $index }}--"
                    class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300 text-lg font-bold">
                    −
                </button>

                <input type="number" :value="qty{{ $index }}" class="w-12 text-center border rounded" readonly>
                <input type="hidden" name="quantity[]" :value="qty{{ $index }}">

                <button type="button" @click="if(qty{{ $index }} < max) qty{{ $index }}++"
                    class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300 text-lg font-bold">
                    +
                </button>
            </div>
        </div>
        @endforeach
    </div>

    <div class="text-center mt-6">
        <button type="submit" class="bg-indigo-600 text-white px-6 py-3 rounded hover:bg-indigo-700 transition">
            Place Order
        </button>
    </div>
</form>
