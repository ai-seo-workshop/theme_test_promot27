<?php $__env->startSection('content'); ?>
<div class="hero-section py-5">
    <div class="container text-center">
        <h1><?php echo e($pageTitle ?? 'Page'); ?></h1>
        <p><?php echo e($pageDescription ?? ''); ?></p>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="page-content">
                <?php echo $__env->yieldContent('page-content'); ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
    .page-content {
        background: white;
        padding: 3rem;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }
    
    .page-content h2 {
        color: var(--primary-purple);
        font-weight: 600;
        margin-top: 2rem;
        margin-bottom: 1rem;
    }
    
    .page-content h3 {
        color: var(--dark-gray);
        font-weight: 600;
        margin-top: 1.5rem;
        margin-bottom: 0.8rem;
    }
    
    .page-content p {
        line-height: 1.8;
        margin-bottom: 1.5rem;
    }
    
    .page-content ul,
    .page-content ol {
        margin-bottom: 1.5rem;
        padding-left: 2rem;
    }
    
    .page-content li {
        margin-bottom: 0.5rem;
    }
    
    @media (max-width: 768px) {
        .page-content {
            padding: 2rem 1.5rem;
        }
    }
</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/donghuijiao/Downloads/template2 3/resources/views/page.blade.php ENDPATH**/ ?>