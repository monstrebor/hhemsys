@extends('layout.layout')

@section('title', 'Rider Dashboard')

@section('script')

@endsection

@section('content')
<div class="w-full h-full">
    @include('partials.rider.navbar')
    @include('layout.all_notif')
    @include('partials.rider.sidebar')

    <h1>RIDER</h1>

    @if (auth()->check() && auth()->user()->is_new)
        @include('settings.change-password')
    @endif
</div>

@endsection
