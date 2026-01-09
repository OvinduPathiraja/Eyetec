@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto py-10 px-4">

    {{-- PAGE TITLE --}}
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900">
            Orders Management
        </h1>
        <p class="text-sm text-gray-500">
            View and manage all customer orders
        </p>
    </div>

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div class="mb-4 bg-green-100 text-green-700 px-4 py-2 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- ORDERS TABLE --}}
    <div class="bg-white rounded-xl shadow overflow-x-auto">
        <table class="w-full text-sm text-left">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="p-3">Order ID</th>
                    <th class="p-3">Customer</th>
                    <th class="p-3">Total</th>
                    <th class="p-3">Status</th>
                    <th class="p-3 text-center">Items</th>
                    <th class="p-3">Action</th>
                </tr>
            </thead>

            <tbody>
            @forelse($orders as $order)

                {{-- ORDER ROW --}}
                <tr class="border-t hover:bg-gray-50 align-top">
                    <td class="p-3 font-medium">
                        #{{ $order->id }}
                    </td>

                    <td class="p-3">
                        {{ $order->user->name ?? $order->user->email }}
                    </td>

                    <td class="p-3 font-semibold text-red-600">
                        LKR {{ number_format($order->total, 2) }}
                    </td>

                    <td class="p-3">
                        <span class="px-2 py-1 rounded text-xs font-semibold text-white
                            {{ $order->status === 'paid' ? 'bg-green-600' : '' }}
                            {{ $order->status === 'pending' ? 'bg-yellow-500' : '' }}
                            {{ $order->status === 'cancelled' ? 'bg-gray-500' : '' }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>

                    <td class="p-3 text-center font-semibold">
                        {{ $order->items->count() }}
                    </td>

                    <td class="p-3">
                        <form method="POST"
                              action="{{ route('admin.orders.status', $order) }}"
                              class="flex items-center gap-2">
                            @csrf
                            @method('PATCH')

                            <select name="status"
                                    class="border rounded px-2 py-1 text-xs">
                                <option value="pending" @selected($order->status === 'pending')>
                                    Pending
                                </option>
                                <option value="paid" @selected($order->status === 'paid')>
                                    Paid
                                </option>
                                <option value="cancelled" @selected($order->status === 'cancelled')>
                                    Cancelled
                                </option>
                            </select>

                            <button
                                class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-xs">
                                Update
                            </button>
                        </form>
                    </td>
                </tr>

                {{-- ORDER ITEMS ROW --}}
                <tr>
                    <td colspan="6" class="bg-gray-50 px-6 py-4 text-xs text-gray-700">
                        <div class="space-y-1">
                            @foreach($order->items as $item)
                                <div>
                                    <span class="font-semibold">
                                        {{ $item->product->product_name ?? 'Product Deleted' }}
                                    </span>
                                    × {{ $item->quantity }}
                                    — LKR {{ number_format($item->price, 2) }}
                                </div>
                            @endforeach
                        </div>
                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="6" class="p-6 text-center text-gray-500">
                        No orders found.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    {{-- PAGINATION --}}
    <div class="mt-8">
        {{ $orders->links() }}
    </div>

</div>
@endsection
