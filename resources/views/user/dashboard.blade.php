<x-app-layout>
<div class="max-w-7xl mx-auto py-10">

<h1 class="text-2xl font-bold mb-6">My Dashboard</h1>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <div class="bg-white p-6 rounded shadow">
        <h3 class="font-semibold">My Orders</h3>
        <p class="text-gray-500 mt-2">View your order history</p>
        <a href="{{ route('orders.mine') }}" class="text-red-600 text-sm mt-2 inline-block">
            View Orders →
        </a>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <h3 class="font-semibold">Profile</h3>
        <p class="text-gray-500 mt-2">Manage your account</p>
        <a href="{{ route('profile.show') }}" class="text-red-600 text-sm mt-2 inline-block">
            Edit Profile →
        </a>
    </div>

</div>

</div>
</x-app-layout>
