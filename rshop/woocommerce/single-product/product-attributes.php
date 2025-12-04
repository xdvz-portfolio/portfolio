<?php
/**
 * Product attributes
 *
 * Used by list_attributes() in the products class.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-attributes.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.3.0
 */

defined( 'ABSPATH' ) || exit;

if ( ! $product_attributes ) {
	return;
}

/**
 * Получаем глобальный объект продукта и определяем массивы ID категорий
 */
global $product;

// Категории для специального отображения атрибутов
$galanterei_categories = [36, 132, 149, 96, 1250, 1241, 1228, 9493, 9492]; // Категория "Галантерея" и её дочерние
$chemistry_categories = [27, 383, 368, 365, 356, 354, 1238];               // Вся "Химия"

// Получаем необходимые данные о товаре
$product_category_ids = $product->get_category_ids();
$average_area = get_field('srednyaya_ploshhad');
$measurement_unit = array_shift(wc_get_product_terms($product->get_id(), 'pa_ед-измерения', ['fields' => 'names']));

/**
 * Проверяет, принадлежит ли товар к определенным категориям
 * 
 * @param array $categories Массив ID категорий для проверки
 * @return bool True если товар принадлежит к одной из указанных категорий
 */
function rshop_product_belongs_to_categories($categories) {
    global $product;
    $product_category_ids = $product->get_category_ids();
    return !empty(array_intersect($categories, $product_category_ids));
}

?>
<table class="woocommerce-product-attributes shop_attributes" aria-label="<?php esc_attr_e( 'Product Details', 'woocommerce' ); ?>">
	<?php
	// Отображаем среднюю площадь или минимальную длину (если указано)
	if ($average_area) : ?>
		<tr class="woocommerce-product-attributes-item">
			<th class="woocommerce-product-attributes-item__value">
                <?php if (has_term('tkan', 'product_cat')) : ?>
                    <?php esc_html_e('Минимальная длина', 'rshop'); ?>
                <?php else : ?>
                    <?php esc_html_e('Средняя площадь', 'rshop'); ?>
                <?php endif; ?>
            </th>
			<td class="woocommerce-product-attributes-item__value">
                <?php echo esc_html($average_area) . '&nbsp;' . esc_html($measurement_unit); ?>
            </td>
		</tr>
	<?php endif; ?>

    <?php
    /**
     * Массив поддерживаемых атрибутов товара в порядке отображения
     */
    $attribute_names = array(
        'pa_тип',
        'pa_толщина',
        'pa_высота-ворса',
        'pa_вес',
        'pa_диаметр',
        'pa_материал-состав',
        'pa_объем',
        'pa_размер',
        'pa_шаг',
        'pa_ширина',
        'pa_цвет',
        'pa_отделка',
        'pa_дубление',
        'pa_часть-кожи',
        'pa_бренд',
        'pa_страна',
        'pa_ед-измерения',
    );

    // Обрабатываем каждый атрибут в указанном порядке
    foreach ($attribute_names as $attribute_name) :
        $attribute = $product->get_attribute($attribute_name);

        // Пропускаем пустые атрибуты
        if (empty($attribute)) {
            continue;
        }

        // Получаем метку атрибута и значение
        $attribute_label = wc_attribute_label($attribute_name, $product);
        $attribute_value = null;

        // Обработка таксономических атрибутов и обычных атрибутов
        if (taxonomy_exists($attribute_name)) {
            $attribute_value = wc_get_product_terms(
                $product->get_id(),
                $attribute_name,
                ['fields' => 'names']
            );
        } else {
            $attribute_value = explode('|', $attribute);
        }

        // Пропускаем атрибуты без значений
        if (empty($attribute_value)) {
            continue;
        }
        ?>
        <tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--<?php echo esc_attr($attribute_name); ?>">
            <?php
            // Специальная обработка метки "Часть кожи" с popup-подсказкой
            if ($attribute_label === "Часть кожи") : ?>
                <th class="woocommerce-product-attributes-item__label">
                    <?php echo wp_kses_post($attribute_label); ?>
                    <a class="popup-leather-info" href="#popmake-3289884" style="color: #dca966; z-index:99999999999999">&nbsp;[?]</a>
                </th>
            <?php 
            // Специальная обработка метки "Кожа" для категории "Химия"
            elseif (rshop_product_belongs_to_categories($chemistry_categories) && $attribute_label == "Кожа") : ?>
                <th class="woocommerce-product-attributes-item__label">
                    <?php esc_html_e('Тип', 'rshop'); ?>
                </th>
            <?php 
            // Стандартная обработка остальных меток
            else : ?>
                <th class="woocommerce-product-attributes-item__label">
                    <?php echo wp_kses_post($attribute_label); ?>
                </th>
            <?php endif; ?>

            <td class="woocommerce-product-attributes-item__value">
                <?php echo wp_kses_post(wptexturize(implode(', ', $attribute_value))); ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
