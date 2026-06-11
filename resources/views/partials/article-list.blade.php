@foreach($blogs as $blog)
@include('partials.post-card', ['post' => $blog, 'showExcerpt' => true])
@endforeach
