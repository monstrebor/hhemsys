@extends('layout.layout')

@section('title', 'Ordering and Billing')

@section('script')

@endsection

@section('content')
<div class="w-full h-full">
    <div class="flex min-h-screen">
        <div
            class="w-1/2 bg-gradient-to-br from-blue-100 to-indigo-700 text-white flex flex-col items-center justify-center p-6">
            <div class="text-center">
                <i class="fas fa-receipt text-7xl mb-4"></i>
                <h1 class="text-5xl font-bold mb-4" style="font-family: 'Montserrat', sans-serif;">Ordering & Billing
                </h1>
                <p class="text-xl" style="font-family: 'Open Sans', sans-serif;">
                    Simplify orders. Speed up billing. Empower your business.
                </p>
            </div>
        </div>

        <div class="w-1/2 bg-white text-gray-800 flex flex-col items-center justify-center p-8">
            @include('layout.all_notif')

            <div class="w-full max-w-md">

                <!-- Login Form -->
                @include('home.login')

                {{-- Register Form --}}
                @include('home.register')
            </div>
        </div>
    </div>

</div>

@endsection