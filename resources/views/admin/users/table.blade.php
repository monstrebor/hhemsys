<div class="pl-[120px] pt-[50px] pr-[50px]">
    @include('layout.all_notif')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-4xl font-bold text-gray-800 flex items-center gap-2">
            Users Table
        </h1>

        <button class="btn btn-primary d-flex align-items-center gap-1" data-bs-toggle="modal"
            data-bs-target="#createModal">
            <i class="bi bi-plus-lg"></i> <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 4v16m8-8H4" />
            </svg>Create
        </button>
    </div>

    <div class="overflow-x-auto rounded-xl shadow-lg border border-gray-200 bg-white">
        <table class="w-full text-sm text-left text-gray-600">
            <thead class="bg-indigo-600 text-white">
                <tr>
                    <th class="px-6 py-3">ID</th>
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Role</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3">Created At</th>
                    <th class="px-6 py-3 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="border-b hover:bg-gray-50 transition">
                    <td class="px-6 py-3">{{ $user->id }}</td>
                    <td class="px-6 py-3 flex items-center gap-2">
                        <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8V22h19.2v-2.8c0-3.2-6.4-4.8-9.6-4.8z" />
                        </svg>
                        {{ $user->name }}
                    </td>
                    <td class="px-6 py-3">{{ $user->email }}</td>
                    <td class="px-6 py-3">{{ $user->getRoleNames()->first() }}</td>
                    <td class="px-6 py-3">
                        <span
                            class="px-3 py-1 rounded-full text-xs font-semibold
                            {{ $user->status === 'active' ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }}">
                            {{ ucfirst($user->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-3">{{ $user->created_at->format('M d, Y') }}</td>
                    <td class="px-6 py-3 text-center">
                        <button class="text-blue-500 hover:text-blue-700 mr-2">
                            <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 20h9" />
                                <path d="M12 4h9" />
                                <path d="M12 12h9" />
                                <path d="M4 4h.01" />
                                <path d="M4 12h.01" />
                                <path d="M4 20h.01" />
                            </svg>
                        </button>
                        <button class="text-red-500 hover:text-red-700">
                            <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 6h18M9 6v12m6-12v12M10 11h4" />
                            </svg>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
