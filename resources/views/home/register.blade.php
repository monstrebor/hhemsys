<form id="register-form" method="POST" action="{{ route('register.store') }}" class="hidden">
    @csrf
    <h2 class="text-3xl font-bold mb-6 text-center">Create an Account</h2>

    <input type="text" name="name" placeholder="Full Name"
        class="w-full p-4 mb-3 border border-gray-300 rounded text-black uppercase" value="{{ old('name') }}" required>
    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

    <input type="email" name="email" placeholder="Email Address"
        class="w-full p-4 mb-3 border border-gray-300 rounded text-black" value="{{ old('email') }}" required>
    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

    <button type="submit"
        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-3 rounded transition">Register</button>

    <p class="mt-4 text-center text-sm">
        Already have an account?
        <a href="#" class="text-indigo-600 hover:underline" onclick="toggleForms()">Login</a>
    </p>
</form>