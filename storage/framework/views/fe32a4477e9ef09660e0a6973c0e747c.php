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

        
        <section class="bg-white">
            <div class="max-w-7xl mx-auto px-6 py-16 text-center">
                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900">
                    Welcome to <span class="text-red-600">Eyetec Computers</span>
                </h1>

                <p class="mt-4 text-gray-600 text-lg">
                    Computers, accessories & tech essentials at the best prices
                </p>

                <div class="mt-8 flex justify-center gap-4">
                    <a href="<?php echo e(route('products')); ?>"
                       class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-semibold">
                        Browse Products
                    </a>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->guest()): ?>
                        <a href="<?php echo e(route('login')); ?>"
                           class="border border-gray-300 px-6 py-3 rounded-lg hover:bg-gray-100">
                            Login
                        </a>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </section>

        
        <section class="max-w-7xl mx-auto px-6 py-16 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-xl shadow text-center">
                <h3 class="font-bold text-lg mb-2">Affordable Prices</h3>
                <p class="text-gray-600 text-sm">Best deals on quality products</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow text-center">
                <h3 class="font-bold text-lg mb-2">Fast Checkout</h3>
                <p class="text-gray-600 text-sm">Simple prototype checkout flow</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow text-center">
                <h3 class="font-bold text-lg mb-2">Admin Management</h3>
                <p class="text-gray-600 text-sm">Manage products & orders easily</p>
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
<?php endif; ?>
<?php /**PATH C:\Users\OvinduPathirajaBISTE\Downloads\New folder (9)\eyetec\resources\views/welcome.blade.php ENDPATH**/ ?>