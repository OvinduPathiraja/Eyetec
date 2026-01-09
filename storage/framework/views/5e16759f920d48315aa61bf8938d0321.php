

<?php $__env->startSection('content'); ?>
<div class="max-w-6xl mx-auto px-4 py-8">

    <h1 class="text-2xl font-bold mb-6">Your Cart</h1>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$cart || $cart->items->isEmpty()): ?>
        <div class="bg-white p-6 rounded-lg shadow text-center">
            <p class="text-gray-600">Your cart is empty.</p>

            <a href="<?php echo e(route('products')); ?>"
               class="inline-block mt-4 bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded">
                Continue Shopping
            </a>
        </div>
    <?php else: ?>

    
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="p-4">Product</th>
                    <th class="p-4">Price</th>
                    <th class="p-4">Quantity</th>
                    <th class="p-4">Subtotal</th>
                    <th class="p-4"></th>
                </tr>
            </thead>

            <tbody>
                <?php $total = 0; ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $cart->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $subtotal = $item->price * $item->quantity;
                        $total += $subtotal;
                    ?>

                    <tr class="border-t hover:bg-gray-50">

                        
                        <td class="p-4 flex items-center gap-4">
                            <img
                                src="<?php echo e($item->product && $item->product->image && file_exists(public_path($item->product->image))
                                    ? asset($item->product->image)
                                    : asset('images/placeholder.png')); ?>"
                                class="w-16 h-16 object-cover rounded"
                                alt="Product image">

                            <div>
                                <p class="font-semibold">
                                    <?php echo e($item->product->product_name ?? 'Product removed'); ?>

                                </p>
                            </div>
                        </td>

                        
                        <td class="p-4">
                            LKR <?php echo e(number_format($item->price, 2)); ?>

                        </td>

                        
                        <td class="p-4">
                            <form method="POST"
                                  action="<?php echo e(route('cart.update', $item)); ?>">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PATCH'); ?>

                                <input type="number"
                                       name="quantity"
                                       min="1"
                                       max="<?php echo e($item->product->stock ?? 1); ?>"
                                       value="<?php echo e($item->quantity); ?>"
                                       class="w-20 border rounded px-2 py-1"
                                       onchange="this.form.submit()">
                            </form>
                        </td>

                        
                        <td class="p-4 font-semibold">
                            LKR <?php echo e(number_format($subtotal, 2)); ?>

                        </td>

                        
                        <td class="p-4">
                            <form method="POST"
                                  action="<?php echo e(route('cart.remove', $item)); ?>"
                                  onsubmit="return confirm('Remove this item from cart?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>

                                <button class="text-red-600 hover:underline">
                                    Remove
                                </button>
                            </form>
                        </td>

                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </tbody>
        </table>
    </div>

    
    <div class="mt-6 flex justify-end">
        <div class="bg-white p-6 rounded-lg shadow w-80">
            <div class="flex justify-between mb-2 text-lg">
                <span>Total</span>
                <span class="font-bold">
                    LKR <?php echo e(number_format($total, 2)); ?>

                </span>
            </div>

            <a href="<?php echo e(route('checkout.index')); ?>"
               class="block mt-4 bg-green-600 hover:bg-green-700 text-white text-center py-2 rounded">
                Proceed to Checkout
            </a>
        </div>
    </div>

    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\OvinduPathirajaBISTE\Downloads\New folder (9)\eyetec\resources\views/cart/index.blade.php ENDPATH**/ ?>