<?php
/**
 * rshop template functions.
 *
 * Содержит функции для модификации шаблона Storefront и добавления пользовательских элементов.
 *
 * @package rshop
 */

/**
 * Формирует верхнюю панель сайта.
 * Использует вторичную навигацию, поиск и корзину из Storefront.
 */
add_action('storefront_header', 'rshop_high_top_panel', 1);
function rshop_high_top_panel() {
    ?>
    <div class="high-top-panel">
        <div class="container">
            <div class="high-top-panel-warp">
                <div class="high-top-item">
                    <?php storefront_secondary_navigation(); ?>
                </div>
                <div class="high-top-item">
                    <?php storefront_product_search(); ?>
                </div>
                <div class="high-top-item">
                    <?php storefront_header_cart(); ?>
                </div>
            </div>
        </div>
    </div>
    <?php
}

/**
 * Формирует основную панель сайта.
 * Содержит логотип, основное меню и контактную информацию.
 */
add_action('storefront_header', 'rshop_primary_panel', 30);
function rshop_primary_panel() {
    echo '<div class="container-header">';
    echo '<div class="primary-panel-warp">';
    echo '<div class="primary-panel-item">';
    storefront_site_branding();
    storefront_primary_navigation();
    echo '</div>';
    echo '<div class="menu-contacts">
            <div class="menu-contacts-wrap">
                <div class="menu-contacts-tel__row">
                    <a class="menu-contacts-tel-whatsapp" href="https://wa.me/"><img src="/wp-content/themes/rshop/assets/icons/whatsapp-icon.svg" alt="WhatsApp"></a>
                    <a class="menu-contacts-tel" href="tel:+123123123">+123123123</a>
                </div>
                <div class="menu-contacts-tel__row">
                    <a class="menu-contacts-tel-whatsapp" href="https://t.me/"><img src="/wp-content/themes/rshop/assets/icons/telegram-logo.svg" alt="Telegram" width="25px"></a>
                    <a class="menu-contacts-tel" href="tel:+123123123">+123123123</a>
                </div>
    ';
    rshop_menu_contacts_time();
    rshop_menu_contacts_time_mobile();
    echo '</div></div></div></div>';
}

/**
 * Отображает информацию о рабочих часах магазина.
 * Получает данные из полей ACF.
 */
function rshop_menu_contacts_time() {
    ?>
    <div class="menu-contacts-time" id="menuContactsTime">
        <?php if ( get_field( 'strike_header_hours_checked', 'option' ) == 1 ) : ?>
            <p>пн - пт: <span style="color:red;text-decoration:line-through"><?php echo esc_html(get_field( 'header_hours_strike', 'option' )); ?></span> <?php echo esc_html(get_field( 'header_hours', 'option' )); ?></p>
        <?php else : ?>
            <p id="workingHours">пн - пт: <?php echo esc_html(get_field( 'header_hours', 'option' )); ?></p>
        <?php endif; ?>

        <?php if ( get_field( 'strike_header_hours_checked_sat', 'option' ) == 1 ) : ?>
            <p>сб: <span style="color:red;text-decoration:line-through"><?php echo esc_html(get_field( 'header_hours_strike_sat', 'option' )); ?></span> <?php echo esc_html(get_field( 'header_hours_sat', 'option' )); ?></p>
        <?php else : ?>
            <p id="workingHoursSat">сб - вс: <?php echo esc_html(get_field( 'header_hours_sat', 'option' )); ?></p>
        <?php endif; ?>
    </div>
    <?php
}

/**
 * Исправляет отображение рабочих часов в мобильной версии сайта.
 * Получает значения из основного блока и подставляет в мобильную версию.
 */
function rshop_menu_contacts_time_mobile() {
    ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const workingHours = document.getElementById("workingHours");
        const workingHoursSat = document.getElementById("workingHoursSat");
        const mobileWorkingHours = document.getElementById("mobileWorkingHours");
        
        if (workingHours && workingHoursSat && mobileWorkingHours) {
            mobileWorkingHours.innerText = workingHours.innerText + ' \n ' + workingHoursSat.innerText;
        }
    });
    </script>
    <?php
}

/**
 * Изменяет параметры категорий товаров на главной странице.
 *
 * @param array $args Аргументы для вывода категорий
 * @return array Модифицированные аргументы
 */
add_filter( 'storefront_product_categories_args', 'rshop_custom_storefront_category_args' );
function rshop_custom_storefront_category_args( $args ) {
    return array(
        'limit'            => 8,
        'columns'          => 4,
        'child_categories' => 0,
        'orderby'          => 'menu_order',
        'title'            => __( 'Shop by Category', 'storefront' ),
    );
}

/**
 * Отключает заголовок в разделе дополнительной информации о товаре.
 */
add_filter('woocommerce_product_additional_information_heading', '__return_null');

/**
 * Добавляет расположение меню в подвале сайта.
 *
 * @param array $menus Существующие меню
 * @return array Обновленный список меню
 */
add_filter('storefront_register_nav_menus', 'rshop_add_menu_footer', 10, 1);
function rshop_add_menu_footer($menus) {
    $menus['footer'] = 'Меню в подвале';
    return $menus;
}

/**
 * Выводит меню в подвале сайта.
 */
add_action('storefront_footer', 'rshop_footer_menu');
function rshop_footer_menu() {
    if (has_nav_menu('footer')) {
        ?>
        <nav class="secondary-navigation" role="navigation"
             aria-label="<?php esc_html_e('Secondary Navigation', 'storefront'); ?>">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'footer',
                    'fallback_cb' => '',
                )
            );
            ?>
        </nav><!-- #site-navigation -->
        <?php
    }
}

/**
 * Инициализирует слайдер баннеров на главной странице.
 */
add_action('homepage', 'rshop_banner_slider_init');
function rshop_banner_slider_init() {
    // Проверяем, что находимся на шаблоне главной страницы
    if (!is_page_template('page-home.php')) {
        return;
    }
    
    // Инициализация слайдера перенесена в JavaScript модуль
}

/**
 * Выводит слайдер-карусель на главной странице.
 * Использует поля ACF для получения данных слайдов.
 * Структура адаптирована для Swiper с использованием БЭМ-методологии.
 */
add_action('storefront_before_content', 'rshop_slider_carousel', 1);
function rshop_slider_carousel() {
    if (!is_page_template('page-home.php')) {
        return;
    }
    
    // Проверяем наличие слайдов
    if (!have_rows('carousel-slider')) {
        return;
    }
    
    ?>
    <section class="hero-slider">
        <div class="hero-slider__container">
            <div class="hero-slider__wrapper swiper">
                <div class="swiper-wrapper">
                    <?php while (have_rows('carousel-slider')) : the_row(); ?>
                        <?php if (have_rows('slide')) : while (have_rows('slide')) : the_row(); ?>
                            <?php if (get_sub_field('slide_enabled') != 1) continue; ?>
                            
                            <?php 
                            $slide_link = get_sub_field('slide_link');
                            $slide_headline = get_sub_field('slide_headline');
                            $slide_button_text = get_sub_field('slide_sub_button');
                            
                            // Получаем изображения для разных устройств
                            $slide_image = get_sub_field('slide_image');
                            
                            // Проверяем, включены ли адаптивные изображения
                            $use_responsive_images = get_sub_field('use_responsive_images');
                            
                            // Получаем дополнительные изображения только если включено
                            $slide_image_tablet = $use_responsive_images ? get_sub_field('slide_image_tablet') : null;
                            $slide_image_mobile = $use_responsive_images ? get_sub_field('slide_image_mobile') : null;
                            
                            // Получаем альтернативный текст
                            $alt_text = get_sub_field('slide_image_desktop_alt');
                            
                            // Используем стандартный alt из изображения, если не задан специальный
                            if (empty($alt_text) && isset($slide_image['alt'])) {
                                $alt_text = $slide_image['alt'];
                            }
                            
                            // Получаем значение непрозрачности затемнения (по умолчанию 10%)
                            $overlay_opacity = get_sub_field('slide_overlay_opacity');
                            if (!$overlay_opacity && $overlay_opacity !== 0) {
                                $overlay_opacity = 10;
                            }
                            
                            // Преобразуем значение в формат rgba для CSS
                            $overlay_color = "rgba(33, 33, 33, " . ($overlay_opacity / 100) . ")";
                            
                            // Получаем значения позиций заголовка и кнопки
                            $title_position = get_sub_field('slide_title_position');
                            $button_position = get_sub_field('slide_button_position');
                            
                            // Устанавливаем значения по умолчанию
                            if (!$title_position && $title_position !== 0) {
                                $title_position = 40; // Немного выше центра
                            }
                            
                            if (!$button_position && $button_position !== 0) {
                                $button_position = 60; // Немного ниже центра
                            }
                            
                            // Формируем стили для каждого элемента
                            $title_style = "top: {$title_position}%; transform: translateY(-50%);";
                            $button_style = "top: {$button_position}%; transform: translateY(-50%);";
                            
                            // Для оверлея используем inline стиль с настраиваемой прозрачностью
                            $overlay_style = "background: {$overlay_color};";
                            
                            // Определяем, является ли слайд первым для оптимизации загрузки
                            static $is_first_slide = true;
                            $loading_attr = $is_first_slide ? 'eager' : 'lazy';
                            $priority_attr = $is_first_slide ? 'high' : 'auto';
                            ?>
                            
                            <div class="hero-slider__slide swiper-slide">
                                <a href="<?php echo esc_url($slide_link); ?>" class="hero-slider__link">
                                    <div class="hero-slider__content-container">
                                        <h2 class="hero-slider__title" style="<?php echo esc_attr($title_style); ?>">
                                            <?php echo esc_html($slide_headline); ?>
                                        </h2>
                                        <div class="hero-slider__button-container" style="<?php echo esc_attr($button_style); ?>">
                                            <button class="hero-slider__button">
                                                <?php echo esc_html($slide_button_text); ?>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="hero-slider__image-container">
                                        <?php if ($slide_image) : ?>
                                            <!-- Добавляем настраиваемое затемнение -->
                                            <div class="hero-slider__overlay" style="<?php echo esc_attr($overlay_style); ?>"></div>
                                            
                                            <picture>
                                                <?php if ($slide_image_mobile) : ?>
                                                <source media="(max-width: 767px)" 
                                                        srcset="<?php echo esc_url($slide_image_mobile['url']); ?>">
                                                <?php endif; ?>
                                                
                                                <?php if ($slide_image_tablet) : ?>
                                                <source media="(max-width: 1199px)" 
                                                        srcset="<?php echo esc_url($slide_image_tablet['url']); ?>">
                                                <?php endif; ?>
                                                
                                                <img class="hero-slider__image" 
                                                     src="<?php echo esc_url($slide_image['url']); ?>"
                                                     alt="<?php echo esc_attr($alt_text); ?>"
                                                     loading="<?php echo esc_attr($loading_attr); ?>"
                                                     fetchpriority="<?php echo esc_attr($priority_attr); ?>"
                                                />
                                            </picture>
                                        <?php endif; ?>
                                    </div>
                                </a>
                            </div>
                            
                            <?php 
                            // После первого слайда отключаем флаг
                            $is_first_slide = false; 
                            ?>
                        <?php endwhile; endif; ?>
                    <?php endwhile; ?>
                </div>
                
                <!-- Элементы управления Swiper убираем из внутренней обертки -->
            </div>
            
            <!-- Пагинация перемещена наружу, чтобы быть под слайдером -->
            <div class="hero-slider__pagination swiper-pagination"></div>
        </div>
    </section>
    <?php
}

/**
 * Отключает заголовки на главной странице магазина.
 */
function rshop_hide_shop_page_title() {
    if (is_front_page()) {
        remove_action('storefront_homepage', 'storefront_homepage_header', 10);
    }
}
add_action('woocommerce_show_page_title', 'rshop_hide_shop_page_title');

/**
 * Отключает заголовки на всех страницах сайта.
 */
function rshop_disable_page_title() {
    remove_action('storefront_page', 'storefront_page_header');
    remove_action('storefront_homepage', 'storefront_homepage_header', 10);
}
add_action('init', 'rshop_disable_page_title');

/**
 * Выводит изображения категорий на главной странице.
 */
function rshop_categories_images_homepage() {
    if (!is_page_template('page-home.php')) {
        return;
    }
    
    $categories = array(
        array('slug' => 'kozha', 'file' => 'koja.png', 'alt' => 'Кожа'),
        array('slug' => 'meh', 'file' => 'mex.png', 'alt' => 'Мех'),
        array('slug' => 'dubl-material', 'file' => 'dubl.png', 'alt' => 'Дубленочный материал'),
        array('slug' => 'tkan', 'file' => 'trikotaj.png', 'alt' => 'Трикотаж'),
        array('slug' => 'instrumenty', 'file' => 'instrumenti.png', 'alt' => 'Инструменты'),
        array('slug' => 'himiya', 'file' => 'himiya.png', 'alt' => 'Химия'),
        array('slug' => 'furnitura', 'file' => 'furitura.png', 'alt' => 'Фурнитура'),
        array('slug' => 'nitki', 'file' => 'nitki.png', 'alt' => 'Нитки')
    );
    
    ?>
    <div class="section-categories-home">
        <div class="section-categories__wrapper">
            <div class="section-categories__row">
                <?php foreach ($categories as $category) : ?>
                    <div class="section-categories__item grow">
                        <a href="/category/<?php echo esc_attr($category['slug']); ?>/" class="section-categories__link">
                            <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/category-images/homepage/' . $category['file']); ?>" 
                                 alt="<?php echo esc_attr($category['alt']); ?>"/>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php
}
add_action('homepage', 'rshop_categories_images_homepage', 10);