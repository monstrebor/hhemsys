//Edit modal for Customer Home Images
const editModal = document.getElementById('editImageModal');

editModal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    const imageId = button.getAttribute('data-id');
    const imageUrl = button.getAttribute('data-url');

    document.getElementById('edit-url').value = imageUrl;
    document.getElementById('edit-id').value = imageId;
    document.getElementById('edit-preview').src = imageUrl;
});

document.getElementById('edit-url').addEventListener('input', function () {
    document.getElementById('edit-preview').src = this.value;
});