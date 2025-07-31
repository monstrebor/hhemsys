@extends('layout.layout')

@section('title', 'Cashier Dashboard')

@section('script')

@endsection

@section('content')


<div class="w-full min-h-screen bg-gray-50">
    @include('partials.cashier.navbar')
    @include('partials.cashier.sidebar')

    <div class="max-w-6xl mx-auto px-4 py-8">
        @include('layout.all_notif')


        @if (auth()->check() && auth()->user()->is_new)
        <div class="mt-10">
            @include('settings.change-password')
        </div>
        @endif
    </div>

</div>
@endsection
