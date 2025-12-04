<?php
/**
 * Боковая панель, содержащая фильтры и виджеты.
 *
 * Файл отвечает за отображение фильтров FacetWP и виджетов 
 * в боковой колонке сайта для разных категорий товаров.
 *
 * @package rshop
 * @version 1.0.1
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (!is_active_sidebar('sidebar-1')) {
	return;
}

/**
 * Массивы ID категорий для удобства проверки
 */
// Категории кожи
$leather_categories = [1191, 1233, 1248, 1279, 402, 275, 1251, 1252, 36, 132, 149, 96, 5896, 1250, 1228, 1241, 9495, 9494, 8486, 9492, 9503];

// Категории меха и дубленок
$fur_categories = [1229, 225];

// Категории химии
$chemistry_categories = [27, 383, 368, 365, 356, 354, 1238, 1353, 1343];

// Категории галантерейной кожи
$haberdashery_leather = [36, 132, 149, 96, 1250, 1228, 1241, 9503, 9492, 8486];

// Категории тканей
$fabric_categories = [1235];

// Категории молний
$zipper_categories = [205];

// Категории брендовых товаров
$brand_categories = [27, 25, 26, 1232, 26, 20, 1236, 339, 205, 347, 1258, 349, 341, 383, 368, 365, 356, 354, 1238, 202, 192, 1230, 1231, 201, 1176, 9507, 9508, 1353, 1343];

// Категории инструментов
$tool_categories = [25, 202, 192, 1230, 1231, 201, 1176];

// Категории ниток
$thread_categories = [1232, 9507, 9508];

// Категории для обуви
$shoe_categories = [9495, 9494];

/**
 * Отображает блок фильтра FacetWP с заголовком и содержимым.
 *
 * @param string $title Заголовок фильтра
 * @param string $facet_name Название фасета FacetWP
 * @param bool $is_accordion Показывать ли фильтр в виде аккордеона
 * @param string $info_link URL для всплывающей подсказки (опционально)
 */
function rshop_display_filter_block($title, $facet_name, $is_accordion = true, $info_link = '') {
    $accordion_id = $is_accordion ? ' id="filter-accordion"' : '';
    ?>
    <div<?php echo $accordion_id; ?> class="filter-block">
        <div class="filter__header">
            <?php echo esc_html($title); ?>
            <?php if (!empty($info_link)) : ?>
                <a class="popup-leather-info" href="<?php echo esc_url($info_link); ?>" style="color: #dca966; z-index:99999999999999">&nbsp;[?]</a>
            <?php endif; ?>
        </div>
        <div class="filter__body">
            <?php echo do_shortcode('[facetwp facet="' . esc_attr($facet_name) . '"]'); ?>
        </div>
    </div>
    <?php
}
?>

<div id="secondary" class="widget-area" role="complementary">
    <?php dynamic_sidebar('sidebar-1'); ?>
    <div class="sidebar-widget-region" role="complementary">
            <button class="filter-block-accordion">ФИЛЬТРЫ</button>
            <div class="filter-block-all">
                <?php
            // Тип для химии и кожи
            if (is_product_category(array_merge([1191, 1233, 1248, 1279], $chemistry_categories))) {
                rshop_display_filter_block('Тип:', 'tip', true);
            }

            // Средняя толщина для галантерейной кожи
            if (is_product_category($haberdashery_leather)) {
                rshop_display_filter_block('Средняя толщина', 'srtolshina', true);
            }

            // Толщина для кожи и ниток
            if (is_product_category(array_merge($leather_categories, $thread_categories, $shoe_categories))) {
                rshop_display_filter_block('Толщина', 'tolshina', true);
                }

            // Высота ворса для меха
            if (is_product_category($fur_categories)) {
                rshop_display_filter_block('Высота ворса', 'vors', false);
                }

            // Часть кожи для всех видов кожи
            if (is_product_category(array_merge(
                [1191, 1248, 1233], 
                $shoe_categories, 
                [402, 275, 1251, 1252], 
                $haberdashery_leather
            ))) {
                rshop_display_filter_block('Часть кожи', 'chast_koji', true, '#popmake-3289884');
                }

            // Отделка для всех видов кожи
            if (is_product_category(array_merge(
                [1191, 1248, 1233], 
                $shoe_categories, 
                [402, 275, 1251, 1252], 
                $haberdashery_leather
            ))) {
                rshop_display_filter_block('Отделка', 'otdelka', true);
                }

            // Фасовка для химии
            if (is_product_category($chemistry_categories)) {
                rshop_display_filter_block('Фасовка', 'obem', false);
                }

            // Ширина для тканей
            if (is_product_category($fabric_categories)) {
                rshop_display_filter_block('Ширина', 'shirina', false);
                }

            // Длина для молний
            if (is_product_category($zipper_categories)) {
                rshop_display_filter_block('Длина', 'dlina', false);
                }

            // Оттенок для кожи (все виды)
            if (is_product_category(array_merge(
                $leather_categories, 
                $thread_categories,
                $haberdashery_leather,
                $shoe_categories
            ))) {
                rshop_display_filter_block('Оттенок', 'ottenok', false);
            }

            // Цвет для всех кроме кожи, галантереи и инструментов
            $exclude_categories = array_merge(
                $leather_categories, 
                $haberdashery_leather,
                $tool_categories
            );

            if (!is_product_category($exclude_categories)) {
                rshop_display_filter_block('Цвет', 'cvet', false);
            }

            // Страна для всех категорий
            rshop_display_filter_block('Страна', 'strana', false);

            // Бренд для определенных категорий
            if (is_product_category($brand_categories)) {
                rshop_display_filter_block('Бренд', 'brand', false);
                }
                ?>
            </div>
        <?php dynamic_sidebar('product_cat_widget'); ?>
        </div>
</div><!-- #secondary -->
