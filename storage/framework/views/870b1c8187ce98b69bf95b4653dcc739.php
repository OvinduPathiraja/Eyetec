

<?php $__env->startSection('content'); ?>
<div class="max-w-4xl mx-auto p-8">
    <h1 class="text-2xl font-bold mb-4">Checkout</h1>

    <p>Items in cart: <?php echo e($cart->items->count()); ?></p>

    <form method="POST" action="<?php echo e(route('checkout.place')); ?>">
        <?php echo csrf_field(); ?>
        <button class="bg-green-600 text-white px-6 py-2 rounded">
            Place Order
        </button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\OvinduPathirajaBISTE\Downloads\New folder (9)\eyetec\resources\views/checkout/index.blade.php ENDPATH**/ ?>