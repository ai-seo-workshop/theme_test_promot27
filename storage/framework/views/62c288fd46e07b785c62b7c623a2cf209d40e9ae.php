<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found | Celebrate FEST NOW</title>
    
    <link rel="stylesheet" href="/css/all.min.css?v=1.0">
    <link rel="stylesheet" href="/css/custom-404.css?v=2.0">
</head>
<body>
    <div class="error-container">
        <div class="error-icon">
            <i class="fas fa-gift"></i>
        </div>
        <h1 class="error-code">404</h1>
        <h2 class="error-message">Oops! Page Not Found</h2>
        <p class="error-description">
            The page you're looking for doesn't exist or has been moved.<br>
            Let's get you back to celebrating!
        </p>
        <a href="<?php echo e(app()->getLocale() === 'en' ? route('home') : route('home.localized', ['locale' => app()->getLocale()])); ?>" class="btn-home">
            <i class="fas fa-home me-2"></i> Back to Home
        </a>

        <?php if(isset($categories) && $categories->isNotEmpty()): ?>
        <div class="mt-5">
            <p class="mb-3">Or explore our popular categories:</p>
            <div class="d-flex justify-content-center flex-wrap gap-2">
                <?php $__currentLoopData = $categories->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e($category->url); ?>" class="btn btn-outline-light btn-sm">
                    <?php echo e($category->name); ?>

                </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>
<?php /**PATH /Users/donghuijiao/Downloads/blog_howencyclopedia_site/resources/views/errors/404.blade.php ENDPATH**/ ?>