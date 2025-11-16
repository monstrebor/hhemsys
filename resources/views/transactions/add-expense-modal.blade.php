<div class="modal fade" id="addExpenseModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow-lg">
            <form id="expenseForm" action="{{ route('user.transactions.store') }}" method="POST">
                @csrf
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold">Record Expense</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body pt-2">
                    @php
                        include(resource_path('views/transactions/categories.php'));
                        $categories = array_map(fn($cat) => (object)[
                            'id' => $cat['id'],
                            'name' => $cat['name'],
                            'default' => $cat['default'],
                            'info' => $cat['info'] ?? ''
                        ], $categories);
                        usort($categories, fn($a,$b)=>strcmp($a->name,$b->name));
                    @endphp

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Category</label>
                        <select name="category_id" id="categorySelect" class="form-select rounded-3" required>
                            <option value="">Choose Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                        data-default="{{ $category->default }}"
                                        data-info="{{ $category->info }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <small id="categoryInfo" class="text-muted"></small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Description</label>
                        <input type="text" name="description" id="descriptionInput"
                               class="form-control rounded-3" placeholder="Auto-fills based on category...">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Amount (₱)</label>
                        <div class="d-flex gap-2 mb-2">
                            @foreach ([50, 100, 150, 200] as $amt)
                                <button type="button" class="btn btn-light border shadow-sm btn-sm px-3"
                                        onclick="setAmount({{ $amt }})">
                                    ₱{{ $amt }}
                                </button>
                            @endforeach
                        </div>
                        <input type="number" step="0.01" name="amount" id="amountInput"
                               class="form-control rounded-3" placeholder="₱0.00" required>
                    </div>

                    <div class="mb-2">
                        <label class="form-label fw-semibold">Date</label>
                        <input type="date" name="date" class="form-control rounded-3"
                               value="{{ now()->toDateString() }}" required>
                    </div>
                </div>

                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-light px-3" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary px-4">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{ asset('js/expenseModal.js') }}"></script>