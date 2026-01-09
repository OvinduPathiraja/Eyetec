<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard - {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

{{-- NAVBAR --}}
<nav class="bg-white border-b shadow-sm">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
        <a href="{{ route('dashboard') }}" class="text-lg font-bold text-red-600">
            Eyetec
        </a>

        <div class="flex gap-4 text-sm items-center">
            <a href="{{ route('products') }}" class="hover:text-red-600">Products</a>
            <a href="{{ route('orders.mine') }}" class="hover:text-red-600">My Orders</a>
            <a href="{{ route('cart.index') }}" class="hover:text-red-600">Cart</a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="hover:text-red-600">Logout</button>
            </form>
        </div>
    </div>
</nav>

{{-- CONTENT --}}
<main class="max-w-7xl mx-auto px-4 py-10">
    {{ $slot }}
</main>

</body>
</html>
