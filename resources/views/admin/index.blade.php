@extends('layout.layout')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="flex min-h-screen bg-gray-100">

        @include("partials.sidebar")

        <div class="flex-1 flex flex-col">
            @include("partials.navbar")

            @include("admin.main.index")
            @if (auth()->check() && auth()->user()->is_new)
                <div class="mt-10">
                    @include('settings.change-password')
                </div>
            @endif
        </div>
    </div>
@endsection