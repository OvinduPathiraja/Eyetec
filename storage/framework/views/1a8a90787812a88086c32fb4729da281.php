<nav class="bg-white border-b">
    <div class="max-w-7xl mx-auto px-4 py-3 flex items-center">

        
        <div class="flex items-center">
            <a href="<?php echo e(route('home')); ?>">
                <img src="<?php echo e(asset('images/products/logo/Logo.png')); ?>" alt="Eyetec" class="h-8 w-auto object-contain" />
            </a>
        </div>

        
        <div class="flex-1 flex items-center justify-center gap-6 text-sm">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->check() && auth()->user()->role === 'admin'): ?>
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="hover:text-red-600">
                Dashboard
            </a>

            <a href="<?php echo e(route('admin.blogs.index')); ?>" class="hover:text-red-600">
                Manage Blogs
            </a>
            <?php else: ?>
            <a href="<?php echo e(route('products')); ?>" class="hover:text-red-600 font-bold">
                Products
            </a>

            <a href="<?php echo e(route('blogs.index')); ?>" class="hover:text-red-600 font-bold">
                Blog
            </a>

            <a href="<?php echo e(route('about')); ?>" class="hover:text-red-600 font-bold">
                About
            </a>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        
        <div class="flex items-center gap-4 text-sm">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
            <a href="<?php echo e(route('cart.index')); ?>" class="hover:text-red-600">
                Cart
            </a>

            <a href="<?php echo e(route('orders.my')); ?>" class="hover:text-red-600">
                My Orders
            </a>

            <?php if(auth()->user()->role === 'admin'): ?>
            <a href="<?php echo e(route('admin.dashboard')); ?>"
                class="text-red-600 font-semibold">
                Admin
            </a>

            <a href="<?php echo e(route('admin.blogs.index')); ?>" class="hover:text-red-600">
                Manage Blogs
            </a>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <a href="<?php echo e(url('/user/profile')); ?>" class="hover:text-red-600">
                Profile
            </a>

            
            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button class="hover:text-red-600">
                    Logout
                </button>
            </form>
            <?php else: ?>
            <a href="<?php echo e(route('login')); ?>" class="hover:text-red-600">
                Login
            </a>

            <a href="<?php echo e(route('register')); ?>"
                class="bg-red-600 text-white px-3 py-1 rounded">
                Register
            </a>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</nav><?php /**PATH C:\eyetec-new\eyetec\resources\views/components/navigation.blade.php ENDPATH**/ ?>