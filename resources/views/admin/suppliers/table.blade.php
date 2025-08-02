<div class="max-w-7xl mx-auto px-4 py-8">
    @include('layout.all_notif')

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-indigo-700">📦 Suppliers</h1>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSupplierModal">
            + Add Supplier
        </button>
    </div>

    <div class="bg-white rounded-xl shadow-md border overflow-x-auto">
        <table class="table table-hover mb-0">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Contact Person</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($suppliers as $supplier)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $supplier->name }}</td>
                    <td>{{ $supplier->contact_person ?? '—' }}</td>
                    <td>{{ $supplier->email ?? '—' }}</td>
                    <td>{{ $supplier->phone ?? '—' }}</td>
                    <td>{{ $supplier->address ?? '—' }}</td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                            data-bs-target="#editSupplierModal{{ $supplier->id }}">Edit</button>

                        <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-gray-500 py-4">No suppliers found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="editSupplierModal{{ $supplier->id }}" tabindex="-1">
    @include('admin.suppliers.edit-modal')
</div>

<div class="modal fade" id="addSupplierModal" tabindex="-1">
    @include('admin.suppliers.add-modal')
</div>
