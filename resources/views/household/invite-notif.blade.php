@if (isset($showInviteNotif) && $showInviteNotif && $invitation)
  <div class="modal fade" id="inviteMemberModal" tabindex="-1" aria-labelledby="inviteMemberModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm" style="position: fixed; bottom: 20px; right: 20px; margin: 0;">
      <div class="modal-dialog modal-lg custom-modal-dialog">
        <div class="modal-content custom-modal" style="max-width: 600px;">

          <div class="modal-header">
            <h5 class="modal-title" id="inviteMemberModalLabel">Invitation</h5>
            <button type="button" class="close text-4xl text-red-700" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <p class="text-center">
              <strong>{{ $invitation->sender->name }}</strong> has invited you to join their household.
              Please kindly choose your response.
            </p>

            <form action="{{ route('user.store-reply') }}" method="POST">
              @csrf
              <input type="hidden" name="invitation_id" value="{{ $invitation->id }}">
              <div class="mb-3">
                <label for="relation" class="form-label fw-semibold">Your Relation</label>
                <select class="form-select" id="relation" name="relation" required>
                  <option value="" selected>Choose relation</option>
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
                  <option value="Friend">Friend</option>
                  <option value="Girlfriend">Girl Friend</option>
                  <option value="Boyfriend">Boy Friend</option>
                  <option value="Partner">Partner</option>
                  <option value="Guardian">Guardian</option>
                  <option value="Relative">Relative</option>
                  <option value="Roommate">Roommate</option>
                  <option value="Other">Other</option>
                </select>
              </div>

              <div class="d-flex justify-content-between">
                <button type="submit" name="action" value="cancel" class="btn btn-danger">Cancel</button>
                <button type="submit" name="action" value="accept" class="btn btn-primary">Accept</button>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
@endif