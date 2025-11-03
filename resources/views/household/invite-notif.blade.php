<div class="modal" id="relationModal" tabindex="-1" aria-labelledby="relationModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="relationModalLabel">Define Your Relation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="relationForm">
          <div class="mb-3">
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
          <button type="submit" class="btn btn-primary">Accept Invite</button>
        </form>
      </div>
    </div>
  </div>
</div>