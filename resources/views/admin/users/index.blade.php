@extends('layout.layout')

@section('title', 'Users Dashboard')

@section('script')

@endsection

@section('content')
<div class="w-full h-full">
    @include('partials.admin.navbar')
    @include('partials.admin.sidebar')

    @include('admin.users.table')
    @include('admin.users.modal')
</div>

@endsection
