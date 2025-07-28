<div x-show="open" x-cloak class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6">
        <h2 class="text-xl font-bold mb-4">Delivery Details</h2>
        <p><strong>Customer:</strong> Customer {{ $i }}</p>
        <p><strong>Address:</strong> Makati, Metro Manila</p>
        <p><strong>Status:</strong> {{ $i == 1 ? 'Pending' : ($i == 2 ? 'In Transit'
            :
            'Delivered') }}</p>
        <p><strong>Notes:</strong> Handle with care.</p>

        <div class="mt-6 text-right">
            <button @click="open = false"
                class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Close</button>
        </div>
    </div>
</div>
