<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $product;

/**
 * Определяем ID категорий для специальных условий отображения цены
 */
$cat_id_rasprodaja = [1279]; // Категория "Распродажа"
$cat_id_akciya = [1242];     // Категория "Акция"

// Получаем ID категорий текущего продукта
$cat_ids = $product->get_category_ids();

// Получаем значение цены за квадратный дециметр (кастомное поле ACF)
$cenazadm = get_field('cena_za_dm2');

/**
 * Выводит цену с форматированием и указанным стилем для страницы товара
 * 
 * @param float $price Цена для отображения
 * @param string $suffix Суффикс после цены (единица измерения)
 * @param string $css_style Дополнительные CSS-стили
 * @param bool $is_strikethrough Зачёркнутая цена (для старой цены)
 */
if (!function_exists('rshop_display_single_price')) {
    function rshop_display_single_price($price, $suffix = '', $css_style = '', $is_strikethrough = false) {
        $price_rounded = round($price, 2);
        $css_class = $is_strikethrough ? 'sale-price-dm' : 'price';
        $style = 'display:inline-flex' . ($css_style ? '; ' . $css_style : '');
        $tag_open = $is_strikethrough ? '<s>' : '';
        $tag_close = $is_strikethrough ? '</s>' : '';
        
        printf(
            '<span class="%s" style="%s">%s%s&nbsp;₽%s%s</span>%s',
            esc_attr($css_class),
            esc_attr($style),
            $tag_open,
            esc_html($price_rounded),
            $suffix ? '&nbsp;' . esc_html($suffix) : '',
            $tag_close,
            $is_strikethrough ? '&nbsp;' : ''
        );
    }
}

/**
 * Закомментированный код для альтернативного отображения цены за кв.дм.
 * Сохранен для дальнейшего использования или справки.
 * 
 * Данный блок реализует:
 * 1. Проверку наличия цены за кв.дм.
 * 2. Получение значения скидки из настроек плагина
 * 3. Отображение разных вариантов цены в зависимости от категории товара
 */
/*
if (!empty($cenazadm)) {
    $get_discount_value = get_option('rp_wcdpd_settings');
    $discount_value = 0;
    
    // Проверяем наличие данных перед использованием
    if (is_array($get_discount_value) && !empty($get_discount_value)) {
        $first_setting = array_shift($get_discount_value);
        if (isset($first_setting['product_pricing'][0]['pricing_value'])) {
            $discount_value = $first_setting['product_pricing'][0]['pricing_value'];
        }
    }
    
    if (array_intersect($cat_id_akciya, $cat_ids)) {
        // Товар в категории "Акция" - показываем старую и новую цену со скидкой
        rshop_display_single_price($cenazadm, '', '', true);
        rshop_display_single_price($cenazadm * (1 - $discount_value / 100), '/&nbsp;кв.дм.', 'color:#9e1111');
    } elseif (array_intersect($cat_id_rasprodaja, $cat_ids)) {
        // Товар в категории "Распродажа" - показываем старую цену с наценкой и текущую
        rshop_display_single_price($cenazadm * 1.2, '', '', true);
        rshop_display_single_price($cenazadm, '/&nbsp;кв.дм.');
    } else {
        // Обычный товар - показываем только текущую цену
        rshop_display_single_price($cenazadm, '/&nbsp;кв.дм.');
    }
}
*/

/**
 * Отображаем стандартную цену товара от WooCommerce
 */
if ($price_html = $product->get_price_html()) {
    printf(
        '<br><span class="price" style="display:inline-flex">%s</span>',
        $price_html // price_html уже содержит безопасный HTML от WooCommerce
    );
}