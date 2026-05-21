<?php $__env->startSection('title', $seoInfo->seo_title); ?>
<?php $__env->startSection('description', $seoInfo->seo_desc); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="/css/home.css?v=1.2">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<div class="hero-section">
    <div class="container">
        <div class="top-decription">
            <div class="col-lg-6 mb-4">
                <h1><?php echo e(\App\Models\MaterielTask::homeH1(app()->getLocale())); ?></h1>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <p><?php echo e(\App\Models\MaterielTask::heroDesc(app()->getLocale())); ?></p>
            </div>
        </div>
    </div>
</div>

<div class="container mb-5">
    
    <?php if($hotBlogs->isNotEmpty()): ?>
    <section class="mb-5 top-module">
        <div class="col-lg-6 mb-4 right-card">
            <?php $firstPost = $hotBlogs->first(); ?>
            <div class="blog-card featured-card">
                <div class="blog-card-img-wrapper">
                    <img src="<?php echo e($firstPost->head_img); ?>" alt="<?php echo e($firstPost->head_img_alt); ?>">
                    <div class="blog-card-overlay">
                        <div class="category category-1">
                            <a href="<?php echo e($firstPost->category->url); ?>"><span class="blog-card-badge"><?php echo e($firstPost->category_name); ?></span></a>
                            <small class="card-date"><?php echo e($firstPost->published_at->format('d M Y')); ?></small>
                        </div>
                        <a href="<?php echo e($firstPost->url); ?>" class="text-decoration-none">
                            <p class="h4 mb-2 category-article-title"><?php echo $firstPost->title; ?></p>
                        </a>
                        <p class="small mb-0"><?php echo $firstPost->summary; ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row top-left-card">
            <?php $__currentLoopData = $hotBlogs->skip(1)->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotBlog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-12 mb-3">
                <div class="d-flex align-items-center hover-shadow top-card">
                    <img src="<?php echo e($hotBlog->head_img); ?>" alt="<?php echo e($hotBlog->head_img_alt); ?>" class="rounded me-3">
                    <div class="flex-grow-1">
                        <div class="home-right-card">
                            <a href="<?php echo e($hotBlog->category->url); ?>">
                                <span class="badge button-green mb-2"><?php echo e($hotBlog->category_name); ?></span>
                            </a>
                            <small class="text-muted card-date"><?php echo e($hotBlog->published_at->format('d M Y')); ?></small>
                        </div>
                        <a href="<?php echo e($hotBlog->url); ?>" class="text-decoration-none">
                            <p class="h6 mb-1 little-card-desc"><?php echo $hotBlog->title; ?></p>
                        </a>

                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>
    <?php endif; ?>

    
    <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryId => $categoryBlogs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            // 直接通过 keyBy 后的索引访问，O(1) 复杂度，不触发查询
            $category = $categories[$categoryId] ?? null;
        ?>
        <h2 class="section-title"><?php echo e($category->name); ?></h2>
        <?php if($loop->odd): ?>
            <?php if($category): ?>
            <section class="mb-5">
                <div class="category-card-first">
                    
                    <?php $__currentLoopData = $categoryBlogs->take(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-6 mb-4">
                        <div class="blog-card">
                            <div class="blog-card-img-wrapper">
                                <img src="<?php echo e($blog->head_img); ?>" alt="<?php echo e($blog->head_img_alt); ?>">
                                <div class="blog-card-overlay">
                                    <div class="category">
                                        <a href="<?php echo e($blog->category->url); ?>"><span class="blog-card-badge"><?php echo e($blog->category_name); ?></span></a>
                                        <small class="card-date"><?php echo e($blog->published_at->format('d M Y')); ?></small>
                                    </div>
                                    <a href="<?php echo e($blog->url); ?>" class="text-decoration-none">
                                        <p class="h5 mb-2 category-article-title"><?php echo $blog->title; ?></p>
                                    </a>
                                    <p class="small mb-0"><?php echo $blog->summary; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                
                <?php if($categoryBlogs->count() > 2): ?>
                <div class="category-card-second">
                    <?php $__currentLoopData = $categoryBlogs->skip(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <article class="blog-card">
                            <div class="blog-card-img-wrapper">
                                <img src="<?php echo e($blog->head_img); ?>" alt="<?php echo e($blog->head_img_alt); ?>" itemprop="image">
                            </div>
                            <div class="blog-card-body">
                                <div class="category">
                                    <a href="<?php echo e($blog->category->url); ?>"><span class="blog-card-badge"><?php echo e($blog->category_name); ?></span></a>
                                    <small class="little-card-date"><?php echo e($blog->published_at->format('d M Y')); ?></small>
                                </div>
                                <a href="<?php echo e($blog->url); ?>" class="text-decoration-none">
                                    <p class="blog-card-title" itemprop="headline"><?php echo $blog->title; ?></p>
                                </a>
                                <p class="blog-card-text" itemprop="description"><?php echo $blog->summary; ?></p>
                            </div>
                        </article>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endif; ?>
            </section>
            <?php endif; ?>
        <?php else: ?>
            <section class="mb-5 top-module">
                <div class="col-lg-6 mb-4 right-card">
                    <?php $firstPost = $categoryBlogs->first(); ?>
                    <div class="blog-card featured-card">
                        <div class="blog-card-img-wrapper">
                            <img src="<?php echo e($firstPost->head_img); ?>" alt="<?php echo e($firstPost->head_img_alt); ?>">
                            <div class="blog-card-overlay">
                                <div class="category category-1">
                                    <a href="<?php echo e($firstPost->category->url); ?>"><span class="blog-card-badge"><?php echo e($firstPost->category_name); ?></span></a>
                                    <small class="card-date"><?php echo e($firstPost->published_at->format('d M Y')); ?></small>
                                </div>
                                <a href="<?php echo e($firstPost->url); ?>" class="text-decoration-none">
                                    <p class="h4 mb-2 category-article-title"><?php echo $firstPost->title; ?></p>
                                </a>
                                <p class="small mb-0"><?php echo $firstPost->summary; ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row top-left-card">
                    <?php $__currentLoopData = $categoryBlogs->skip(1)->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotBlog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-12 mb-3">
                            <div class="d-flex align-items-center hover-shadow top-card">
                                <img src="<?php echo e($hotBlog->head_img); ?>" alt="<?php echo e($hotBlog->head_img_alt); ?>" class="rounded me-3">
                                <div class="flex-grow-1">
                                    <div class="home-right-card">
                                        <a href="<?php echo e($hotBlog->category->url); ?>">
                                            <span class="badge button-green  mb-2"><?php echo e($hotBlog->category_name); ?></span>
                                        </a>
                                        <small class="text-muted card-date"><?php echo e($hotBlog->published_at->format('d M Y')); ?></small>
                                    </div>
                                    <a href="<?php echo e($hotBlog->url); ?>" class="text-decoration-none">
                                        <p class="h6 mb-1 little-card-desc"><?php echo $hotBlog->title; ?></p>
                                    </a>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </section>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    
    <?php if($latestBlogs->isNotEmpty()): ?>
    <section class="mb-5">
        <p class="section-title">Latest Post</p>
        <div class="row bottom-card">
            <?php $__currentLoopData = $latestBlogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $latestBlog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-6 mb-3">
                <div class="align-items-center border rounded-3 p-3 hover-shadow">
                    <div class="latest-card">
                        <a href="<?php echo e($latestBlog->category->url); ?>"><span class="badge button-green mb-2"><?php echo e($latestBlog->category_name); ?></span></a>
                        <small class="text-muted"><?php echo e($latestBlog->published_at->format('d M Y')); ?></small>
                    </div>
                    <a href="<?php echo e($latestBlog->url); ?>" class="text-decoration-none">
                    <div class="h6 mb-0"><?php echo $latestBlog->title; ?></div>
                    </a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Library/WebServer/Documents/work/php/blog_techlysupport_site/resources/views/home.blade.php ENDPATH**/ ?>