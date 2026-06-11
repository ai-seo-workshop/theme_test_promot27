@if($paginator->hasPages())
<nav class="pagination" aria-label="Pagination">
  <ul class="pagination__list">
    @if($paginator->onFirstPage())
    <li class="pagination__item pagination__item--disabled">
      <span class="pagination__link">&laquo;</span>
    </li>
    @else
    <li class="pagination__item">
      <a href="{{ $paginator->previousPageUrl() }}" class="pagination__link" aria-label="Previous">&laquo;</a>
    </li>
    @endif

    @foreach($paginator->getUrlRange(max(1, $paginator->currentPage()-2), min($paginator->lastPage(), $paginator->currentPage()+2)) as $page => $url)
    <li class="pagination__item {{ $page == $paginator->currentPage() ? 'pagination__item--active' : '' }}">
      @if($page == $paginator->currentPage())
      <span class="pagination__link pagination__link--current">{{ $page }}</span>
      @else
      <a href="{{ $url }}" class="pagination__link">{{ $page }}</a>
      @endif
    </li>
    @endforeach

    @if($paginator->hasMorePages())
    <li class="pagination__item">
      <a href="{{ $paginator->nextPageUrl() }}" class="pagination__link" aria-label="Next">&raquo;</a>
    </li>
    @else
    <li class="pagination__item pagination__item--disabled">
      <span class="pagination__link">&raquo;</span>
    </li>
    @endif
  </ul>
</nav>
@endif
