<nav class="bg-blue-200 border-b border-gray-200 px-4 py-2 shadow-sm">
    <div class="flex items-center justify-between">
        <a href="" class="ml-[65px] flex items-center space-x-2 no-underline">
            <img src="https://cdn-icons-png.flaticon.com/512/4712/4712104.png" alt="business logo"
                class="ml-[4px] w-14 h-14 rounded-full shadow-md">
            <span class="text-gray-700 hover:text-indigo-600 text-xl font-semibold px-4 py-2 rounded transition">
                Household Expenditures Management System
            </span>
        </a>

        <div class="flex items-center space-x-4">
            <a href="{{ route('login') }}" style="text-decoration: none;"
                class="px-4 py-2 text-2xl bg-blue-500 text-white border border-blue-600 rounded hover:bg-blue-600 hover:border-blue-700 transition">
                Login
            </a>
            <a href="{{ route('register') }}" style="text-decoration: none;"
                class="px-4 py-2 text-2xl bg-green-500 text-white border border-green-600 rounded hover:bg-green-600 hover:border-green-700 transition">
                Register
            </a>
        </div>
    </div>
</nav>