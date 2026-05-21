<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?php echo $__env->yieldContent('title'); ?></title>
    <meta name="description" content="<?php echo $__env->yieldContent('description'); ?>">

    <link rel="canonical" href="<?php echo e(url()->current()); ?>">
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico?v=1.0">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/all.min.css">
    <link rel="stylesheet" href="/css/main.css">

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="<?php echo e(app()->getLocale() === 'en' ? '/' : '/'.app()->getLocale(). '/'); ?>">
                <img src="/images/logo.png?v=1.0" alt="<?php echo e(config('app.name')); ?>">
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
                            <?php if(app()->getLocale() != $key): ?>
                                <a class="dropdown-item" href="<?php echo e($key === 'en' ? '/' : '/'.$key.'/'); ?>">
                                    <?php echo e($value); ?>

                                </a>
                            <?php endif; ?>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    
    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    
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

    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/jquery-3.7.0.min.js"></script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH /Library/WebServer/Documents/work/php/template2/resources/views/layout.blade.php ENDPATH**/ ?>