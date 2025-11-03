<div class="modal" id="addMemberModal" tabindex="-1" aria-labelledby="addMemberModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addMemberModalLabel">Invite a Member</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="inviteForm" method="POST" action="{{ route('user.store-invite') }}">
          @csrf
          <div class="mb-3">
            <input type="hidden" name="email" value="{{ auth()->user()->email }}">
            <label for="inviteCode" class="form-label">Invite Code</label>
            <input type="text" class="form-control" name="invite_code" required>
          </div>
          <div class="mb-3">
                        <label for="relation" class="form-label fw-semibold">Relation</label>
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
          <button type="submit" class="btn btn-primary">Send Invite</button>
        </form>
      </div>
    </div>
  </div>
</div>