@extends('layout')

@section('title', $pageInfo->seo_title ?? ($pageInfo->h1 . ' - ' . config('app.name')))
@section('description', $pageInfo->seo_desc ?? '')

@section('content')
<div class="static-page">
  <div class="container container--narrow">
    @include('partials.breadcrumb')
    <h1 class="page-title">{{ $pageInfo->h1 }}</h1>
    <div class="page-content entry-content">
      {!! $pageInfo->content !!}
    </div>
  </div>
</div>
@endsection
