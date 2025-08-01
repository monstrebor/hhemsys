<div class="bg-white rounded-2xl shadow-md border border-gray-200 p-[100px]">
    <div class="flex items-center justify-between mb-10">
        <div class="flex items-center gap-4">
            <div class="bg-indigo-100 text-indigo-600 p-3 rounded-full">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 8c1.657 0 3-1.567 3-3.5S13.657 1 12 1 9 2.567 9 4.5 10.343 8 12 8zm0 2c-2.21 0-4 1.79-4 4v2h8v-2c0-2.21-1.79-4-4-4zM4 18v2h16v-2a4 4 0 00-4-4H8a4 4 0 00-4 4z" />
                </svg>
            </div>
            <h2 class="text-3xl font-extrabold text-gray-800">Today's Transactions</h2>
        </div>

        <a href="{{ route('admin.transactions.index') }}"
            class="text-base text-indigo-600 hover:text-indigo-800 font-semibold underline transition">View All</a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-10 text-lg text-gray-700 font-medium">
        <div class="flex items-center justify-between bg-gray-50 p-6 rounded-xl shadow-sm border">
            <div class="flex flex-col">
                <span class="text-gray-500">Total Paid</span>
                <span class="text-2xl font-bold text-green-600">₱{{ number_format($totalPaidToday, 2) }}</span>
            </div>
            <svg class="w-10 h-10 text-green-500" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 8c1.657 0 3-1.567 3-3.5S13.657 1 12 1 9 2.567 9 4.5 10.343 8 12 8z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 18v2h16v-2a4 4 0 00-4-4H8a4 4 0 00-4 4z" />
            </svg>
        </div>

        <div class="flex items-center justify-between bg-gray-50 p-6 rounded-xl shadow-sm border">
            <div class="flex flex-col">
                <span class="text-gray-500">Pending COD</span>
                <span class="text-2xl font-bold text-yellow-600">{{ $pendingCODCount }}</span>
            </div>
            <svg class="w-10 h-10 text-yellow-500" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 8v4l3 3m6 1.5A8.38 8.38 0 0112 21a8.38 8.38 0 01-9-8.5 8.38 8.38 0 019-8.5 8.38 8.38 0 019 8.5z" />
            </svg>
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-3 mt-10 gap-10 text-lg text-gray-700 font-medium">

        <div class="flex items-center justify-between bg-gray-50 p-6 rounded-xl shadow-sm border">
            <div class="flex flex-col">
                <span class="text-gray-500">Online Paid Today</span>
                <span class="text-2xl font-bold text-green-600">
                    ₱{{ number_format($totalPaidToday, 2) }}
                </span>
            </div>
        </div>

        <a href="{{ route('admin.reports.walkins') }}" class="block">
            <div
                class="flex items-center justify-between bg-gray-50 p-6 rounded-xl shadow-sm border hover:bg-blue-50 transition cursor-pointer">
                <div class="flex flex-col">
                    <span class="text-gray-500">Walk-in Paid Today</span>
                    <span class="text-2xl font-bold text-blue-600">
                        ₱{{ number_format($totalWalkinPaidToday, 2) }}
                    </span>
                </div>
                <svg class="w-10 h-10 text-blue-500" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </div>
        </a>

        <a href="{{ route('admin.reports.return-exchange') }}" class="block">
            <div
                class="flex items-center justify-between bg-gray-50 p-6 rounded-xl shadow-sm border hover:bg-yellow-50 transition cursor-pointer">
                <div class="flex flex-col">
                    <span class="text-gray-500">Return / Exchange Today</span>
                    <span class="text-2xl font-bold text-yellow-600">
                        {{ $returnExchangeCountToday }}
                    </span>
                </div>
                <svg class="w-10 h-10 text-yellow-500" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </div>
        </a>
    </div>
</div>