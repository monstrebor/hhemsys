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
                    <td class="px-6 py-3">
                        @foreach($user->getRoleNames() as $role)
                        <span class="px-2 py-1 rounded-full text-xs font-semibold
            @if($role === 'admin') bg-purple-100 text-purple-700
            @elseif($role === 'cashier') bg-blue-100 text-blue-700
            @elseif($role === 'rider') bg-yellow-100 text-yellow-700
            @else bg-green-100 text-green-700 @endif">
                            {{ ucfirst($role) }}
                        </span>
                        @endforeach
                    </td>

                    <td class="px-6 py-3">
                        <span
                            class="px-3 py-1 rounded-full text-xs font-semibold
                            {{ $user->status === 'active' ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }}">
                            {{ ucfirst($user->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-3">{{ $user->created_at->format('M d, Y') }}</td>
                    <td class="px-6 py-3 text-center">
                        <button class="text-blue-500 hover:text-blue-700 mr-2 edit-btn" data-bs-toggle="modal"
                            data-bs-target="#editAccountModal" data-id="{{ $user->id }}" data-name="{{ $user->name }}"
                            data-role="{{ $user->getRoleNames()->first() }}" data-email="{{ $user->email }}"
                            data-status="{{ $user->status }}" data-createdAt="{{ $user->created_at }}">
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
                        <form action="{{ route('admin.users.toggle-status', $user->id) }}" method="POST" class="inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit"
                                class="{{ $user->status === 'inactive' ? 'text-blue-500 hover:text-blue-700' : 'text-red-500 hover:text-red-700' }}"
                                onclick="return confirm('Are you sure you want to {{ $user->status === 'inactive' ? 'activate' : 'deactivate' }} this user?')">
                                <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                    @if($user->status === 'inactive')
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                    <circle cx="8.5" cy="7" r="4" />
                                    <line x1="20" y1="8" x2="20" y2="14" />
                                    <line x1="17" y1="11" x2="23" y2="11" />
                                    @else
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                    <circle cx="8.5" cy="7" r="4" />
                                    <line x1="18" y1="8" x2="23" y2="13" />
                                    <line x1="23" y1="8" x2="18" y2="13" />
                                    @endif
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

