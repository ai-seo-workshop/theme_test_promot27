<?php $__env->startSection('title', $blog->title); ?>
<?php $__env->startSection('description', $blog->summary); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="/css/custom-blog.css?v=1.7">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<div class="container mt-3">
    <nav class="breadcrumb">
        <a href="<?php echo e(app()->getLocale() === 'en' ? '/' : '/'.app()->getLocale().'/'); ?>"><?php echo e(\App\Models\MaterielTask::home(app()->getLocale())); ?></a>
        &gt;
        <a href="<?php echo e($blog->category ? $blog->category->url : '#'); ?>"><?php echo e($blog->category_name); ?></a>
        &gt;
        <span><?php echo e($blog->title); ?></span>
    </nav>
</div>
<div class="container mt-4">
    <article class="blog-detail">
        
        <div class="col-lg-9 offset-3">
            <header class="mb-4">
                <h1 class="article-title" itemprop="headline"><?php echo e($blog->title); ?></h1>

                <div class="article-meta">
                    <span class="meta-item">
                        <i class="far fa-user"></i> <?php echo e(\App\Models\MaterielTask::by(app()->getLocale())); ?>

                        <span itemprop="author"><?php echo e($blog->author); ?></span>
                    </span>
                    <span class="meta-item">
                        <i class="far fa-calendar"></i> <?php echo e(\App\Models\MaterielTask::detailPublished(app()->getLocale())); ?>

                        <time itemprop="datePublished" datetime="<?php echo e($blog->published_at->toIso8601String()); ?>">
                            <?php echo e($blog->published_at->format('Y-m-d')); ?>

                        </time>
                    </span>
                    <span class="meta-item">
                        <i class="far fa-folder"></i> <?php echo e(\App\Models\MaterielTask::filedUnder(app()->getLocale())); ?>:
                        <a href="<?php echo e($blog->category->url); ?>"><?php echo e($blog->category_name); ?></a>
                    </span>
                </div>
            </header>
        </div>
        <div class="article-center">
            <div class="latest-article">
                <aside class="sidebar">
                    
                    <?php if($popularBlogs->isNotEmpty()): ?>
                        <div class="sidebar-section mb-4">
                            <div class="sidebar-title"><?php echo e(\App\Models\MaterielTask::popular_articles(app()->getLocale())); ?></div>
                            <ul class="sidebar-list">
                                <?php $__currentLoopData = $popularBlogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $popularBlog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="sidebar-item">
                                        <a href="<?php echo e($popularBlog->url); ?>" class="d-flex align-items-start">
                                            <img src="<?php echo e($popularBlog->head_img); ?>"
                                                 alt="<?php echo e($popularBlog->head_img_alt ?? $popularBlog->title); ?>"
                                                 class="sidebar-thumb me-2">
                                            <div class="flex-grow-1">
                                                <p class="sidebar-post-title"><?php echo e($popularBlog->title); ?></p>
                                            </div>
                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </aside>
            </div>
            <div class="article-main">
                
                <div class="article-content" itemprop="articleBody">
                    <?php echo $blog->content; ?>

                </div>

                
                <?php if(!empty($blog->faq) && count($blog->faq) > 0): ?>
                <div class="faq-section mt-5" itemscope itemtype="https://schema.org/FAQPage">
                    <h2 class="section-subtitle">FAQs</h2>
                    <div class="faq-list">
                        <?php $__currentLoopData = $blog->faq; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <h3 class="faq-question" itemprop="name"><?php echo e($faq['question']); ?></h3>
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
                    <div class="section-subtitle"><?php echo e(\App\Models\MaterielTask::related_posts(app()->getLocale())); ?></div>
                    <div class="category-card-second">
                        <?php $__currentLoopData = $relatedBlogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relatedBlog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-4 col-md-6 mb-4">
                                <article class="blog-card">
                                    <div class="blog-card-img-wrapper">
                                        <img src="<?php echo e($relatedBlog->head_img); ?>" alt="<?php echo e($relatedBlog->head_img_alt); ?>" itemprop="image">
                                    </div>
                                    <div class="blog-card-body">
                                        <a href="<?php echo e($relatedBlog->url); ?>" class="text-decoration-none">
                                            <p class="blog-card-title" itemprop="headline"><?php echo e($relatedBlog->title); ?></p>
                                        </a>
                                        <p class="blog-card-text" itemprop="description"><?php echo e($relatedBlog->summary); ?></p>
                                    </div>
                                </article>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </article>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Library/WebServer/Documents/work/php/blog_howencyclopedia_site/resources/views/blog-detail.blade.php ENDPATH**/ ?>