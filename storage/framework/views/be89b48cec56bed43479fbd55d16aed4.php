

<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto py-10 px-4">

    <div class="flex justify-between mb-6">
        <h1 class="text-2xl font-bold">Manage Blogs</h1>

        <a href="<?php echo e(route('admin.blogs.create')); ?>"
            class="bg-red-600 text-white px-4 py-2 rounded">
            + New Blog
        </a>
    </div>

    <table class="w-full bg-white rounded shadow text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-3">Image</th>
                <th class="p-3">Title</th>
                <th class="p-3">Status</th>
                <th class="p-3">Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="border-t">
                <td class="p-3">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($blog->image): ?>
                    <img src="<?php echo e(asset($blog->image)); ?>" alt="Blog image" class="h-12 w-16 object-cover rounded">
                    <?php else: ?>
                    <span class="text-gray-400">—</span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </td>
                <td class="p-3"><?php echo e($blog->title); ?></td>
                <td class="p-3">
                    <?php echo e($blog->is_published ? 'Published' : 'Draft'); ?>

                </td>
                <td class="p-3 flex gap-3">
                    <a href="<?php echo e(route('admin.blogs.edit', $blog)); ?>" class="text-blue-600">Edit</a>

                    <form method="POST" action="<?php echo e(route('admin.blogs.destroy', $blog)); ?>">
                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                        <button class="text-red-600">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </tbody>
    </table>

    <div class="mt-6">
        <?php echo e($blogs->links()); ?>

    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\eyetec-new\eyetec\resources\views/admin/blogs/index.blade.php ENDPATH**/ ?>