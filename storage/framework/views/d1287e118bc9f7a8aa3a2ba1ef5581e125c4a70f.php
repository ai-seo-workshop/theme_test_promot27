<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <div class="row">
        
        <div class="col-lg-3 order-lg-1 order-2">
            <aside class="sidebar">
                
                <div class="sidebar-section mb-4">
                    <h5 class="sidebar-title"><?php echo e($blog->category_name); ?></h5>
                    <hr>
                </div>
                
                
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
        
        
        <div class="col-lg-6 order-lg-2 order-1">
            <article class="blog-detail" itemscope itemtype="https://schema.org/BlogPosting">
                
                <header class="mb-4">
                    <h1 class="article-title" itemprop="headline"><?php echo e($blog->h1 ?? $blog->title); ?></h1>
                    
                    <div class="article-meta">
                        <span class="meta-item">
                            <i class="far fa-user"></i> By 
                            <span itemprop="author"><?php echo e($blog->author ?? 'Maansha Priyadarshini'); ?></span>
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
                
                
                <?php if($blog->head_img): ?>
                <figure class="article-featured-image mb-4">
                    <img src="<?php echo e($blog->head_img); ?>" 
                         alt="<?php echo e($blog->head_img_alt ?? $blog->title); ?>" 
                         class="img-fluid rounded"
                         itemprop="image">
                </figure>
                <?php endif; ?>
                
                
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
                <?php endif; ?>
            </article>
        </div>
        
        
        <div class="col-lg-3 order-lg-3 order-3">
            
        </div>
    </div>
</div>


<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BlogPosting",
    "headline": "<?php echo e($blog->title); ?>",
    "description": "<?php echo e($blog->summary); ?>",
    "image": "<?php echo e($blog->head_img); ?>",
    "author": {
        "@type": "Person",
        "name": "<?php echo e($blog->author ?? 'Maansha Priyadarshini'); ?>"
    },
    "publisher": {
        "@type": "Organization",
        "name": "Celebrate FEST NOW",
        "logo": {
            "@type": "ImageObject",
            "url": "<?php echo e(asset('images/logo.png')); ?>"
        }
    },
    "datePublished": "<?php echo e($blog->published_at->toIso8601String()); ?>",
    "dateModified": "<?php echo e($blog->update_time ? $blog->update_time->toIso8601String() : $blog->published_at->toIso8601String()); ?>",
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "<?php echo e($blog->url); ?>"
    }
}
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
    /* Sidebar Styles */
    .sidebar {
        position: sticky;
        top: 100px;
    }
    
    .sidebar-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--dark-gray);
        margin-bottom: 1rem;
    }
    
    .sidebar-list {
        list-style: none;
        padding: 0;
    }
    
    .sidebar-item {
        margin-bottom: 1rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid var(--border-color);
    }
    
    .sidebar-item:last-child {
        border-bottom: none;
    }
    
    .sidebar-item a {
        text-decoration: none;
        color: inherit;
        transition: all 0.3s ease;
    }
    
    .sidebar-item a:hover .sidebar-post-title {
        color: var(--primary-purple);
    }
    
    .sidebar-thumb {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 8px;
        flex-shrink: 0;
    }
    
    .sidebar-post-title {
        font-size: 0.9rem;
        font-weight: 500;
        color: var(--dark-gray);
        margin: 0;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        transition: color 0.3s ease;
    }
    
    /* Article Styles */
    .article-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--dark-gray);
        line-height: 1.2;
        margin-bottom: 1.5rem;
    }
    
    .article-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 1.5rem;
        color: #718096;
        font-size: 0.9rem;
        margin-bottom: 2rem;
        padding-bottom: 1.5rem;
        border-bottom: 2px solid var(--border-color);
    }
    
    .meta-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .meta-item a {
        color: var(--primary-purple);
        text-decoration: none;
        transition: color 0.3s ease;
    }
    
    .meta-item a:hover {
        color: var(--primary-orange);
    }
    
    .article-featured-image {
        margin-bottom: 2rem;
        overflow: hidden;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    
    .article-featured-image img {
        transition: transform 0.5s ease;
    }
    
    .article-featured-image:hover img {
        transform: scale(1.05);
    }
    
    /* Article Content Styles */
    .article-content {
        font-size: 1.05rem;
        line-height: 1.8;
        color: var(--dark-gray);
    }
    
    .article-content h2,
    .article-content h3,
    .article-content h4 {
        color: var(--dark-gray);
        font-weight: 600;
        margin-top: 2rem;
        margin-bottom: 1rem;
    }
    
    .article-content h2 {
        font-size: 1.8rem;
        border-bottom: 2px solid var(--primary-orange);
        padding-bottom: 0.5rem;
    }
    
    .article-content h3 {
        font-size: 1.5rem;
    }
    
    .article-content h4 {
        font-size: 1.2rem;
    }
    
    .article-content p {
        margin-bottom: 1.5rem;
    }
    
    .article-content ul,
    .article-content ol {
        margin-bottom: 1.5rem;
        padding-left: 2rem;
    }
    
    .article-content li {
        margin-bottom: 0.5rem;
    }
    
    .article-content a {
        color: var(--primary-purple);
        text-decoration: none;
        border-bottom: 1px solid var(--primary-purple);
        transition: all 0.3s ease;
    }
    
    .article-content a:hover {
        color: var(--primary-orange);
        border-bottom-color: var(--primary-orange);
    }
    
    .article-content img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin: 2rem 0;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    
    .article-content table {
        width: 100%;
        border-collapse: collapse;
        margin: 2rem 0;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    
    .article-content table th,
    .article-content table td {
        padding: 1rem;
        border: 1px solid var(--border-color);
        text-align: left;
    }
    
    .article-content table th {
        background-color: var(--light-gray);
        font-weight: 600;
        color: var(--dark-gray);
    }
    
    .article-content blockquote {
        border-left: 4px solid var(--primary-orange);
        padding-left: 1.5rem;
        margin: 2rem 0;
        font-style: italic;
        color: #718096;
    }
    
    /* FAQ Section */
    .section-subtitle {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--dark-gray);
        margin-bottom: 2rem;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid var(--primary-orange);
    }
    
    .faq-item {
        margin-bottom: 2rem;
        padding: 1.5rem;
        background-color: var(--light-gray);
        border-radius: 12px;
        transition: all 0.3s ease;
    }
    
    .faq-item:hover {
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        transform: translateY(-2px);
    }
    
    .faq-question {
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--primary-purple);
        margin-bottom: 1rem;
    }
    
    .faq-answer {
        color: var(--dark-gray);
        line-height: 1.7;
    }
    
    /* Related Posts */
    .related-post-card {
        transition: all 0.3s ease;
    }
    
    .related-post-card:hover {
        transform: translateY(-5px);
    }
    
    .related-post-img {
        overflow: hidden;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    
    .related-post-img img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .related-post-card:hover .related-post-img img {
        transform: scale(1.1);
    }
    
    .related-post-title {
        font-weight: 500;
        color: var(--dark-gray);
        margin: 0;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        transition: color 0.3s ease;
    }
    
    .related-post-card:hover .related-post-title {
        color: var(--primary-purple);
    }
    
    /* Responsive Styles */
    @media (max-width: 992px) {
        .sidebar {
            position: static;
            margin-top: 3rem;
        }
        
        .article-title {
            font-size: 2rem;
        }
        
        .article-meta {
            flex-direction: column;
            gap: 0.5rem;
        }
    }
    
    @media (max-width: 768px) {
        .article-title {
            font-size: 1.75rem;
        }
        
        .article-content {
            font-size: 1rem;
        }
        
        .article-content h2 {
            font-size: 1.5rem;
        }
        
        .article-content h3 {
            font-size: 1.3rem;
        }
    }
</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/donghuijiao/Downloads/template2 3/resources/views/blog-detail.blade.php ENDPATH**/ ?>