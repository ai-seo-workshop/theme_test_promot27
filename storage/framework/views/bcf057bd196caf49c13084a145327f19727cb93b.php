<?php $__env->startSection('title', $pageInfo->seo_title); ?>
<?php $__env->startSection('description', $pageInfo->seo_desc); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="/css/page.css?v=1.2">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="hero-section py-5">
    <div class="container text-center">
        <h1><?php echo e(data_get(data_get(data_get(\App\Models\MaterielTask::SUPPORTS(app()->getLocale()), []), $pageInfo->type, []), 'name', '')); ?></h1>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="page-content">
                <?php echo $pageInfo->content; ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Library/WebServer/Documents/work/php/blog_techlysupport_site/resources/views/page.blade.php ENDPATH**/ ?>