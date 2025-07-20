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
        <div x-data="carousel()" x-init="init()"
            class="bg-blue-300 w-[1000px] h-[600px] relative mx-auto overflow-hidden rounded-lg">
            <template x-for="(img, idx) in images" :key="idx">
                <div x-show="current === idx"
                    class="absolute inset-0 flex items-center justify-center transition-all duration-500 rounded-md">
                    <img :src="img" class="object-contain max-h-full w-full h-full" alt="">
                </div>
            </template>

            <button @click="prev()"
                class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white rounded-full p-2 shadow text-xl">
                ‹
            </button>

            <button @click="next()"
                class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white rounded-full p-2 shadow text-xl">
                ›
            </button>

            <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
                <template x-for="(img, idx) in images" :key="idx">
                    <div @click="go(idx)" :class="current === idx ? 'bg-white' : 'bg-gray-600'"
                        class="w-3 h-3 rounded-full cursor-pointer"></div>
                </template>
            </div>
        </div>


        @if (auth()->check() && auth()->user()->is_new)
        <div class="mt-10">
            @include('settings.change-password')
        </div>
        @endif

    </div>
</div>

@endsection