@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-6 py-10">

    <h1 class="text-2xl font-bold mb-6">My Orders</h1>

    @if($orders->isEmpty())
        <div class="bg-white p-6 rounded shadow text-center">
            <p class="text-gray-600">You have no orders yet.</p>
            <a href="{{ route('products') }}"
               class="inline-block mt-4 bg-red-600 text-white px-6 py-2 rounded">
                Start Shopping
            </a>
        </div>
    @else
        @foreach($orders as $order)
            <div class="bg-white rounded shadow mb-6">
                <div class="p-4 border-b flex justify-between">
                    <div>
                        <p class="font-semibold">Order #{{ $order->id }}</p>
                        <p class="text-sm text-gray-500">
                            {{ $order->created_at->format('d M Y') }}
                        </p>
                    </div>
                    <div class="font-bold text-red-600">
                        LKR {{ number_format($order->total, 2) }}
                    </div>
                </div>

                <table class="w-full">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-3 text-left">Product</th>
                            <th class="p-3">Price</th>
                            <th class="p-3">Qty</th>
                            <th class="p-3">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $item)
                            <tr class="border-t">
                                <td class="p-3">
                                    {{ $item->product->product_name ?? 'Product removed' }}
                                </td>
                                <td class="p-3">
                                    LKR {{ number_format($item->price, 2) }}
                                </td>
                                <td class="p-3 text-center">
                                    {{ $item->quantity }}
                                </td>
                                <td class="p-3 font-semibold">
                                    LKR {{ number_format($item->price * $item->quantity, 2) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach
    @endif

</div>
@endsection
