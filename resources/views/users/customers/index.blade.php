@extends('layout.layout')

@section('title', 'Customer Dashboard')

@section('script')
<script>
    window.customerHomeImages = @json($images);
</script>
@endsection

@section('content')


<div class="w-full min-h-screen bg-gray-50">
    @include('partials.customer.navbar')

    <div class="max-w-6xl mx-auto px-4 py-8">
        @include('layout.all_notif')
        @include('users.customers.partials.image_ads')
        @include('users.customers.product.show_products')
        @include('users.customers.product.add-to-cart-modal')

        @if (auth()->check() && auth()->user()->is_new)
        <div class="mt-10">
            @include('settings.change-password')
        </div>
        @endif
    </div>

</div>
<script src="{{ asset('js/cartModal.js') }}"></script>
@endsection
