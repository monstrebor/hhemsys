@extends('layout.layout')

@section('title', 'Session Expired')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
    <div class="bg-white p-8 rounded-2xl shadow-lg text-center max-w-md w-full">
        <h1 class="text-3xl font-bold text-red-600 mb-4">Session Expired</h1>
        <p class="text-gray-700 mb-6">{{ $message ?? 'Your session expired. Please go back and try again.' }}</p>
        <a href="{{ url()->previous() }}"
            class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-xl transition">
            Go Back
        </a>
    </div>
</div>
@endsection
