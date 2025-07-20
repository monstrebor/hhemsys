@extends('layout.layout')

@section('title', 'Customer Dashboard')

@section('script')
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
@endsection

@section('content')


<div class="w-full min-h-screen bg-gray-50">
    @include('partials.customer_navbar')
    @include('partials.customer_sidebar')

    <div class="max-w-5xl mx-auto px-4 py-12">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">
            Welcome back, {{ auth()->user()->name }} 👋
        </h1>
        <p class="text-gray-600 mb-8">Ready to shop? Check out our latest products below.</p>

        <a href="{{-- {{ route('products.index') }} --}}"
            class="inline-block bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700 transition">
            🛒 Browse Products
        </a>

        @if (auth()->check() && auth()->user()->is_new)
        <div class="mt-10">
            @include('settings.change-password')
        </div>
        @endif

    </div>
</div>

@endsection
