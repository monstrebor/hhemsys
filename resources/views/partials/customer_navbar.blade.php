<nav class="bg-white border-b border-gray-200 px-4 py-3 shadow-sm">
    <div class="flex items-center justify-between">
        <a href="{{ route('customer.dashboard') }}" class="ml-[65px] flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 11c0-1.105.895-2 2-2s2 .895 2 2-2 3-2 3H8v-2h4z" />
            </svg>
            <span class="text-2xl font-bold text-gray-700">MyApp</span>
        </a>

        <div class="flex items-center space-x-4">
            <a href="{{ route('customer.dashboard') }}"
                class="text-gray-600 hover:text-blue-600 text-2xl font-medium border border-gray-300 px-4 py-2 rounded transition">
                Dashboard
            </a>

            <a href="#"
                class="text-gray-600 hover:text-blue-600 text-2xl font-medium border border-gray-300 px-4 py-2 rounded transition">
                About
            </a>

            <a href="#"
                class="text-gray-600 hover:text-blue-600 text-2xl font-medium border border-gray-300 px-4 py-2 rounded transition">
                Contact
            </a>

            <button
                class="relative text-gray-600 hover:text-blue-600 border border-gray-300 px-3 py-2 rounded transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002
                     6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67
                     6.165 6 8.388 6 11v3.159c0 .538-.214
                     1.055-.595 1.436L4 17h5m6 0v1a3 3 0
                     11-6 0v-1m6 0H9" />
                </svg>
                <span class="absolute -top-1 -right-1 inline-block w-3 h-3 bg-red-500 rounded-full"></span>
            </button>

            <div class="relative border border-gray-300 px-4 py-2 rounded transition hover:text-blue-600">
                <button class="flex items-center space-x-1 text-gray-600 hover:text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A10.95 10.95 0 0112
                         15c2.485 0 4.77.755 6.879
                         2.053M15 11a3 3 0 11-6
                         0 3 3 0 016 0z" />
                    </svg>
                    <span class="text-2xl font-medium">Account</span>
                </button>
            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button
                    class="px-4 py-2 text-2xl bg-red-500 text-white border border-red-600 rounded hover:bg-red-600 hover:border-red-700 transition">
                    Logout
                </button>
            </form>
        </div>

    </div>
</nav>
