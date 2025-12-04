<header class="header">
  <div class="header-wrapper">

    <div class="header-left-part">
    <a class="header-logo" href="{{ home_url('/') }}">
      <img src="@asset('images/logo.svg')" alt="logo" class="header-logo-img">
    </a>
    @if (has_nav_menu('primary_navigation'))
      <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
      </nav>
    @endif
  </div>
    <div class="header-right-part">
      <a href="tel:+78001234567" class="header-tel">+7 (800) 123-45-67</a>
      <div class="header-cta-button-wrapper">
        <a href="#" class="header-cta-button"><span class="text-button">ОСТАВИТЬ ЗАЯВКУ</span></a>
        <span class="header-cta-button-hours">Прием заявок с 9:00 до 18:00</span>
      </div>
    </div>
  </div>
</header>

<header class="mobile-header">
  <div class="header-m">
    <a class="header-logo" href="{{ home_url('/') }}">
      <img src="@asset('images/logo.svg')" alt="logo" class="header-logo-img">
    </a>
    <input id="burger" type="checkbox" />


      <label for="burger">
        <span></span>
        <span></span>
        <span></span>
      </label>

    <nav>
      <ul>
        <li class="burger-menu-link"><a href="#autopark"><span class="text-button">АВТОПАРК</span></a></li>
        <li class="burger-menu-link"><a href="#tariffs"><span class="text-button">ТАРИФЫ</span></a></li>
        <li class="burger-tel"><a href="tel:+78001234567"><span class="text-button">+7 (800) 123-45-67</span></a></li>
        <li class="burger-cta-button-li"><a class="burger-cta-button" href="#"><span class="text-button">ОСТАВИТЬ ЗАЯВКУ</span></a></li>
        <li class="burger-time"><span class="burger-time-text caption">Прием заявок с 9:00 до 18:00</span></li>
      </ul>

    </nav>
  </div>
</header>

