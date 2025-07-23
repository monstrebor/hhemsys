document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('editProductModal');

    modal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;

        if (!button.classList.contains('edit-btn')) return;

        const id = button.getAttribute('data-id');
        const name = button.getAttribute('data-name');
        const description = button.getAttribute('data-description');
        const qty = button.getAttribute('data-qty');
        const price = button.getAttribute('data-price');
        const supplier = button.getAttribute('data-supplier');
        const image = button.getAttribute('data-image');

        document.getElementById('edit-id').value = id || '';
        document.getElementById('edit-name').value = name || '';
        document.getElementById('edit-description').value = description || '';
        document.getElementById('edit-qty').value = qty || '';
        document.getElementById('edit-price').value = price || '';
        document.getElementById('edit-supplier').value = supplier || '';

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

document.addEventListener('DOMContentLoaded', function () {
    const cancelModal = document.getElementById('cancelOrderModal');
    const form = document.getElementById('cancelOrderForm');

    cancelModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const orderId = button.getAttribute('data-order-id');

        // Update form action
        form.action = `/orders/${orderId}/cancel`; // 👈 match your route
    });
});


