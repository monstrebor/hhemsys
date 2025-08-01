<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="createModalLabel">Create New User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('admin-create-user.store') }}">
                @csrf
                <div class="modal-body">

                    <!-- Name Field -->
                    <div class="form-floating mb-3 position-relative">
                        <input type="text" name="name" class="form-control" id="nameInput" placeholder="John Doe"
                            required>
                        <label for="nameInput"><i class="bi bi-person-fill me-1 text-primary"></i> Full Name</label>
                    </div>

                    <!-- Email Field -->
                    <div class="form-floating mb-3 position-relative">
                        <input type="email" name="email" class="form-control" id="emailInput"
                            placeholder="example@email.com" required>
                        <label for="emailInput"><i class="bi bi-envelope-fill me-1 text-primary"></i> Email
                            Address</label>
                    </div>

                    <!-- Role Select -->
                    <div class="mb-3">
                        <label for="roleSelect" class="form-label fw-semibold">
                            <i class="bi bi-person-badge-fill me-1 text-primary"></i> Role
                        </label>
                        <select name="roles" id="roleSelect" class="form-select" required>
                            <option value="" disabled selected>-- Please select a role --</option>
                            <option value="admin">Admin</option>
                            <option value="customer">Customer</option>
                            <option value="cashier">Cashier</option>
                            <option value="rider">Rider</option>
                        </select>
                    </div>

                    <!-- Optional Divider -->
                    <hr class="my-3">

                    <small class="text-muted">
                        <i class="bi bi-info-circle me-1"></i>
                        Make sure the user details are correct before saving.
                    </small>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light border" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle me-1"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i> Save
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

<div class="modal fade" id="editAccountModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form id="editForm" method="POST" action="{{ route('admin-create-user.update') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-blue-600 font-semibold text-[30px]">Edit Account Role</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="edit-id" name="id">

                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" id="edit-name" class="form-control" readonly>
                    </div>

                    <div class="mb-3">
                        <label>Role</label>
                        <input id="edit-role" class="form-control" readonly>
                        <select name="role" class="form-control">
                            <option value="" selected>< - - Select role - - ></option>
                            <option value="administrator">Admin</option>
                            <option value="cashier">Cashier</option>
                            <option value="customer">Customer</option>
                            <option value="rider">Rider</option>
                        </select>
                        @error('role')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="text" id="edit-email" class="form-control" readonly>
                    </div>

                    <div class="mb-3">
                        <label>Status</label>
                        <input type="text" id="edit-status" class="form-control" readonly>
                    </div>

                    <div class="mb-3">
                        <label>Created At</label>
                        <input type="text" id="edit-createdAt" class="form-control" readonly>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
