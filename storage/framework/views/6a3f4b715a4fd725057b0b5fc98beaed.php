<?php if (isset($component)) { $__componentOriginal69dc84650370d1d4dc1b42d016d7226b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b = $attributes; } ?>
<?php $component = App\View\Components\GuestLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\GuestLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<div class="bg-gray-50 min-h-screen">

<div class="max-w-7xl mx-auto px-4 py-10">

    
    <nav class="text-sm text-gray-500 mb-6">
        <a href="<?php echo e(route('products')); ?>" class="hover:text-red-600">Products</a>
        <span class="mx-2">/</span>
        <span class="text-gray-700"><?php echo e($product->product_name); ?></span>
    </nav>

    
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 bg-white p-6 rounded-xl shadow">

        
        <div class="bg-gray-100 rounded-xl flex items-center justify-center h-[420px]">
            <img
                src="<?php echo e($product->image && file_exists(public_path($product->image))
                    ? asset($product->image)
                    : asset('images/placeholder.png')); ?>"
                class="w-[320px] h-[320px] object-contain"
                width="320"
                height="320"
                loading="lazy"
                alt="<?php echo e($product->product_name); ?>"
            />
        </div>

        
        <div class="flex flex-col">

            <h1 class="text-2xl font-bold mb-2">
                <?php echo e($product->product_name); ?>

            </h1>

            <p class="text-gray-500 text-sm mb-4">
                Brand: <span class="font-medium"><?php echo e($product->brand_name); ?></span>
            </p>

            
            <div class="text-3xl font-bold text-red-600 mb-4">
                LKR <?php echo e(number_format($product->price, 2)); ?>

            </div>

            
            <span class="inline-block w-fit text-xs px-3 py-1 rounded mb-6
                <?php echo e($product->stock > 0 ? 'bg-green-600' : 'bg-gray-400'); ?> text-white">
                <?php echo e($product->stock > 0 ? 'In Stock' : 'Out of Stock'); ?>

            </span>

            
            <p class="text-gray-600 text-sm leading-relaxed mb-8">
                <?php echo e($product->description); ?>

            </p>

            <form method="POST" action="<?php echo e(route('cart.add', $product->id)); ?>" class="space-y-3">
                <?php echo csrf_field(); ?>

                <label class="block text-sm font-semibold">Quantity</label>
                <input type="number"
                    name="quantity"
                    min="1"
                    max="<?php echo e($product->stock); ?>"
                    value="1"
                    class="border rounded px-3 py-2 w-24"
                    required>

                <button class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700">
                    Add to Cart
                </button>
            </form>


        </div>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($relatedProducts->count()): ?>
    <div class="mt-14">
        <h2 class="text-xl font-bold mb-6">Related Products</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $relatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('products.details', $item->id)); ?>"
               class="bg-white border rounded-xl p-4 hover:shadow transition block">

                <div class="h-[160px] bg-gray-100 flex items-center justify-center mb-3 rounded">
                    <img
                        src="<?php echo e($item->image && file_exists(public_path($item->image))
                            ? asset($item->image)
                            : asset('images/placeholder.png')); ?>"
                        class="w-[120px] h-[120px] object-contain"
                        width="120"
                        height="120"
                    /> 
                </div>

                <h3 class="text-sm font-semibold mb-1">
                    <?php echo e($item->product_name); ?>

                </h3>

                <span class="text-red-600 font-bold text-sm">
                    LKR <?php echo e(number_format($item->price, 2)); ?>

                </span>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

</div>
</div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $attributes = $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $component = $__componentOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?>
<?php /**PATH C:\Users\OvinduPathirajaBISTE\Downloads\New folder (9)\eyetec\resources\views/products-details-page.blade.php ENDPATH**/ ?>