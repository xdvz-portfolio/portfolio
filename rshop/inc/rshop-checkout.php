<?php
/**
 * Настройки процесса оформления заказа
 *
 * Содержит функции для настройки полей, стилей и поведения
 * формы оформления заказа WooCommerce.
 *
 * @package rshop
 * @version 1.0.1
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Удаляет ненужные поля из формы оформления заказа.
 *
 * @param array $fields Массив полей оформления заказа
 * @return array Обновленный массив полей
 */
function rshop_remove_checkout_fields($fields) {
    // Удаление полей из секции платежных данных
    unset($fields['billing']['billing_state']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_company']);

    // Удаление полей из секции доставки
    unset($fields['shipping']['shipping_country']);
    unset($fields['shipping']['shipping_company']);
    unset($fields['shipping']['shipping_postcode']);
    unset($fields['shipping']['shipping_state']);

    return $fields;
}
add_filter('woocommerce_checkout_fields', 'rshop_remove_checkout_fields');

/**
 * Добавляет новые поля в форму оформления заказа.
 *
 * @param array $fields Массив полей оформления заказа
 * @return array Обновленный массив полей
 */
function rshop_add_checkout_fields($fields) {
    // Добавление поля "Отчество"
    $fields['billing']['billing_middle_name'] = array(
        'label'       => esc_html__('Отчество', 'woocommerce'),
        'placeholder' => esc_attr_x('Отчество', 'placeholder', 'woocommerce'),
        'required'    => true,
        'class'       => array('form-row-wide'),
        'clear'       => true
    );

    // Установка приоритета вывода поля
    $fields['billing']['billing_middle_name']['priority'] = 25;

    return $fields;
}
add_filter('woocommerce_checkout_fields', 'rshop_add_checkout_fields');

/**
 * Изменяет существующие поля в форме оформления заказа.
 *
 * @param array $fields Массив полей оформления заказа
 * @return array Обновленный массив полей
 */
function rshop_modify_checkout_fields($fields) {
    // Изменение названий и подсказок полей
    $fields['billing']['billing_city']['label']       = esc_html__('Город', 'rshop');
    $fields['billing']['billing_city']['placeholder'] = esc_attr__('Город', 'rshop');

    $fields['billing']['billing_address_1']['label']       = esc_html__('Адрес доставки', 'rshop');
    $fields['billing']['billing_address_1']['placeholder'] = esc_attr__('Адрес доставки', 'rshop');

    $fields['billing']['billing_address_2']['label']       = esc_html__('Подъезд, этаж и т.д.', 'rshop');
    $fields['billing']['billing_address_2']['placeholder'] = esc_attr__('Подъезд, этаж и т.д.', 'rshop');

    return $fields;
}
add_filter('woocommerce_checkout_fields', 'rshop_modify_checkout_fields');

/**
 * Изменяет порядок и размеры полей адреса в форме оформления заказа.
 *
 * @param array $fields Массив полей адреса
 * @return array Обновленный массив полей
 */
function rshop_reorder_address_fields($fields) {
    // Настройка приоритета полей (порядок отображения) и их размеров
    $fields['first_name']['priority'] = 10;
    $fields['first_name']['columns']  = 12;

    $fields['last_name']['priority'] = 20;
    $fields['last_name']['columns']  = 12;

    // Правильное указание поля 'billing_phone' вместо 'phone'
    if (isset($fields['phone'])) {
        $fields['phone']['priority'] = 30;
    }
    
    $fields['country']['priority']   = 40;
    $fields['city']['priority']      = 50;
    $fields['address_1']['priority'] = 60;
    $fields['address_2']['priority'] = 70;

    return $fields;
}
add_filter('woocommerce_default_address_fields', 'rshop_reorder_address_fields', 100010);

/**
 * Устанавливает Россию как страну по умолчанию.
 *
 * @return string Код страны (RU)
 */
function rshop_default_checkout_country() {
    return 'RU';
}
add_filter('default_checkout_billing_country', 'rshop_default_checkout_country');

/**
 * Изменяет текст бесплатной доставки.
 *
 * @return string Текст бесплатной доставки
 */
function rshop_shipping_free_text() {
    return '';
}
add_filter('cfw_shipping_free_text', 'rshop_shipping_free_text');

/**
 * Добавляет название метода доставки в метку стоимости доставки.
 *
 * @param string $label Метка стоимости доставки
 * @return string Обновленная метка стоимости доставки
 */
function rshop_cart_totals_shipping_label($label) {
    $chosen_shipping_methods_labels = array();

    $packages = WC()->shipping->get_packages();

    foreach ($packages as $i => $package) {
        $chosen_method = isset(WC()->session->get('chosen_shipping_methods')[$i]) 
            ? WC()->session->get('chosen_shipping_methods')[$i] 
            : false;

        if ($chosen_method && isset($package['rates'][$chosen_method])) {
            $available_methods = $package['rates'];
            $chosen_shipping_methods_labels[] = $available_methods[$chosen_method]->get_label();
        }
    }

    if (!empty($chosen_shipping_methods_labels)) {
        $chosen_shipping_methods_labels = apply_filters(
            'cfw_payment_method_address_review_shipping_method', 
            $chosen_shipping_methods_labels
        );
        
        $label = $label . ' (' . join(', ', $chosen_shipping_methods_labels) . ')';
    }

    return $label;
}
add_filter('cfw_cart_totals_shipping_label', 'rshop_cart_totals_shipping_label');

/**
 * Скрывает расчет доставки на странице корзины.
 *
 * @param bool $show_shipping Показывать ли расчет доставки
 * @return bool Обновленное значение флага
 */
function rshop_disable_shipping_calc_on_cart($show_shipping) {
    if (is_cart()) {
        return false;
    }
    return $show_shipping;
}
add_filter('woocommerce_cart_ready_to_calc_shipping', 'rshop_disable_shipping_calc_on_cart', 99);

/**
 * Исправляет проблему с обязательным полем телефона в CheckoutWC.
 *
 * @param array $fields Массив полей оформления заказа
 * @return array Обновленный массив полей
 */
function rshop_fix_phone_field($fields) {
    // Убедимся, что поле телефона (billing_phone) настроено правильно
    if (isset($fields['billing']['billing_phone'])) {
        $fields['billing']['billing_phone']['required'] = true;
        $fields['billing']['billing_phone']['class'] = array('form-row-wide');
        $fields['billing']['billing_phone']['priority'] = 30;
    }
    
    return $fields;
}
add_filter('woocommerce_checkout_fields', 'rshop_fix_phone_field', 999);


