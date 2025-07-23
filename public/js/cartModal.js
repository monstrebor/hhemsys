function openCartModal(id, name, image, stock) {
    document.getElementById('cart-product-id').value = id;
    document.getElementById('cart-product-name').innerText = name;
    document.getElementById('cart-product-image').src = image;
    document.getElementById('cart-product-stock').innerText = stock;

    const alpineRoot = document.querySelector('#cartModal .modal-content');
    if (alpineRoot && alpineRoot.__x) {
        alpineRoot.__x.$data.qty = 1;
    }

    const modal = new bootstrap.Modal(document.getElementById('cartModal'));
    modal.show();
}


// cart edit modal
document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('editCartModal');

    modal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;

        if (!button.classList.contains('edit-btn')) return;

        const id = button.getAttribute('data-id');
        const product = button.getAttribute('data-product');
        const price = button.getAttribute('data-price');
        const quantity = button.getAttribute('data-quantity');
        const image = button.getAttribute('data-image');

        document.getElementById('edit-id').value = id || '';
        document.getElementById('edit-product').value = product || '';
        document.getElementById('edit-price').value = price || '';
        document.getElementById('edit-quantity').value = quantity || '';

        const imagePreview = document.getElementById('edit-image-preview');
        const imageElement = document.getElementById('edit-image-src');

        if (image) {
            imageElement.src = image;
            imagePreview.style.display = 'block';
        } else {
            imagePreview.style.display = 'none';
            imageElement.src = '';
        }
    });
});

function incrementQuantity() {
    const input = document.getElementById('edit-quantity');
    input.value = parseInt(input.value || 1) + 1;
}

function decrementQuantity() {
    const input = document.getElementById('edit-quantity');
    let value = parseInt(input.value || 1);
    input.value = value > 1 ? value - 1 : 1;
}
