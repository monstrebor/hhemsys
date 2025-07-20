<div class="modal fade" id="editProductModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form id="editForm" method="POST" action="{{ route('product.update') }}" enctype="multipart/form-data">
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
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Description</label>
                        <textarea id="edit-description" name="description" class="form-control"></textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Quantity</label>
                        <input type="number" id="edit-qty" name="quantity" class="form-control">
                        @error('quantity')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Price</label>
                        <input type="text" id="edit-price" name="price" class="form-control">
                        @error('price')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Supplier ID</label>
                        <input type="text" id="edit-supplier" name="supplier_id" class="form-control">
                        @error('supplier_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                        @error('image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3" id="edit-image-preview" style="display: none;">
                        <label>Current Image</label><br>
                        <img src="" id="edit-image-src" class="w-24 h-24 object-cover rounded border">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

