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

    
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-900">Products</h1>
        <p class="text-gray-600 mt-1">
            Discover high-quality computers & accessories at the best prices
        </p>
    </div>

    
    <form method="GET"
          class="bg-white rounded-xl shadow-sm border p-5 mb-10
                 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 items-end">

        
        <div>
            <label class="text-xs text-gray-500 mb-1 block">Brand</label>
            <select name="brand" class="w-full border rounded-lg px-3 py-2">
                <option value="">All Brands</option>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($brand); ?>" <?php if(request('brand') == $brand): echo 'selected'; endif; ?>>
                        <?php echo e($brand); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </select>
        </div>

        
        <div>
            <label class="text-xs text-gray-500 mb-1 block">Category</label>
            <select name="category" class="w-full border rounded-lg px-3 py-2">
                <option value="">All Categories</option>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category); ?>" <?php if(request('category') == $category): echo 'selected'; endif; ?>>
                        <?php echo e($category); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </select>
        </div>

        
        <div>
            <label class="text-xs text-gray-500 mb-1 block">Sort</label>
            <select name="sort" class="w-full border rounded-lg px-3 py-2">
                <option value="">Newest</option>
                <option value="low_high" <?php if(request('sort') == 'low_high'): echo 'selected'; endif; ?>>
                    Price: Low → High
                </option>
                <option value="high_low" <?php if(request('sort') == 'high_low'): echo 'selected'; endif; ?>>
                    Price: High → Low
                </option>
            </select>
        </div>

        
        <button class="bg-red-600 hover:bg-red-700 text-white rounded-lg px-4 py-2 font-semibold">
            Apply
        </button>

        
        <a href="<?php echo e(route('products')); ?>"
           class="text-center border rounded-lg px-4 py-2 hover:bg-gray-100">
            Reset
        </a>
    </form>

    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="bg-white rounded-xl shadow hover:shadow-lg transition flex flex-col">

                
                <div class="bg-gray-100 h-[220px] flex items-center justify-center relative">
                    <img
                        src="<?php echo e($product->image && file_exists(public_path($product->image))
                            ? asset($product->image)
                            : asset('images/placeholder.png')); ?>"
                        class="w-[180px] h-[180px] object-contain"
                        alt="<?php echo e($product->product_name); ?>"
                        loading="lazy"
                    >

                    
                    <span class="absolute top-2 right-2 text-xs px-2 py-1 rounded
                        <?php echo e($product->stock > 0 ? 'bg-green-600' : 'bg-gray-400'); ?> text-white">
                        <?php echo e($product->stock > 0 ? 'In Stock' : 'Out of Stock'); ?>

                    </span>
                </div>

                
                <div class="p-4 flex flex-col flex-1">
                    <h3 class="font-semibold text-sm mb-1">
                        <?php echo e($product->product_name); ?>

                    </h3>

                    <p class="text-xs text-gray-500 mb-4 line-clamp-2">
                        <?php echo e($product->description); ?>

                    </p>

                    <div class="mt-auto flex justify-between items-center">
                        <span class="font-bold text-red-600">
                            LKR <?php echo e(number_format($product->price, 2)); ?>

                        </span>

                        <a href="<?php echo e(route('products.details', $product->id)); ?>"
                           class="bg-red-600 text-white px-3 py-1 rounded text-xs hover:bg-red-700">
                            View
                        </a>
                    </div>
                </div>

            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="col-span-full text-center text-gray-500">
                No products found.
            </p>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    </div>

    
    <div class="mt-12">
        <?php echo e($products->withQueryString()->links()); ?>

    </div>

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
<?php /**PATH C:\Users\OvinduPathirajaBISTE\Downloads\New folder (9)\eyetec\resources\views/products.blade.php ENDPATH**/ ?>