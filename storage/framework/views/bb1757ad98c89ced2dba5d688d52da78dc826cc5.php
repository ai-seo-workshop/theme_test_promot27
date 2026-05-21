<?php $__env->startSection('title', $seoInfo->seo_title ?? ''); ?>
<?php $__env->startSection('description', $seoInfo->seo_desc ?? ''); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="/css/home.css?v=1.0">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<div class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-4">
                <h1>Know the Festival. <br>Nail the Celebration</h1>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <p>Learn the stories and meanings behind global festivals, then turn inspiration into action<br>
                    with party decor, family activities, tasty recipes, and thoughtful gifts.</p>
            </div>
        </div>
    </div>
</div>

<div class="container mb-5">
    
    <?php if($hotBlogs->isNotEmpty()): ?>
    <section class="mb-5">
        <div class="row">
            <div class="col-lg-6 mb-4">
                <?php $firstPost = $hotBlogs->first(); ?>
                <div class="blog-card featured-card">
                    <a href="<?php echo e($firstPost->url); ?>" class="text-decoration-none">
                        <div class="blog-card-img-wrapper" style="height: 400px;">
                            <img src="<?php echo e($firstPost->head_img); ?>" alt="<?php echo e($firstPost->head_img_alt ?? $firstPost->title); ?>">
                            <div class="blog-card-overlay">
                                <div class="category">
                                    <span class="blog-card-badge"><?php echo e($firstPost->category_name); ?></span>
                                    <small class="card-date"><?php echo e($firstPost->published_at->format('d M Y')); ?></small>
                                </div>
                                <p class="h4 mb-2"><?php echo e($firstPost->title); ?></p>
                                <p class="small mb-0"><?php echo e($firstPost->summary); ?></p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="row">
                    <?php $__currentLoopData = $hotBlogs->skip(1)->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotBlog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-12 mb-3">
                        <a href="<?php echo e($hotBlog->url); ?>" class="text-decoration-none">
                            <div class="d-flex align-items-center rounded-3 p-3 hover-shadow top-card">
                                <img src="<?php echo e($hotBlog->head_img); ?>" alt="<?php echo e($hotBlog->head_img_alt ?? $hotBlog->title); ?>" class="rounded me-3">
                                <div class="flex-grow-1">
                                    <div>
                                        <span class="badge <?php echo Arr::random(['bg-success', 'bg-info', 'bg-primary', 'bg-danger', 'bg-warning']); ?>  mb-2"><?php echo e($hotBlog->category_name); ?></span>
                                        <small class="text-muted card-date"><?php echo e($hotBlog->published_at->format('d M Y')); ?></small>
                                    </div>
                                    <p class="h6 mb-1 text-dark little-card-desc"><?php echo e($hotBlog->title); ?></p>

                                </div>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    
    <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryId => $categoryBlogs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            // 直接通过 keyBy 后的索引访问，O(1) 复杂度，不触发查询
            $category = $categories[$categoryId] ?? null;
        ?>
        <?php if($category): ?>
        <section class="mb-5">
            <h2 class="section-title"><?php echo e($category->name); ?></h2>

            <div class="row mb-4">
                
                <?php $__currentLoopData = $categoryBlogs->take(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-6 mb-4">
                    <div class="blog-card">
                        <a href="<?php echo e($blog->url); ?>" class="text-decoration-none">
                            <div class="blog-card-img-wrapper" style="height: 300px;">
                                <img src="<?php echo e($blog->head_img); ?>" alt="<?php echo e($blog->head_img_alt ?? $blog->title); ?>">
                                <div class="blog-card-overlay">
                                    <div class="category">
                                        <span class="blog-card-badge"><?php echo e($firstPost->category_name); ?></span>
                                        <small class="card-date"><?php echo e($firstPost->published_at->format('d M Y')); ?></small>
                                    </div>
                                    <p class="h5 mb-2"><?php echo e($blog->title); ?></p>
                                    <p class="small mb-0"><?php echo e($blog->summary); ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            
            <?php if($categoryBlogs->count() > 2): ?>
            <div class="row">
                <?php $__currentLoopData = $categoryBlogs->skip(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <article class="blog-card" itemscope itemtype="https://schema.org/BlogPosting">
                        <a href="<?php echo e($blog->url); ?>" class="text-decoration-none">
                            <div class="blog-card-img-wrapper">
                                <img src="<?php echo e($blog->head_img); ?>" alt="<?php echo e($blog->head_img_alt ?? $blog->title); ?>" itemprop="image">
                            </div>
                            <div class="blog-card-body">
                                <div class="category">
                                    <span class="blog-card-badge"><?php echo e($firstPost->category_name); ?></span>
                                    <small class="card-date"><?php echo e($firstPost->published_at->format('d M Y')); ?></small>
                                </div>
                                <p class="blog-card-title" itemprop="headline"><?php echo e($blog->title); ?></p>
                                <p class="blog-card-text" itemprop="description"><?php echo e($blog->summary); ?></p>
                            </div>
                        </a>
                    </article>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php endif; ?>
        </section>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    
    <?php if($latestBlogs->isNotEmpty()): ?>
    <section class="mb-5">
        <p class="section-title">Latest Post</p>
        <div class="row">
            <?php $__currentLoopData = $latestBlogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $latestBlog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-6 mb-3">
                <a href="<?php echo e($latestBlog->url); ?>" class="text-decoration-none">
                    <div class="align-items-center border rounded-3 p-3 hover-shadow">
                        <div class="latest-card">
                            <span class="badge bg-warning text-dark me-3"><?php echo e($latestBlog->category_name); ?></span>
                            <small class="text-muted"><?php echo e($latestBlog->published_at->format('d M Y')); ?></small>
                        </div>
                        <div class="h6 mb-0 text-dark"><?php echo e($latestBlog->title); ?></div>
                    </div>
                </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Library/WebServer/Documents/work/php/template2/resources/views/home.blade.php ENDPATH**/ ?>