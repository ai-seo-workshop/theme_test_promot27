<div class="article-list category-card-second">
    <?php $__empty_1 = true; $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="col-lg-4 col-md-6 mb-4">
            <article class="blog-card" itemscope itemtype="https://schema.org/BlogPosting">
                <div class="blog-card-img-wrapper">
                    <img src="<?php echo e($blog->head_img); ?>" alt="<?php echo e($blog->head_img_alt ?? $blog->title); ?>" itemprop="image">
                </div>
                <div class="blog-card-body">
                    <div class="category right-card-2">
                        <span class="meta-item">
                            <i class="far fa-user"></i> <?php echo e(\App\Models\MaterielTask::by(app()->getLocale())); ?>

                            <span itemprop="author"><?php echo e($hotBlog->author); ?></span>
                        </span>
                        <span class="meta-item">
                            <i class="far fa-calendar"></i> <?php echo e(\App\Models\MaterielTask::detailPublished(app()->getLocale())); ?>

                            <time itemprop="datePublished" datetime="<?php echo e($hotBlog->published_at->toIso8601String()); ?>">
                                <?php echo e($hotBlog->published_at->format('Y-m-d')); ?>

                            </time>
                        </span>
                    </div>
                    <a href="<?php echo e($blog->url); ?>" class="text-decoration-none">
                        <p class="blog-card-title" itemprop="headline"><?php echo e($blog->title); ?></p>
                    </a>
                    <p class="blog-card-text" itemprop="description"><?php echo e($blog->summary); ?></p>
                </div>
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
<?php /**PATH /Library/WebServer/Documents/work/php/blog_howencyclopedia_site/resources/views/partials/article-list.blade.php ENDPATH**/ ?>