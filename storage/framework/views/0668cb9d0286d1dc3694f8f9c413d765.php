

<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto py-10 px-4">

    
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900">
            Orders Management
        </h1>
        <p class="text-sm text-gray-500">
            View and manage all customer orders
        </p>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
        <div class="mb-4 bg-green-100 text-green-700 px-4 py-2 rounded">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <div class="bg-white rounded-xl shadow overflow-x-auto">
        <table class="w-full text-sm text-left">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="p-3">Order ID</th>
                    <th class="p-3">Customer</th>
                    <th class="p-3">Total</th>
                    <th class="p-3">Status</th>
                    <th class="p-3 text-center">Items</th>
                    <th class="p-3">Action</th>
                </tr>
            </thead>

            <tbody>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                
                <tr class="border-t hover:bg-gray-50 align-top">
                    <td class="p-3 font-medium">
                        #<?php echo e($order->id); ?>

                    </td>

                    <td class="p-3">
                        <?php echo e($order->user->name ?? $order->user->email); ?>

                    </td>

                    <td class="p-3 font-semibold text-red-600">
                        LKR <?php echo e(number_format($order->total, 2)); ?>

                    </td>

                    <td class="p-3">
                        <span class="px-2 py-1 rounded text-xs font-semibold text-white
                            <?php echo e($order->status === 'paid' ? 'bg-green-600' : ''); ?>

                            <?php echo e($order->status === 'pending' ? 'bg-yellow-500' : ''); ?>

                            <?php echo e($order->status === 'cancelled' ? 'bg-gray-500' : ''); ?>">
                            <?php echo e(ucfirst($order->status)); ?>

                        </span>
                    </td>

                    <td class="p-3 text-center font-semibold">
                        <?php echo e($order->items->count()); ?>

                    </td>

                    <td class="p-3">
                        <form method="POST"
                              action="<?php echo e(route('admin.orders.status', $order)); ?>"
                              class="flex items-center gap-2">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>

                            <select name="status"
                                    class="border rounded px-2 py-1 text-xs">
                                <option value="pending" <?php if($order->status === 'pending'): echo 'selected'; endif; ?>>
                                    Pending
                                </option>
                                <option value="paid" <?php if($order->status === 'paid'): echo 'selected'; endif; ?>>
                                    Paid
                                </option>
                                <option value="cancelled" <?php if($order->status === 'cancelled'): echo 'selected'; endif; ?>>
                                    Cancelled
                                </option>
                            </select>

                            <button
                                class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-xs">
                                Update
                            </button>
                        </form>
                    </td>
                </tr>

                
                <tr>
                    <td colspan="6" class="bg-gray-50 px-6 py-4 text-xs text-gray-700">
                        <div class="space-y-1">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div>
                                    <span class="font-semibold">
                                        <?php echo e($item->product->product_name ?? 'Product Deleted'); ?>

                                    </span>
                                    × <?php echo e($item->quantity); ?>

                                    — LKR <?php echo e(number_format($item->price, 2)); ?>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </td>
                </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="6" class="p-6 text-center text-gray-500">
                        No orders found.
                    </td>
                </tr>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </tbody>
        </table>
    </div>

    
    <div class="mt-8">
        <?php echo e($orders->links()); ?>

    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\eyetec-new\eyetec\resources\views/admin/orders/index.blade.php ENDPATH**/ ?>