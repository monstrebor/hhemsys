<div class="modal fade" id="assignRiderModal" tabindex="-1" aria-labelledby="assignRiderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('admin.orders.assignRider') }}">
            @csrf
            <input type="hidden" name="order_id" id="modalOrderId">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="assignRiderModalLabel">Assign Rider</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="rider_id" class="form-label">Select Rider</label>
                        <select name="rider_id" class="form-select" required>
                            <option value="" selected disabled>please select</option>
                            @foreach ($riders as $rider)
                                <option value="{{ $rider->id }}">{{ $rider->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Assign</button>
                </div>
            </div>
        </form>
    </div>
</div>
