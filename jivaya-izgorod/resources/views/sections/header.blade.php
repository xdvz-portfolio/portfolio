<header class="banner">
  <div class="container">
    <div class="header__wrapper">
      <a class="brand" href="{{ home_url('/') }}">
        <img src="@asset('images/logo.png')" alt="Живая изгородь">
      </a>
      @if (has_nav_menu('primary_navigation'))
        <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
          {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
        </nav>
      @endif

      <a href="tel:+79991234567" class="header__tel">+7 (999) 123-45-67</a>
    </div>
  </div>
</header>
