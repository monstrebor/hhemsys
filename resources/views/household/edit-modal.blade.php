<div class="modal fade" id="editHouseholdModal" tabindex="-1" aria-labelledby="editHouseholdModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('user.household.update', $household->id ?? 0) }}" class="modal-content">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title" id="editHouseholdModalLabel">Edit Household</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $household->name ?? '' }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Expected Monthly Income</label>
                    <input type="number" step="0.01" name="expected_monthly_income" class="form-control"
                        value="{{ $household->expected_monthly_income ?? 0 }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control"
                        rows="3">{{ $household->description ?? '' }}</textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
</div>