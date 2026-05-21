<?php $__env->startSection('title', $seoInfo->seo_title ?? ''); ?>
<?php $__env->startSection('description', $seoInfo->seo_desc ?? ''); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="/css/category.css?v=1.0">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<div class="hero-section py-5">
    <div class="container text-center">
        <h1><?php echo e($categoryInfo->name); ?></h1>
        <p><?php echo e($seoInfo->description ?? 'Learn the stories and meanings behind global festivals, then turn inspiration into action with party decor, family activities, tasty recipes, and thoughtful gifts.'); ?></p>
    </div>
</div>

<div class="container mb-5">
    
    <?php if($blogs->total() > 0): ?>
    <section class="mb-5">
        <p class="section-title">Popular Post</p>
        <div class="row">
            <div class="col-lg-6 mb-4">
                <?php $firstPost = $blogs->items()[0] ?? null; ?>
                <?php if($firstPost): ?>
                <div class="blog-card featured-card">
                    <a href="<?php echo e($firstPost->url); ?>" class="text-decoration-none">
                        <div class="blog-card-img-wrapper" style="height: 380px;">
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
                <?php endif; ?>
            </div>

            <div class="col-lg-6">
                <div class="row">
                    <?php $__currentLoopData = $blogs->slice(1, 3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-12 mb-3">
                        <a href="<?php echo e($blog->url); ?>" class="text-decoration-none">
                            <div class="d-flex align-items-center rounded-3 p-3 hover-shadow">
                                <img src="<?php echo e($blog->head_img); ?>" alt="<?php echo e($blog->head_img_alt ?? $blog->title); ?>"
                                     class="rounded me-3" style="width: 80px; height: 80px; object-fit: cover;">
                                <div class="flex-grow-1">
                                    <div>
                                        <span class="badge <?php echo Arr::random(['bg-success', 'bg-info', 'bg-primary', 'bg-danger', 'bg-warning']); ?>  mb-2"><?php echo e($blog->category_name); ?></span>
                                        <small class="text-muted card-date"><?php echo e($blog->published_at->format('d M Y')); ?></small>
                                    </div>
                                    <p class="h6 mb-1 text-dark"><?php echo e($blog->title); ?></p>
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

    
    <section class="mb-5">
        <p class="section-title">Latest Post</p>

        
        <div id="article-list-container">
            <?php echo $__env->make('partials.article-list', ['blogs' => $blogs], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        
        <div class="loading-spinner" id="loading-spinner">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>

        
        <div class="pagination-wrapper" id="pagination-container">
            <nav>
                <ul class="pagination justify-content-center">
                    <?php if($blogs->onFirstPage()): ?>
                    <li class="page-item disabled">
                        <span class="page-link"><i class="fas fa-chevron-left"></i></span>
                    </li>
                    <?php else: ?>
                    <li class="page-item">
                        <a class="page-link pagination-link" href="#" data-page="<?php echo e($blogs->currentPage() - 1); ?>">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    </li>
                    <?php endif; ?>

                    <?php $__currentLoopData = range(1, $blogs->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($page == 1 || $page == $blogs->lastPage() || abs($blogs->currentPage() - $page) < 3): ?>
                        <li class="page-item <?php echo e($page == $blogs->currentPage() ? 'active' : ''); ?>">
                            <a class="page-link pagination-link" href="#" data-page="<?php echo e($page); ?>"><?php echo e($page); ?></a>
                        </li>
                        <?php elseif(abs($blogs->currentPage() - $page) == 3): ?>
                        <li class="page-item disabled">
                            <span class="page-link">...</span>
                        </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php if($blogs->hasMorePages()): ?>
                    <li class="page-item">
                        <a class="page-link pagination-link" href="#" data-page="<?php echo e($blogs->currentPage() + 1); ?>">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </li>
                    <?php else: ?>
                    <li class="page-item disabled">
                        <span class="page-link"><i class="fas fa-chevron-right"></i></span>
                    </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script src="/js/category.js" defer></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/donghuijiao/Downloads/blog_howencyclopedia_site/resources/views/category.blade.php ENDPATH**/ ?>