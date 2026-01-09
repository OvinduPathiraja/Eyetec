<aside class="w-64 bg-white border-r min-h-screen flex flex-col">
    <div class="p-6 text-xl font-bold text-red-600">
        Admin Panel
    </div>

    <nav class="px-4 text-sm space-y-2">

        <a href="<?php echo e(route('admin.dashboard')); ?>"
            class="block px-3 py-2 rounded hover:bg-gray-100">
            Dashboard
        </a>

        <a href="<?php echo e(route('admin.products.index')); ?>"
            class="block px-3 py-2 rounded hover:bg-gray-100">
            Manage Products
        </a>

        <a href="<?php echo e(route('admin.products.create')); ?>"
            class="block px-3 py-2 rounded hover:bg-gray-100">
            Add Product
        </a>

        <a href="<?php echo e(route('admin.orders.index')); ?>"
            class="block px-3 py-2 rounded hover:bg-gray-100">
            Manage Orders
        </a>

        <a href="<?php echo e(route('admin.blogs.index')); ?>"
            class="block px-3 py-2 rounded hover:bg-gray-100">
            Manage Blogs
        </a>

    </nav>

    <div class="mt-auto px-4 py-6">
        <form method="POST" action="<?php echo e(route('logout')); ?>">
            <?php echo csrf_field(); ?>
            <button class="w-full text-left block px-3 py-2 rounded text-red-600 hover:bg-red-50">
                Logout
            </button>
        </form>
    </div>
</aside><?php /**PATH C:\eyetec-new\eyetec\resources\views/admin/partials/sidebar.blade.php ENDPATH**/ ?>