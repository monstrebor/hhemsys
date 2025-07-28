<div id="emailModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 backdrop-blur-sm hidden">
    <div class="bg-white p-6 rounded-xl shadow-xl w-full max-w-md space-y-4 animate-fade-in">
        <div class="flex items-center justify-between">
            <h2 class="text-lg font-bold text-gray-800 flex items-center gap-2">
                <i data-lucide="edit-3" class="w-5 h-5"></i> Update Email
            </h2>
            <button onclick="document.getElementById('emailModal').classList.add('hidden')">
                <i data-lucide="x" class="w-5 h-5 text-gray-600 hover:text-gray-800"></i>
            </button>
        </div>

        <form method="POST" action="{{ route('customer-account-email.update') }}" class="space-y-4">
            @csrf
            <input type="hidden" name="id" value="{{ auth()->user()->id}}">
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">New Email Address</label>
                <input type="email" name="email" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-400 shadow-sm transition" />
            </div>

            <div class="flex justify-end gap-3 pt-2">
                <button type="button" onclick="document.getElementById('emailModal').classList.add('hidden')"
                    class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg transition">
                    Cancel
                </button>
                <button type="submit"
                    class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg shadow transition">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>