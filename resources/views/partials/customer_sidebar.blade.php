<!-- Hover-to-expand Sidebar -->
<aside class="group fixed top-0 left-0 h-screen w-30 hover:w-74 bg-white border-r border-gray-200 shadow-md transition-all duration-300 overflow-hidden z-50">

    <!-- Header -->
    <div class="flex items-center justify-center group-hover:justify-start px-4 py-4 border-b border-gray-100">
        <h2 class="text-3xl font-semibold text-gray-800 hidden group-hover:block">Customer Menu</h2>
        <span class="text-2xl group-hover:hidden">🧭</span>
    </div>

    <!-- Navigation -->
    <nav class="flex flex-col mt-4 space-y-1 px-4">
        <a href="{{-- route('orders.index') --}}"
            class="flex items-center space-x-3 py-2 px-3 rounded hover:bg-blue-50 text-gray-700 hover:text-blue-600 transition">
            <span class="text-2xl">📦</span>
            <span class="text-xl hidden group-hover:inline">My Orders</span>
        </a>

        <a href="{{-- route('cart.index') --}}"
            class="flex items-center space-x-3 py-2 px-3 rounded hover:bg-blue-50 text-gray-700 hover:text-blue-600 transition">
            <span class="text-2xl">🛒</span>
            <span class="text-xl hidden group-hover:inline">My Cart</span>
        </a>

        <a href="{{-- route('profile') --}}"
            class="flex items-center space-x-3 py-2 px-3 rounded hover:bg-blue-50 text-gray-700 hover:text-blue-600 transition">
            <span class="text-2xl">👤</span>
            <span class="text-xl hidden group-hover:inline">My Profile</span>
        </a>

        <a href="{{-- route('support') --}}"
            class="flex items-center space-x-3 py-2 px-3 rounded hover:bg-blue-50 text-gray-700 hover:text-blue-600 transition">
            <span class="text-2xl">❓</span>
            <span class="text-xl hidden group-hover:inline">Help Center</span>
        </a>
    </nav>
</aside>
