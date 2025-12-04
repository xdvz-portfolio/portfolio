// Импортируем необходимые модули Swiper
import Swiper from 'swiper';
import { Navigation, Pagination, A11y } from 'swiper/modules';

/**
 * Инициализация слайдеров товаров с отложенной загрузкой при попадании в область видимости
 */
function initProductSliders() {
    const sliderContainers = document.querySelectorAll('.rshop-product-slider');
    if (!sliderContainers.length) return;

    // IntersectionObserver для отслеживания видимости слайдеров
    const sliderObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const sliderId = entry.target.getAttribute('data-slider-id');
                if (!sliderId) return;

                initSingleProductSlider(sliderId);
                observer.unobserve(entry.target);
            }
        });
    }, {
        rootMargin: '100px',
        threshold: 0.1
    });

    sliderContainers.forEach(container => {
        sliderObserver.observe(container);
    });
}

/**
 * Инициализация одного слайдера
 */
function initSingleProductSlider(sliderId) {
    const sliderElement = document.getElementById(sliderId);
    if (!sliderElement) return;

    // Проверка на повторную инициализацию
    if (sliderElement.swiper) return;

    setupLazyLoading(sliderElement);

    const productSwiper = new Swiper(`#${sliderId}`, {
        modules: [Navigation, Pagination, A11y],
        
        slidesPerView: 6,
        spaceBetween: 10,
        speed: 400,
        
        breakpoints: {
            320: {
                slidesPerView: 2,
                spaceBetween: 8
            },
            576: {
                slidesPerView: 3,
                spaceBetween: 10
            },
            768: {
                slidesPerView: 4,
                spaceBetween: 10
            },
            992: {
                slidesPerView: 5,
                spaceBetween: 10
            },
            1200: {
                slidesPerView: 6,
                spaceBetween: 10
            }
        },
        
        navigation: {
            nextEl: `.rshop-product-slider[data-slider-id="${sliderId}"] .rshop-product-slider__button-next`,
            prevEl: `.rshop-product-slider[data-slider-id="${sliderId}"] .rshop-product-slider__button-prev`,
        },
        pagination: {
            el: `.rshop-product-slider[data-slider-id="${sliderId}"] .rshop-product-slider__pagination`,
            clickable: true,
        },
        
        on: {
            init: function(swiper) {
                console.log(`Слайдер ${sliderId} инициализирован`);
            }
        }
    });

    // Сохраняем экземпляр Swiper
    window.rshopProductSliders = window.rshopProductSliders || {};
    window.rshopProductSliders[sliderId] = productSwiper;
}

/**
 * Настройка ленивой загрузки изображений в слайдере
 */
function setupLazyLoading(sliderElement) {
    const slides = sliderElement.querySelectorAll('.swiper-slide');
    
    slides.forEach(slide => {
        const lazyLoad = slide.getAttribute('data-lazy-load');
        if (lazyLoad === 'true') {
            const images = slide.querySelectorAll('img');
            images.forEach(img => {
                if (!img.hasAttribute('loading')) {
                    img.setAttribute('loading', 'lazy');
                }
            });
        }
    });
}

document.addEventListener('DOMContentLoaded', initProductSliders);

export { initProductSliders }; 