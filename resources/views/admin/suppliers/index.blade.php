@extends('layout.layout')

@section('title', 'Suppliers Dashboard')

@section('content')
<div class="w-full min-h-screen bg-gray-50">
    @include('partials.admin.navbar')
    @include('partials.admin.sidebar')

    @include('admin.suppliers.table')
</div>

@endsection
