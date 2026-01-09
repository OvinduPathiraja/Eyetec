
<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto py-10 px-4">

    <h1 class="text-3xl font-bold mb-8">Admin Dashboard</h1>

    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">

        <div class="bg-white p-6 rounded-xl shadow">
            <p class="text-sm text-gray-500">Total Products</p>
            <h2 class="text-2xl font-bold"><?php echo e($totalProducts); ?></h2>
        </div>

        <div class="bg-white p-6 rounded-xl shadow">
            <p class="text-sm text-gray-500">Total Orders</p>
            <h2 class="text-2xl font-bold"><?php echo e($totalOrders); ?></h2>
        </div>

        <div class="bg-white p-6 rounded-xl shadow">
            <p class="text-sm text-gray-500">Pending Orders</p>
            <h2 class="text-2xl font-bold text-yellow-600">
                <?php echo e($pendingOrders); ?>

            </h2>
        </div>

        <div class="bg-white p-6 rounded-xl shadow">
            <p class="text-sm text-gray-500">Registered Users</p>
            <h2 class="text-2xl font-bold"><?php echo e($totalUsers); ?></h2>
        </div>

    </div>

    
    <div class="flex gap-4 mb-10">
        <a href="<?php echo e(route('admin.products.index')); ?>"
           class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg">
            Manage Products
        </a>

        <a href="<?php echo e(route('admin.orders.index')); ?>"
           class="border border-gray-300 px-6 py-3 rounded-lg hover:bg-gray-100">
            Manage Orders
        </a>
    </div>

    
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
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $latestOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3">#<?php echo e($order->id); ?></td>
                        <td class="p-3"><?php echo e($order->user->name); ?></td>
                        <td class="p-3 font-semibold text-red-600">
                            LKR <?php echo e(number_format($order->total,2)); ?>

                        </td>
                        <td class="p-3">
                            <span class="px-2 py-1 rounded text-xs text-white
                                <?php echo e($order->status === 'paid'
                                    ? 'bg-green-600'
                                    : ($order->status === 'cancelled'
                                        ? 'bg-gray-500'
                                        : 'bg-yellow-500')); ?>">
                                <?php echo e(ucfirst($order->status)); ?>

                            </span>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="4" class="p-4 text-center text-gray-500">
                            No recent orders
                        </td>
                    </tr>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </tbody>
        </table>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\eyetec-new\eyetec\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>