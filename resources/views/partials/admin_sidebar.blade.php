<div
    class="group fixed top-0 left-0 h-screen w-16 hover:w-64 bg-white border-r border-gray-200 shadow-sm transition-all duration-300 overflow-hidden z-50">

    <!-- Logo / App Name -->
    <div class="flex items-center space-x-2 px-4 py-4">
        <img src="https://via.placeholder.com/40" alt="Logo" class="w-10 h-10 rounded-full" />
        <span class="text-lg font-bold text-gray-700 hidden group-hover:inline">MyApp</span>
    </div>

    <!-- Navigation -->
    <nav class="flex flex-col space-y-2 mt-4 px-2">
        <a href="{{ route('product.dashboard') }}"
            class="flex items-center space-x-3 text-gray-600 hover:text-blue-600 py-2 px-2 rounded hover:bg-gray-100 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M20 12V8a2 2 0 00-1.106-1.789l-7-4a2 2 0 00-1.788 0l-7 4A2 2 0 003 8v4a2 2 0 001.106 1.789l7 4a2 2 0 001.788 0l7-4A2 2 0 0020 12z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 22V12" />
            </svg>
            <span class="text-sm font-medium hidden group-hover:inline">Product</span>
        </a>

        <a href="#"
            class="flex items-center space-x-3 text-gray-600 hover:text-blue-600 py-2 px-2 rounded hover:bg-gray-100 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h4l3 8 4-16 3 8h4" />
            </svg>
            <span class="text-sm font-medium hidden group-hover:inline">Dashboard</span>
        </a>

        <a href="#"
            class="flex items-center space-x-3 text-gray-600 hover:text-blue-600 py-2 px-2 rounded hover:bg-gray-100 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 10h.01M12 10h.01M16 10h.01M21 12.5A8.38 8.38 0 0112 21a8.38 8.38 0 01-9-8.5 8.38 8.38 0 019-8.5 8.38 8.38 0 019 8.5z" />
            </svg>
            <span class="text-sm font-medium hidden group-hover:inline">About</span>
        </a>

        <a href="#"
            class="flex items-center space-x-3 text-gray-600 hover:text-blue-600 py-2 px-2 rounded hover:bg-gray-100 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 2a2 2 0 012 2v16a2 2 0 01-2 2H8a2 2 0 01-2-2V4a2 2 0 012-2h8zm-2 14H10v2h4v-2zm0-10H10v6h4V6z" />
            </svg>
            <span class="text-sm font-medium hidden group-hover:inline">Contact</span>
        </a>

        <a href="#"
            class="flex items-center space-x-3 text-gray-600 hover:text-blue-600 py-2 px-2 rounded hover:bg-gray-100 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5.121 17.804A10.95 10.95 0 0112 15c2.485 0 4.77.755 6.879 2.053M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <span class="text-sm font-medium hidden group-hover:inline">Account</span>
        </a>
    </nav>
</div>
