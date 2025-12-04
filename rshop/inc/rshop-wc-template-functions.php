<?php
/**
 * rshop WooCommerce шаблонные функции.
 *
 * Содержит функции для модификации WooCommerce шаблонов и добавления
 * пользовательской функциональности для интернет-магазина.
 *
 * @package rshop
 * @version 2.0.3
 */

/**
 * Всегда показывать страну в адресе.
 */
add_filter('woocommerce_formatted_address_force_country_display', '__return_true');

/**
 * Показывает артикул товара в корзине.
 *
 * @param string $item_name Название товара
 * @param array $cart_item Элемент корзины
 * @param string $cart_item_key Ключ элемента корзины
 * @return string Модифицированное название с артикулом
 */
add_filter('woocommerce_cart_item_name', 'rshop_showing_sku_in_cart_items', 99, 3);
function rshop_showing_sku_in_cart_items($item_name, $cart_item, $cart_item_key) {
    // Объект WC_Product
    $product = $cart_item['data'];
    // Получаем артикул
    $sku = $product->get_sku();

    // Если артикул не существует
    if (empty($sku)) {
        return $item_name;
    }

    // Добавляем артикул к названию
    $item_name .= '<br><small class="product-sku">' . esc_html__("Артикул: ", "woocommerce") . esc_html($sku) . '</small>';

    return $item_name;
}

/**
 * Скрывает определенные атрибуты из вкладки дополнительной информации.
 *
 * @param array $attributes Атрибуты товара
 * @param WC_Product $product Объект товара
 * @return array Модифицированные атрибуты
 */
add_filter('woocommerce_product_get_attributes', 'rshop_hide_attributes_from_additional_info_tabs', 20, 2);
function rshop_hide_attributes_from_additional_info_tabs($attributes, $product) {
    $hidden_attributes = [
        'pa_средняя-толщина',
    ];
    
    foreach ($hidden_attributes as $hidden_attribute) {
        if (!isset($attributes[$hidden_attribute])) {
            continue;
        }
        $attribute = $attributes[$hidden_attribute];
        $attribute->set_visible(false);
    }

    return $attributes;
}

/**
 * Шорткод для вывода списка категорий товара.
 *
 * @param array $atts Атрибуты шорткода
 * @return string HTML-разметка списка категорий
 */
add_shortcode('product_cat_list', 'rshop_list_product_categories');
function rshop_list_product_categories($atts) {
    $atts = shortcode_atts(array(
        'id' => get_the_id(),
    ), $atts, 'product_cat_list');

    $output   = []; // Инициализация
    $taxonomy = 'product_cat'; // Таксономия категорий товаров

    // Получаем ID терминов категорий товара
    $terms_ids = wp_get_post_terms($atts['id'], $taxonomy, array('fields' => 'ids'));

    // Проходим по ID терминов (категориям товаров)
    foreach ($terms_ids as $term_id) {
        $term_names = []; // Инициализация массива категорий

        // Проходим по родительским категориям товара
        foreach (get_ancestors($term_id, $taxonomy) as $ancestor_id) {
            // Можно раскомментировать, если нужно добавить родительские категории
            // $term_names[] = get_term($ancestor_id, $taxonomy)->name;
        }
        // Добавляем название категории товара в массив
        $term = get_term($term_id, $taxonomy);
        if ($term && !is_wp_error($term)) {
            $term_names[] = $term->name;
        }

        // Добавляем отформатированные родительские категории с категорией товара в основной массив
        if (!empty($term_names)) {
            $output[] = implode(' > ', $term_names);
        }
    }

    // Выводим отформатированные категории товаров с их родителями
    return implode(', ', $output);
}

/**
 * Изменяет порядок вкладок данных товара.
 *
 * @param array $tabs Вкладки товара
 * @return array Модифицированные вкладки
 */
add_filter('woocommerce_product_tabs', 'rshop_reorder_product_tabs', 98);
function rshop_reorder_product_tabs($tabs) {
    if (isset($tabs['reviews'])) {
        $tabs['reviews']['priority'] = 3;
    }
    if (isset($tabs['description'])) {
        $tabs['description']['priority'] = 2;
    }
    if (isset($tabs['additional_information'])) {
        $tabs['additional_information']['priority'] = 1;
    }

    return $tabs;
}

/**
 * Переименовывает вкладки данных товара.
 *
 * @param array $tabs Вкладки товара
 * @return array Модифицированные вкладки
 */
add_filter('woocommerce_product_tabs', 'rshop_rename_product_tabs', 98);
function rshop_rename_product_tabs($tabs) {
    if (isset($tabs['description'])) {
        $tabs['description']['title'] = __('ДОПОЛНИТЕЛЬНО');
    }
    if (isset($tabs['reviews'])) {
        $tabs['reviews']['title'] = __('ОТЗЫВЫ');
    }
    if (isset($tabs['additional_information'])) {
        $tabs['additional_information']['title'] = __('ДЕТАЛИ');
    }

    return $tabs;
}

/**
 * Удаляет вкладки данных товара.
 *
 * @param array $tabs Вкладки товара
 * @return array Модифицированные вкладки
 */
add_filter('woocommerce_product_tabs', 'rshop_remove_product_tabs', 98);
function rshop_remove_product_tabs($tabs) {
    unset($tabs['reviews'], $tabs['description']);

    return $tabs;
}

/**
 * Показывает название товара в цикле товаров с дополнительными параметрами.
 */
if (!function_exists('rshop_woocommerce_template_loop_product_title')) {
    function rshop_woocommerce_template_loop_product_title() {
        $dop_params = get_field('dopolnitelnye_parametry');
        
        echo '<h2 class="' . esc_attr(apply_filters('woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title')) . '">' . 
             esc_html(get_the_title()); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        
        if (!empty($dop_params)) {
            echo '<br><span class="dopolnitelnye-parametry">' . esc_html($dop_params) . '</span>';
        }
        
        echo '</h2>';
    }
}

/**
 * Показывает дополнительные параметры на странице товара.
 */
add_action('woocommerce_single_product_summary', 'rshop_show_dop_parametr_single_product', 5);
function rshop_show_dop_parametr_single_product() {
    $dop_params = get_field('dopolnitelnye_parametry');
    
    if (!empty($dop_params)) {
        echo '<span class="dopolnitelnye-parametry-single-product">' . esc_html($dop_params) . '</span>';
    }
}

/**
 * Добавляет единицу измерения после поля количества товара.
 */
add_action('woocommerce_after_quantity_input_field', 'rshop_add_unit_after_quantity');
function rshop_add_unit_after_quantity() {
    if (!is_cart() && !is_checkout()) {
        global $product;
        $unit = $product->get_attribute('pa_ед-измерения');

        if (!empty($unit)) {
            echo '<input type="text" readonly disabled size="6" value="' . esc_attr($unit) . '"></input>';
        }
    }
}

/**
 * Функция проверки принадлежности товара к определенной категории.
 *
 * @param int $category_id ID категории
 * @return bool True если товар принадлежит категории
 */
function rshop_product_in_category($category_id) {
    global $product;
    
    if (!$product) {
        return false;
    }
    
    $cat_ids = $product->get_category_ids();
    $attribute = get_field('srednyaya_ploshhad');
    
    return (in_array($category_id, $cat_ids, true) && $attribute !== "" && $attribute !== 0);
}

/**
 * Выводит "Средняя площадь:" перед полем количества для категории "Кожа".
 */
add_action('woocommerce_before_add_to_cart_quantity', 'rshop_show_area_label_for_category_koja');
function rshop_show_area_label_for_category_koja() {
    if (rshop_product_in_category(1191)) {
        echo '<div class="srednaya-ploshad">' . esc_html__('Средняя площадь:', 'rshop') . '</div>';
    }
}

/**
 * Выводит "Средняя площадь:" перед полем количества для категории "Мех".
 */
add_action('woocommerce_before_add_to_cart_quantity', 'rshop_show_area_label_for_category_mex');
function rshop_show_area_label_for_category_mex() {
    if (rshop_product_in_category(1229)) {
        echo '<div class="srednaya-ploshad">' . esc_html__('Средняя площадь:', 'rshop') . '</div>';
    }
}

/**
 * Выводит "Средняя площадь:" перед полем количества для категории "Дубленка".
 */
add_action('woocommerce_before_add_to_cart_quantity', 'rshop_show_area_label_for_category_dublen');
function rshop_show_area_label_for_category_dublen() {
    if (rshop_product_in_category(225)) {
        echo '<div class="srednaya-ploshad">' . esc_html__('Средняя площадь:', 'rshop') . '</div>';
    }
}

/**
 * Выводит "Минимальная длина:" перед полем количества для категории "Ткань".
 */
add_action('woocommerce_before_add_to_cart_quantity', 'rshop_show_area_label_for_category_tkan');
function rshop_show_area_label_for_category_tkan() {
    if (rshop_product_in_category(1235)) {
        echo '<div class="srednaya-ploshad">' . esc_html__('Минимальная длина:', 'rshop') . '</div>';
    }
}

/**
 * Вычисляет общую стоимость товара при изменении количества для определенных категорий.
 */
add_action('woocommerce_after_add_to_cart_quantity', 'rshop_calculate_total_price_on_quantity_change');
function rshop_calculate_total_price_on_quantity_change() {
    global $product;
    $cat_id = [1229, 1191];
    $cat_ids = $product->get_category_ids();
    
    if (array_intersect($cat_id, $cat_ids)) {
        $regular = $product->get_price();
        ?>
        <label>
            <input id="input-vsego" type="text" disabled style="font-weight: 600; width: 140px; margin-right: 10px; margin-left: -10px">
        </label>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const quantityInputs = document.querySelectorAll('input[type=number]');
            const totalInput = document.getElementById('input-vsego');
            
            function calculateTotal() {
                const regular = <?php echo floatval($regular); ?>;
                const qty = quantityInputs[0].value;
                const vsego = (qty * regular).toFixed(0);
                const output = "Всего: " + vsego + "₽";
                totalInput.setAttribute('value', output);
            }
            
            // Добавляем обработчики событий
            if(quantityInputs.length > 0 && totalInput) {
                quantityInputs[0].addEventListener('keyup', calculateTotal);
                quantityInputs[0].addEventListener('mouseup', calculateTotal);
                
                // Запускаем расчет при загрузке страницы
                calculateTotal();
            }
        });
        </script>
        <?php
    }
}

/**
 * Добавляет открывающий обертку перед заголовком товара в цикле.
 */
add_action('woocommerce_shop_loop_item_title', 'rshop_title_wrapper_before', 9);
function rshop_title_wrapper_before() {
    echo '<div class="pre_title_wrapper">';
}

/**
 * Добавляет закрывающую обертку после описания товара в цикле.
 */
add_action('woocommerce_after_shop_loop_item', 'rshop_title_wrapper_after', 6);
function rshop_title_wrapper_after() {
    echo '</div>';
}

/**
 * Изменяет переводы строк для полей оформления заказа.
 *
 * @param string $translated_text Переведенный текст
 * @param string $text Оригинальный текст
 * @param string $domain Текстовый домен
 * @return string Измененный переведенный текст
 */
function rshop_billing_field_strings($translated_text, $text, $domain) {
    if ($domain === 'woocommerce') {
        switch ($translated_text) {
            case 'Billing address':
                return __('Адрес доставки', 'woocommerce');
            case 'City':
                return __('Населенный пункт', 'woocommerce');
        }
    }
    
    return $translated_text;
}
add_filter('gettext', 'rshop_billing_field_strings', 20, 3);

/**
 * Изменяет текст "Подытог" на "Сумма".
 *
 * @param string $translated Переведенный текст
 * @return string Измененный переведенный текст
 */
add_filter('gettext', 'rshop_translate_subtotal_text');
function rshop_translate_subtotal_text($translated) {
    return str_ireplace('Подытог', 'Сумма', $translated);
}

/**
 * Находит похожие товары с одинаковым названием.
 *
 * @param array $related_posts Связанные товары
 * @param int $product_id ID товара
 * @param array $args Аргументы запроса
 * @return array Измененные связанные товары
 */
add_filter('woocommerce_related_products', 'rshop_related_products_by_same_title', 9999, 3);
function rshop_related_products_by_same_title($related_posts, $product_id, $args) {
    $product = wc_get_product($product_id);
    if (!$product) {
        return $related_posts;
    }
    
    $title = $product->get_name();
    $related_posts = get_posts(array(
        'post_type'      => 'product',
        'post_status'    => 'publish',
        'title'          => $title,
        'fields'         => 'ids',
        'posts_per_page' => -1,
        'exclude'        => array($product_id),
    ));

    return $related_posts;
}

/**
 * Проверяет, нужно ли включить десятичные значения для количества товара.
 *
 * @param WC_Product $product Объект товара
 * @return bool True если нужно включить десятичные значения
 */
function rshop_enable_decimal_quantities($product) {
    $targeted_terms = array(1191, 1229, 1235); // Категории (names, slugs или IDs)
    return has_term($targeted_terms, 'product_cat', $product->get_id());
}

/**
 * Настраивает аргументы поля количества товара.
 *
 * @param array $args Аргументы поля количества
 * @param WC_Product $product Объект товара
 * @return array Измененные аргументы
 */
add_filter('woocommerce_quantity_input_args', 'rshop_custom_quantity_input_args', 10, 2);
function rshop_custom_quantity_input_args($args, $product) {
    if (rshop_enable_decimal_quantities($product)) {
        $product_id = $product->is_type('variation') ? $product->get_parent_id() : $product->get_id();
        $srpl = get_field('srednyaya_ploshhad', $product_id);
        $units = wc_get_product_terms($product->get_id(), 'pa_ед-измерения', array('fields' => 'names'));
        $edinica = !empty($units) ? array_shift($units) : '';

        if ($srpl !== "" && $srpl !== 0) {
            $args['input_value'] = is_cart() ? $args['input_value'] : $srpl;
            $args['min_value'] = $srpl;
        }

        if ($edinica === 'м' || $edinica === 'кв.м.') {
            $args['step'] = 0.5;
        }
    }

    return $args;
}

/**
 * Настраивает аргументы для кнопки "Добавить в корзину" в цикле товаров.
 *
 * @param array $args Аргументы кнопки
 * @param WC_Product $product Объект товара
 * @return array Измененные аргументы
 */
add_filter('woocommerce_loop_add_to_cart_args', 'rshop_custom_loop_add_to_cart_quantity_arg', 10, 2);
function rshop_custom_loop_add_to_cart_quantity_arg($args, $product) {
    if (rshop_enable_decimal_quantities($product)) {
        $product_id = $product->is_type('variation') ? $product->get_parent_id() : $product->get_id();
        $srpl = get_field('srednyaya_ploshhad', $product_id);
        
        if ($srpl !== "" && $srpl !== 0 && !is_cart()) {
            $args['quantity'] = $srpl;
        }
    }

    return $args;
}

/**
 * Настраивает минимальное количество для вариаций товара.
 *
 * @param array $data Данные вариации
 * @param WC_Product $product Родительский товар
 * @param WC_Product_Variation $variation Вариация товара
 * @return array Измененные данные
 */
add_filter('woocommerce_available_variation', 'rshop_filter_wc_available_variation_price_html', 10, 3);
function rshop_filter_wc_available_variation_price_html($data, $product, $variation) {
    if (rshop_enable_decimal_quantities($product)) {
        $data['min_qty'] = 1;
    }

    return $data;
}

/**
 * Переопределяет хлебные крошки WooCommerce.
 * 
 * Использует стандартную функциональность хлебных крошек WooCommerce
 * без дополнительных модификаций.
 * 
 * @param string $template Путь к шаблону
 * @param string $template_name Имя шаблона
 * @param string $template_path Путь к директории шаблонов
 * @return string Путь к шаблону
 */
function rshop_override_breadcrumb($template, $template_name, $template_path) {
    if ('global/breadcrumb.php' === $template_name) {

    }
    return $template;
}

/**
 * Модифицирует ссылку "Добавить в корзину" в петле товаров.
 * 
 * Добавляет код отслеживания Яндекс.Метрики для кнопки добавления в корзину.
 * 
 * @param string $html HTML код ссылки
 * @param WC_Product $product Объект товара
 * @param array $args Аргументы
 * @return string Модифицированный HTML код
 */
function rshop_override_loop_add_to_cart($html, $product, $args) {
    $aria_describedby = isset($args['aria-describedby_text']) ? 
        sprintf('aria-describedby="woocommerce_loop_add_to_cart_link_describedby_%s"', 
        esc_attr($product->get_id())) : '';
        
    return sprintf(
        '<a href="%s" onclick="ym(57357283,`reachGoal`,`kupiknopka`); return true;" %s data-quantity="%s" class="%s" %s>%s</a>',
        esc_url($product->add_to_cart_url()),
        $aria_describedby,
        esc_attr(isset($args['quantity']) ? $args['quantity'] : 1),
        esc_attr(isset($args['class']) ? $args['class'] : 'button'),
        isset($args['attributes']) ? wc_implode_html_attributes($args['attributes']) : '',
        esc_html($product->add_to_cart_text())
    ) . (isset($args['aria-describedby_text']) ? 
        sprintf('<span id="woocommerce_loop_add_to_cart_link_describedby_%s" class="screen-reader-text">%s</span>', 
        esc_attr($product->get_id()), esc_html($args['aria-describedby_text'])) : '');
}

/**
 * Переопределяет пагинацию для поддержки FacetWP.
 * 
 * Проверяет наличие FacetWP и использует его пагинацию при доступности,
 * в противном случае использует стандартную пагинацию WooCommerce.
 * 
 * @return void
 */
function rshop_override_pagination() {
    $total   = isset($total) ? $total : wc_get_loop_prop('total_pages');
    $current = isset($current) ? $current : wc_get_loop_prop('current_page');
    $base    = isset($base) ? $base : esc_url_raw(str_replace(999999999, '%#%', remove_query_arg('add-to-cart', get_pagenum_link(999999999, false))));
    $format  = isset($format) ? $format : '';
    
    if ($total <= 1) {
        return;
    }
    
    // Проверяем наличие FacetWP и используем его пагинацию
    if (function_exists('FWP')) {
        echo facetwp_display('facet', 'pager_');
        return;
    }
    
    // Иначе используем стандартную пагинацию
    echo '<nav class="woocommerce-pagination" aria-label="' . esc_attr__('Product Pagination', 'woocommerce') . '">';
    echo paginate_links(apply_filters('woocommerce_pagination_args', [
        'base'         => $base,
        'format'       => $format,
        'add_args'     => false,
        'current'      => max(1, $current),
        'total'        => $total,
        'prev_text'    => is_rtl() ? '&rarr;' : '&larr;',
        'next_text'    => is_rtl() ? '&larr;' : '&rarr;',
        'type'         => 'list',
        'end_size'     => 3,
        'mid_size'     => 3,
    ]));
    echo '</nav>';
}

/**
 * Переопределяет мета-информацию на странице товара.
 * 
 * Заменяет стандартный вывод категорий на шорткод product_cat_list.
 * 
 * @return void
 */
function rshop_override_product_meta() {
    global $product;
    ?>
    <div class="product_meta">
        <?php do_action('woocommerce_product_meta_start'); ?>
        
        <?php if (wc_product_sku_enabled() && ($product->get_sku() || $product->is_type(\Automattic\WooCommerce\Enums\ProductType::VARIABLE))) : ?>
            <span class="sku_wrapper"><?php esc_html_e('SKU:', 'woocommerce'); ?> <span class="sku"><?php echo ($sku = $product->get_sku()) ? $sku : esc_html__('N/A', 'woocommerce'); ?></span></span>
        <?php endif; ?>
        
        <?php echo '<span class="posted_in">Категории: ' . do_shortcode("[product_cat_list]" . '</span>'); ?>
        
        <?php echo wc_get_product_tag_list($product->get_id(), ', ', '<span class="tagged_as">' . _n('Tag:', 'Tags:', count($product->get_tag_ids()), 'woocommerce') . ' ', '</span>'); ?>
        
        <?php do_action('woocommerce_product_meta_end'); ?>
    </div>
    <?php
}