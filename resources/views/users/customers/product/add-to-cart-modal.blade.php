<!-- Add to Cart Modal -->
<div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" x-data="{ qty: 1 }">
            <form action="{{ route('cart.add') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" id="cart-product-id">
                <input type="hidden" name="quantity" :value="qty">

                <div class="modal-header">
                    <h5 class="modal-title" id="cartModalLabel">Add to Cart</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body text-center">
                    <img id="cart-product-image" src="" class="w-40 h-40 object-cover mx-auto mb-3 rounded"
                        alt="Product Image">
                    <h5 id="cart-product-name" class="font-semibold text-lg mb-2"></h5>
                    <p class="text-sm text-gray-600 mb-3">Available stock: <span id="cart-product-stock"></span></p>

                    <div class="flex justify-center items-center space-x-3">
                        <button type="button" class="px-3 py-1 bg-gray-300 rounded hover:bg-gray-400 text-lg"
                            @click="if(qty > 1) qty--">−</button>

                        <input type="text" class="w-12 text-center border rounded py-1" :value="qty" readonly>

                        <button type="button" class="px-3 py-1 bg-gray-300 rounded hover:bg-gray-400 text-lg"
                            @click="if(qty < parseInt(document.getElementById('cart-product-stock').textContent)) qty++">+</button>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success w-full">Add to Cart</button>
                </div>
            </form>
        </div>
    </div>
</div>
