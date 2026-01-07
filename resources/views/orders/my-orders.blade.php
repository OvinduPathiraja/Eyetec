@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">My Orders</h1>

    @if($orders->isEmpty())
        <p class="text-gray-600">You have no orders yet.</p>
    @else
        @foreach($orders as $order)
            <div class="bg-white p-4 rounded shadow mb-4">
                <div class="flex justify-between items-center">
                    <p class="font-semibold">
                        Order #{{ $order->id }} — LKR {{ number_format($order->total, 2) }}
                    </p>
                    <span class="text-xs px-2 py-1 rounded bg-gray-100 text-gray-700 capitalize">{{ $order->status }}</span>
                </div>

                <ul class="mt-2 text-sm text-gray-600 space-y-1">
                    @foreach($order->items as $item)
                        <li>
                            {{ $item->product?->product_name ?? $item->product_name ?? 'Product removed' }}
                            × {{ $item->quantity }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    @endif
</div>
@endsection
