<?php $__env->startSection('title', $blog->title); ?>
<?php $__env->startSection('description', $blog->summary); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="/css/custom-blog.css?v=2.0">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <div class="row">
        <article class="blog-detail">
            
            <div class="col-lg-9 offset-3">
                <header class="mb-4">
                    <h1 class="article-title" itemprop="headline"><?php echo e($blog->title); ?></h1>

                    <div class="article-meta">
                        <span class="meta-item">
                            <i class="far fa-user"></i> By
                            <span itemprop="author"><?php echo e($blog->author); ?></span>
                        </span>
                        <span class="meta-item">
                            <i class="far fa-calendar"></i> Published
                            <time itemprop="datePublished" datetime="<?php echo e($blog->published_at->toIso8601String()); ?>">
                                <?php echo e($blog->published_at->format('Y-m-d')); ?>

                            </time>
                        </span>
                        <span class="meta-item">
                            <i class="far fa-folder"></i> Filed under:
                            <a href="<?php echo e($blog->category->url); ?>"><?php echo e($blog->category_name); ?></a>
                        </span>
                    </div>
                </header>
            </div>
            <div class="row">
                <div class="col-lg-3 order-lg-1 order-2">
                    <aside class="sidebar">
                        
                        <?php if($popularBlogs->isNotEmpty()): ?>
                            <div class="sidebar-section mb-4">
                                <h5 class="sidebar-title">Related Post</h5>
                                <ul class="sidebar-list">
                                    <?php $__currentLoopData = $popularBlogs->take(6); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $popularBlog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="sidebar-item">
                                            <a href="<?php echo e($popularBlog->url); ?>" class="d-flex align-items-start">
                                                <img src="<?php echo e($popularBlog->head_img); ?>"
                                                     alt="<?php echo e($popularBlog->head_img_alt ?? $popularBlog->title); ?>"
                                                     class="sidebar-thumb me-2">
                                                <div class="flex-grow-1">
                                                    <h6 class="sidebar-post-title"><?php echo e($popularBlog->title); ?></h6>
                                                </div>
                                            </a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </aside>
                </div>
                <div class="col-lg-9 order-lg-2 order-1">
                    
                    <div class="article-content" itemprop="articleBody">
                        <?php echo $blog->content; ?>

                    </div>

                    
                    <?php if(!empty($blog->faq) && count($blog->faq) > 0): ?>
                    <div class="faq-section mt-5" itemscope itemtype="https://schema.org/FAQPage">
                        <h3 class="section-subtitle">You May Also Like</h3>
                        <div class="faq-list">
                            <?php $__currentLoopData = $blog->faq; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                                <h4 class="faq-question" itemprop="name"><?php echo e($faq['question']); ?></h4>
                                <div class="faq-answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                    <div itemprop="text"><?php echo $faq['answer']; ?></div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    
                    <?php if($relatedBlogs->isNotEmpty()): ?>
                    <div class="related-posts mt-5">
                        <h3 class="section-subtitle">Related Post</h3>
                        <div class="row">
                            <?php $__currentLoopData = $relatedBlogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relatedBlog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-6 mb-4">
                                <div class="related-post-card">
                                    <a href="<?php echo e($relatedBlog->url); ?>" class="text-decoration-none">
                                        <div class="related-post-img">
                                            <img src="<?php echo e($relatedBlog->head_img); ?>"
                                                 alt="<?php echo e($relatedBlog->head_img_alt ?? $relatedBlog->title); ?>"
                                                 class="img-fluid rounded">
                                        </div>
                                        <div class="related-post-content mt-3">
                                            <p class="related-post-title"><?php echo e($relatedBlog->title); ?></p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </article>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/donghuijiao/Downloads/blog_howencyclopedia_site/resources/views/blog-detail.blade.php ENDPATH**/ ?>