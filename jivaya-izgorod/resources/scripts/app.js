import {domReady} from '@roots/sage/client';
import SmoothScrollforWeb from 'smoothscroll-for-websites';
import SmoothScroll from 'smooth-scroll';

/**
 * Основная функция инициализации приложения
 */
const main = async (err) => {
  if (err) {
    // Обработка ошибок HMR
    console.error(err);
    return;
  }

  // Инициализация плавной прокрутки для всего сайта
  SmoothScrollforWeb();

  // Инициализация плавной прокрутки для якорных ссылок
  const scroll = new SmoothScroll('a[href*="#"]', {
    // Настройки скорости прокрутки при необходимости
    // speed: 300
  });

  // Обработка кликов по кнопкам CTA
  const ctaButtons = document.querySelectorAll('.cta-click');
  ctaButtons.forEach(button => {
    button.addEventListener('click', function(e) {
      e.preventDefault();
      // Здесь можно добавить логику открытия формы обратной связи
      console.log('CTA button clicked');
    });
  });
};

/**
 * Закрытие мобильного меню при клике на пункт меню
 */
jQuery("ul.max-mega-menu").on("after_mega_menu_init", function() {
  const menu = jQuery(this);
  jQuery("li.mega-menu-item:not(.mega-menu-item-has-children) > a.mega-menu-link").on('click', function() {
    menu.data('maxmegamenu').hideMobileMenu();
  });
});

/**
 * Инициализация приложения после загрузки DOM
 */
domReady(main);

// Поддержка горячей замены модулей в режиме разработки
import.meta.webpackHot?.accept(main);
