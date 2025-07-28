@extends('layout.layout')

@section('title', 'Customer Home Images Dashboard')

@section('script')

@endsection

@section('content')
<div class="w-full h-full">
    @include('partials.admin.navbar')
    @include('partials.admin.sidebar')

    <main class="m-[100px]">
        @include('layout.all_notif')

        @include('admin.customer-home-images.table')
    </main>

    @include('admin.customer-home-images.modals')

</div>
<script src="{{ asset('js/adminModals.js') }}"></script>
@endsection
