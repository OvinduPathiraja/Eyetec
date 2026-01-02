@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8">

    <h1 class="text-2xl font-bold mb-6">Your Cart</h1>

    {{-- EMPTY CART --}}
    @if(!$cart || $cart->items->isEmpty())
        <div class="bg-white p-6 rounded-lg shadow text-center">
            <p class="text-gray-600">Your cart is empty.</p>

            <a href="{{ route('products') }}"
               class="inline-block mt-4 bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded">
                Continue Shopping
            </a>
        </div>
    @else

    {{-- CART TABLE --}}
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="p-4">Product</th>
                    <th class="p-4">Price</th>
                    <th class="p-4">Quantity</th>
                    <th class="p-4">Subtotal</th>
                    <th class="p-4"></th>
                </tr>
            </thead>

            <tbody>
                @php $total = 0; @endphp

                @foreach($cart->items as $item)
                    @php
                        $subtotal = $item->price * $item->quantity;
                        $total += $subtotal;
                    @endphp

                    <tr class="border-t hover:bg-gray-50">

                        {{-- PRODUCT --}}
                        <td class="p-4 flex items-center gap-4">
                            <img
                                src="{{ $item->product && $item->product->image && file_exists(public_path($item->product->image))
                                    ? asset($item->product->image)
                                    : asset('images/placeholder.png') }}"
                                class="w-16 h-16 object-cover rounded"
                                alt="Product image">

                            <div>
                                <p class="font-semibold">
                                    {{ $item->product->product_name ?? 'Product removed' }}
                                </p>
                            </div>
                        </td>

                        {{-- PRICE --}}
                        <td class="p-4">
                            LKR {{ number_format($item->price, 2) }}
                        </td>

                        {{-- QUANTITY --}}
                        <td class="p-4">
                            <form method="POST"
                                  action="{{ route('cart.update', $item) }}">
                                @csrf
                                @method('PATCH')

                                <input type="number"
                                       name="quantity"
                                       min="1"
                                       max="{{ $item->product->stock ?? 1 }}"
                                       value="{{ $item->quantity }}"
                                       class="w-20 border rounded px-2 py-1"
                                       onchange="this.form.submit()">
                            </form>
                        </td>

                        {{-- SUBTOTAL --}}
                        <td class="p-4 font-semibold">
                            LKR {{ number_format($subtotal, 2) }}
                        </td>

                        {{-- REMOVE --}}
                        <td class="p-4">
                            <form method="POST"
                                  action="{{ route('cart.remove', $item) }}"
                                  onsubmit="return confirm('Remove this item from cart?')">
                                @csrf
                                @method('DELETE')

                                <button class="text-red-600 hover:underline">
                                    Remove
                                </button>
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- TOTAL --}}
    <div class="mt-6 flex justify-end">
        <div class="bg-white p-6 rounded-lg shadow w-80">
            <div class="flex justify-between mb-2 text-lg">
                <span>Total</span>
                <span class="font-bold">
                    LKR {{ number_format($total, 2) }}
                </span>
            </div>

            <a href="{{ route('checkout.index') }}"
               class="block mt-4 bg-green-600 hover:bg-green-700 text-white text-center py-2 rounded">
                Proceed to Checkout
            </a>
        </div>
    </div>

    @endif
</div>
@endsection
