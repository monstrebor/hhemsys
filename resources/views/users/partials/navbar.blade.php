<nav class="bg-white border-b border-gray-200 px-4 py-3 shadow-sm">
    <div class="flex items-center justify-between">
        <a href="" style="text-decoration: none;" class="ml-[65px] flex items-center space-x-2">
            <img src="" alt="business logo"
                class="ml-[4px] w-14 h-14 rounded-full">
            <span class="text-gray-600 hover:text-blue-600 text-4xl font-medium px-4 py-2 rounded transition">Household Expendetures Management System</span>
        </a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="px-4 py-2 text-2xl bg-red-500 text-white border border-red-600 rounded hover:bg-red-600 hover:border-red-700 transition">
                Logout
            </button>
        </form>
    </div>
</nav>