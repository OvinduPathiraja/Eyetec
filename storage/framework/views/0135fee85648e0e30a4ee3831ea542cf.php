<?php $__env->startSection('content'); ?>
<div class="bg-gray-50 min-h-screen">
    <div class="max-w-6xl mx-auto px-4 py-10">
        
        <div class="flex items-center justify-center gap-8 mb-10 text-sm">
            <div class="flex items-center gap-2">
                <span class="size-5 flex items-center justify-center rounded-full border border-green-500 text-green-600 font-semibold">1</span>
                <span class="text-gray-700">Cart</span>
            </div>
            <div class="h-px w-12 bg-green-400"></div>
            <div class="flex items-center gap-2">
                <span class="size-5 flex items-center justify-center rounded-full border border-green-500 text-green-600 font-semibold">2</span>
                <span class="text-gray-700">Checkout</span>
            </div>
            <div class="h-px w-12 bg-green-500"></div>
            <div class="flex items-center gap-2">
                <span class="size-5 flex items-center justify-center rounded-full bg-green-600 text-white font-semibold">3</span>
                <span class="text-gray-900 font-semibold">Order Confirmation</span>
            </div>
        </div>

        <div class="grid md:grid-cols-[2fr,1fr] gap-6">
            <div class="space-y-6">
                <div class="bg-white shadow rounded-lg p-6">
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <p class="text-sm text-green-600 font-semibold">Payment Successful</p>
                            <h1 class="text-2xl font-bold text-gray-900">Thank you for your order!</h1>
                            <p class="text-gray-600 mt-1">Order #<?php echo e($order->id); ?> has been placed successfully.</p>
                        </div>
                        <div class="bg-green-50 text-green-600 px-3 py-1 rounded-full text-sm font-semibold">
                            Paid
                        </div>
                    </div>
                </div>

                <div class="bg-white shadow rounded-lg p-6">
                    <h2 class="text-lg font-semibold mb-3">Order Details</h2>
                    <div class="divide-y divide-gray-100 text-sm">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="py-3 flex justify-between">
                                <div class="text-gray-800">
                                    <?php echo e($item->product->product_name ?? 'Item'); ?>

                                    <span class="text-xs text-gray-500">x<?php echo e($item->quantity); ?></span>
                                </div>
                                <div class="font-semibold text-gray-900">
                                    LKR <?php echo e(number_format($item->price * $item->quantity, 2)); ?>

                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <div class="py-3 flex justify-between">
                            <span class="text-gray-600">Shipping</span>
                            <span class="text-green-600 font-semibold">Free</span>
                        </div>
                        <div class="py-3 flex justify-between text-base font-semibold">
                            <span>Total Paid</span>
                            <span class="text-green-700">LKR <?php echo e(number_format($order->total, 2)); ?></span>
                        </div>
                    </div>
                </div>

                <div class="bg-white shadow rounded-lg p-6">
                    <h2 class="text-lg font-semibold mb-3">Next Steps</h2>
                    <ul class="text-sm text-gray-700 space-y-2">
                        <li>• You will receive an email confirmation shortly.</li>
                        <li>• Estimated delivery: 3-5 business days.</li>
                        <li>• Track this order from <a href="<?php echo e(route('orders.my')); ?>" class="text-red-600 hover:underline">My Orders</a>.</li>
                    </ul>
                </div>

                <div class="flex gap-3">
                    <a href="<?php echo e(route('orders.my')); ?>" class="inline-flex items-center justify-center px-5 py-3 rounded-lg bg-gray-100 text-gray-800 hover:bg-gray-200">
                        View My Orders
                    </a>
                    <a href="<?php echo e(route('products')); ?>" class="inline-flex items-center justify-center px-5 py-3 rounded-lg bg-red-600 text-white hover:bg-red-700">
                        Continue Shopping
                    </a>
                </div>
            </div>

            
            <div class="bg-white shadow rounded-lg p-6 h-fit">
                <h3 class="text-lg font-semibold mb-4">Payment Summary</h3>
                <div class="space-y-3 text-sm text-gray-700">
                    <div class="flex justify-between">
                        <span>Payment Status</span>
                        <span class="text-green-600 font-semibold"><?php echo e(ucfirst($order->status)); ?></span>
                    </div>
                    <div class="flex justify-between">
                        <span>Payment Method</span>
                        <span class="font-semibold">Online / Card</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Paid On</span>
                        <span class="font-semibold"><?php echo e($order->created_at?->format('M d, Y h:i A')); ?></span>
                    </div>
                    <div class="pt-3 border-t border-gray-200 flex justify-between text-base font-semibold">
                        <span>Total</span>
                        <span class="text-green-700">LKR <?php echo e(number_format($order->total, 2)); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\OvinduPathirajaBISTE\Downloads\New folder (9)\eyetec\resources\views/orders/success.blade.php ENDPATH**/ ?>