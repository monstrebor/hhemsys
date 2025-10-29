@extends('layout.layout')

@section('title', 'User Dashboard')

@section('script')

@endsection

@section('content')
    <div class="flex min-h-screen bg-gray-100">

        <aside class="w-64 bg-white shadow-lg">
            <div class="p-6 border-b border-gray-200">
                <h1 class="text-2xl font-bold text-indigo-600">HouseBudget</h1>
                <p class="text-sm text-gray-500">Manage your household finances</p>
            </div>
            <nav class="p-4">
                <ul class="space-y-2">
                    <li>
                        <a href="" class="flex items-center p-2 rounded-lg text-gray-700 hover:bg-indigo-50">
                            <i class="fa-solid fa-chart-line mr-2"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="" class="flex items-center p-2 rounded-lg text-gray-700 hover:bg-indigo-50">
                            <i class="fa-solid fa-wallet mr-2"></i> Transactions
                        </a>
                    </li>
                    <li>
                        <a href="" class="flex items-center p-2 rounded-lg text-gray-700 hover:bg-indigo-50">
                            <i class="fa-solid fa-house-user mr-2"></i> Households
                        </a>
                    </li>
                    <li>
                        <a href="" class="flex items-center p-2 rounded-lg text-gray-700 hover:bg-indigo-50">
                            <i class="fa-solid fa-tags mr-2"></i> Categories
                        </a>
                    </li>
                    <li>
                        <a href="" class="flex items-center p-2 rounded-lg text-gray-700 hover:bg-indigo-50">
                            <i class="fa-solid fa-file-invoice-dollar mr-2"></i> Reports
                        </a>
                    </li>
                    <li>
                        <a href="" class="flex items-center p-2 rounded-lg text-gray-700 hover:bg-indigo-50">
                            <i class="fa-solid fa-gear mr-2"></i> Settings
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <div class="flex-1 flex flex-col">
            <header class="flex items-center justify-between bg-white px-6 py-4 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800">Household Financial Overview</h2>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600"></span>
                    <img class="w-10 h-10 rounded-full border"
                        src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name ?? 'Admin') }}" alt="User">
                </div>
            </header>

            <main class="flex-1 p-6 overflow-y-auto">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    <div class="bg-white p-5 rounded-xl shadow-md">
                        <p class="text-gray-500">Total Income</p>
                        <h3 class="text-2xl font-bold text-green-600">₱85,000</h3>
                    </div>
                    <div class="bg-white p-5 rounded-xl shadow-md">
                        <p class="text-gray-500">Total Expenses</p>
                        <h3 class="text-2xl font-bold text-red-600">₱42,300</h3>
                    </div>
                    <div class="bg-white p-5 rounded-xl shadow-md">
                        <p class="text-gray-500">Savings</p>
                        <h3 class="text-2xl font-bold text-indigo-600">₱12,700</h3>
                    </div>
                    <div class="bg-white p-5 rounded-xl shadow-md">
                        <p class="text-gray-500">Monthly Budget Remaining</p>
                        <h3 class="text-2xl font-bold text-yellow-600">₱29,000</h3>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                    <div class="bg-white rounded-xl shadow-md p-6">
                        <h3 class="text-lg font-semibold mb-4 text-gray-700">Monthly Expense Trend</h3>
                        <div class="h-64 flex items-center justify-center text-gray-400">
                            [Chart will appear here]
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-md p-6">
                        <h3 class="text-lg font-semibold mb-4 text-gray-700">Households Overview</h3>
                        <ul class="divide-y divide-gray-200">
                            <li class="py-3 flex justify-between">
                                <span>Family A</span>
                                <span class="font-semibold text-green-600">₱58,200 Balance</span>
                            </li>
                            <li class="py-3 flex justify-between">
                                <span>Family B</span>
                                <span class="font-semibold text-red-600">₱-3,500 Deficit</span>
                            </li>
                            <li class="py-3 flex justify-between">
                                <span>Family C</span>
                                <span class="font-semibold text-green-600">₱12,000 Savings</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="text-lg font-semibold mb-4 text-gray-700">Recent Transactions</h3>
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b text-gray-500 text-sm">
                                <th class="pb-3">Date</th>
                                <th class="pb-3">Category</th>
                                <th class="pb-3">Description</th>
                                <th class="pb-3 text-right">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-3">Oct 24, 2025</td>
                                <td>Food & Groceries</td>
                                <td>Supermarket shopping</td>
                                <td class="text-right text-red-600">-₱2,350</td>
                            </tr>
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-3">Oct 23, 2025</td>
                                <td>Utilities</td>
                                <td>Electric Bill</td>
                                <td class="text-right text-red-600">-₱1,500</td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="py-3">Oct 20, 2025</td>
                                <td>Salary</td>
                                <td>Monthly Income</td>
                                <td class="text-right text-green-600">₱25,000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
        <!-- @if (auth()->check() && auth()->user()->is_new)
                        <div class="mt-10">
                            @include('settings.change-password')
                        </div>
                    @endif -->
    </div>
@endsection