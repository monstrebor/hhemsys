@extends('layout.layout')

@section('title', 'Product Dashboard')

@section('script')

@endsection

@section('content')
<div class="w-full h-full">
    @include('partials.admin.navbar')
    @include('partials.admin.sidebar')

    <main class="m-[100px]">
        @include('layout.all_notif')

        @include('product.product-table')
    </main>

    @include('product.create-modal')

    @include('product.edit-modal')
</div>

<script src="{{ asset('js/modal.js') }}"></script>
@endsection
