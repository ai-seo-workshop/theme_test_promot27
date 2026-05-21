<div class="row">
    <?php $__empty_1 = true; $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="col-lg-4 col-md-6 mb-4">
        <article class="blog-card article-list" itemscope itemtype="https://schema.org/BlogPosting">
            <a href="<?php echo e($blog->url); ?>" class="text-decoration-none">
                <div class="blog-card-img-wrapper">
                    <img src="<?php echo e($blog->head_img); ?>" alt="<?php echo e($blog->head_img_alt ?? $blog->title); ?>" itemprop="image">
                </div>
                <div class="blog-card-body">
                    <p class="blog-card-title" itemprop="headline"><?php echo e($blog->title); ?></p>
                    <p class="blog-card-text" itemprop="description"><?php echo e($blog->summary); ?></p>
                </div>
                <div class="blog-card-footer">
                    <span><i class="far fa-calendar"></i> <?php echo e($blog->published_at->format('d M Y')); ?></span>
                </div>
            </a>
        </article>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <div class="col-12">
        <div class="alert alert-info text-center">
            <i class="fas fa-info-circle"></i> No articles found in this category yet.
        </div>
    </div>
    <?php endif; ?>
</div>
<?php /**PATH /Library/WebServer/Documents/work/php/template2/resources/views/partials/article-list.blade.php ENDPATH**/ ?>