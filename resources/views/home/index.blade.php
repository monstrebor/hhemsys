@extends('layout.layout')

@section('title', 'Ordering and Billing')

@section('script')

@endsection

@section('content')
    <div class="w-full h-full">
        <div class="flex min-h-screen">
            <div
                class="w-1/2 relative bg-gradient-to-br from-indigo-600 via-blue-500 to-indigo-800 flex flex-col items-center justify-center text-white p-8 overflow-hidden">

                <div class="absolute w-72 h-72 bg-blue-400 opacity-20 rounded-full blur-3xl top-10 left-10"></div>
                <div class="absolute w-96 h-96 bg-indigo-400 opacity-30 rounded-full blur-3xl bottom-10 right-10"></div>

                <div
                    class="relative bg-white/10 backdrop-blur-md rounded-2xl shadow-2xl p-10 text-center border border-white/20">
                    <i class="fas fa-receipt text-7xl mb-4 drop-shadow-lg"></i>
                    <h1 class="text-8xl font-bold mb-3" style="font-family: 'Cormorant Garamond', serif;">
                        H.H.E.M.Sys
                    </h1>
                    <p class="text-2xl text-blue-50" style="font-family: 'Playfair Display', serif;">
                        Household Expenditures Management System
                    </p>
                </div>
            </div>

            <div class="w-full md:w-1/2 relative flex flex-col items-center justify-center p-8 overflow-hidden"
                style="background: linear-gradient(135deg, #c3cfe2 0%, #c3d9ff 30%, #a6c1ee 60%, #fbc2eb 100%);">

                <div class="absolute top-0 left-0 w-full h-full overflow-hidden">
                    <svg viewBox="0 0 500 150" preserveAspectRatio="none" class="w-full h-full opacity-40">
                        <path d="M0.00,49.98 C150.00,150.00 349.67,-49.98 500.00,49.98 L500.00,0.00 L0.00,0.00 Z"
                            style="stroke: none; fill: #ffffff;"></path>
                    </svg>
                </div>

                <div class="relative w-full max-w-md bg-white/90 backdrop-blur-md p-8 rounded-2xl shadow-2xl z-10">
                    @include('layout.all-notif')

                    @include('home.login')
                    @include('home.register')
                </div>
            </div>

        </div>

    </div>

@endsection