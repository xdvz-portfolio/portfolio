<?php
/**
 * rshop основные перехваты шаблонов
 *
 * Содержит добавление и удаление хуков для модификации шаблонов Storefront
 * и настройки отображения страниц сайта.
 *
 * @package rshop
 * @version 1.0.1
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

add_action('init', 'rshop_hooks');

/**
 * Добавляет и удаляет хуки родительской темы Storefront.
 *
 * Переопределяет стандартные элементы родительской темы,
 * чтобы заменить их на кастомные версии для дочерней темы.
 *
 * @return void
 */
function rshop_hooks() {
    // Удаляем элементы хедера родительской темы
    remove_action('storefront_header', 'storefront_header_container', 0);
    remove_action('storefront_header', 'storefront_header_container_close', 41);
    remove_action('storefront_header', 'storefront_site_branding', 20);
    remove_action('storefront_header', 'storefront_secondary_navigation', 30);
    remove_action('storefront_header', 'storefront_product_search', 40);
    remove_action('storefront_header', 'storefront_primary_navigation_wrapper', 42);
    remove_action('storefront_header', 'storefront_primary_navigation', 50);
    remove_action('storefront_header', 'storefront_header_cart', 60);
    remove_action('storefront_header', 'storefront_primary_navigation_wrapper_close', 68);

    // Удаляем элементы главной страницы родительской темы
    remove_action('homepage', 'storefront_product_categories', 20);
    remove_action('homepage', 'storefront_recent_products', 30);
    remove_action('homepage', 'storefront_featured_products', 40);
    remove_action('homepage', 'storefront_popular_products', 50);
    remove_action('homepage', 'storefront_best_selling_products', 70);
    remove_action('homepage', 'storefront_woocommerce_brands_homepage_section', 80);

    // Удаляем элементы футера родительской темы
    remove_action('storefront_footer', 'storefront_footer_widgets', 10);
    remove_action('storefront_footer', 'storefront_credit', 20);
}

/**
 * Отключаем ссылку копирайта в подвале.
 */
add_filter('storefront_credit_link', '__return_false');

/**
 * Отключаем блоки товаров на главной.
 */
remove_action('homepage', 'rshop_on_sale_products', 60);
remove_action('homepage', 'storefront_featured_products', 40);


