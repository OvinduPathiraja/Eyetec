<aside class="w-64 bg-white border-r min-h-screen flex flex-col">
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
            Manage Products
        </a>

        <a href="{{ route('admin.products.create') }}"
            class="block px-3 py-2 rounded hover:bg-gray-100">
            Add Product
        </a>

        <a href="{{ route('admin.orders.index') }}"
            class="block px-3 py-2 rounded hover:bg-gray-100">
            Manage Orders
        </a>

        <a href="{{ route('admin.blogs.index') }}"
            class="block px-3 py-2 rounded hover:bg-gray-100">
            Manage Blogs
        </a>

    </nav>

    <div class="mt-auto px-4 py-6">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="w-full text-left block px-3 py-2 rounded text-red-600 hover:bg-red-50">
                Logout
            </button>
        </form>
    </div>
</aside>