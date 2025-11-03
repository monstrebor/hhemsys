@extends('layout.layout')

@section('title', 'Household')

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if(isset($showCreateModal) && $showCreateModal)
                var modal = new bootstrap.Modal(document.getElementById('createHouseholdModal'));
                modal.show();
            @endif
                    });
    </script>
@endsection

@section('content')
<div class="flex min-h-screen bg-light">
    @include('partials.sidebar')

    <div class="flex-1 flex flex-column">
        @include('partials.navbar')
        @include('layout.all-notif')
        <div class="container my-4">
            <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3">
                    <div>
                        <h3 class="mb-0">{{ $household->name ?? 'No Household Created Yet' }}</h3>
                        <small class="text-light opacity-75">
                            @if($household)
                                Managed by <strong>{{ $household->owner->name ?? 'Unknown' }}</strong>
                            @else
                                Create a household to begin managing your finances
                            @endif
                        </small>

                        @if($household && $household->description)
                            <p class="mt-2 mb-0 small text-light opacity-75 fst-italic">
                                📝 "{{ $household->description }}"
                            </p>
                        @endif
                    </div>

                    @if($household && $household->owner && auth()->id() === $household->owner->id)
                        <button class="btn btn-light btn-sm rounded-pill px-3" data-bs-toggle="modal"
                            data-bs-target="#editHouseholdModal">
                            <i class="fa-solid fa-pen me-1"></i> Edit
                        </button>
                    @endif
                </div>

                <div class="card-body bg-light p-4">
                    @if($household)
                        <div class="row g-4">
                            <div class="col-md-4">
                                <div class="p-3 bg-white rounded-3 shadow-sm h-100">
                                    <h6 class="text-muted mb-1">Expected Monthly Income</h6>
                                    <h4 class="text-success fw-bold">
                                        ₱{{ number_format($household->expected_monthly_income, 2) }}
                                    </h4>
                                    <p class="text-muted small mb-0">
                                        This amount represents your household’s monthly income source, used for budgeting
                                        and expenditure management.
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="p-3 bg-white rounded-3 shadow-sm h-100">
                                    <h6 class="text-muted mb-1">Invite Code</h6>
                                    <div class="d-flex align-items-center">
                                        <span class="fw-bold text-primary me-2">{{ $userCode ?? 'N/A' }}</span>
                                        <form action="{{ route('user.update.invite-code') }}" method="POST">
                                            @csrf
                                            <button class="btn btn-outline-primary btn-sm">Regenerate</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 d-flex align-items-center justify-content-center">
                                <button class="btn btn-outline-success w-100 py-2" data-bs-toggle="modal"
                                    data-bs-target="#addMemberModal">
                                    <i class="fa-solid fa-user-plus me-2"></i> Add New Member
                                </button>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h5 class="fw-bold text-secondary mb-0"><i class="fa-solid fa-users me-2"></i>Members</h5>
                                <span class="badge bg-primary rounded-pill">{{ $household->users->count() }} total</span>
                            </div>
                            <ul class="list-group">
                                @forelse($household->users as $member)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div>
                                            👤 <strong>{{ $member->name }}</strong><br>
                                            <small
                                                class="text-muted">{{ $member->pivot->relation ?? 'No relation set' }}</small>
                                        </div>
                                        @if($household->owner->id === $member->id)
                                            <span class="badge bg-warning text-dark">Owner</span>
                                        @endif
                                    </li>
                                @empty
                                    <li class="list-group-item text-muted">No members yet.</li>
                                @endforelse
                            </ul>
                        </div>

                        <div>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h5 class="fw-bold text-secondary mb-0"><i class="fa-solid fa-wallet me-2"></i>Accounts</h5>
                                <span class="badge bg-success rounded-pill">{{ $household->accounts->count() }}
                                    active</span>
                            </div>
                            <ul class="list-group">
                                @forelse($household->accounts as $account)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <strong>{{ $account->name }}</strong><br>
                                            <small class="text-muted">Balance</small>
                                        </div>
                                        <span class="fw-bold text-success">
                                            ₱{{ number_format($account->balance, 2) }}
                                        </span>
                                    </li>
                                @empty
                                    <li class="list-group-item text-muted">No accounts yet.</li>
                                @endforelse
                            </ul>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fa-solid fa-house-chimney-user fa-3x text-muted mb-3"></i>
                            <p class="text-muted mb-3">You haven't created a household yet.</p>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createHouseholdModal">
                                <i class="fa-solid fa-plus me-1"></i> Create Household
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @include('household.create-modal')
        @include('household.add-member-modal')
        @include('household.edit-modal')
    </div>
</div>