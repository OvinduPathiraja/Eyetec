<x-app-layout>
<div class="max-w-7xl mx-auto py-10 px-4">

<h1 class="text-2xl font-bold mb-6">
    Welcome, {{ auth()->user()->name }}
</h1>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

<div class="bg-white rounded-xl shadow p-6">
    <h3 class="text-gray-500 text-sm">My Orders</h3>
    <p class="text-2xl font-bold">
        {{ auth()->user()->orders()->count() }}
    </p>
</div>

<div class="bg-white rounded-xl shadow p-6">
    <h3 class="text-gray-500 text-sm">Account Type</h3>
    <p class="text-xl font-semibold capitalize">
        {{ auth()->user()->role }}
    </p>
</div>

<div class="bg-white rounded-xl shadow p-6">
    <a href="{{ route('orders.mine') }}"
       class="text-red-600 font-semibold">
        View Order History →
    </a>
</div>

</div>

</div>
</x-app-layout>
