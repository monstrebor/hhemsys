<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-xl border-0 shadow-lg">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-semibold" id="profileModalLabel">Update Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="{{ route('profile.createOrUpdate') }}" method="POST" enctype="multipart/form-data"
                class="p-4 space-y-3">
                @csrf
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                <!-- Image Upload -->
                <div class="text-center mb-3">
                    <div class="text-center mb-3">
                        <img src="{{ $user->userInfo?->image
    ? asset('image/profile/' . $user->userInfo->image)
    : 'https://ui-avatars.com/api/?name=' . urlencode($user->name ?? 'User') }}" alt="Profile"
                            class="w-24 h-24 rounded-full border shadow-sm mb-2 object-cover">
                    </div>
                    <div>
                        <label class="form-label">Change Profile Image</label>
                        <input type="file" name="image" class="form-control w-1/2 mx-auto">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label class="form-label">First Name</label>
                        <input type="text" name="first_name" class="form-control"
                            value="{{ $user->userInfo->first_name ?? '' }}" required>
                    </div>
                    <div>
                        <label class="form-label">Last Name</label>
                        <input type="text" name="last_name" class="form-control"
                            value="{{ $user->userInfo->last_name ?? '' }}" required>
                    </div>
                    <div>
                        <label class="form-label">Middle Name</label>
                        <input type="text" name="middle_name" class="form-control"
                            value="{{ in_array(strtolower($user->userInfo->middle_name ?? ''), ['n/a', 'none']) ? '' : ($user->userInfo->middle_name ?? '') }}">
                    </div>
                    <div>
                        <label class="form-label">Date of Birth</label>
                        <input type="date" name="date_of_birth" class="form-control"
                            value="{{ $user->userInfo->date_of_birth ?? '' }}">
                    </div>
                    <div>
                        <label class="form-label">Phone Number</label>
                        <input type="text" name="phone_number" class="form-control"
                            value="{{ $user->userInfo->phone_number ?? '' }}">
                    </div>
                </div>

                <hr>

                <h6 class="fw-semibold mt-3">Address</h6>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                    <div>
                        <label class="form-label">Street</label>
                        <input type="text" name="street" class="form-control"
                            value="{{ $user->userInfo->street ?? '' }}">
                    </div>
                    <div>
                        <label class="form-label">City</label>
                        <input type="text" name="city" class="form-control" value="{{ $user->userInfo->city ?? '' }}">
                    </div>
                    <div>
                        <label class="form-label">Province</label>
                        <input type="text" name="province" class="form-control"
                            value="{{ $user->userInfo->province ?? '' }}">
                    </div>
                </div>

                <div class="modal-footer border-0 mt-4">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>