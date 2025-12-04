<?php
/**
 * rshop WooCommerce перехваты шаблонов
 *
 * Содержит добавление и удаление хуков для модификации вывода WooCommerce
 * и настройки отображения товаров и страниц магазина.
 *
 * @package rshop
 * @version 1.0.2
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

add_action('init', 'rshop_wc_hooks');

/**
 * Добавляет и удаляет хуки WooCommerce для изменения шаблонов.
 *
 * Переопределяет расположение и порядок элементов на страницах
 * товаров и списка товаров для соответствия дизайну темы.
 *
 * @return void
 */
function rshop_wc_hooks() {
    // Удаляем стандартные действия WooCommerce
    
    // Удаляем кнопку добавления в корзину со стандартной позиции
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
    
    // Удаляем форму вариаций товара со стандартной позиции
    remove_action('woocommerce_single_product_summary', 'woocommerce_variable_add_to_cart', 30);
    
    // Удаляем мета-информацию (артикул, категория, теги)
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
    
    // Удаляем вкладки со стандартной позиции
    remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
    
    // Удаляем краткое описание со стандартной позиции
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
    
    // Удаляем стандартный заголовок товара в цикле (будет заменен на собственный)
    remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
    
    // Удаляем сортировку до и после цикла товаров
    remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 10);
    remove_action('woocommerce_after_shop_loop', 'woocommerce_catalog_ordering', 10);
    
    // Удаляем счетчик результатов до и после цикла товаров
    remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
    remove_action('woocommerce_after_shop_loop', 'woocommerce_result_count', 20);
}

/**
 * Добавляем вкладки данных товара в новую позицию.
 */
add_action('woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 20);

/**
 * Добавляем мета-информацию (артикул, категория) в новую позицию.
 */
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 6);

/**
 * Добавляем кнопку добавления в корзину в новую позицию.
 */
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 15);

/**
 * Добавляем краткое описание товара в новую позицию.
 */
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 25);

/**
 * Добавляем собственную функцию вывода заголовка товара в цикле.
 * Функция определена в файле rshop-wc-template-functions.php.
 */
add_action('woocommerce_shop_loop_item_title', 'rshop_woocommerce_template_loop_product_title', 10);

/**
 * Регистрируем переопределения шаблонов WooCommerce
 * =================================================
 */

/**
 * Переопределение хлебных крошек
 */
add_filter('wc_get_template', 'rshop_override_breadcrumb', 10, 3);

/**
 * Переопределение кнопки добавления в корзину
 */
remove_filter('woocommerce_loop_add_to_cart_link', 'woocommerce_loop_add_to_cart_link', 10);
add_filter('woocommerce_loop_add_to_cart_link', 'rshop_override_loop_add_to_cart', 10, 3);

/**
 * Переопределение мета-информации товара
 * 
 * Примечание: действие уже удалено в функции rshop_wc_hooks и добавлено в новой позиции,
 * здесь мы заменяем стандартную функцию на нашу.
 */
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 6);
add_action('woocommerce_single_product_summary', 'rshop_override_product_meta', 6);