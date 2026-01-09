<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo e(config('app.name', 'Eyetec Computers')); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="bg-gray-50 text-gray-900">


<!-- <nav class="bg-white border-b shadow-sm">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
        <a href="<?php echo e(route('home')); ?>" class="text-xl font-bold text-red-600">
            Eyetec Computers
        </a>

        <div class="flex gap-4 text-sm">
            <a href="<?php echo e(route('products')); ?>" class="hover:text-red-600">Products</a>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
                <a href="<?php echo e(route('dashboard')); ?>" class="hover:text-red-600">Dashboard</a>

                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button class="hover:text-red-600">Logout</button>
                </form>
            <?php else: ?>
                <a href="<?php echo e(route('login')); ?>" class="hover:text-red-600">Login</a>
                <a href="<?php echo e(route('register')); ?>" class="hover:text-red-600">Register</a>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</nav> -->

<?php echo $__env->make('components.navigation', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo e($slot); ?>


<!-- 

<main class="min-h-screen">
    <?php echo e($slot); ?>

</main> -->


<footer class="bg-white border-t mt-16">
    <div class="max-w-7xl mx-auto px-4 py-6 text-sm text-gray-500 text-center">
        © <?php echo e(date('Y')); ?> Eyetec Computers. All rights reserved.
    </div>
</footer>

</body>
</html>
<?php /**PATH C:\eyetec-new\eyetec\resources\views/layouts/guest.blade.php ENDPATH**/ ?>