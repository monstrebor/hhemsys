@extends('layout.layout')

@section('title', 'User Dashboard')

@section('script')

@endsection

@section('content')
    <div class="w-full min-h-screen bg-gray-50">
        @include('users.partials.navbar')

        <div class="max-w-6xl mx-auto px-4 py-8">
            @include('layout.all-notif')
<h1>logged in</h1>
            <!-- @if (auth()->check() && auth()->user()->is_new)
                <div class="mt-10">
                    @include('settings.change-password')
                </div>
            @endif -->
        </div>

    </div>
@endsection