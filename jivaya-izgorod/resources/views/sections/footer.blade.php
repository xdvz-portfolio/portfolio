<footer class="content-info">
  <div class="container">
    <div class="footer__column-wrapper">
      <div class="footer__column">
        <img src="@asset('images/footer-logo.png')" alt="Живая изгородь" class="footer-logo">
      </div>
      <div class="footer__column">
        <nav class="nav-secondary" aria-label="{{ wp_get_nav_menu_name('secondary_navigation') }}">
          {!! wp_nav_menu(['theme_location' => 'secondary_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
        </nav>
      </div>
      <div class="footer__column">
        <a href="#" class="cta-click">
          <div class="footer-cta button-white">ОСТАВИТЬ ЗАЯВКУ</div>
        </a>
        <a href="tel:+79991234567" class="footer-tel">+7 (999) 123-45-67</a>
        <a href="mailto:info@example.com" class="footer-email">info@example.com</a>
      </div>
    </div>
    <div class="footer__row">
      <p class="footer-policy">Политика конфиденциальности</p>
      <p class="footer-copyrights">© Все права защищены, 2023</p>
    </div>
  </div>
</footer>
