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
        <h2 class="section-title">Popular Post</h2>
        <div class="row">
            <div class="col-lg-6 mb-4">
                <?php $firstPost = $blogs->items()[0] ?? null; ?>
                <?php if($firstPost): ?>
                <div class="blog-card featured-card">
                    <a href="<?php echo e($firstPost->url); ?>" class="text-decoration-none">
                        <div class="blog-card-img-wrapper" style="height: 380px;">
                            <img src="<?php echo e($firstPost->head_img); ?>" alt="<?php echo e($firstPost->head_img_alt ?? $firstPost->title); ?>">
                            <span class="blog-card-badge"><?php echo e($firstPost->category_name); ?></span>
                            <div class="blog-card-overlay">
                                <h3 class="h4 mb-2"><?php echo e($firstPost->title); ?></h3>
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
                            <div class="d-flex align-items-center bg-light rounded-3 p-3 hover-shadow">
                                <img src="<?php echo e($blog->head_img); ?>" alt="<?php echo e($blog->head_img_alt ?? $blog->title); ?>" 
                                     class="rounded me-3" style="width: 80px; height: 80px; object-fit: cover;">
                                <div class="flex-grow-1">
                                    <span class="badge bg-primary mb-2"><?php echo e($blog->category_name); ?></span>
                                    <h5 class="h6 mb-1 text-dark"><?php echo e($blog->title); ?></h5>
                                    <small class="text-muted"><?php echo e($blog->published_at->format('d M Y')); ?></small>
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
        <h2 class="section-title">Latest Post</h2>
        
        
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


<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "CollectionPage",
    "name": "<?php echo e($categoryInfo->name); ?>",
    "description": "<?php echo e($seoInfo->description ?? $categoryInfo->name); ?>",
    "url": "<?php echo e(url()->current()); ?>"
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
    
    #article-list-container {
        min-height: 300px;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
$(document).ready(function() {
    // AJAX Pagination
    $(document).on('click', '.pagination-link', function(e) {
        e.preventDefault();
        
        var page = $(this).data('page');
        var categorySlug = '<?php echo e($categoryInfo->slug); ?>';
        var locale = '<?php echo e(app()->getLocale()); ?>';
        var url = locale === 'en' 
            ? '/' + categorySlug 
            : '/' + locale + '/' + categorySlug;
        
        // Show loading spinner
        $('#loading-spinner').show();
        
        // Scroll to top of article list
        $('html, body').animate({
            scrollTop: $('#article-list-container').offset().top - 100
        }, 300);
        
        // AJAX request
        $.ajax({
            url: url,
            type: 'GET',
            data: { page: page },
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            success: function(response) {
                // Update article list
                $('#article-list-container').html(response.html);
                
                // Update pagination
                updatePagination(response.pagination, page);
                
                // Hide loading spinner
                $('#loading-spinner').hide();
            },
            error: function() {
                $('#loading-spinner').hide();
                alert('Error loading articles. Please try again.');
            }
        });
    });
    
    function updatePagination(pagination, currentPage) {
        var html = '<nav><ul class="pagination justify-content-center">';
        
        // Previous button
        if (pagination.on_first_page) {
            html += '<li class="page-item disabled"><span class="page-link"><i class="fas fa-chevron-left"></i></span></li>';
        } else {
            html += '<li class="page-item"><a class="page-link pagination-link" href="#" data-page="' + (currentPage - 1) + '"><i class="fas fa-chevron-left"></i></a></li>';
        }
        
        // Page numbers
        for (var i = 1; i <= pagination.last_page; i++) {
            if (i == 1 || i == pagination.last_page || Math.abs(currentPage - i) < 3) {
                var activeClass = i == currentPage ? ' active' : '';
                html += '<li class="page-item' + activeClass + '"><a class="page-link pagination-link" href="#" data-page="' + i + '">' + i + '</a></li>';
            } else if (Math.abs(currentPage - i) == 3) {
                html += '<li class="page-item disabled"><span class="page-link">...</span></li>';
            }
        }
        
        // Next button
        if (pagination.has_more_pages) {
            html += '<li class="page-item"><a class="page-link pagination-link" href="#" data-page="' + (currentPage + 1) + '"><i class="fas fa-chevron-right"></i></a></li>';
        } else {
            html += '<li class="page-item disabled"><span class="page-link"><i class="fas fa-chevron-right"></i></span></li>';
        }
        
        html += '</ul></nav>';
        
        $('#pagination-container').html(html);
    }
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/donghuijiao/Downloads/template2 3/resources/views/category.blade.php ENDPATH**/ ?>