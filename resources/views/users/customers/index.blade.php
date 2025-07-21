@extends('layout.layout')

@section('title', 'Customer Dashboard')

@section('script')
<script>
    window.customerHomeImages = @json($images);
</script>
@endsection

@section('content')


<div class="w-full min-h-screen bg-gray-50">
    @include('partials.customer_navbar')

    <div class="max-w-6xl mx-auto px-4 py-8">
        @include('users.customers.partials.image_ads')

        @if (auth()->check() && auth()->user()->is_new)
        <div class="mt-10">
            @include('settings.change-password')
        </div>
        @endif
    </div>

</div>

@endsection