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

        
        <section class="relative overflow-hidden bg-cover bg-center text-white" style="background-image: url('<?php echo e(asset('images/products/images/banner.png')); ?>');">
            <div class="absolute inset-0 bg-black/40"></div>

            <div class="relative max-w-7xl mx-auto px-6 py-16 md:py-20">
                <div class="max-w-2xl mx-auto text-center">
                    <p class="text-sm uppercase tracking-[0.2em] text-rose-200">EyeTec Computers</p>
                    <h1 class="mt-4 text-4xl md:text-5xl font-extrabold leading-tight">
                        Welcome to <span class="text-rose-300">EyeTec Computers</span>
                    </h1>
                    <p class="mt-4 text-lg text-slate-200">
                        Enhance your setup with premium accessories, quick delivery, and unbeatable value.
                    </p>

                    <div class="mt-8 flex flex-wrap justify-center gap-4">
                        <a href="<?php echo e(route('products')); ?>"
                            class="bg-rose-500 hover:bg-rose-600 text-white px-6 py-3 rounded-lg font-semibold shadow-lg shadow-rose-900/30">
                            Shop Now
                        </a>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->guest()): ?>
                        <a href="<?php echo e(route('login')); ?>"
                            class="border border-white/40 text-white px-6 py-3 rounded-lg hover:bg-white/10">
                            Login
                        </a>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            </div>
        </section>

        
        <section class="max-w-7xl mx-auto px-6 py-14">
            <div class="text-center mb-10">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Featured Products</h2>
                <p class="text-gray-600 mt-2">
                    Explore our top selling computer products and accessories
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $featuredProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="bg-white rounded-xl shadow-sm hover:shadow-lg transition flex flex-col">
                    <div class="bg-gray-100 h-44 flex items-center justify-center">
                        <img
                            src="<?php echo e($product->image && file_exists(public_path($product->image))
                                    ? asset($product->image)
                                    : asset('images/placeholder.png')); ?>"
                            class="h-28 w-28 object-contain"
                            alt="<?php echo e($product->product_name); ?>"
                            loading="lazy">
                    </div>

                    <div class="p-4 flex flex-col flex-1">
                        <h3 class="font-semibold text-sm text-gray-900">
                            <?php echo e($product->product_name); ?>

                        </h3>
                        <p class="text-xs text-gray-500 mt-2 line-clamp-2">
                            <?php echo e($product->description); ?>

                        </p>

                        <div class="mt-4 flex items-center justify-between">
                            <span class="text-rose-600 font-bold text-sm">
                                LKR <?php echo e(number_format($product->price, 2)); ?>

                            </span>
                            <a href="<?php echo e(route('products.details', $product->id)); ?>"
                                class="text-xs text-rose-600 hover:text-rose-700 font-semibold">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="col-span-full text-center text-gray-500">
                    No featured products available.
                </p>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </section>

        
        <section class="bg-gray-100">
            <div class="max-w-7xl mx-auto px-6 py-14">
                <div class="text-center mb-10">
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900">
                        Why Choose Eyetec Computers?
                    </h2>
                    <p class="text-gray-600 mt-2">
                        Experience our best selling computers and accessories
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="bg-white rounded-xl p-6 shadow-sm text-center">
                        <div class="flex justify-center mb-4">
                            <img src="<?php echo e(asset('images/products/icons/dollar.webp')); ?>" alt="Affordable Prices" class="w-12 h-12">
                        </div>
                        <h3 class="font-semibold text-gray-900">Affordable Prices</h3>
                        <p class="text-sm text-gray-600 mt-2">
                            Competitive pricing across all our products and accessories.
                        </p>
                    </div>

                    <div class="bg-white rounded-xl p-6 shadow-sm text-center">
                        <div class="flex justify-center mb-4">
                            <img src="<?php echo e(asset('images/products/icons/delivery.webp')); ?>" alt="Fast Delivery" class="w-12 h-12">
                        </div>
                        <h3 class="font-semibold text-gray-900">Fast Delivery</h3>
                        <p class="text-sm text-gray-600 mt-2">
                            Quick and reliable shipping to your doorstep.
                        </p>
                    </div>

                    <div class="bg-white rounded-xl p-6 shadow-sm text-center">
                        <div class="flex justify-center mb-4">
                            <img src="<?php echo e(asset('images/products/icons/warranty.webp')); ?>" alt="Warranty Support" class="w-12 h-12">
                        </div>
                        <h3 class="font-semibold text-gray-900">Warranty Support</h3>
                        <p class="text-sm text-gray-600 mt-2">
                            Comprehensive warranty and dedicated customer support.
                        </p>
                    </div>

                    <div class="bg-white rounded-xl p-6 shadow-sm text-center">
                        <div class="flex justify-center mb-4">
                            <img src="<?php echo e(asset('images/products/icons/brand.webp')); ?>" alt="Trusted Brand" class="w-12 h-12">
                        </div>
                        <h3 class="font-semibold text-gray-900">Trusted Brand</h3>
                        <p class="text-sm text-gray-600 mt-2">
                            Industry-leading reputation and customer satisfaction.
                        </p>
                    </div>
                </div>
            </div>
        </section>

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
<?php endif; ?><?php /**PATH C:\eyetec-new\eyetec\resources\views/welcome.blade.php ENDPATH**/ ?>