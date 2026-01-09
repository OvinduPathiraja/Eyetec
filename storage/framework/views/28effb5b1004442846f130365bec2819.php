
<?php $__env->startSection('content'); ?>
<div class="max-w-4xl mx-auto py-10 px-4">

    <div class="mb-6">
        <h1 class="text-2xl font-bold">Add Product</h1>
        <p class="text-sm text-gray-500">Create a new product</p>
    </div>

    <div class="bg-white p-6 rounded-xl shadow">
        <form method="POST"
              action="<?php echo e(route('admin.products.store')); ?>"
              enctype="multipart/form-data"
              class="space-y-5">
            <?php echo csrf_field(); ?>

            <div>
                <label class="block text-sm font-semibold mb-1">Product Name</label>
                <input type="text" name="product_name" class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">Brand</label>
                <input type="text" name="brand_name" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">Category</label>
                <input type="text" name="product_category" class="w-full border rounded px-3 py-2">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold mb-1">Price (LKR)</label>
                    <input type="number" step="0.01" name="price" class="w-full border rounded px-3 py-2" required>
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-1">Stock</label>
                    <input type="number" name="stock" class="w-full border rounded px-3 py-2" required>
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">Product Image</label>
                <input type="file" name="image" class="w-full border rounded px-3 py-2">
            </div>

            <div class="flex justify-end gap-3 pt-4">
                <a href="<?php echo e(route('admin.products.index')); ?>" class="px-4 py-2 border rounded">
                    Cancel
                </a>
                <button class="bg-red-600 text-white px-6 py-2 rounded">
                    Save Product
                </button>
            </div>

        </form>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\eyetec-new\eyetec\resources\views/admin/add-product.blade.php ENDPATH**/ ?>