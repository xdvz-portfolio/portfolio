<?php
/**
 * rshop Theme Functions
 *
 * Основной файл функций темы, содержащий подключение компонентов
 * и базовую функциональность, не вынесенную в отдельные файлы.
 *
 * @package rshop
 * @version 1.0.1
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Подключение файлов компонентов темы
require_once('inc/rshop-styles-and-scripts.php');
require_once('inc/rshop-vite-integration.php'); // Интеграция с Vite для разработки
require_once('inc/rshop-template-hooks.php');
require_once('inc/rshop-template-functions.php');
require_once('inc/rshop-wc-template-hooks.php');
require_once('inc/rshop-wc-template-functions.php');
require_once('inc/rshop-product-loop-attributes.php');
require_once('inc/rshop-checkout.php');
require_once('inc/rshop-category-menus.php');
require_once('inc/rshop-acf-fields.php');
require_once('inc/rshop-product-slider.php'); // Слайдер товаров

/**
 * Отключение канонических редиректов для предотвращения дублирования.
 */
remove_filter('template_redirect', 'redirect_canonical');

/**
 * Корректное отображение количества товара с плавающей точкой в корзине и на странице чекаута.
 */
remove_filter('woocommerce_stock_amount', 'intval');
add_filter('woocommerce_stock_amount', 'floatval');

/**
 * Настройки Action Scheduler для оптимизации производительности.
 */

/**
 * Устанавливает размер пакета очистки Action Scheduler.
 *
 * @param int $batch_size Размер пакета по умолчанию (20)
 * @return int Новый размер пакета (100)
 * @see https://wpcodebook.com/woocommerce-action-scheduler-cleanup-php/
 */
add_filter('action_scheduler_cleanup_batch_size', function ($batch_size) {
    return 100;
});

/**
 * Устанавливает период хранения для Action Scheduler (14 дней).
 *
 * @param int $period Период хранения по умолчанию (один месяц)
 * @return int Новый период хранения (14 дней)
 * @see https://wpcodebook.com/woocommerce-action-scheduler-cleanup-php/
 */
add_filter('action_scheduler_retention_period', function ($period) {
    return 14 * DAY_IN_SECONDS;
});

/**
 * Расчет обычной цены для определенных категорий товаров.
 *
 * @param mixed $price Цена товара
 * @param WC_Product $product Объект товара
 * @return mixed Рассчитанная цена
 */
function rshop_calc_regular_price($price, $product) {
    $cat_id = [1279]; // ID категории с повышенной ценой
    $cat_ids = $product->get_category_ids();

    if (!array_intersect($cat_id, $cat_ids)) {
        return $price;
    }
    return $price * 1.2;
}
add_filter('woocommerce_product_get_regular_price', 'rshop_calc_regular_price', 10, 2);

/**
 * Расчет скидочной цены для определенных категорий товаров.
 *
 * @param mixed $price Цена товара
 * @param WC_Product $product Объект товара
 * @return mixed Рассчитанная цена
 */
function rshop_calc_sale_price($price, $product) {
    $cat_id = [1279]; // ID категории с повышенной ценой
    $cat_ids = $product->get_category_ids();

    if (!array_intersect($cat_id, $cat_ids)) {
        return $price;
    }

    remove_filter('woocommerce_product_get_regular_price', 'rshop_calc_sale_price', 10, 2);
    $price = $product->get_regular_price();
    add_filter('woocommerce_product_get_regular_price', 'rshop_calc_sale_price', 10, 2);
    
    return $price;
}

/**
 * Обновление индекса FacetWP после импорта в WPAI.
 *
 * @param int $import_id ID импорта
 */
function rshop_fwp_import_posts($import_id) {
    if (function_exists('FWP')) {
        FWP()->indexer->index();
    }
}
add_action('pmxi_after_xml_import', 'rshop_fwp_import_posts');

/**
 * Запуск следующего импорта в очереди.
 *
 * Автоматически запускает следующий импорт в очереди после завершения текущего.
 *
 * @param int $import_id ID импорта
 * @param object $import Объект импорта
 */
function rshop_after_xml_import($import_id, $import) {
    // ID 23. КОЖА запускает химию
    if ($import_id == 23) {
        // Запуск импорта ХИМИЯ (ID 24)
        wp_remote_get("https://rshop.ru/wp-load.php?import_key=123&import_id=123&action=trigger",
            [
                'timeout' => 45,
                'httpversion' => '1.1',
                'blocking'  => false,
                'sslverify' => false
            ]
        );
        wp_mail('imxras@gmail.com', 'Import Report', '1 done');
    }

    // Химия запускает фото 
    if ($import_id == 24) {
        // Запуск импорта ФОТО (ID 28)
        wp_remote_get("https://rshop.ru/wp-load.php?import_key=123&import_id=123&action=trigger",
            [
                'timeout' => 45,
                'httpversion' => '1.1',
                'blocking'  => false,
                'sslverify' => false
            ]
        );
        wp_mail('imxras@gmail.com', 'Import Report', '2 done');
    }
}
add_action('pmxi_after_xml_import', 'rshop_after_xml_import', 10, 2);

/**
 * Включение опции показа только подкатегорий в плагине Related products.
 */
add_filter('wt_crp_subcategory_only', '__return_true');

/**
 * Скрытие заголовка раздела описания товара.
 */
add_filter('woocommerce_product_description_heading', '__return_null');

/**
 * Регистрация виджетов и меню.
 */
function rshop_widgets_init() {
    // Регистрация области для виджета над товарами
    register_sidebar(array(
        'name'          => esc_html__('Виджет над товарами', 'rshop'),
        'id'            => 'product_cat_widget',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h2 class="rounded">',
        'after_title'   => '</h2>',
    ));

    // Регистрация меню для различных категорий товаров
    register_nav_menus(array(
        'head_beyond_category_koja'   => esc_html__('Кожа', 'rshop'),
        'head_beyond_category_instr'  => esc_html__('Инструменты', 'rshop'),
        'head_beyond_category_himiya' => esc_html__('Химия', 'rshop'),
        'head_beyond_category_furni'  => esc_html__('Фурнитура', 'rshop'),
        'head_beyond_category_galant' => esc_html__('Галантерейная', 'rshop'),
        'head_beyond_category_odejda' => esc_html__('Для одежды', 'rshop'),
        'head_beyond_category_obuv'   => esc_html__('Для обуви', 'rshop'),
        'head_beyond_category_nitki'  => esc_html__('Для ниток', 'rshop'),
    ));
}
add_action('widgets_init', 'rshop_widgets_init');

/**
 * Удаление боковой панели для определенных страниц.
 */
add_action('wp_head', 'rshop_remove_storefront_sidebar');
function rshop_remove_storefront_sidebar() {
    if (is_page_template('page-home.php')
        || is_cart()
        || is_product()
        || is_page()) {
        remove_action('storefront_sidebar', 'storefront_get_sidebar', 10);
        ?>
        <style>
            .left-sidebar .content-area {
                width: 100% !important;
                float: none !important;
                margin-right: 0 !important;
            }
        </style>
        <?php
    }
}

/**
 * Настройка размера изображений для страницы товара.
 * 
 * @param array $size_options Параметры размера изображения
 * @return array Новые параметры размера изображения
 */
add_filter('woocommerce_get_image_size_single', 'rshop_single_image_size');
function rshop_single_image_size($size_options) {
    return [
        'width'  => 800,
        'height' => 800,
        'crop'   => 1, // 1 – жёсткая обрезка, 0 – сохранение пропорций
    ];
}

/**
 * Переименование пункта меню для баллов и наград в аккаунте пользователя.
 * 
 * @param array $items Элементы меню аккаунта
 * @return array Измененные элементы меню
 */
add_filter('woocommerce_account_menu_items', 'rshop_rename_account_checkpoint', 9999);
function rshop_rename_account_checkpoint($items) {
    $items['points-and-rewards'] = esc_html__('Система лояльности', 'rshop');
    return $items;
}

/**
 * Отправка уведомления пользователю при изменении его роли.
 * 
 * @param int $user_id ID пользователя
 * @param string $new_role Новая роль пользователя
 */
function rshop_user_role_update($user_id, $new_role) {
    $site_url = get_bloginfo('wpurl');
    $user_info = get_userdata($user_id);
    
    if (!$user_info || empty($user_info->user_email)) {
        return;
    }
    
    $to = $user_info->user_email;
    $subject = sprintf(
        esc_html__('Подключение к системе лояльности на сайте %s', 'rshop'),
        $site_url
    );
    
    $message = sprintf(
        esc_html__('Здравствуйте, %s! Вы успешно подключены к системе лояльности на сайте %s Бонусные баллы будут начислены Вам в ближайшее время.', 'rshop'),
        $user_info->display_name,
        $site_url
    );
    
    wp_mail($to, $subject, $message);
}
add_action('set_user_role', 'rshop_user_role_update', 10, 2);

/**
 * Интеграция с плагином импорта/экспорта пользователей для учета баллов лояльности.
 * 
 * @param int $found_customer ID найденного пользователя
 * @param array $user_meta_fields Поля метаданных пользователя
 * @param array $meta_array Массив метаданных
 * @return int ID пользователя
 */
add_filter('xa_user_impexp_alter_user_meta', 'rshop_xa_user_impexp_alter_user_meta', 10, 3);
function rshop_xa_user_impexp_alter_user_meta($found_customer, $user_meta_fields, $meta_array) {
    global $wpdb;
    $xa_db_reward_table = $wpdb->prefix . 'wc_points_rewards_user_points';
    
    foreach ($user_meta_fields as $key => $meta) {
        $meta_value = (!empty($meta_array[$key])) ? maybe_unserialize($meta_array[$key]) : '';
        if ($key == 'wc_points_balance' && !empty($meta_value)) {
            $temp = $wpdb->update(
                $xa_db_reward_table, 
                ['points_balance' => $meta_value], 
                ['user_id' => $found_customer]
            );
            if (!$temp) {
                $wpdb->insert(
                    $xa_db_reward_table, 
                    ['points_balance' => $meta_value, 'user_id' => $found_customer]
                );
            }
        }
    }
    return $found_customer;
}

/**
 * Временное решение для исправления ошибок доступа к свойствам заказа
 * в плагине NineKolor\TelegramWC
 */
add_filter('woocommerce_doing_it_wrong', function($function, $message, $version) {
    // Проверяем, что ошибка связана с прямым доступом к свойствам заказа
    if (strpos($message, 'Order properties should not be accessed directly') !== false) {
        // Отключаем вывод ошибки
        return false;
    }
    return true;
}, 10, 3);

/**
 * Добавляем магические методы для совместимости со старым кодом
 */
add_action('init', function() {
    if (class_exists('WC_Abstract_Legacy_Order')) {
        class WC_Order_Compat extends WC_Abstract_Legacy_Order {
            public function __get($key) {
                $method = 'get_' . $key;
                if (method_exists($this, $method)) {
                    return $this->$method();
                }
                return parent::__get($key);
            }
        }
    }
});

/**
 * Автоматическая транслитерация слагов товаров после импорта через wp-all-import
 */
/*
function rshop_transliterate_product_slugs_after_import() {
    // Функция вызывается после импорта товаров через wp-all-import
    add_action('pmxi_saved_post', 'rshop_transliterate_imported_product_slug', 10, 1);
}
add_action('init', 'rshop_transliterate_product_slugs_after_import');
*/

/**
 * Транслитерирует слаг товара после импорта
 * 
 * @param int $post_id ID импортированного товара
 */
/*
function rshop_transliterate_imported_product_slug($post_id) {
    // Проверяем, что это товар
    if (get_post_type($post_id) !== 'product') {
        return;
    }
    
    $post = get_post($post_id);
    
    // Проверяем, что slug содержит кириллицу
    if (!preg_match('/[А-Яа-яЁё]/u', $post->post_name)) {
        return;
    }
    
    // Получаем экземпляр класса cyr-to-lat
    global $cyr_to_lat_plugin;
    
    if (!$cyr_to_lat_plugin) {
        return;
    }
    
    // Получаем транслитерированную версию заголовка
    $sanitized_title = $cyr_to_lat_plugin->transliterate($post->post_title);
    $sanitized_slug = sanitize_title($sanitized_title);
    
    // Обновляем слаг товара
    wp_update_post(array(
        'ID' => $post_id,
        'post_name' => $sanitized_slug
    ));
}
*/

/**
 * Заменяет стандартную пагинацию WooCommerce на FacetWP
 */
function rshop_replace_woocommerce_pagination() {
    // Удаляем стандартные функции пагинации 
    remove_all_actions('woocommerce_pagination');
    remove_all_actions('woocommerce_after_shop_loop');
    
    // Добавляем нашу функцию пагинации в нужные места
    add_action('woocommerce_after_shop_loop', 'rshop_override_pagination', 10);
    add_action('woocommerce_before_shop_loop', 'rshop_override_pagination', 20);
}
add_action('wp', 'rshop_replace_woocommerce_pagination', 99); 