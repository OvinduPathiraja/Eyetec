<x-guest-layout>
<div class="bg-gray-50 min-h-screen">

<div class="max-w-7xl mx-auto px-4 py-10">

<h1 class="text-3xl font-bold mb-8">Shopping Cart</h1>

@if(!$cart || $cart->items->isEmpty())
    <div class="bg-white p-10 rounded-xl text-center shadow">
        <p class="text-gray-500 mb-6">Your cart is empty</p>
        <a href="{{ route('products') }}"
           class="bg-red-600 text-white px-6 py-3 rounded-lg">
            Continue Shopping
        </a>
    </div>
@else

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

{{-- CART ITEMS --}}
<div class="lg:col-span-2 space-y-4">

@foreach($cart->items as $item)
<div class="bg-white rounded-xl shadow p-4 flex gap-4 items-center">

    {{-- IMAGE --}}
    <div class="w-[100px] h-[100px] bg-gray-100 rounded flex items-center justify-center">
        <img
            src="{{ $item->product->image && file_exists(public_path($item->product->image))
                ? asset($item->product->image)
                : asset('images/placeholder.png') }}"
            class="w-[80px] h-[80px] object-contain"
        />
    </div>

    {{-- INFO --}}
    <div class="flex-1">
        <h3 class="font-semibold">
            {{ $item->product->product_name }}
        </h3>
        <p class="text-sm text-gray-500">
            LKR {{ number_format($item->price,2) }}
        </p>
    </div>

    {{-- QUANTITY --}}
    <form method="POST" action="{{ route('cart.update', $item) }}">
        @csrf
        @method('PATCH')
        <input type="number"
               name="quantity"
               min="1"
               value="{{ $item->quantity }}"
               class="w-16 border rounded px-2 py-1"
               onchange="this.form.submit()">
    </form>

    {{-- REMOVE --}}
    <form method="POST" action="{{ route('cart.remove', $item) }}">
        @csrf
        @method('DELETE')
        <button class="text-red-600 text-sm">Remove</button>
    </form>

</div>
@endforeach

</div>

{{-- SUMMARY --}}
<div class="bg-white rounded-xl shadow p-6 h-fit">

<h2 class="text-lg font-bold mb-4">Order Summary</h2>

@php
$total = $cart->items->sum(fn($i) => $i->price * $i->quantity);
@endphp

<div class="flex justify-between mb-2">
    <span>Subtotal</span>
    <span>LKR {{ number_format($total,2) }}</span>
</div>

<div class="flex justify-between mb-4">
    <span>Shipping</span>
    <span class="text-green-600">Free</span>
</div>

<hr class="mb-4">

<div class="flex justify-between font-bold text-lg mb-6">
    <span>Total</span>
    <span>LKR {{ number_format($total,2) }}</span>
</div>

<a href="{{ route('checkout') }}"
   class="block bg-red-600 text-white text-center py-3 rounded-lg font-semibold">
    Proceed to Checkout
</a>

</div>

</div>
@endif

</div>
</div>
</x-guest-layout>
