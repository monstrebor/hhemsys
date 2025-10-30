<aside class="w-64 bg-white shadow-lg">
    <div class="p-6 border-b border-gray-200">
        <h1 class="text-2xl font-bold text-indigo-600">
            @if (auth()->check())
                @if (auth()->user()->hasRole('admin'))
                    Admin
                @elseif (auth()->user()->hasRole('user'))
                    User
                @endif
            @endif
            Panel
            <p class="text-sm text-gray-500">System Overview</p>
        </h1>
    </div>
    <nav class="p-4">
        <ul class="space-y-2" style="text-decoration: none;">
            @if (auth()->check())
                @if (auth()->user()->hasRole('admin'))
                    <li>
                        <a href="{{ route('admin.dashboard') }}"
                            class="flex items-center p-2 rounded-lg text-gray-700 hover:bg-indigo-50 no-underline">
                            <span class="material-icons mr-3 text-indigo-500">dashboard</span> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 rounded-lg text-gray-700 hover:bg-indigo-50 no-underline">
                            <span class="material-icons mr-3 text-indigo-500">home</span> Households
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 rounded-lg text-gray-700 hover:bg-indigo-50 no-underline">
                            <span class="material-icons mr-3 text-indigo-500">group</span> Users
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 rounded-lg text-gray-700 hover:bg-indigo-50 no-underline">
                            <span class="material-icons mr-3 text-indigo-500">account_balance_wallet</span> Transactions
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 rounded-lg text-gray-700 hover:bg-indigo-50 no-underline">
                            <span class="material-icons mr-3 text-indigo-500">pie_chart</span> Reports
                        </a>
                    </li>
                @elseif (auth()->user()->hasRole('user'))
                    <li>
                        <a href="{{ route('admin.dashboard') }}"
                            class="flex items-center p-2 rounded-lg text-gray-700 hover:bg-indigo-50 no-underline">
                            <span class="material-icons mr-3 text-indigo-500">dashboard</span> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 rounded-lg text-gray-700 hover:bg-indigo-50 no-underline">
                            <span class="material-icons mr-3 text-indigo-500">home</span> Nigga
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 rounded-lg text-gray-700 hover:bg-indigo-50 no-underline">
                            <span class="material-icons mr-3 text-indigo-500">group</span> Users
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 rounded-lg text-gray-700 hover:bg-indigo-50 no-underline">
                            <span class="material-icons mr-3 text-indigo-500">account_balance_wallet</span> Transactions
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 rounded-lg text-gray-700 hover:bg-indigo-50 no-underline">
                            <span class="material-icons mr-3 text-indigo-500">pie_chart</span> Reports
                        </a>
                    </li>
                @endif
            @endif
        </ul>
    </nav>
</aside>