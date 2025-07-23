<div class="modal fade" id="editCartModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form id="editQuantityForm" method="POST" action="{{ route('cart.update') }}">
            @csrf
            @method('PATCH')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-blue-600 font-semibold text-[30px]">Edit Cart</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="edit-id" name="id">

                    <div class="mb-3">
                        <label>Product</label>
                        <input type="text" id="edit-product" class="form-control" readonly>
                    </div>

                    <div class="mb-3">
                        <label>Price</label>
                        <textarea id="edit-price" class="form-control" readonly></textarea>
                    </div>

                    <div class="mb-3">
                        <label>Quantity</label>
                        <div class="d-flex align-items-center gap-2">
                            <button type="button" class="btn btn-outline-secondary" onclick="decrementQuantity()">
                                &minus;
                            </button>

                            <input type="number" id="edit-quantity" name="quantity" class="form-control text-center"
                                value="1" min="1">

                            <button type="button" class="btn btn-outline-secondary" onclick="incrementQuantity()">
                                &plus;
                            </button>
                        </div>

                        @error('quantity')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>



                    <div class="mb-3" id="edit-image-preview" style="display: none;">
                        <label>Current Image</label><br>
                        <img src="" id="edit-image-src" class="w-44 h-44 object-cover rounded border">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
