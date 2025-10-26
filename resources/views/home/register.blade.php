<form id="register-form" method="POST" action="{{ route('register.store') }}"
    class="{{ request()->routeIs('register') ? '' : 'hidden' }} transition-all duration-500 ease-in-out">
    @csrf
    <h2 class="text-3xl font-bold mb-6 text-center text-indigo-700">Create an Account</h2>

    <input type="text" name="name" placeholder="Full Name"
        class="w-full p-4 mb-3 border border-gray-300 rounded-lg text-black uppercase focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition"
        value="{{ old('name') }}" required>
    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

    <input type="email" name="email" placeholder="Email Address"
        class="w-full p-4 mb-3 border border-gray-300 rounded-lg text-black focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition"
        value="{{ old('email') }}" required>
    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

    <button type="submit"
        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-3 rounded-lg font-semibold mt-3 transition">Register</button>

    <p class="mt-4 text-center text-sm">
        Already have an account?
        <a href="#" class="text-indigo-600 hover:underline" onclick="toggleForms()">Login</a>
    </p>
</form>