
<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto py-10 px-4">

    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold">Manage Products</h1>
            <p class="text-sm text-gray-500">Add, update and manage inventory</p>
        </div>

        <a href="<?php echo e(route('admin.products.create')); ?>"
           class="bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-semibold">
            + Add Product
        </a>
    </div>

    <div class="bg-white rounded-xl shadow overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3">Image</th>
                    <th class="p-3">Product</th>
                    <th class="p-3">Price</th>
                    <th class="p-3">Stock</th>
                    <th class="p-3">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="border-b">
                    <td class="p-3">
                        <img src="<?php echo e($product->image ? asset($product->image) : asset('images/placeholder.png')); ?>"
                             class="w-16 h-16 object-contain rounded">
                    </td>
                    <td class="p-3 font-semibold"><?php echo e($product->product_name); ?></td>
                    <td class="p-3 text-red-600">LKR <?php echo e(number_format($product->price,2)); ?></td>
                    <td class="p-3"><?php echo e($product->stock); ?></td>
                    <td class="pt-6 p-3 flex gap-2">
                        <a href="<?php echo e(route('admin.products.edit', $product)); ?>" class="border px-3 py-1 rounded">
                            Edit
                        </a>
                        <form method="POST" action="<?php echo e(route('admin.products.destroy', $product)); ?>">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button class="border border-red-600 text-red-600 px-3 py-1 rounded">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr><td colspan="5" class="p-6 text-center">No products</td></tr>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="mt-6"><?php echo e($products->links()); ?></div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\eyetec-new\eyetec\resources\views/admin/manage-products.blade.php ENDPATH**/ ?>