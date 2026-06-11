@extends('layout')

@section('title', $seoInfo->seo_title ?? ($categoryInfo->name . ' - ' . config('app.name')))
@section('description', $seoInfo->seo_desc ?? '')

@section('canonical')
<link rel="canonical" href="{{ $categoryInfo->absoluteUrl() }}">
@endsection

@section('schema')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "CollectionPage",
  "name": "{{ $categoryInfo->name }}",
  "url": "{{ $categoryInfo->absoluteUrl() }}"
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
}
</script>
@endsection

@section('content')
<div class="category-page">
  <div class="container container--main">
    <div class="category-header">
      @include('partials.breadcrumb')
      <h1 class="category-title">{{ $categoryInfo->name }}</h1>
    </div>
    <div class="blog-grid blog-grid--4cols" id="articleList">
      @include('partials.article-list')
    </div>
    @include('partials.pagination', ['paginator' => $blogs])
  </div>
</div>
@endsection

@push('scripts')
<script>
  // AJAX pagination
  document.addEventListener('click', function(e) {
    const link = e.target.closest('.pagination__link[href]');
    if (!link) return;
    const url = new URL(link.href);
    if (!url.searchParams.has('page')) return;
    e.preventDefault();
    const page = url.searchParams.get('page');
    fetch('?' + new URLSearchParams({page}).toString(), {
      headers: {'X-Requested-With': 'XMLHttpRequest'}
    })
    .then(r => r.text())
    .then(html => {
      document.getElementById('articleList').innerHTML = html;
      window.scrollTo({top: 0, behavior: 'smooth'});
    });
  });
</script>
@endpush
