@extends('layout.layout')

@section('title', 'Account Dashboard')

@section('script')
<script>
</script>
@endsection

@section('content')


<div class="w-full min-h-screen bg-gray-50">
    @include('partials.customer.navbar')

    <div class="max-w-6xl mx-auto px-4 py-8">
        @include('layout.all_notif')

        <div class="p-6 max-w-4xl mx-auto space-y-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <img src="https://as1.ftcdn.net/jpg/02/59/39/46/1000_F_259394679_GGA8JJAEkukYJL9XXFH2JoC3nMguBPNH.jpg"
                        alt="Logo" class="h-10 w-10 rounded-full border shadow-md">
                    <h1 class="text-3xl font-extrabold text-indigo-700 flex items-center gap-2">
                        Customer Account
                    </h1>
                </div>
                <div class="flex">
                    <button onclick="document.getElementById('emailModal').classList.remove('hidden')"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white mr-2 px-4 py-2 rounded-xl shadow flex items-center gap-2 transition">
                        <i data-lucide="mail" class="w-4 h-4"></i> Update Email
                    </button>
                    <button onclick="toggleEditMode()"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-xl shadow flex items-center gap-2 transition">
                        <i data-lucide="pencil-line" class="w-4 h-4"></i>
                        Edit Info
                    </button>
                </div>
            </div>

            <form method="POST" action="{{ route('customer-account.update') }}">
                @csrf
                <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-4 text-sm text-gray-800">
                    <div class="w-[850px] bg-white shadow-xl rounded-2xl p-6 border border-gray-200">
                        <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-4 text-sm text-gray-800">
                            <div class="flex items-center gap-2">
                                <i data-lucide="user" class="w-4 h-4 text-indigo-500"></i>
                                <div>
                                    <dt class="text-xs text-gray-500">Full Name</dt>
                                    <dd class="font-medium">{{ $user->customerInfo->full_name ?? 'N/A' }}</dd>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <i data-lucide="phone" class="w-4 h-4 text-indigo-500"></i>
                                <div>
                                    <dt class="text-xs text-gray-500">Phone Number</dt>
                                    <dd class="font-medium">{{ $user->customerInfo->phone_number ?? 'N/A' }}</dd>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <i data-lucide="map-pin" class="w-4 h-4 text-indigo-500"></i>
                                <div>
                                    <dt class="text-xs text-gray-500">Street</dt>
                                    <dd class="font-medium">{{ $user->customerInfo->street ?? 'N/A' }}</dd>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <i data-lucide="map" class="w-4 h-4 text-indigo-500"></i>
                                <div>
                                    <dt class="text-xs text-gray-500">City</dt>
                                    <dd class="font-medium">{{ $user->customerInfo->city ?? 'N/A' }}</dd>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <i data-lucide="compass" class="w-4 h-4 text-indigo-500"></i>
                                <div>
                                    <dt class="text-xs text-gray-500">Province</dt>
                                    <dd class="font-medium">{{ $user->customerInfo->province ?? 'N/A' }}</dd>
                                </div>
                            </div>
                            <div class="flex items-center gap-2 sm:col-span-2">
                                <i data-lucide="mail-open" class="w-4 h-4 text-indigo-500"></i>
                                <div>
                                    <dt class="text-xs text-gray-500">Email</dt>
                                    <dd class="font-medium" data-no-edit>{{ $user->email }}</dd>
                                </div>
                            </div>
                        </dl>
                    </div>
                </dl>

                <div id="form-actions" class="mt-4 hidden w-full flex justify-end">
                    <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-xl shadow flex items-center gap-2">
                        <i data-lucide="save" class="w-4 h-4"></i> Save Changes
                    </button>
                </div>

            </form>
        </div>
        @include('users.customers.account.modal')
    </div>
</div>
<script src="{{ asset('js/customerAccount.js') }}"></script>
@endsection
