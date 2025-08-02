@extends('layout.layout')

@section('title', 'Purchase Orders Dashboard')

@section('script')
@endsection

@section('content')
<div class="w-full min-h-screen bg-gray-50">
    @include('partials.admin.navbar')
    @include('partials.admin.sidebar')

    @include('admin.purchase-order.table')
</div>

<script src="{{ asset('js/adminPurchaseOrder.js') }}"></script>
@endsection
