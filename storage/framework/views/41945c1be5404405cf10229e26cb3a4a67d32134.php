<?php $__env->startSection('content'); ?>

<div class="hero-section">
    <div class="container text-center">
        <h1>Know the Festival. Nail the Celebration</h1>
        <p>Learn the stories and meanings behind global festivals, then turn inspiration into action<br>
           with party decor, family activities, tasty recipes, and thoughtful gifts.</p>
    </div>
</div>

<div class="container mb-5">
    
    <?php if($hotBlogs->isNotEmpty()): ?>
    <section class="mb-5">
        <h2 class="section-title">Popular Post</h2>
        <div class="row">
            <div class="col-lg-6 mb-4">
                <?php $firstPost = $hotBlogs->first(); ?>
                <div class="blog-card featured-card">
                    <a href="<?php echo e($firstPost->url); ?>" class="text-decoration-none">
                        <div class="blog-card-img-wrapper" style="height: 400px;">
                            <img src="<?php echo e($firstPost->head_img); ?>" alt="<?php echo e($firstPost->head_img_alt ?? $firstPost->title); ?>">
                            <span class="blog-card-badge"><?php echo e($firstPost->category_name); ?></span>
                            <div class="blog-card-overlay">
                                <h3 class="h4 mb-2"><?php echo e($firstPost->title); ?></h3>
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
                            <div class="d-flex align-items-center bg-light rounded-3 p-3 hover-shadow">
                                <img src="<?php echo e($hotBlog->head_img); ?>" alt="<?php echo e($hotBlog->head_img_alt ?? $hotBlog->title); ?>" 
                                     class="rounded me-3" style="width: 80px; height: 80px; object-fit: cover;">
                                <div class="flex-grow-1">
                                    <span class="badge bg-primary mb-2"><?php echo e($hotBlog->category_name); ?></span>
                                    <h5 class="h6 mb-1 text-dark"><?php echo e($hotBlog->title); ?></h5>
                                    <small class="text-muted"><?php echo e($hotBlog->published_at->format('d M Y')); ?></small>
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
        <?php $categoryData = $categoryInfo->where('category_id', $categoryId)->first(); ?>
        <?php if($categoryData): ?>
        <section class="mb-5">
            <h2 class="section-title"><?php echo e($categoryData->h1); ?></h2>
            
            <div class="row mb-4">
                
                <?php $__currentLoopData = $categoryBlogs->take(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-6 mb-4">
                    <div class="blog-card">
                        <a href="<?php echo e($blog->url); ?>" class="text-decoration-none">
                            <div class="blog-card-img-wrapper" style="height: 300px;">
                                <img src="<?php echo e($blog->head_img); ?>" alt="<?php echo e($blog->head_img_alt ?? $blog->title); ?>">
                                <span class="blog-card-badge"><?php echo e($blog->category_name); ?></span>
                                <div class="blog-card-overlay">
                                    <h3 class="h5 mb-2"><?php echo e($blog->title); ?></h3>
                                    <p class="small mb-0"><?php echo e(Str::limit($blog->summary, 100)); ?></p>
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
                                <span class="blog-card-badge"><?php echo e($blog->category_name); ?></span>
                            </div>
                            <div class="blog-card-body">
                                <h3 class="blog-card-title" itemprop="headline"><?php echo e($blog->title); ?></h3>
                                <p class="blog-card-text" itemprop="description"><?php echo e($blog->summary); ?></p>
                            </div>
                            <div class="blog-card-footer">
                                <span><i class="far fa-calendar"></i> <?php echo e($blog->published_at->format('d M Y')); ?></span>
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
        <h2 class="section-title">Latest Post</h2>
        <div class="row">
            <?php $__currentLoopData = $latestBlogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $latestBlog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-6 mb-3">
                <a href="<?php echo e($latestBlog->url); ?>" class="text-decoration-none">
                    <div class="d-flex align-items-center border rounded-3 p-3 hover-shadow">
                        <span class="badge bg-warning text-dark me-3"><?php echo e($latestBlog->category_name); ?></span>
                        <div class="flex-grow-1">
                            <small class="text-muted"><?php echo e($latestBlog->published_at->format('d M Y')); ?></small>
                            <h5 class="h6 mb-0 text-dark"><?php echo e($latestBlog->title); ?></h5>
                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>
    <?php endif; ?>
</div>


<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "WebSite",
    "name": "Celebrate FEST NOW",
    "description": "<?php echo e($seoInfo->description ?? 'Learn the stories and meanings behind global festivals'); ?>",
    "url": "<?php echo e(url('/')); ?>",
    "potentialAction": {
        "@type": "SearchAction",
        "target": "<?php echo e(url('/')); ?>?s={search_term_string}",
        "query-input": "required name=search_term_string"
    }
}
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
    .hover-shadow {
        transition: all 0.3s ease;
    }
    
    .hover-shadow:hover {
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        transform: translateY(-2px);
    }
    
    .featured-card .blog-card-overlay h3,
    .featured-card .blog-card-overlay p {
        color: white;
    }
    
    .bg-primary {
        background-color: var(--primary-purple) !important;
    }
</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/donghuijiao/Downloads/template2 3/resources/views/home.blade.php ENDPATH**/ ?>