<nav class="bg-white border-b">
    <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">

        
        <a href="<?php echo e(route('home')); ?>" class="font-bold text-xl text-red-600">
            Eyetec
        </a>

        
        <div class="flex items-center gap-6 text-sm">

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->check() && auth()->user()->role === 'admin'): ?>
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="hover:text-red-600">
                    Dashboard
                </a>

                <a href="<?php echo e(route('admin.blogs.index')); ?>" class="hover:text-red-600">
                    Manage Blogs
                </a>
            <?php else: ?>
                <a href="<?php echo e(route('products')); ?>" class="hover:text-red-600">
                    Products
                </a>

                <a href="<?php echo e(route('blogs.index')); ?>" class="hover:text-red-600">
                    Blog
                </a>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

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
</nav>
<?php /**PATH C:\Users\OvinduPathirajaBISTE\Downloads\New folder (9)\eyetec\resources\views/components/navigation.blade.php ENDPATH**/ ?>