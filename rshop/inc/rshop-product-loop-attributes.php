<?php
/**
 * rshop атрибуты товаров в цикле вывода.
 *
 * Содержит функции для отображения атрибутов товаров 
 * в цикле вывода товаров на странице категории.
 *
 * @package rshop
 * @version 1.0.1
 */

/**
 * Добавляет открывающий тег обертки для атрибутов товара в цикле.
 */
add_filter('woocommerce_after_shop_loop_item_title', 'rshop_product_attributes_wrapper_open', 8);
function rshop_product_attributes_wrapper_open() {
	echo '<div class="product-attributes-wrapper">';
}

/**
 * Добавляет закрывающий тег обертки для атрибутов товара в цикле.
 */
add_filter('woocommerce_after_shop_loop_item_title', 'rshop_product_attributes_wrapper_close', 10);
function rshop_product_attributes_wrapper_close() {
	echo '</div>';
}

/**
 * Отображает атрибуты товара в цикле товаров на странице категории.
 * Выводит список атрибутов в виде "Название: Значение".
 */
add_action('woocommerce_after_shop_loop_item_title', 'rshop_display_loop_product_attributes', 9);
function rshop_display_loop_product_attributes() {
	global $product;
	
	if (!$product) {
		return;
	}

	// Список атрибутов, которые необходимо вывести
	$product_attributes = array(
		'pa_тип',
		'pa_толщина',
		'pa_диаметр',
		'pa_длина',
		'pa_объем',
		'pa_ширина',
		'pa_вес',
		'pa_высота-ворса',
		'pa_размер',
		'pa_шаг',
		'pa_материал-состав',
		'pa_цвет',
		'pa_бренд',
		'pa_страна'
	);
	
	$attr_output = array(); // Инициализация массива для вывода
	
	foreach ($product_attributes as $taxonomy) {
		if (!taxonomy_exists($taxonomy)) {
			continue;
		}
		
		$value = $product->get_attribute($taxonomy);
		if (empty($value)) {
			continue;
		}
		
		// Получаем название атрибута
		$label_name = wc_attribute_label($taxonomy);
		
		// Обрабатываем случай, когда значений слишком много
		$values_array = explode(',', $value);
		if (count($values_array) > 3) {
			$value = "Разные";
		}
		
		// Специфическая обработка для категорий химии
		// Можно раскомментировать, если необходимо
		/*
		if (is_product_category(array(27, 383, 368, 365, 356, 354, 1238, 1353))) {
			if ($label_name == "Кожа") {
				$label_name = "Тип";
			}
		}
		*/
		
		// Добавляем атрибут в массив вывода
		$attr_output[] = sprintf(
			'<span class="%s">%s: %s</span>',
			esc_attr($taxonomy),
			esc_html($label_name),
			esc_html($value)
		);
	}
	
	// Выводим атрибуты, разделенные тегом <br>
	if (!empty($attr_output)) {
		echo '<div class="product-attributes">' . implode('<br>', $attr_output) . '</div>';
	}
}

/**
 * Выводит артикул товара в цикле товаров.
 */
add_action('woocommerce_after_shop_loop_item_title', 'rshop_display_shop_sku', 8);
function rshop_display_shop_sku() {
	global $product;
	
	if (!$product || !$product->is_type('simple')) {
		return;
	}
	
	$sku = $product->get_sku();
	if (!empty($sku)) {
		echo '<span itemprop="productID" class="sku">' . esc_html__('Артикул: ', 'rshop') . esc_html($sku) . '</span>';
	}
}

/**
 * Добавляет единицу измерения после цены товара.
 *
 * @param string $html Исходный HTML-код суффикса цены
 * @param WC_Product $product Объект товара
 * @param string $price Цена
 * @param int $qty Количество
 * @return string Модифицированный HTML-код суффикса цены
 */
add_filter('woocommerce_get_price_suffix', 'rshop_add_price_suffix', 99, 4);
function rshop_add_price_suffix($html, $product, $price, $qty) {
	// Проверяем, существует ли товар
	if (!$product) {
		return $html;
	}

	// Получаем термины таксономии "Единица измерения"
	$attribute_terms = get_the_terms($product->get_id(), 'pa_ед-измерения');
	
	// Проверяем, есть ли термины
	if (!$attribute_terms || is_wp_error($attribute_terms)) {
		return $html;
	}
	
	// Берем первый термин
	$term = reset($attribute_terms);
	
	// Проверяем, что термин имеет название
	if (!empty($term->name)) {
		$html .= '&nbsp;/&nbsp;' . esc_html($term->name);
	}

	return $html;
}





