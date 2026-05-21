<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="/css/custom-404.css?v=1.2">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="error-container">
        <h1 class="error-code">404</h1>
        <h2 class="error-message"><?php echo e(\App\Models\MaterielTask::page_not_found(app()->getLocale())); ?></h2>
        <p class="error-description">
            <?php echo e(\App\Models\MaterielTask::desc_1_404(app()->getLocale())); ?><br>
            <?php echo e(\App\Models\MaterielTask::desc_2_404(app()->getLocale())); ?>

        </p>
        <a href="<?php echo e(app()->getLocale() === 'en' ? route('home') : route('home.localized', ['locale' => app()->getLocale()])); ?>" class="btn-home">
            <i class="fas fa-home me-2"></i> <?php echo e(\App\Models\MaterielTask::go_to_homepage(app()->getLocale())); ?>

        </a>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Library/WebServer/Documents/work/php/blog_techlysupport_site/resources/views/errors/404.blade.php ENDPATH**/ ?>