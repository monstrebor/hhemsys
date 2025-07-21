{{-- create modal --}}
<div class="modal fade" id="createImageModal" tabindex="-1" aria-labelledby="createImageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('customer-home-images.store') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createImageModalLabel">Add New Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body space-y-3">
                    <div>
                        <label for="url" class="form-label">Image URL</label>
                        <input type="url" class="form-control" name="url" id="url" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Image</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editImageModal" tabindex="-1" aria-labelledby="editImageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('customer-home-images.update') }}" id="editImageForm">
            @csrf
            <input type="hidden" name="id" id="edit-id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit-url" class="form-label">Image URL</label>
                        <input type="url" name="url" id="edit-url" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Preview</label>
                        <div class="border rounded p-2 bg-light">
                            <img id="edit-preview" src="" alt="Image preview" class="img-fluid rounded"
                                style="max-height: 200px;">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>