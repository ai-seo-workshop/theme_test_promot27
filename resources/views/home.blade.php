@extends('layout')

@section('title', $seoInfo->seo_title ?? config('app.name'))
@section('description', $seoInfo->seo_desc ?? '')

@section('canonical')
<link rel="canonical" href="{{ route_slash() }}">
@endsection

@section('schema')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebSite",
  "name": "{{ config('app.name') }}",
  "url": "{{ route_slash() }}"
}
</script>
@endsection

@section('content')
<h1 class="sr-only">{{ $seoInfo->h1 ?? '' }}</h1>
<div class="builder56 sectionlist">
  {{-- Featured section: big article + list --}}
  @if(!empty($latestBlogs) && $latestBlogs->count() > 0)
  <div class="section-block section-block--featured">
    <div class="container container--main">
      <div class="featured-group">
        {{-- Big featured post (first item) --}}
        <div class="featured-main">
          @php $featuredPost = $latestBlogs->first(); @endphp
          @if($featuredPost)
          <article class="post-card post-card--big">
            @if($featuredPost->head_img)
            <figure class="post-card__thumbnail">
              <a href="{{ $featuredPost->url }}">
                <img src="{{ $featuredPost->head_img }}" alt="{{ $featuredPost->head_img_alt ?: $featuredPost->title }}" loading="eager" decoding="async">
              </a>
            </figure>
            @endif
            <div class="post-card__text">
              <div class="post-meta post-meta--category">
                <a href="{{ $featuredPost->category->url ?? '#' }}" class="post-meta__cat">{{ $featuredPost->category_name }}</a>
              </div>
              <h2 class="post-card__title post-card__title--big">
                <a href="{{ $featuredPost->url }}">{{ $featuredPost->title }}</a>
              </h2>
              @if($featuredPost->summary)
              <div class="post-card__excerpt">{{ $featuredPost->summary }}</div>
              @endif
              <div class="post-meta post-meta--byline">
                <span class="post-meta__author">{{ \App\Models\MaterielTask::by(app()->getLocale()) }} {{ $featuredPost->author }}</span>
                <span class="post-meta__sep">·</span>
                <span class="post-meta__date">{{ $featuredPost->published_at->format('F j, Y') }}</span>
              </div>
            </div>
          </article>
          @endif
        </div>
        {{-- List of next 4 posts --}}
        <div class="featured-list">
          @foreach($latestBlogs->skip(1)->take(4) as $post)
          <article class="post-card post-card--list">
            <div class="post-card__text">
              <h2 class="post-card__title post-card__title--list">
                <a href="{{ $post->url }}">{{ $post->title }}</a>
              </h2>
              @if($post->summary)
              <div class="post-card__excerpt post-card__excerpt--short">{{ Str::limit($post->summary, 80) }}</div>
              @endif
            </div>
            @if($post->head_img)
            <figure class="post-card__thumbnail post-card__thumbnail--small">
              <a href="{{ $post->url }}">
                <img src="{{ $post->head_img }}" alt="{{ $post->head_img_alt ?: $post->title }}" loading="lazy" decoding="async">
              </a>
            </figure>
            @endif
          </article>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  @endif

  {{-- Hot Topics section --}}
  @if(!empty($hotBlogs) && $hotBlogs->count() > 0)
  <div class="section-block">
    <div class="container container--main">
      <h2 class="section-heading">{{ \App\Models\MaterielTask::hot_topics(app()->getLocale()) }}</h2>
      <div class="blog-grid blog-grid--4cols">
        @foreach($hotBlogs as $post)
        @include('partials.post-card', ['post' => $post])
        @endforeach
      </div>
    </div>
  </div>
  @endif

  {{-- Per-category sections --}}
  @if(!empty($blogs))
  @foreach($blogs as $categoryId => $categoryPosts)
  @php $firstPost = $categoryPosts->first(); @endphp
  <div class="section-block">
    <div class="container container--main">
      <h2 class="section-heading">
        @if($firstPost && $firstPost->category)
        <a href="{{ $firstPost->category->url }}">{{ $firstPost->category_name }}</a>
        @else
        {{ $firstPost->category_name ?? '' }}
        @endif
      </h2>
      <div class="blog-grid blog-grid--4cols">
        @foreach($categoryPosts->take(4) as $post)
        @include('partials.post-card', ['post' => $post])
        @endforeach
      </div>
    </div>
  </div>
  @endforeach
  @endif
</div>
@endsection
