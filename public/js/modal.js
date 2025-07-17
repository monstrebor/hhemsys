document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('editProductModal');

    modal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;

        // Only proceed if the trigger is the edit button
        if (!button.classList.contains('edit-btn')) return;

        const id = button.getAttribute('data-id');
        const name = button.getAttribute('data-name');
        const description = button.getAttribute('data-description');
        const qty = button.getAttribute('data-qty');
        const price = button.getAttribute('data-price');
        const supplier = button.getAttribute('data-supplier');

        document.getElementById('edit-id').value = id || '';
        document.getElementById('edit-name').value = name || '';
        document.getElementById('edit-description').value = description || '';
        document.getElementById('edit-qty').value = qty || '';
        document.getElementById('edit-price').value = price || '';
        document.getElementById('edit-supplier').value = supplier || '';
    });
});
