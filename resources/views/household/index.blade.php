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

        <div class="container my-5">
            @if($household)
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title text-primary">{{ $household->name }}</h3>
                        <p class="text-muted">Invite Code: <span class="fw-bold">{{ $household->invite_code }}</span></p>

                        <h5 class="mt-4">Members</h5>
                        <ul class="list-group mb-3">
                            @foreach ($household->users as $member)
                                <li class="list-group-item">
                                    👤 {{ $member->name }} —
                                    <small class="text-muted">{{ $member->relation ?? 'No relation set' }}</small>
                                </li>
                            @endforeach
                        </ul>

                        <h5>Accounts</h5>
                        <ul class="list-group">
                            @foreach ($household->accounts as $account)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $account->name }}
                                    <span class="badge bg-success">₱{{ number_format($account->balance, 2) }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @else
                <div class="text-center mt-5">
                    <p class="text-muted fs-5 mb-4">You don’t have a household yet.</p>
                    <button class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#createHouseholdModal">
                        <i class="fa-solid fa-house-user me-2"></i> Create New Household
                    </button>
                </div>
            @endif
        </div>
        @include('household.create-modal')
    </div>
</div>