

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="bg-gray-100">

<div class="flex min-h-screen">

    
    <?php echo $__env->make('admin.partials.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    
    <div class="flex-1">
        

        <main class="p-6">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>

</div>

</body>
</html>
<?php /**PATH C:\eyetec-new\eyetec\resources\views/layouts/admin.blade.php ENDPATH**/ ?>