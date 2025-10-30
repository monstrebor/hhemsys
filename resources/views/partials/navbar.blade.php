<header class="flex items-center justify-between bg-white px-6 py-4 border-b border-gray-200">
    <h2 class="text-xl font-semibold text-gray-800">System Financial Overview</h2>
    <div class="dropdown">
        
        <div class="flex items-center space-x-3 cursor-pointer" id="userDropdown" data-bs-toggle="dropdown"
            aria-expanded="false">
            <span class="text-gray-700 font-medium">{{ auth()->user()->name ?? 'Admin' }}</span>
            <img src="{{ auth()->user()->userInfo?->image
    ? asset('image/profile/' . auth()->user()->userInfo->image)
    : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name ?? 'User') }}" alt="User Avatar"
                class="w-10 h-10 rounded-full border border-gray-300 shadow-sm">
        </div>

        <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2" aria-labelledby="userDropdown">
            <li>
                <a href="{{ route("profile") }}" class="dropdown-item d-flex align-items-center" href="">
                    <i class="bi bi-person-circle me-2"></i> Profile
                </a>
            </li>
            <li>
                <a href="{{ route('settings') }}" class="dropdown-item d-flex align-items-center" href="">
                    <i class="bi bi-gear me-2"></i> Settings
                </a>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li>
                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="dropdown-item d-flex align-items-center text-danger">
                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>
</header>