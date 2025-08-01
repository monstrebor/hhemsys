@extends('layout.layout')

@section('title', 'Walk-in Dashboard')

@section('content')
<div class="w-full min-h-screen bg-gray-50">
    @include('partials.cashier.navbar')
    @include('partials.cashier.sidebar')

    <div class="max-w-6xl mx-auto px-4 py-8">
        @include('layout.all_notif')

        @include('users.cashiers.walk-in.table')
    </div>
</div>
@include('users.cashiers.walk-in.modal')
<script src="{{ asset('js/walkInModal.js') }}"></script>
@endsection
