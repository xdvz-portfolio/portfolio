// Импортируем Swiper
import Swiper from 'swiper';
import { Navigation, Pagination, Autoplay } from 'swiper/modules';
// Импортируем стили Swiper
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

// Импортируем слайдер товаров
import './product-slider';

// Инициализация скриптов после загрузки DOM
document.addEventListener('DOMContentLoaded', function() {
    // Обработка кликов по заголовкам фильтров в аккордеоне
    jQuery(function($) {
        // Обработка клика по основной кнопке ФИЛЬТРЫ
        $('.filter-block-accordion').on('click', function() {
            $(this).toggleClass('active');
            $('.filter-block-all').slideToggle(300);
        });

        // Обработка клика по заголовкам отдельных фильтров
        $('.filter__header').on('click', function() {
            let $filterBody = $(this).next('.filter__body');
            
            // Проверяем по классу active, а не по CSS свойству
            if ($(this).hasClass('active')) {
                // Уже активен, значит нужно закрыть
                $(this).removeClass('active');
                $filterBody.css({
                    'max-height': '0',
                    'overflow': 'hidden'
                });
            } else {
                // Не активен, значит нужно открыть
                $(this).addClass('active');
                $filterBody.css({
                    'max-height': 'none',
                    'overflow': 'visible'
                });
            }
        });

        // При загрузке страницы устанавливаем начальные стили для filter__body
        $('.filter__body').each(function() {
            $(this).css({
                'max-height': '0',
                'overflow': 'hidden',
                'transition': 'max-height 0.3s ease-in-out'
            });
        });
        
        // Обработка клика по кнопке "показать все" (facetwp-toggle)
        $(document).on('click', '.facetwp-toggle', function() {
            let $facet = $(this).closest('.facetwp-facet');
            
            // Таймаут, чтобы дать FacetWP обработать клик и показать весь список
            setTimeout(function() {
                // Обновляем только facet, а не родительский контейнер
                $facet.css({
                    'max-height': '300px',
                    'overflow-y': 'auto'
                });
                
                // Если есть элемент .facetwp-expand, также ограничиваем его высоту
                $facet.find('.facetwp-expand').css({
                    'max-height': '300px',
                    'overflow-y': 'visible' // Убираем скролл для вложенного контейнера
                });
            }, 100);
        });
    });

    // Инициализация Swiper слайдера для баннера на главной странице
    const heroSliderElement = document.querySelector('.hero-slider__wrapper');
    
    if (heroSliderElement) {
        // Инициализируем Swiper
        const heroSwiper = new Swiper('.hero-slider__wrapper', {
            // Регистрируем необходимые модули
            modules: [Pagination, Autoplay],
            
            // Основные настройки
            slidesPerView: 1,
            spaceBetween: 0,
            loop: true,
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },
            
            // Настройки пагинации
            pagination: {
                el: '.hero-slider__pagination',
                clickable: true,
            },
        });
    }
});
