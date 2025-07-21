<form id="login-form" action="{{ route('login.store') }}" method="POST" class="">
    @csrf
    <h2 class="text-3xl font-bold mb-6 text-center">Login to Your Account</h2>

    <input type="email" name="email" placeholder="Email"
        class="w-full p-4 mb-3 border border-gray-300 rounded text-black" value="{{ old('email') }}" required>
    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

    <div class="relative">
        <input type="password" name="password" id="password" placeholder="Password"
            class="w-full p-4 mb-3 border border-gray-300 rounded text-black pr-12" required>

        <!-- Eye Icon Button -->
        <button type="button" onclick="togglePassword()"
            class="absolute right-3 top-4 text-gray-500 focus:outline-none">
            <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="mt-2 h-8 w-8" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
        </button>
    </div>
    @error('password')
    <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror


    <button type="submit"
        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-3 rounded transition">Login</button>

    <p class="mt-4 text-center text-sm">
        Don't have an account?
        <a href="#" class="text-indigo-600 hover:underline" onclick="toggleForms()">Create one</a>
    </p>
</form>