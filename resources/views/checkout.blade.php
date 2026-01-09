<x-guest-layout>
<div class="bg-gray-50 min-h-screen">

<div class="max-w-7xl mx-auto px-4 py-10">

<h1 class="text-3xl font-bold mb-8">Checkout</h1>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

{{-- ORDER ITEMS --}}
<div class="lg:col-span-2 space-y-4">

@foreach($cart->items as $item)
<div class="bg-white rounded-xl shadow p-4 flex gap-4 items-center">

    <div class="w-[80px] h-[80px] bg-gray-100 rounded flex items-center justify-center">
        <img
            src="{{ $item->product->image && file_exists(public_path($item->product->image))
                ? asset($item->product->image)
                : asset('images/placeholder.png') }}"
            class="w-[60px] h-[60px] object-contain"
        />
    </div>

    <div class="flex-1">
        <h3 class="font-semibold">
            {{ $item->product->product_name }}
        </h3>
        <p class="text-sm text-gray-500">
            Qty {{ $item->quantity }}
        </p>
    </div>

    <span class="font-semibold">
        LKR {{ number_format($item->price * $item->quantity, 2) }}
    </span>

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

<form method="POST" action="{{ route('checkout.place') }}">
@csrf
<button
    class="w-full bg-red-600 hover:bg-red-700 text-white py-3 rounded-lg font-semibold">
    Place Order
</button>
</form>

</div>

</div>

</div>
</div>
</x-guest-layout>
