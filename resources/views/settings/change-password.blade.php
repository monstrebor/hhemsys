<div class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
    <div class="max-w-md w-full bg-white shadow-lg rounded-xl p-6 relative z-10">
        <h1 class="text-xl font-bold text-red-600 text-center mb-4">Change Password</h1>

        <form action="{{ route('settings-password.update') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="current_password" class="block text-sm font-medium">Current Password</label>
                <div class="relative">
                    <input type="password" id="current_password" name="current_password" required
                        class="w-full border rounded px-3 py-2 mt-1 pr-10" />
                    <div class="absolute right-3 top-3 cursor-pointer" onclick="toggleVisibility('current_password')">
                        <svg id="current_password_show" xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <svg id="current_password_hide" xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 text-gray-500 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.269-2.943-9.543-7a10.04 10.04 0 012.877-4.148M6.6 6.6A9.969 9.969 0 0112 5c4.478 0 8.269 2.943 9.543 7a9.964 9.964 0 01-4.206 5.177M3 3l18 18" />
                        </svg>
                    </div>
                </div>
            </div>

            @foreach (['new_password' => 'New Password', 'new_password_confirmation' => 'Confirm New Password'] as $id => $label)
                <div>
                    <label for="{{ $id }}" class="block text-sm font-medium">{{ $label }}</label>
                    <div class="relative">
                        <input type="password" id="{{ $id }}" name="{{ $id }}" required
                            class="w-full border rounded px-3 py-2 mt-1 pr-10" />
                        <div class="absolute right-3 top-3 cursor-pointer" onclick="toggleVisibility('{{ $id }}')">
                            <svg id="{{ $id }}_show" xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg id="{{ $id }}_hide" xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 text-gray-500 hidden" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.269-2.943-9.543-7a10.04 10.04 0 012.877-4.148M6.6 6.6A9.969 9.969 0 0112 5c4.478 0 8.269 2.943 9.543 7a9.964 9.964 0 01-4.206 5.177M3 3l18 18" />
                            </svg>
                        </div>
                    </div>
                </div>
            @endforeach

            <div>
                <button type="submit" class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700 transition">
                    Update Password
                </button>
            </div>
        </form>
    </div>
</div>

