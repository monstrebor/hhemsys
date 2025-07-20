@extends('layout.layout')

@section('title', 'Product Dashboard')

@section('script')
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
@endsection

@section('content')
<div class="w-full h-full">
    @include('partials.admin_navbar')
    @include('partials.admin_sidebar')

    <main class="m-[100px]">
        @include('layout.all_notif')
        <div class="flex justify-between items-center mb-4">
            <div class="flex-1 text-center">
                <h1 class="text-5xl font-semibold text-gray-800">Manage Product</h1>
            </div>

            <div class="ml-auto">
                <button type="button"
                    class="btn btn-primary !text-white !bg-blue-600 hover:!bg-blue-700 !py-2 !px-4 !rounded"
                    data-bs-toggle="modal" data-bs-target="#createProductModal">
                    + Create
                </button>
            </div>
        </div>


        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-sm">
                <thead class="bg-gray-100 text-gray-600 text-sm uppercase tracking-wider">
                    <tr>
                        <th class="px-4 py-3 text-left">ID</th>
                        <th class="px-4 py-3 text-left">Name</th>
                        <th class="px-4 py-3 text-left">Description</th>
                        <th class="px-4 py-3 text-left">Quantity</th>
                        <th class="px-4 py-3 text-left">Price</th>
                        <th class="px-4 py-3 text-left">Image</th>
                        <th class="px-4 py-3 text-left">Supplier</th>
                        <th class="px-4 py-3 text-left">Date Received</th>
                        <th class="px-4 py-3 text-left">Action</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 divide-y divide-gray-200">
                    @foreach ( $products as $product)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $product->id }}</td>
                        <td class="px-4 py-3 font-medium">{{ $product->name ?? 'no data'}}</td>
                        <td class="px-4 py-3 text-sm">{{ $product->description ?? 'no data' }}</td>
                        <td class="px-4 py-3">{{ $product->qty ?? 'no data'}}</td>
                        <td class="px-4 py-3">${{ $product->price ?? 'no data'}}</td>
                        <td class="px-4 py-3">
                            @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image"
                                class="w-16 h-16 object-cover rounded" loading="lazy">
                            @else
                            <span class="text-gray-400 italic">no image</span>
                            @endif
                        </td>

                        <td class="px-4 py-3">{{ $product->supplier_id ?? 'no data' }}</td>
                        <td class="px-4 py-3">{{ $product->created_at ?? 'no data' }}</td>
                        <td class="px-4 py-3 space-x-2">
                            <button type="button" class="text-blue-600 hover:text-blue-800 edit-btn"
                                data-bs-toggle="modal" data-bs-target="#editProductModal" data-id="{{ $product->id }}"
                                data-name="{{ $product->name }}" data-description="{{ $product->description }}"
                                data-qty="{{ $product->qty }}" data-price="{{ $product->price }}"
                                data-supplier="{{ $product->supplier_id }}"
                                data-image="{{ $product->image ? asset('storage/' . $product->image) : '' }}">
                                <svg class="h-8 w-8 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15.232 5.232l3.536 3.536M9 13l6-6 3 3-6 6H9v-3z"></path>
                                </svg>
                            </button>

                            <form action="{{ route('product.destroy', $product->id) }}" method="POST"
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
                </tbody>
            </table>
        </div>
    </main>

    {{-- create modal --}}
    @include('product.create-modal')

    {{-- edit modal --}}
    @include('product.edit-modal')
</div>

<script src="{{ asset('js/modal.js') }}"></script>
@endsection
