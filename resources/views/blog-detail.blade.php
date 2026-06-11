@extends('layout')

@section('title', $blog->title . ' - ' . config('app.name'))
@section('description', $blog->summary ?? '')

@section('canonical')
<link rel="canonical" href="{{ $blog->absoluteUrl() }}">
@endsection

@section('schema')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Article",
  "headline": "{{ $blog->title }}",
  "datePublished": "{{ $blog->published_at->toIso8601String() }}",
  "author": {
    "@type": "Person",
    "name": "{{ $blog->author }}"
  },
  "url": "{{ $blog->absoluteUrl() }}"
  @if(isset($crumbs) && count($crumbs) > 1)
  ,"breadcrumb": {
    "@type": "BreadcrumbList",
    "itemListElement": [
      @foreach($crumbs as $i => $crumb)
      {
        "@type": "ListItem",
        "position": {{ $i + 1 }},
        "name": "{{ $crumb['title'] }}",
        "item": "{{ $crumb['absolute_url'] }}"
      }{{ !$loop->last ? ',' : '' }}
      @endforeach
    ]
  }
  @endif
  @if($blog->faq && count($blog->faq) > 0)
  ,"faq": {
    "@type": "FAQPage",
    "mainEntity": [
      @foreach($blog->faq as $item)
      {
        "@type": "Question",
        "name": "{{ $item['question'] }}",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "{{ strip_tags($item['answer']) }}"
        }
      }{{ !$loop->last ? ',' : '' }}
      @endforeach
    ]
  }
  @endif
}
</script>
@endsection

@section('content')
<div class="single-placement">
  <article class="single-article single-article--narrow">
    <div class="container container--single-header">
      <div class="article-header">
        @include('partials.breadcrumb')
        <div class="article-meta article-meta--top">
          <span class="article-meta__date">{{ $blog->published_at->format('M j, Y') }}</span>
          <span class="article-meta__sep">·</span>
          <span class="article-meta__author">{{ \App\Models\MaterielTask::by(app()->getLocale()) }} {{ $blog->author }}</span>
        </div>
        <h1 class="article-title">{!! $blog->h1 !!}</h1>
        <div class="article-meta article-meta--category">
          <span class="article-meta__label">{{ \App\Models\MaterielTask::filedUnder(app()->getLocale()) }}:</span>
          <a href="{{ $blog->category->url ?? '#' }}" class="article-meta__cat">{{ $blog->category_name }}</a>
        </div>
      </div>
    </div>
    <div class="container container--main">
      <div class="article-body">
        <div class="entry-content">
          {!! $blog->content !!}
        </div>

        @if($blog->faq && count($blog->faq) > 0)
        <div class="article-faq">
          <h2 class="article-faq__title">FAQ</h2>
          @foreach($blog->faq as $item)
          <div class="faq-item">
            <h3 class="faq-item__question">{{ $item['question'] }}</h3>
            <div class="faq-item__answer">{!! $item['answer'] !!}</div>
          </div>
          @endforeach
        </div>
        @endif

        @if(isset($relatedBlogs) && $relatedBlogs->count() > 0)
        <div class="related-posts">
          <p class="related-posts__heading">{{ \App\Models\MaterielTask::related_posts(app()->getLocale()) }}</p>
          <div class="blog-grid blog-grid--3cols">
            @foreach($relatedBlogs as $related)
            @include('partials.post-card', ['post' => $related, 'showExcerpt' => false])
            @endforeach
          </div>
        </div>
        @endif
      </div>
    </div>
  </article>
</div>
@endsection
