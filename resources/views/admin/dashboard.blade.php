@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto py-10 px-4">

    <h1 class="text-3xl font-bold mb-8">Admin Dashboard</h1>

    {{-- STATS --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">

        <div class="bg-white p-6 rounded-xl shadow">
            <p class="text-sm text-gray-500">Total Products</p>
            <h2 class="text-2xl font-bold">{{ $totalProducts }}</h2>
        </div>

        <div class="bg-white p-6 rounded-xl shadow">
            <p class="text-sm text-gray-500">Total Orders</p>
            <h2 class="text-2xl font-bold">{{ $totalOrders }}</h2>
        </div>

        <div class="bg-white p-6 rounded-xl shadow">
            <p class="text-sm text-gray-500">Pending Orders</p>
            <h2 class="text-2xl font-bold text-yellow-600">
                {{ $pendingOrders }}
            </h2>
        </div>

        <div class="bg-white p-6 rounded-xl shadow">
            <p class="text-sm text-gray-500">Registered Users</p>
            <h2 class="text-2xl font-bold">{{ $totalUsers }}</h2>
        </div>

    </div>

    {{-- QUICK ACTIONS --}}
    <div class="flex gap-4 mb-10">
        <a href="{{ route('admin.products.index') }}"
           class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg">
            Manage Products
        </a>

        <a href="{{ route('admin.orders.index') }}"
           class="border border-gray-300 px-6 py-3 rounded-lg hover:bg-gray-100">
            Manage Orders
        </a>
    </div>

    {{-- RECENT ORDERS --}}
    <div class="bg-white rounded-xl shadow overflow-x-auto">
        <h2 class="text-lg font-semibold px-6 py-4 border-b">
            Recent Orders
        </h2>

        <table class="w-full text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="p-3 text-left">Order ID</th>
                    <th class="p-3">Customer</th>
                    <th class="p-3">Total</th>
                    <th class="p-3">Status</th>
                </tr>
            </thead>

            <tbody>
                @forelse($latestOrders as $order)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3">#{{ $order->id }}</td>
                        <td class="p-3">{{ $order->user->name }}</td>
                        <td class="p-3 font-semibold text-red-600">
                            LKR {{ number_format($order->total,2) }}
                        </td>
                        <td class="p-3">
                            <span class="px-2 py-1 rounded text-xs text-white
                                {{ $order->status === 'paid'
                                    ? 'bg-green-600'
                                    : ($order->status === 'cancelled'
                                        ? 'bg-gray-500'
                                        : 'bg-yellow-500') }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="p-4 text-center text-gray-500">
                            No recent orders
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
