@extends('layout.layout')

@section('title', 'Profile')

@section('content')
    @php use Carbon\Carbon; @endphp
    <div class="flex min-h-screen bg-gray-100">
        @include('partials.sidebar')
        <div class="flex-1 flex flex-col">
            @include("partials.navbar")
            @include("layout.all-notif")
            <main class="flex-1 p-6 overflow-y-auto bg-gray-50">
                <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-xl p-6 mt-2">
                    <div class="flex flex-col items-center mb-6">
                        <div class="text-center mb-3">
                            <img src="{{ $user->userInfo?->image
        ? asset('image/profile/' . $user->userInfo->image)
        : 'https://ui-avatars.com/api/?name=' . urlencode($user->name ?? 'User') }}" alt="Profile"
                                class="w-24 h-24 rounded-full border shadow-sm mb-2 object-cover">
                        </div>
                        <h2 class="mt-3 text-2xl font-semibold text-gray-800">{{ $user->name }}</h2>
                        <p class="text-gray-500">{{ $user->email }}</p>

                        <button class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#profileModal">
                            <i class="bi bi-pencil-square me-1"></i> Edit Profile
                        </button>
                    </div>

                    <hr class="mb-4">

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-gray-700">
                        <div>
                            <h6 class="font-semibold">First Name</h6>
                            <p>{{ $user->userInfo->first_name ?? '—' }}</p>
                        </div>
                        <div>
                            <h6 class="font-semibold">Last Name</h6>
                            <p>{{ $user->userInfo->last_name ?? '—' }}</p>
                        </div>
                        <div>
                            <h6 class="font-semibold">Middle Name</h6>
                            <p>
                                @if(empty($user->userInfo->middle_name) || in_array(strtolower($user->userInfo->middle_name), ['n/a', 'none']))
                                    —
                                @else
                                    {{ $user->userInfo->middle_name }}
                                @endif
                            </p>
                        </div>
                        <div>
                            <h6 class="font-semibold">Date of Birth</h6>
                            <p>{{ $user->userInfo?->date_of_birth ? Carbon::parse($user->userInfo->date_of_birth)->format('F j, Y') : '—' }}
                            </p>
                        </div>
                        <div>
                            <h6 class="font-semibold">Phone Number</h6>
                            <p>{{ $user->userInfo->phone_number ?? '—' }}</p>
                        </div>
                        <div>
                            <h6 class="font-semibold">Street</h6>
                            <p>{{ $user->userInfo->street ?? '—' }}</p>
                        </div>
                        <div>
                            <h6 class="font-semibold">City</h6>
                            <p>{{ $user->userInfo->city ?? '—' }}</p>
                        </div>
                        <div>
                            <h6 class="font-semibold">Province</h6>
                            <p>{{ $user->userInfo->province ?? '—' }}</p>
                        </div>
                    </div>
                </div>
                @include('profile.modal')
            </main>
        </div>
    </div>
@endsection