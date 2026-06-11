<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ \App\Models\MaterielTask::page_not_found(app()->getLocale()) }} - {{ config('app.name') }}</title>
  <link rel="icon" href="{{ asset('favicon.ico') }}">
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>
<div id="wi-all" class="fox-outer-wrapper">
  <div class="masthead masthead--sticky">
    <div class="masthead__wrapper">
      <div class="main-header">
        <div class="container main-header__container">
          <div class="main-header__logo">
            <a href="/"><img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }}" class="logo-img" loading="eager"></a>
          </div>
        </div>
      </div>
      <nav class="nav-bar" role="navigation" aria-label="Main navigation">
        <div class="container nav-bar__container">
          <ul class="nav-bar__menu">
            <li class="nav-bar__item"><a href="/" class="nav-bar__link">{{ \App\Models\MaterielTask::home(app()->getLocale()) }}</a></li>
            @foreach($categories ?? [] as $cat)
            <li class="nav-bar__item"><a href="{{ $cat->url }}" class="nav-bar__link">{{ $cat->name }}</a></li>
            @endforeach
          </ul>
        </div>
      </nav>
    </div>
  </div>
  <div class="page-content">
    <div class="error-404">
      <div class="container container--narrow">
        <h1 class="error-404__title">{{ \App\Models\MaterielTask::page_not_found(app()->getLocale()) }}</h1>
        <p class="error-404__desc">{{ \App\Models\MaterielTask::desc_1_404(app()->getLocale()) }}</p>
        <p class="error-404__desc">{{ \App\Models\MaterielTask::desc_2_404(app()->getLocale()) }}</p>
        <a href="/" class="error-404__btn">{{ \App\Models\MaterielTask::go_to_homepage(app()->getLocale()) }}</a>
        @if(!empty($categories))
        <div class="error-404__categories">
          <h2 class="error-404__cat-title">{{ \App\Models\MaterielTask::popular_destinations(app()->getLocale()) }}</h2>
          <ul class="error-404__cat-list">
            @foreach($categories as $cat)
            <li><a href="{{ $cat->url }}">{{ $cat->name }}</a></li>
            @endforeach
          </ul>
        </div>
        @endif
      </div>
    </div>
  </div>
  <footer id="wi-footer" class="site-footer" role="contentinfo">
    <div class="footer-bottom">
      <div class="container">
        <div class="footer-bottom__copyright">
          <p>&copy; {{ config('app.name') }} {{ date('Y') }} &mdash; {{ \App\Models\MaterielTask::copyright(app()->getLocale()) }}</p>
        </div>
      </div>
    </div>
  </footer>
</div>
<script src="{{ asset('js/main.js') }}" defer></script>
</body>
</html>
