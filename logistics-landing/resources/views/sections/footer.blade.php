<footer class="footer">
  <div class="footer-wrapper">
  <div class="footer-logo">
    <img src="@asset('images/footer-logo.svg')" alt="" class="footer-logo-img">
    <span class="footer-logo-desc caption">Доставим Ваши грузы до демо маркетплейсов</span>
  </div>
      @if (has_nav_menu('footer_navigation'))
        <nav class="nav-footer" aria-label="{{ wp_get_nav_menu_name('footer_navigation') }}">
          {!! wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
        </nav>
      @endif
    <div class="footer-contacts">
      <a href="mailto:demo@example.com"  class="footer-email"><p>demo@example.com</p></a>
      <a href="tel:+78001234567"  class="footer-tel"><p>+7 (800) 123-45-67</p></a>
      <a href="#" class="footer-cta-button text-button"><span class="footer-text-button">ОСТАВИТЬ ЗАЯВКУ</span></a>
    </div>
    <div class="footer-copyrights">
      <span class="caption">Изображения взяты с Freepik</span>
      <span class="caption">Политика конфиденциальности</span>
      <span class="caption">ⓒ 2024 Все права защищены</span>
    </div>
  </div>
</footer>
