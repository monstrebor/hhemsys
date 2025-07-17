<div class="modal fade" id="editProductModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form id="editForm" method="POST" action="{{ route('product.update') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-blue-600 font-semibold text-[30px]">Edit Product</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="edit-id" name="id">
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" id="edit-name" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea id="edit-description" name="description" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Quantity</label>
                        <input type="number" id="edit-qty" name="quantity" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Price</label>
                        <input type="text" id="edit-price" name="price" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Supplier ID</label>
                        <input type="text" id="edit-supplier" name="supplier_id" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
