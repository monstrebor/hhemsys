<div class="overflow-x-auto">
    <div class="flex justify-between mx-[150px] items-center mb-4">
        <h2 class="text-2xl font-semibold text-gray-800">Customer Home Images</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createImageModal">
            + Add Image
        </button>
    </div>
    <table class="min-w-full bg-white rounded-lg shadow-md">
        <thead class="bg-gray-100 text-gray-700 text-left text-sm uppercase">
            <tr>
                <th class="px-6 py-3">ID</th>
                <th class="px-6 py-3">Image</th>
                <th class="px-6 py-3">Added By</th>
                <th class="px-6 py-3">Actions</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            @forelse ($images as $image)
            <tr class="border-b hover:bg-gray-50">
                <td class="px-6 py-4">{{ $image->id }}</td>
                <td class="px-6 py-4">
                    <img src="{{ $image->url }}" alt="Image {{ $image->id }}" class="w-24 h-16 object-cover rounded">
                    <p class="text-xs text-gray-500 break-all mt-1">{{ $image->url }}</p>
                </td>
                <td class="px-6 py-4">{{ $image->created_by }}</td>
                <td class="px-6 py-4 space-x-2">
                    <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white text-sm px-3 py-1 rounded"
                        data-bs-toggle="modal" data-bs-target="#editImageModal" data-id="{{ $image->id }}"
                        data-url="{{ $image->url }}">
                        Edit
                    </a>
                    <form action="{{ route('customer-home-images.destroy', $image->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-sm px-3 py-1 rounded"
                            onclick="return confirm('Are you sure you want to delete this image?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="px-6 py-4 text-center text-gray-500">No images found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>