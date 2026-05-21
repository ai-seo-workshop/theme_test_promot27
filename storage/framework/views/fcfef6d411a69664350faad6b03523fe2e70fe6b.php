<?php $__env->startSection('title', $seoInfo->seo_title ?? ''); ?>
<?php $__env->startSection('description', $seoInfo->seo_desc ?? ''); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="/css/category.css?v=1.4">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-3">
    <nav class="breadcrumb">
        <a href="<?php echo e(app()->getLocale() === 'en' ? '/' : '/'.app()->getLocale().'/'); ?>"><?php echo e(\App\Models\MaterielTask::home(app()->getLocale())); ?></a>
        &gt;
        <span><?php echo e($categoryInfo->name); ?></span>
    </nav>
</div>

<div class="hero-section py-5">
    <div class="container text-center categroy-summary">
        <h1><?php echo e($categoryInfo->name); ?></h1>
        <p><?php echo $seoInfo->content; ?></p>
    </div>
</div>

<div class="container mb-5">
    
    <?php if($hotBlogs->count()>0): ?>
    <section class="mb-5">
        <p class="section-title"><?php echo e(\App\Models\MaterielTask::popular_articles(app()->getLocale())); ?></p>
        <div class="top-module">
            <div class="col-lg-6 mb-4 right-card">
                <?php $firstPost = $hotBlogs->first(); ?>
                <?php if($firstPost): ?>
                <div class="blog-card featured-card">
                    <div class="blog-card-img-wrapper">
                        <img src="<?php echo e($firstPost->head_img); ?>" alt="<?php echo e($firstPost->head_img_alt ?? $firstPost->title); ?>">
                        <div class="blog-card-overlay">
                            <div class="category">
                                <span class="meta-item">
                                    <i class="far fa-user"></i> <?php echo e(\App\Models\MaterielTask::by(app()->getLocale())); ?>

                                    <span itemprop="author"><?php echo e($firstPost->author); ?></span>
                                </span>
                                <span class="meta-item">
                                    <i class="far fa-calendar"></i> <?php echo e(\App\Models\MaterielTask::detailPublished(app()->getLocale())); ?>

                                    <time itemprop="datePublished" datetime="<?php echo e($firstPost->published_at->toIso8601String()); ?>">
                                        <?php echo e($firstPost->published_at->format('Y-m-d')); ?>

                                    </time>
                                </span>
                            </div>
                            <a href="<?php echo e($firstPost->url); ?>" class="text-decoration-none">
                                <p class="h4 mb-2 category-article-title"><?php echo e($firstPost->title); ?></p>
                            </a>
                            <p class="small mb-0"><?php echo e($firstPost->summary); ?></p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <div class="top-left-card">
                <?php $__currentLoopData = $hotBlogs->skip(1)->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotBlog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 mb-3">
                        <div class="d-flex align-items-center hover-shadow top-card">
                            <img src="<?php echo e($hotBlog->head_img); ?>" alt="<?php echo e($hotBlog->head_img_alt); ?>"
                                 class="rounded me-3">
                            <div class="flex-grow-1">
                                <div class="right-card-2">
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
                                <a href="<?php echo e($hotBlog->url); ?>" class="text-decoration-none">
                                    <p class="h6 mb-1 little-card-desc"><?php echo e($hotBlog->title); ?></p>
                                </a>
                            </div>
                        </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    
    <section class="mb-5">
        <p class="section-title"><?php echo e(\App\Models\MaterielTask::recent_posts(app()->getLocale())); ?></p>

        
        <div id="article-list">
            <?php echo $__env->make('partials.article-list', ['blogs' => $blogs], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <!-- Improved Pagination -->
        
        <div class="pagination-wrapper">
            <div class="pagination" id="pagination-container"
                 data-current-page="<?php echo e($blogs->currentPage()); ?>"
                 data-last-page="<?php echo e($blogs->lastPage()); ?>">
                
                <?php if($blogs->onFirstPage()): ?>
                    <span class="disabled page-nav">‹</span>
                <?php else: ?>
                    <a href="javascript:void(0)" data-page="<?php echo e($blogs->currentPage() - 1); ?>" class="page-nav page-link">‹</a>
                <?php endif; ?>

                
                <?php
                    $currentPage = $blogs->currentPage();
                    $lastPage = $blogs->lastPage();
                    $start = max(1, $currentPage - 2);
                    $end = min($lastPage, $currentPage + 2);
                ?>

                
                <?php if($start > 1): ?>
                    <a href="javascript:void(0)" data-page="1" class="page-link">1</a>
                    <?php if($start > 2): ?>
                        <span class="ellipsis">...</span>
                    <?php endif; ?>
                <?php endif; ?>

                
                <?php for($page = $start; $page <= $end; $page++): ?>
                    <?php if($page == $currentPage): ?>
                        <span class="active"><?php echo e($page); ?></span>
                    <?php else: ?>
                        <a href="javascript:void(0)" data-page="<?php echo e($page); ?>" class="page-link"><?php echo e($page); ?></a>
                    <?php endif; ?>
                <?php endfor; ?>

                
                <?php if($end < $lastPage): ?>
                    <?php if($end < $lastPage - 1): ?>
                        <span class="ellipsis">...</span>
                    <?php endif; ?>
                    <a href="javascript:void(0)" data-page="<?php echo e($lastPage); ?>" class="page-link"><?php echo e($lastPage); ?></a>
                <?php endif; ?>

                
                <?php if($blogs->hasMorePages()): ?>
                    <a href="javascript:void(0)" data-page="<?php echo e($blogs->currentPage() + 1); ?>" class="page-nav page-link">›</a>
                <?php else: ?>
                    <span class="disabled page-nav">›</span>
                <?php endif; ?>
            </div>

        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script src="/js/category.js" defer></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Library/WebServer/Documents/work/php/blog_howencyclopedia_site/resources/views/category.blade.php ENDPATH**/ ?>