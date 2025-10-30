@extends('layout.layout')

@section('title', 'Landing Page')

@section('script')

@endsection

@section('content')

    <div class="w-full min-h-screen bg-gradient-to-br from-indigo-50 via-white to-blue-100 text-gray-800">

        @include('partials.landing-page-navbar')
        @include('layout.all-notif')

        <section class="flex flex-col md:flex-row items-center justify-between max-w-6xl mx-auto px-6 py-16">
            <div class="w-full md:w-1/2 mb-10 md:mb-0 text-center md:text-left">
                <h1 class="text-5xl md:text-6xl font-bold text-indigo-700 mb-4 leading-tight">
                    Manage Your <span class="text-indigo-500">Household Expenses</span> with Ease
                </h1>
                <p class="text-lg text-gray-600 mb-8">
                    Simplify tracking, budgeting, and managing your household expenditures with H.H.E.M.Sys — your smart and
                    secure expense companion.
                </p>
            </div>

            <div class="w-full md:w-1/2 flex justify-center relative">
                <div class="absolute w-72 h-72 bg-indigo-300 opacity-30 blur-3xl top-0 right-0"></div>
                <div class="min-h-screen flex items-center justify-center bg-gray-50">
                    <div class="bg-white p-8 rounded shadow-xl w-full max-w-md">
                        <h2 class="text-4xl font-bold mb-4 text-center">Reset Password</h2>

                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <label class="block mb-1">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                class="w-full border rounded px-3 py-2 mb-2" required autofocus>
                            @error('email')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror

                            <label class="block mb-1">New Password</label>
                            <input type="password" name="password" class="w-full border rounded px-3 py-2 mb-2" required>
                            @error('password')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror

                            <label class="block mb-1">Confirm New Password</label>
                            <input type="password" name="password_confirmation" class="w-full border rounded px-3 py-2 mb-4"
                                required>

                            <button type="submit"
                                class="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700 mt-2">
                                Reset Password
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-white py-20">
            <div class="max-w-6xl mx-auto px-6 text-center">
                <h2 class="text-4xl font-bold text-gray-800 mb-12">Why Choose H.H.E.M.Sys?</h2>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                    <div class="bg-indigo-50 rounded-2xl p-8 shadow hover:shadow-lg transition">
                        <i class="fas fa-wallet text-5xl text-indigo-600 mb-4"></i>
                        <h3 class="text-2xl font-semibold mb-3">Smart Expense Tracking</h3>
                        <p class="text-gray-600">
                            Record your daily expenses, categorize spending, and monitor your financial health effortlessly.
                        </p>
                    </div>

                    <div class="bg-indigo-50 rounded-2xl p-8 shadow hover:shadow-lg transition">
                        <i class="fas fa-chart-pie text-5xl text-indigo-600 mb-4"></i>
                        <h3 class="text-2xl font-semibold mb-3">Visual Reports</h3>
                        <p class="text-gray-600">
                            Instantly view detailed analytics and charts to understand your spending trends and patterns.
                        </p>
                    </div>

                    <div class="bg-indigo-50 rounded-2xl p-8 shadow hover:shadow-lg transition">
                        <i class="fas fa-lock text-5xl text-indigo-600 mb-4"></i>
                        <h3 class="text-2xl font-semibold mb-3">Secure & Private</h3>
                        <p class="text-gray-600">
                            Your financial data is encrypted and protected — only you can access your household records.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <footer class="bg-gray-900 text-gray-300 text-center py-6 mt-10">
            <p class="text-sm">&copy; {{ date('Y') }} H.H.E.M.Sys — All rights reserved.</p>
        </footer>

    </div>

@endsection