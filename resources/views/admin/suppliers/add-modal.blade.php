<div class="modal-dialog">
    <form action="{{ route('suppliers.store') }}" method="POST">
        @csrf
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Add New Supplier</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3"><label>Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3"><label>Contact Person</label>
                    <input type="text" name="contact_person" class="form-control">
                </div>
                <div class="mb-3"><label>Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="mb-3"><label>Phone</label>
                    <input type="text" name="phone" class="form-control">
                </div>
                <div class="mb-3"><label>Address</label>
                    <input type="text" name="address" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
</div>
