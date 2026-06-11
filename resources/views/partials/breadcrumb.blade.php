@if(isset($crumbs) && count($crumbs) > 1)
<nav class="breadcrumb" aria-label="Breadcrumb">
  <ol class="breadcrumb__list">
    @foreach($crumbs as $index => $crumb)
    <li class="breadcrumb__item">
      @if($index < count($crumbs) - 1)
        <a href="{{ $crumb['absolute_url'] }}" class="breadcrumb__link">{{ $crumb['title'] }}</a>
        <span class="breadcrumb__sep" aria-hidden="true">/</span>
      @else
        <span class="breadcrumb__current">{{ $crumb['title'] }}</span>
      @endif
    </li>
    @endforeach
  </ol>
</nav>
@endif
