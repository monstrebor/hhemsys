@extends('layout.layout')

@section('title', 'Rider Dashboard')

@section('script')

@endsection

@section('content')
<div class="w-full h-full">
    @include('partials.admin.navbar')
    @include('partials.admin.sidebar')

    @if (auth()->check() && auth()->user()->is_new)
        @include('settings.change-password')
    @endif
</div>

@endsection
