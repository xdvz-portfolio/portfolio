<?php
/**
 * Функции подключения стилей и скриптов темы
 *
 * Содержит функции для регистрации и подключения стилей и скриптов 
 * для дочерней темы Storefront.
 *
 * @package rshop
 * @version 1.0.1
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Регистрирует и подключает стили и скрипты темы.
 * 
 * Обеспечивает правильный порядок загрузки стилей дочерней темы,
 * подключает дополнительные ресурсы и библиотеки для определенных страниц.
 */
function rshop_enqueue_scripts_and_styles() {
    // Отключение стилей родительской темы
    wp_dequeue_style('storefront-style');
    wp_dequeue_style('storefront-woocommerce-style');

    // Регистрация стилей и скриптов
    // Базовые стили
    wp_enqueue_style('storefront-woocommerce-style');
    wp_enqueue_style('parent-theme', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-theme', get_stylesheet_directory_uri() . '/style.css', ['parent-theme']);
    wp_enqueue_style('oswald', 'https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap');
    
    // Библиотека Swiper подключается через сборщик Vite в src/js/main.js

    // Основные скрипты темы
    wp_enqueue_script(
        '2.1.10', 
        get_stylesheet_directory_uri() . '/dist/build.js', 
        ['jquery'], 
        '2.1.10', 
        true
    );
}
add_action('wp_enqueue_scripts', 'rshop_enqueue_scripts_and_styles', 99999);
