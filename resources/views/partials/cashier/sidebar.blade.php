<div
    class="group fixed top-0 left-0 h-screen w-24 hover:w-64 bg-white border-r border-gray-200 shadow-sm transition-all duration-300 overflow-hidden z-50">

    <!-- Logo / App Name -->
    <div class="flex items-center space-x-2 px-4 py-4">
        <img src="{{ asset('image/sample.png') }}" alt="business logo" class="ml-[4px] w-14 h-14 rounded-full" />
        <span class="text-2xl font-bold text-gray-700 hidden group-hover:inline">MyApp</span>
    </div>


    <!-- Navigation -->
    <nav class="flex flex-col space-y-2 mt-4 px-4">
        <a href="{{ route('walkins.index') }}"
            class="flex items-center space-x-3 text-gray-600 hover:text-blue-600 py-2 px-2 rounded hover:bg-gray-100 transition group">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <!-- Shop / Store Icon -->
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 9l1-5h16l1 5M4 9h16v11H4V9z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14h4v6h-4v-6z" />
            </svg>
            <span class="text-2xl font-medium hidden group-hover:inline">Walk-In</span>
        </a>


        <a href=""
            class="flex items-center space-x-3 text-gray-600 hover:text-blue-600 py-2 px-2 rounded hover:bg-gray-100 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h4l3 8 4-16 3 8h4" />
            </svg>
            <span class="text-2xl font-medium hidden group-hover:inline">Edit Images</span>
        </a>

        <a href=""
            class="flex items-center space-x-3 text-gray-600 hover:text-blue-600 py-2 px-2 rounded hover:bg-gray-100 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 7h11L17 13M9 21h.01M15 21h.01" />
            </svg>
            <span class="text-2xl font-medium hidden group-hover:inline">Orders</span>
        </a>
    </nav>
</div>
