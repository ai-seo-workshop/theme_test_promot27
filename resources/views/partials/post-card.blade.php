<article class="post-card post-card--grid">
  @if($post->head_img)
  <figure class="post-card__thumbnail">
    <a href="{{ $post->url }}">
      <img src="{{ $post->head_img }}" alt="{{ $post->head_img_alt ?: $post->title }}" loading="lazy" decoding="async">
    </a>
  </figure>
  @endif
  <div class="post-card__text">
    <div class="post-meta post-meta--category">
      <a href="{{ $post->category->url ?? '#' }}" class="post-meta__cat">{{ $post->category_name }}</a>
    </div>
    <h2 class="post-card__title">
      <a href="{{ $post->url }}">{{ $post->title }}</a>
    </h2>
    @if(isset($showExcerpt) && $showExcerpt && $post->summary)
    <div class="post-card__excerpt">{{ Str::limit($post->summary, 120) }}</div>
    @endif
    <div class="post-meta post-meta--date">
      <span class="post-meta__date">{{ $post->published_at->format('M j, Y') }}</span>
    </div>
  </div>
</article>
