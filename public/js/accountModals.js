document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('editAccountModal');

    modal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;

        if (!button.classList.contains('edit-btn')) return;

        const id = button.getAttribute('data-id');
        const name = button.getAttribute('data-name');
        const role = button.getAttribute('data-role');
        const email = button.getAttribute('data-email');
        const status = button.getAttribute('data-status');
        const createdAt = button.getAttribute('data-createdAt');

        document.getElementById('edit-id').value = id || '';
        document.getElementById('edit-name').value = name || '';
        document.getElementById('edit-role').value = role || '';
        document.getElementById('edit-email').value = email || '';
        document.getElementById('edit-status').value = status || '';
        document.getElementById('edit-createdAt').value = createdAt || '';
    });
});
