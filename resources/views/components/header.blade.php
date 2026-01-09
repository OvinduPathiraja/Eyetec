@auth
<a href="{{ route('orders.mine') }}"
   class="text-sm text-gray-700 hover:text-red-600">
    My Orders
</a>
@endauth

@auth

@if(auth()->user()->isAdmin())
    <a href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
    <a href="{{ route('manage-products') }}">Products</a>
    <a href="{{ route('manage-orders') }}">Orders</a>
    <a href="{{ route('manage-products') }}"
           class="text-sm font-semibold">
            Manage Products
        </a>
@else
    <a href="{{ route('dashboard') }}">Dashboard</a>
    <a href="{{ route('orders.mine') }}">My Orders</a>
    <a href="{{ route('products') }}" class="text-sm">Shop</a>
@endif


@endauth
