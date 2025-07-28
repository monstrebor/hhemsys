document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('assignRiderModal');

    modal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const id = button.getAttribute('data-order-id');
        document.getElementById('modalOrderId').value = id || '';
    });
});