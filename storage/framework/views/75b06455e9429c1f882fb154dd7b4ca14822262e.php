<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?php echo $__env->yieldContent('title'); ?></title>
    <meta name="description" content="<?php echo $__env->yieldContent('description'); ?>">

    <link rel="canonical" href="<?php echo e(url()->current()); ?>/">
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
    <link rel="stylesheet" href="/css/all.min.css?v=1.1">
    <link rel="stylesheet" href="/css/main.css?v=1.7">

    <?php if(!empty($alternate_tag)): ?> <?php echo $alternate_tag; ?> <?php endif; ?>
    <?php if(!empty($gtag)): ?><?php echo $gtag; ?><?php endif; ?>

    <?php if(isset($crumbs) && count($crumbs) > 0): ?>
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "BreadcrumbList",
            "itemListElement": [
                <?php $__currentLoopData = $crumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $crumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                {
                    "@type": "ListItem",
                    "position": <?php echo e($index + 1); ?>,
                        "name": "<?php echo str_replace("\"", "\\\"", $crumb['title']); ?>",
                        "item": "<?php echo e($crumb['absolute_url']); ?>"
                    }<?php if(!$loop->last): ?>,<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            ]
        }
    </script>
    <?php endif; ?>
    <?php if(isset($blog) && $blog and in_array(\Illuminate\Support\Facades\Route::currentRouteName(), ['blog', 'blog.show', 'blog.show.localized'])): ?>
    <script type="application/ld+json">
    [
        {
            "@context": "https://schema.org",
            "@type": "Article",
            "mainEntityOfPage": {
                "@type": "WebPage",
                "@id": "<?php echo e(request()->url()); ?>/"
            },
            "headline": <?php echo json_encode(html_entity_decode($blog->title, ENT_QUOTES), JSON_UNESCAPED_UNICODE); ?>,
            "datePublished": "<?php echo e(date("Y-m-d\TH:i:sP", strtotime($blog->published_at))); ?>",
            "dateModified": "<?php echo e(date("Y-m-d\TH:i:sP", strtotime($blog->update_time))); ?>",
            "description": <?php echo json_encode(html_entity_decode($blog->summary, ENT_QUOTES), JSON_UNESCAPED_UNICODE); ?>,
            "image": {
                "@type": "ImageObject",
                "url": "<?php echo e(request()->root().$blog->head_img); ?>",
                "contentUrl": "<?php echo e(request()->root().$blog->head_img); ?>"
            }
        }
        <?php if(!empty($blog->faq)): ?>,
        {
            "@context": "https://schema.org",
            "@type": "FAQPage",
            "mainEntity": [
               <?php $__currentLoopData = $blog->faq; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                [
                   {
                       "@type": "Question",
                       "name": <?php echo json_encode(html_entity_decode($faq['question'], ENT_QUOTES), JSON_UNESCAPED_UNICODE); ?>,
                       "acceptedAnswer": [
                           {
                               "@type": "Answer",
                               "text": <?php echo json_encode(html_entity_decode($faq['answer'], ENT_QUOTES), JSON_UNESCAPED_UNICODE); ?>

                                }
                            ]
                   }
                ]
                <?php if(!$loop->last): ?>,<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            ]
        }
        <?php endif; ?>
            ]
    </script>
    <?php endif; ?>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg" id="header">
        <div class="container">
            <a class="navbar-brand" href="<?php echo e(app()->getLocale() === 'en' ? '/' : '/'.app()->getLocale(). '/'); ?>">
                <img src="/images/logo.png?v=1.1" alt="<?php echo e(config('app.name')); ?>">
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
    <!-- Scroll to Top Button -->
    <button class="scroll-to-top" id="scrollToTop" onclick="scrollToTop()" aria-label="Scroll to top">↑</button>

    
    <footer class="footer">
        <div class="container message">
            <div>
                <p class="footer-title"><?php echo e(config('app.name')); ?></p>
                <p><?php echo e(\App\Models\MaterielTask::homeH1(app()->getLocale())); ?></p>
            </div>

            <div>
                <p class="footer-title"><?php echo e(\App\Models\MaterielTask::company(app()->getLocale())); ?></p>
                <ul class="list-unstyled">
                    <li><a href="<?php echo e(app()->getLocale() === 'en' ? '/' : '/'.app()->getLocale().'/'); ?>"><?php echo e(\App\Models\MaterielTask::home(app()->getLocale())); ?></a></li>
                    <?php $__currentLoopData = \App\Models\MaterielTask::SUPPORTS(app()->getLocale()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(in_array($key, [2, 3])): ?>
                            <?php if(app()->getLocale() === 'en'): ?>
                                <li><a href="<?php echo e("/".$value['uri']."/"); ?>"><?php echo e($value['name']); ?></a></li>
                            <?php else: ?>
                                <li><a href="<?php echo e("/".app()->getLocale().'/'.$value['uri']."/"); ?>"><?php echo e($value['name']); ?></a></li>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>

            <div>
                <p class="footer-title"><?php echo e(\App\Models\MaterielTask::resource(app()->getLocale())); ?></p>
                <ul class="list-unstyled">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e($category->url); ?>"><?php echo e($category->name); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>

            <div>
                <p class="footer-title"><?php echo e(\App\Models\MaterielTask::legal(app()->getLocale())); ?></p>
                <ul class="list-unstyled">
                    <?php $__currentLoopData = \App\Models\MaterielTask::SUPPORTS(app()->getLocale()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(in_array($key, [4, 7])): ?>
                            <?php if(app()->getLocale() === 'en'): ?>
                                <li><a href="<?php echo e("/".$value['uri']."/"); ?>"><?php echo e($value['name']); ?></a></li>
                            <?php else: ?>
                                <li><a href="<?php echo e("/".app()->getLocale().'/'.$value['uri']."/"); ?>"><?php echo e($value['name']); ?></a></li>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
        <div class="footer-bottom container">
            <p>&copy; <?php echo e(date('Y')); ?> <?php echo e(config('app.domain')); ?>. <?php echo e(\App\Models\MaterielTask::copyright(app()->getLocale())); ?></p>
        </div>
    </footer>

    <script src="/js/jquery-3.7.0.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/main.js"></script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH /Library/WebServer/Documents/work/php/blog_techlysupport_site/resources/views/layout.blade.php ENDPATH**/ ?>