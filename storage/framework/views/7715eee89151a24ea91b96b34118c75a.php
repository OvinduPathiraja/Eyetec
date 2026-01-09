<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<div class="max-w-4xl mx-auto py-10">

<form method="POST"
      enctype="multipart/form-data"
      action="<?php echo e(isset($blog)
        ? route('admin.blogs.update',$blog)
        : route('admin.blogs.store')); ?>">

<?php echo csrf_field(); ?>
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($blog)): ?> <?php echo method_field('PUT'); ?> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<input name="title" placeholder="Title"
       class="w-full border p-2 mb-4"
       value="<?php echo e($blog->title ?? ''); ?>">

<textarea name="content"
          class="w-full border p-2 h-40 mb-4">
<?php echo e($blog->content ?? ''); ?>

</textarea>

<select name="status" class="border p-2 mb-4">
    <option value="published" <?php echo e(($blog->is_published ?? true) ? 'selected' : ''); ?>>Published</option>
    <option value="draft" <?php echo e(isset($blog) && !$blog->is_published ? 'selected' : ''); ?>>Draft</option>
</select>

<div class="mb-4">
    <label class="block text-sm font-semibold mb-1">Image</label>
    <input type="file" name="image" class="border p-2 w-full">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($blog?->image)): ?>
        <div class="mt-2">
            <img src="<?php echo e(asset($blog->image)); ?>" alt="Blog image" class="h-24 rounded">
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>

<button class="bg-red-600 text-white px-6 py-2 rounded mt-4">
Save
</button>

</form>

</div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\Users\OvinduPathirajaBISTE\Downloads\New folder (9)\eyetec\resources\views/admin/blogs/create.blade.php ENDPATH**/ ?>