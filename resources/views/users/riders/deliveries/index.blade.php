@extends('layout.layout')

@section('title', 'My Delivery Dashboard')

@section('script')
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection

@section('content')
<div class="w-full min-h-screen bg-gray-50 flex">
    @include('partials.rider.sidebar')

    <div class="flex-1 p-6">
        @include('partials.rider.navbar')
        @include('layout.all_notif')

        <div class="flex-col p-[80px] justify-center">
            <h1 class="text-3xl font-bold text-indigo-700 mb-6">My Deliveries</h1>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
                <div class="bg-yellow-100 p-4 rounded-xl shadow-md text-center">
                    <p class="text-lg font-semibold">📦 Pending</p>
                    <p class="text-3xl font-bold text-yellow-600">2</p>
                </div>
                <div class="bg-blue-100 p-4 rounded-xl shadow-md text-center">
                    <p class="text-lg font-semibold">🚚 In Transit</p>
                    <p class="text-3xl font-bold text-blue-600">1</p>
                </div>
                <div class="bg-green-100 p-4 rounded-xl shadow-md text-center">
                    <p class="text-lg font-semibold">✅ Delivered</p>
                    <p class="text-3xl font-bold text-green-600">3</p>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <table class="min-w-full table-auto text-sm text-left text-gray-700">
                    <thead class="bg-gray-100 uppercase font-bold">
                        <tr>
                            <th class="px-4 py-3">Order ID</th>
                            <th class="px-4 py-3">Customer</th>
                            <th class="px-4 py-3">Address</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 1; $i <= 5; $i++) <tr class="border-t hover:bg-gray-50">
                            <td class="px-4 py-3">#D00{{ $i }}</td>
                            <td class="px-4 py-3">Customer {{ $i }}</td>
                            <td class="px-4 py-3">Makati, Metro Manila</td>
                            <td class="px-4 py-3">
                                <span
                                    class="inline-block px-3 py-1 text-xs rounded-full
                                {{ $i == 1 ? 'bg-yellow-200 text-yellow-700' : ($i == 2 ? 'bg-blue-200 text-blue-700' : 'bg-green-200 text-green-700') }}">
                                    {{ $i == 1 ? 'Pending' : ($i == 2 ? 'In Transit' : 'Delivered') }}
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <div x-data="{ open: false }">
                                    <button @click="open = true" class="text-indigo-600 hover:underline">View</button>
                                    @include('users.riders.deliveries.modal')
                                </div>
                            </td>
                            </tr>
                            @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
