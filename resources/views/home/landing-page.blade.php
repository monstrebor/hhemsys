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
                <a href="{{ route('login') }}"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-lg shadow-lg font-semibold transition">
                    Get Started
                </a>
            </div>

            <div class="w-full md:w-1/2 flex justify-center relative">
                <div class="absolute w-72 h-72 bg-indigo-300 opacity-30 blur-3xl top-0 right-0"></div>
                <img src="https://images.pexels.com/photos/669619/pexels-photo-669619.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=900&w=1200"
                    alt="Finance illustration" class="relative w-3/4 max-w-md drop-shadow-xl rounded-2xl">
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

        <section class="py-16 bg-gradient-to-r from-indigo-600 to-blue-600 text-white text-center">
            <h2 class="text-4xl font-bold mb-4">Start Managing Smarter Today</h2>
            <p class="text-lg mb-8 opacity-90">Sign up now and take control of your household finances.</p>
            <a href=""
                class="bg-white text-indigo-700 hover:bg-gray-100 px-10 py-4 rounded-lg font-semibold shadow-md transition">
                Create an Account
            </a>
        </section>

        <footer class="bg-gray-900 text-gray-300 text-center py-6 mt-10">
            <p class="text-sm">&copy; {{ date('Y') }} H.H.E.M.Sys — All rights reserved.</p>
        </footer>

    </div>

@endsection