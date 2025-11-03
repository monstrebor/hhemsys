@extends('layout.layout')

@section('title', 'User Dashboard')

@section('script')

@endsection

@section('content')
    <div class="flex min-h-screen bg-gray-100">

        @include('partials.sidebar')

        <div class="flex-1 flex flex-col">
            @include('partials.navbar')
            @include('layout.all-notif')
            @include('users.main.index')
            @include('household.invite-notif')
        </div>
        @if (auth()->check() && auth()->user()->is_new)
            <div class="mt-10">
                @include('settings.change-password')
            </div>
        @endif
    </div>
@endsection