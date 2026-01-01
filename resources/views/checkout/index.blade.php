@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-8">
    <h1 class="text-2xl font-bold mb-4">Checkout</h1>

    <p>Items in cart: {{ $cart->items->count() }}</p>

    <form method="POST" action="{{ route('checkout.place') }}">
        @csrf
        <button class="bg-green-600 text-white px-6 py-2 rounded">
            Place Order
        </button>
    </form>
</div>
@endsection
