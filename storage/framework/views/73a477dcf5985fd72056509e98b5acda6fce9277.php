<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    
    <title><?php echo e($seoInfo->title ?? config('app.name')); ?></title>
    <meta name="description" content="<?php echo e($seoInfo->description ?? ''); ?>">
    <meta name="keywords" content="<?php echo e($seoInfo->keyword ?? ''); ?>">
    <meta name="author" content="Celebrate Fest Now">
    
    
    <meta property="og:title" content="<?php echo e($seoInfo->title ?? config('app.name')); ?>">
    <meta property="og:description" content="<?php echo e($seoInfo->description ?? ''); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">
    <?php if(isset($blog) && $blog->head_img): ?>
    <meta property="og:image" content="<?php echo e($blog->head_img); ?>">
    <?php endif; ?>
    
    
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo e($seoInfo->title ?? config('app.name')); ?>">
    <meta name="twitter:description" content="<?php echo e($seoInfo->description ?? ''); ?>">
    
    
    <link rel="canonical" href="<?php echo e(url()->current()); ?>">
    <?php echo $alternate_tag ?? ''; ?>

    
    
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('favicon.ico')); ?>">
    
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    
    <style>
        :root {
            --primary-orange: #FF6B35;
            --primary-purple: #7B2CBF;
            --dark-gray: #2D3748;
            --light-gray: #F7FAFC;
            --border-color: #E2E8F0;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            color: var(--dark-gray);
            line-height: 1.6;
            background-color: #fff;
        }
        
        /* Navbar Styles */
        .navbar {
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            padding: 1rem 0;
            transition: all 0.3s ease;
        }
        
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-purple) !important;
            transition: transform 0.3s ease;
        }
        
        .navbar-brand:hover {
            transform: scale(1.05);
        }
        
        .navbar-brand .fest-text {
            color: var(--primary-orange);
        }
        
        .nav-link {
            color: var(--dark-gray) !important;
            font-weight: 500;
            padding: 0.5rem 1rem !important;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .nav-link:hover,
        .nav-link.active {
            color: var(--primary-orange) !important;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 2px;
            background-color: var(--primary-orange);
            transition: width 0.3s ease;
        }
        
        .nav-link:hover::after {
            width: 80%;
        }
        
        .dropdown-menu {
            border: none;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            border-radius: 8px;
            animation: fadeInDown 0.3s ease;
        }
        
        @keyframes  fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .dropdown-item {
            padding: 0.7rem 1.5rem;
            transition: all 0.3s ease;
        }
        
        .dropdown-item:hover {
            background-color: var(--light-gray);
            color: var(--primary-orange);
            padding-left: 2rem;
        }
        
        /* Language Selector */
        .language-selector .dropdown-toggle {
            background-color: transparent;
            border: 1px solid var(--border-color);
            color: var(--dark-gray);
            font-weight: 500;
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
        }
        
        .language-selector .dropdown-toggle:hover {
            border-color: var(--primary-orange);
            background-color: var(--light-gray);
        }
        
        /* Mobile Menu */
        .navbar-toggler {
            border: none;
            padding: 0.5rem;
        }
        
        .navbar-toggler:focus {
            box-shadow: none;
        }
        
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28123, 44, 191, 1%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }
        
        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, var(--primary-purple) 0%, var(--primary-orange) 100%);
            color: white;
            padding: 4rem 0;
            margin-bottom: 3rem;
            position: relative;
            overflow: hidden;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h100v100H0z" fill="none"/><circle cx="50" cy="50" r="30" fill="rgba(255,255,255,0.05)"/></svg>');
            opacity: 0.3;
        }
        
        .hero-section h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            position: relative;
            z-index: 1;
            animation: fadeInUp 0.8s ease;
        }
        
        .hero-section p {
            font-size: 1.2rem;
            opacity: 0.95;
            position: relative;
            z-index: 1;
            animation: fadeInUp 1s ease;
        }
        
        @keyframes  fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Card Styles */
        .blog-card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            height: 100%;
            background: white;
        }
        
        .blog-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0,0,0,0.15);
        }
        
        .blog-card-img-wrapper {
            position: relative;
            overflow: hidden;
            height: 220px;
        }
        
        .blog-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .blog-card:hover img {
            transform: scale(1.1);
        }
        
        .blog-card-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.7) 0%, transparent 100%);
            padding: 1.5rem;
            color: white;
        }
        
        .blog-card-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background-color: var(--primary-orange);
            color: white;
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            z-index: 2;
            box-shadow: 0 2px 8px rgba(255,107,53,0.4);
        }
        
        .blog-card-body {
            padding: 1.5rem;
        }
        
        .blog-card-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.8rem;
            color: var(--dark-gray);
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            transition: color 0.3s ease;
        }
        
        .blog-card:hover .blog-card-title {
            color: var(--primary-purple);
        }
        
        .blog-card-text {
            color: #718096;
            font-size: 0.95rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .blog-card-footer {
            padding: 1rem 1.5rem;
            border-top: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.85rem;
            color: #A0AEC0;
        }
        
        /* Section Titles */
        .section-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 2rem;
            position: relative;
            padding-bottom: 1rem;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 80px;
            height: 4px;
            background: linear-gradient(to right, var(--primary-orange), var(--primary-purple));
            border-radius: 2px;
        }
        
        /* Breadcrumb */
        .breadcrumb {
            background-color: transparent;
            padding: 1rem 0;
            margin-bottom: 2rem;
        }
        
        .breadcrumb-item a {
            color: var(--primary-purple);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .breadcrumb-item a:hover {
            color: var(--primary-orange);
        }
        
        .breadcrumb-item.active {
            color: #718096;
        }
        
        /* Pagination */
        .pagination-wrapper {
            margin-top: 3rem;
            display: flex;
            justify-content: center;
        }
        
        .pagination {
            gap: 0.5rem;
        }
        
        .page-link {
            border: 1px solid var(--border-color);
            color: var(--dark-gray);
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .page-link:hover {
            background-color: var(--primary-orange);
            border-color: var(--primary-orange);
            color: white;
        }
        
        .page-item.active .page-link {
            background-color: var(--primary-purple);
            border-color: var(--primary-purple);
        }
        
        /* Footer */
        .footer {
            background-color: #1A202C;
            color: white;
            padding: 3rem 0 1rem;
            margin-top: 5rem;
        }
        
        .footer h5 {
            color: var(--primary-orange);
            font-weight: 600;
            margin-bottom: 1.5rem;
        }
        
        .footer a {
            color: #CBD5E0;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }
        
        .footer a:hover {
            color: var(--primary-orange);
            padding-left: 5px;
        }
        
        .footer-bottom {
            border-top: 1px solid #2D3748;
            padding-top: 1.5rem;
            margin-top: 2rem;
            text-align: center;
            color: #A0AEC0;
        }
        
        /* Loading Spinner */
        .loading-spinner {
            display: none;
            text-align: center;
            padding: 2rem;
        }
        
        .spinner-border {
            color: var(--primary-purple);
        }
        
        /* Responsive Styles */
        @media (max-width: 768px) {
            .hero-section h1 {
                font-size: 2rem;
            }
            
            .hero-section p {
                font-size: 1rem;
            }
            
            .section-title {
                font-size: 1.5rem;
            }
            
            .navbar-collapse {
                background-color: white;
                padding: 1rem;
                margin-top: 1rem;
                border-radius: 8px;
                box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            }
            
            .blog-card-img-wrapper {
                height: 200px;
            }
        }
    </style>
    
    <?php echo $__env->yieldPushContent('styles'); ?>
    
    
    <?php if(!empty($gtag)): ?>
    <?php echo $gtag; ?>

    <?php endif; ?>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="<?php echo e(app()->getLocale() === 'en' ? route('home') : route('home.localized', ['locale' => app()->getLocale()])); ?>">
                <i class="fas fa-gift"></i> Celebrate<span class="fest-text">FEST NOW</span>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->is(trim($category->slug, '/')) ? 'active' : ''); ?>" 
                           href="<?php echo e($category->url); ?>">
                            <?php echo e($category->name); ?>

                        </a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                
                
                <div class="dropdown language-selector">
                    <button class="btn dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown">
                        <i class="fas fa-globe"></i> <?php echo e(strtoupper(app()->getLocale())); ?>

                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <?php $__currentLoopData = \App\Models\MaterielTask::LANGUAGES(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a class="dropdown-item" href="<?php echo e($key === 'en' ? route('home') : route('home.localized', ['locale' => $key])); ?>">
                                <?php echo e($value); ?>

                            </a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    
    
    <?php if(isset($crumbs) && count($crumbs) > 1): ?>
    <div class="container mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
                <?php $__currentLoopData = $crumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $crumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="breadcrumb-item <?php echo e($loop->last ? 'active' : ''); ?>" 
                    itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <?php if(!$loop->last): ?>
                    <a href="<?php echo e($crumb['absolute_url']); ?>" itemprop="item">
                        <span itemprop="name"><?php echo e($crumb['title']); ?></span>
                    </a>
                    <?php else: ?>
                    <span itemprop="name"><?php echo e($crumb['title']); ?></span>
                    <?php endif; ?>
                    <meta itemprop="position" content="<?php echo e($index + 1); ?>">
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ol>
        </nav>
    </div>
    <?php endif; ?>
    
    
    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>
    
    
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5><i class="fas fa-gift"></i> Celebrate FEST NOW</h5>
                    <p>Learn the stories and meanings behind global festivals, then turn inspiration into action with party decor, family activities, tasty recipes, and thoughtful gifts.</p>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo e(app()->getLocale() === 'en' ? route('home') : route('home.localized', ['locale' => app()->getLocale()])); ?>">Home</a></li>
                        <li><a href="<?php echo e(app()->getLocale() === 'en' ? route('about') : route('about.localized', ['locale' => app()->getLocale()])); ?>">About</a></li>
                        <li><a href="<?php echo e(app()->getLocale() === 'en' ? route('contact') : route('contact.localized', ['locale' => app()->getLocale()])); ?>">Contact</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5>Categories</h5>
                    <ul class="list-unstyled">
                        <?php $__currentLoopData = $categories->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e($category->url); ?>"><?php echo e($category->name); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5>Legal</h5>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo e(app()->getLocale() === 'en' ? route('privacy') : route('privacy.localized', ['locale' => app()->getLocale()])); ?>">Privacy Policy</a></li>
                        <li><a href="<?php echo e(app()->getLocale() === 'en' ? route('terms') : route('terms.localized', ['locale' => app()->getLocale()])); ?>">Terms of Service</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; <?php echo e(date('Y')); ?> celebratefestnow.com. All rights reserved.</p>
            </div>
        </div>
    </footer>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH /Users/donghuijiao/Downloads/template2 3/resources/views/layout.blade.php ENDPATH**/ ?>