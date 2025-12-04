<?php
/**
 * Функции для меню категорий в rshop теме
 *
 * Обеспечивает отображение специфических меню для различных
 * категорий товаров на странице архива категории.
 *
 * @package rshop
 * @version 1.0.1
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Добавляет подменю для категорий товаров.
 */
add_action('woocommerce_before_shop_loop', 'rshop_add_menu_beyond_category', 4);

if (!function_exists('rshop_add_menu_beyond_category')) {
    /**
     * Отображает соответствующее меню для определенных категорий.
     * 
     * Проверяет текущую категорию и отображает соответствующее меню,
     * если оно определено для этой категории.
     */
    function rshop_add_menu_beyond_category() {
        // Определение сопоставления ID категорий с меню
        $category_menus = [
            // КОЖА
            'head_beyond_category_koja' => [1191, 1248],
            
            // ИНСТРУМЕНТЫ
            'head_beyond_category_instr' => [25, 202, 192, 1230, 1231, 201, 1176],
            
            // ХИМИЯ
            'head_beyond_category_himiya' => [27, 383, 368, 365, 356, 354, 1238, 1353, 1338, 1343],
            
            // ФУРНИТУРА
            'head_beyond_category_furni' => [26, 20, 1236, 339, 205, 347, 1258, 349, 341, 1468, 1341],
            
            // ГАЛАНТЕРЕЙНАЯ
            'head_beyond_category_galant' => [36, 132, 149, 96, 1250, 1228, 1241, 9493, 9492, 8486, 9503],
            
            // ДЛЯ ОДЕЖДЫ
            'head_beyond_category_odejda' => [402, 275, 1251, 1252],
            
            // ДЛЯ ОБУВИ
            'head_beyond_category_obuv' => [1233, 9495, 9494],
            
            // ДЛЯ НИТОК
            'head_beyond_category_nitki' => [1232, 9507, 9508],
        ];
        
        // Отображение соответствующего меню для текущей категории
        foreach ($category_menus as $menu_location => $category_ids) {
            rshop_display_category_menu($category_ids, $menu_location);
        }
    }
}

if (!function_exists('rshop_display_category_menu')) {
    /**
     * Отображает меню категории если текущая категория соответствует списку.
     *
     * @param array $category_ids Массив ID категорий для проверки
     * @param string $menu_location Идентификатор расположения меню
     */
    function rshop_display_category_menu($category_ids, $menu_location) {
        if (is_product_category($category_ids)) {
            ?>
            <div class="header-widget-region" role="complementary">
                <div class="col-full">
                    <?php 
                    if (has_nav_menu($menu_location)) {
                        wp_nav_menu([
                            'theme_location' => $menu_location,
                            'container'      => false,
                            'fallback_cb'    => false,
                        ]); 
                    }
                    ?>
                </div>
            </div>
            <?php
        }
    }
} 