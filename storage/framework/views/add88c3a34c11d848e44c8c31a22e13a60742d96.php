<?php $__env->startSection('title', $seoInfo->seo_title ?? config('app.name')); ?>
<?php $__env->startSection('description', $seoInfo->seo_desc ?? ''); ?>

<?php $__env->startSection('canonical'); ?>
<link rel="canonical" href="<?php echo e(route_slash()); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('schema'); ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebSite",
  "name": "<?php echo e(config('app.name')); ?>",
  "url": "<?php echo e(route_slash()); ?>"
}
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h1 class="sr-only"><?php echo e($seoInfo->h1 ?? ''); ?></h1>
<div class="builder56 sectionlist">
  
  <?php if(!empty($latestBlogs) && $latestBlogs->count() > 0): ?>
  <div class="section-block section-block--featured">
    <div class="container container--main">
      <div class="featured-group">
        
        <div class="featured-main">
          <?php $featuredPost = $latestBlogs->first(); ?>
          <?php if($featuredPost): ?>
          <article class="post-card post-card--big">
            <?php if($featuredPost->head_img): ?>
            <figure class="post-card__thumbnail">
              <a href="<?php echo e($featuredPost->url); ?>">
                <img src="<?php echo e($featuredPost->head_img); ?>" alt="<?php echo e($featuredPost->head_img_alt ?: $featuredPost->title); ?>" loading="eager" decoding="async">
              </a>
            </figure>
            <?php endif; ?>
            <div class="post-card__text">
              <div class="post-meta post-meta--category">
                <a href="<?php echo e($featuredPost->category->url ?? '#'); ?>" class="post-meta__cat"><?php echo e($featuredPost->category_name); ?></a>
              </div>
              <h2 class="post-card__title post-card__title--big">
                <a href="<?php echo e($featuredPost->url); ?>"><?php echo e($featuredPost->title); ?></a>
              </h2>
              <?php if($featuredPost->summary): ?>
              <div class="post-card__excerpt"><?php echo e($featuredPost->summary); ?></div>
              <?php endif; ?>
              <div class="post-meta post-meta--byline">
                <span class="post-meta__author"><?php echo e(\App\Models\MaterielTask::by(app()->getLocale())); ?> <?php echo e($featuredPost->author); ?></span>
                <span class="post-meta__sep">·</span>
                <span class="post-meta__date"><?php echo e($featuredPost->published_at->format('F j, Y')); ?></span>
              </div>
            </div>
          </article>
          <?php endif; ?>
        </div>
        
        <div class="featured-list">
          <?php $__currentLoopData = $latestBlogs->skip(1)->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <article class="post-card post-card--list">
            <div class="post-card__text">
              <h2 class="post-card__title post-card__title--list">
                <a href="<?php echo e($post->url); ?>"><?php echo e($post->title); ?></a>
              </h2>
              <?php if($post->summary): ?>
              <div class="post-card__excerpt post-card__excerpt--short"><?php echo e(Str::limit($post->summary, 80)); ?></div>
              <?php endif; ?>
            </div>
            <?php if($post->head_img): ?>
            <figure class="post-card__thumbnail post-card__thumbnail--small">
              <a href="<?php echo e($post->url); ?>">
                <img src="<?php echo e($post->head_img); ?>" alt="<?php echo e($post->head_img_alt ?: $post->title); ?>" loading="lazy" decoding="async">
              </a>
            </figure>
            <?php endif; ?>
          </article>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>

  
  <?php if(!empty($hotBlogs) && $hotBlogs->count() > 0): ?>
  <div class="section-block">
    <div class="container container--main">
      <h2 class="section-heading"><?php echo e(\App\Models\MaterielTask::hot_topics(app()->getLocale())); ?></h2>
      <div class="blog-grid blog-grid--4cols">
        <?php $__currentLoopData = $hotBlogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $__env->make('partials.post-card', ['post' => $post], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
  </div>
  <?php endif; ?>

  
  <?php if(!empty($blogs)): ?>
  <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryId => $categoryPosts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <?php $firstPost = $categoryPosts->first(); ?>
  <div class="section-block">
    <div class="container container--main">
      <h2 class="section-heading">
        <?php if($firstPost && $firstPost->category): ?>
        <a href="<?php echo e($firstPost->category->url); ?>"><?php echo e($firstPost->category_name); ?></a>
        <?php else: ?>
        <?php echo e($firstPost->category_name ?? ''); ?>

        <?php endif; ?>
      </h2>
      <div class="blog-grid blog-grid--4cols">
        <?php $__currentLoopData = $categoryPosts->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $__env->make('partials.post-card', ['post' => $post], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
  </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/www/theme_test_promot27/resources/views/home.blade.php ENDPATH**/ ?>