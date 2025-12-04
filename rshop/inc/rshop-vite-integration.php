<?php
/**
 * Интеграция Vite с WordPress для дочерней темы Storefront
 *
 * Обеспечивает автоматическое переключение между режимом разработки и
 * продакшен режимом для сборки фронтенд-ресурсов с помощью Vite.
 *
 * @package rshop
 * @version 1.0.1
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Определяет, находимся ли мы в режиме разработки Vite.
 * 
 * Проверяет доступность сервера разработки Vite или наличие 
 * константы rshop_VITE_DEV для принудительного включения.
 * 
 * @return bool Истина, если режим разработки активен
 */
function rshop_is_vite_development() {
    // Можно установить константу rshop_VITE_DEV в wp-config.php 
    // для принудительного включения режима разработки
    if (defined('rshop_VITE_DEV') && rshop_VITE_DEV) {
        return true;
    }
    
    // Проверяем работает ли сервер Vite
    $vite_dev_server = 'http://localhost:3000';
    
    $response = wp_remote_get($vite_dev_server, [
        'timeout' => 1, // короткий таймаут для быстрой проверки
        'sslverify' => false,
    ]);
    
    return !is_wp_error($response) && wp_remote_retrieve_response_code($response) === 200;
}

/**
 * Регистрирует и подключает ресурсы Vite.
 * 
 * В режиме разработки подключает ресурсы с сервера Vite,
 * в продакшен режиме использует собранные и оптимизированные файлы.
 * Сохраняет правильный порядок загрузки стилей для дочерней темы.
 */
function rshop_enqueue_vite_assets() {
    // Отключение стандартных стилей родительской темы
    wp_dequeue_style('storefront-style');
    wp_dequeue_style('storefront-woocommerce-style');
    
    // Регистрация стилей родительской темы
    wp_enqueue_style('storefront-woocommerce-style');
    wp_enqueue_style('storefront-style', get_template_directory_uri() . '/style.css');
    
    // Определяем режим разработки
    $is_development = rshop_is_vite_development();
    $theme_directory = get_stylesheet_directory_uri();
    
    if ($is_development) {
        // В режиме разработки загружаем с сервера Vite
        wp_enqueue_script('vite-client', 'http://localhost:3000/@vite/client', [], null, true);
        
        // Важно: подключаем CSS с сервера разработки с правильной зависимостью
        wp_enqueue_style('2.1.7', 'http://localhost:3000/src/style.scss', ['storefront-style'], null);
        
        // Скрипты с сервера разработки
        wp_enqueue_script('vite-main', 'http://localhost:3000/src/index.js', ['vite-client', 'jquery'], null, true);
    } else {
        // В режиме продакшена используем собранные файлы
        wp_enqueue_style(
            '2.1.8', 
            $theme_directory . '/dist/build.css', 
            ['storefront-style'], 
            '2.1.6', 
            'all'
        );
        
        wp_enqueue_script(
            '2.1.7', 
            $theme_directory . '/dist/build.js', 
            ['jquery'], 
            '2.1.6', 
            true
        );
    }
    
    // Дополнительные стили и скрипты
    wp_enqueue_style(
        'google-fonts', 
        'https://fonts.googleapis.com/css2?family=Open+Sans&family=Oswald:wght@200;300;400;500;600;700&display=swap',
        [],
        null
    );
    
    // Библиотека Swiper подключается через сборщик Vite в src/js/main.js
}

/**
 * Активирует интеграцию Vite.
 * 
 * Заменяет стандартную функцию rshop_enqueue_scripts_and_styles
 * на функцию rshop_enqueue_vite_assets для поддержки режима разработки Vite.
 */
function rshop_activate_vite_integration() {
    // Удаляем стандартный обработчик
    remove_action('wp_enqueue_scripts', 'rshop_enqueue_scripts_and_styles', 99999);
    
    // Добавляем обработчик для Vite с тем же приоритетом
    add_action('wp_enqueue_scripts', 'rshop_enqueue_vite_assets', 99999);
}

// Активируем интеграцию автоматически
rshop_activate_vite_integration(); 