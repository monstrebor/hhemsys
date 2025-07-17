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
<div class="w-full h-full">
    @include('partials.customer_navbar')
    <h1 class="text-5xl">NIGGA</h1>
    @if (auth()->check() && auth()->user()->is_new)
        @include('settings.change-password')
    @endif
</div>

@endsection
