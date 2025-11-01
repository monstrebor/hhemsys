<div class="modal fade" id="createHouseholdModal" tabindex="-1" aria-labelledby="createHouseholdModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="createHouseholdModalLabel">
          <i class="fa-solid fa-house-user me-2"></i> Create New Household
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form method="POST" action="{{ route('user.household.store') }}">
        @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label for="householdName" class="form-label fw-semibold">Household Name</label>
            <input type="text" class="form-control" id="householdName" name="name" placeholder="e.g. Forger Family"
              required>
          </div>

          <div class="mb-3 text-[12px]">
            <label for="relation" class="form-label fw-semibold">Your Relation</label>
            <select class="form-select" id="relation" name="relation" required>
              <option value="" disabled selected>Select your relation</option>
              <option value="Father">Father</option>
              <option value="Mother">Mother</option>
              <option value="Son">Son</option>
              <option value="Daughter">Daughter</option>
              <option value="Brother">Brother</option>
              <option value="Sister">Sister</option>
              <option value="Grandfather">Grandfather</option>
              <option value="Grandmother">Grandmother</option>
              <option value="Uncle">Uncle</option>
              <option value="Aunt">Aunt</option>
              <option value="Cousin">Cousin</option>
              <option value="Nephew">Nephew</option>
              <option value="Niece">Niece</option>
              <option value="Husband">Husband</option>
              <option value="Wife">Wife</option>
              <option value="Partner">Partner</option>
              <option value="Guardian">Guardian</option>
              <option value="Relative">Relative</option>
              <option value="Roommate">Roommate</option>
              <option value="Other">Other</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="expectedCash" class="form-label fw-semibold">Expected Monthly Cash</label>
            <input type="number" step="0.01" class="form-control" id="expectedCash" name="expected_cash"
              placeholder="e.g. 20000">
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Create Household</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection