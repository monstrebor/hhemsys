<div class="modal-dialog">
    <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title">Edit Supplier</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3"><label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $supplier->name }}" required>
                </div>
                <div class="mb-3"><label>Contact Person</label>
                    <input type="text" name="contact_person" class="form-control"
                        value="{{ $supplier->contact_person }}">
                </div>
                <div class="mb-3"><label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $supplier->email }}">
                </div>
                <div class="mb-3"><label>Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{ $supplier->phone }}">
                </div>
                <div class="mb-3"><label>Address</label>
                    <input type="text" name="address" class="form-control" value="{{ $supplier->address }}">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
</div>
