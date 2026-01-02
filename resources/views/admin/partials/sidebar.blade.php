<aside class="w-64 bg-white border-r min-h-screen">
    <div class="p-6 text-xl font-bold text-red-600">
        Admin Panel
    </div>

    <nav class="px-4 text-sm space-y-2">

        <a href="{{ route('admin.dashboard') }}"
           class="block px-3 py-2 rounded hover:bg-gray-100">
            Dashboard
        </a>

        <a href="{{ route('admin.products.index') }}"
           class="block px-3 py-2 rounded hover:bg-gray-100">
            Products
        </a>

        <a href="{{ route('admin.orders.index') }}"
           class="block px-3 py-2 rounded hover:bg-gray-100">
            Orders
        </a>

    </nav>
</aside>
