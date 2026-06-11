<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', config('app.name'))</title>
  <meta name="description" content="@yield('description', '')">
  @yield('canonical')
  {!! $alternate_tag ?? '' !!}
  <link rel="icon" href="{{ asset('favicon.ico') }}">
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  @stack('styles')
  @yield('schema')
  @if(!empty($gtag))
  <!-- Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id={{ $gtag }}"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', '{{ $gtag }}');
  </script>
  @endif
</head>
<body>
<div id="wi-all" class="fox-outer-wrapper">
  <!-- Desktop Masthead (topbar + logo + nav) -->
  <div class="masthead masthead--sticky">
    <div class="masthead__wrapper">
      <!-- Topbar: hamburger + date -->
      <div class="topbar">
        <div class="container topbar__container">
          <div class="topbar__row">
            <div class="topbar__left">
              <button class="hamburger" id="menuToggle" aria-expanded="false" aria-label="Toggle navigation">
                <span class="hamburger__line"></span>
                <span class="hamburger__line"></span>
                <span class="hamburger__line"></span>
              </button>
            </div>
            <div class="topbar__center"></div>
            <div class="topbar__right">
              <span class="topbar__date" id="todayDate"></span>
            </div>
          </div>
        </div>
      </div>
      <!-- Main header: Logo -->
      <div class="main-header">
        <div class="container main-header__container">
          <div class="main-header__logo">
            <a href="/" aria-label="{{ config('app.name') }}">
              <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }}" class="logo-img" loading="eager">
            </a>
          </div>
        </div>
      </div>
      <!-- Navigation bar -->
      <nav class="nav-bar" role="navigation" aria-label="Main navigation">
        <div class="container nav-bar__container">
          <ul class="nav-bar__menu">
            <li class="nav-bar__item"><a href="/" class="nav-bar__link">{{ \App\Models\MaterielTask::home(app()->getLocale()) }}</a></li>
            @foreach($categories ?? [] as $cat)
            <li class="nav-bar__item"><a href="{{ $cat->url }}" class="nav-bar__link">{{ $cat->name }}</a></li>
            @endforeach
            @foreach(\App\Models\MaterielTask::SUPPORTS(app()->getLocale()) as $page)
            <li class="nav-bar__item"><a href="/{{ $page['uri'] }}" class="nav-bar__link">{{ $page['name'] }}</a></li>
            @endforeach
          </ul>
        </div>
      </nav>
    </div>
  </div>

  <!-- Mobile Header -->
  <div class="mobile-header" id="mobileHeader">
    <div class="container mobile-header__container">
      <div class="mobile-header__row">
        <div class="mobile-header__left">
          <button class="hamburger hamburger--mobile" id="mobileMenuToggle" aria-expanded="false" aria-label="Toggle navigation">
            <span class="hamburger__line"></span>
            <span class="hamburger__line"></span>
            <span class="hamburger__line"></span>
          </button>
        </div>
        <div class="mobile-header__center">
          <a href="/" class="mobile-header__logo">
            <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }}" class="logo-img logo-img--mobile" loading="eager">
          </a>
        </div>
        <div class="mobile-header__right"></div>
      </div>
    </div>
  </div>

  <!-- Page Content -->
  <div class="page-content">
    @yield('content')
  </div>

  <!-- Footer -->
  <footer id="wi-footer" class="site-footer" role="contentinfo">
    <div class="footer-widgets">
      <div class="container">
        <div class="footer-widgets__row">
          <div class="footer-widgets__col">
            <h3 class="footer-widget__title">{{ \App\Models\MaterielTask::recent_posts(app()->getLocale()) }}</h3>
            {{-- Recent posts could be added here if available --}}
          </div>
          <div class="footer-widgets__col">
            <h3 class="footer-widget__title">{{ \App\Models\MaterielTask::company(app()->getLocale()) }}</h3>
            <ul class="footer-widget__list">
              @foreach(\App\Models\MaterielTask::SUPPORTS(app()->getLocale()) as $page)
              <li><a href="/{{ $page['uri'] }}">{{ $page['name'] }}</a></li>
              @endforeach
            </ul>
          </div>
          <div class="footer-widgets__col">
            <h3 class="footer-widget__title">{{ \App\Models\MaterielTask::resource(app()->getLocale()) }}</h3>
            <ul class="footer-widget__list">
              @foreach($categories ?? [] as $cat)
              <li><a href="{{ $cat->url }}">{{ $cat->name }}</a></li>
              @endforeach
            </ul>
          </div>
          <div class="footer-widgets__col">
            <h3 class="footer-widget__title">{{ \App\Models\MaterielTask::legal(app()->getLocale()) }}</h3>
            <ul class="footer-widget__list">
              @foreach(\App\Models\MaterielTask::SUPPORTS(app()->getLocale()) as $page)
              <li><a href="/{{ $page['uri'] }}">{{ $page['name'] }}</a></li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="footer-bottom__logo">
          <a href="/"><img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }}" class="footer-logo" loading="lazy"></a>
        </div>
        <div class="footer-bottom__copyright">
          <p>&copy; {{ config('app.name') }} {{ date('Y') }} &mdash; {{ \App\Models\MaterielTask::copyright(app()->getLocale()) }}</p>
        </div>
        <nav class="footer-bottom__nav" role="navigation" aria-label="Footer navigation">
          <ul class="footer-nav__list">
            @foreach(\App\Models\MaterielTask::SUPPORTS(app()->getLocale()) as $page)
            <li><a href="/{{ $page['uri'] }}">{{ $page['name'] }}</a></li>
            @endforeach
          </ul>
        </nav>
      </div>
    </div>
  </footer>

  <!-- Decorative border accents -->
  <div class="handborder handborder--top" aria-hidden="true"></div>
  <div class="handborder handborder--right" aria-hidden="true"></div>
  <div class="handborder handborder--bottom" aria-hidden="true"></div>
  <div class="handborder handborder--left" aria-hidden="true"></div>
</div>

<!-- Mobile offcanvas nav overlay -->
<div class="offcanvas" id="offcanvas" aria-hidden="true">
  <div class="offcanvas__container">
    <button class="offcanvas__close" id="offcanvasClose" aria-label="Close navigation">&times;</button>
    <nav class="offcanvas__nav" aria-label="Mobile navigation">
      <ul class="offcanvas__menu">
        <li><a href="/">{{ \App\Models\MaterielTask::home(app()->getLocale()) }}</a></li>
        @foreach($categories ?? [] as $cat)
        <li><a href="{{ $cat->url }}">{{ $cat->name }}</a></li>
        @endforeach
        @foreach(\App\Models\MaterielTask::SUPPORTS(app()->getLocale()) as $page)
        <li><a href="/{{ $page['uri'] }}">{{ $page['name'] }}</a></li>
        @endforeach
      </ul>
    </nav>
  </div>
</div>
<div class="offcanvas__overlay" id="offcanvasOverlay"></div>

<script src="{{ asset('js/main.js') }}" defer></script>
@stack('scripts')
</body>
</html>
