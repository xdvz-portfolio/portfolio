<?php
/**
 * rshop Product Slider Functions
 *
 * @package rshop
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Добавляет слайдеры товаров на главную страницу
 */
function rshop_add_product_sliders_to_home() {
    $categories = array(
        array(
            'id' => 9727, 
            'title' => 'Новинки',
            'view_all_link' => get_term_link(9727, 'product_cat'),
        ),
        array(
            'id' => 1242, 
            'title' => 'Акция',
            'view_all_link' => get_term_link(1242, 'product_cat'),
        ),
    );

    foreach ($categories as $category) {
        rshop_render_product_slider($category['id'], $category['title'], $category['view_all_link']);
    }
}

/**
 * Рендерит слайдер товаров для указанной категории
 */
function rshop_render_product_slider($category_id, $category_name, $view_all_link) {
    // Кэширование запроса товаров
    $transient_key = 'rshop_product_slider_' . $category_id;
    $products = get_transient($transient_key);

    if (false === $products) {
        $args = array(
            'post_type'      => 'product',
            'posts_per_page' => 15,
            'tax_query'      => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field'    => 'term_id',
                    'terms'    => $category_id,
                ),
            ),
            'post_status'    => 'publish',
            'orderby'        => 'date',
            'order'          => 'DESC',
            'fields'         => 'ids',
        );

        $products_query = new WP_Query($args);
        $products = wc_get_products(array(
            'include' => $products_query->posts,
            'limit'   => 15,
            'stock_status' => 'instock',
        ));

        // Кэш на 3 часа
        set_transient($transient_key, $products, 3 * HOUR_IN_SECONDS);
    }

    if ($products && count($products) > 0) {
        $slider_id = 'rshop-product-slider-' . $category_id;
        ?>
        <div class="rshop-product-slider-section">
            <div class="rshop-product-slider" data-slider-id="<?php echo esc_attr($slider_id); ?>">
                <div id="<?php echo esc_attr($slider_id); ?>" class="swiper rshop-product-slider__wrapper">
                    <div class="swiper-wrapper">
                        <?php
                        // Счетчик для lazy loading
                        $counter = 0;
                        
                        foreach ($products as $product) {
                            global $post;
                            $post = get_post($product->get_id());
                            setup_postdata($post);
                            
                            $counter++;
                            $lazy_load = $counter > 6 ? 'true' : 'false';
                            
                            echo '<div class="swiper-slide rshop-product-slide" data-lazy-load="' . esc_attr($lazy_load) . '">';
                            wc_get_template_part('content', 'product');
                            echo '</div>';
                        }
                        wp_reset_postdata();
                        ?>
                        <div class="swiper-slide rshop-product-slide rshop-view-all-slide">
                            <div class="rshop-view-all-content">
                                <a href="<?php echo esc_url($view_all_link); ?>" class="button rshop-view-all-button">
                                    Посмотреть все товары
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="rshop-product-slider__button-prev"></div>
                <div class="rshop-product-slider__button-next"></div>
                
                <div class="rshop-product-slider__navigation">
                    <div class="rshop-product-slider__pagination"></div>
                </div>
            </div>
        </div>
        <?php
    }
}

// Очистка кэша при обновлении товара
function rshop_clear_product_slider_cache($post_id) {
    if (get_post_type($post_id) === 'product') {
        $product_categories = wp_get_post_terms($post_id, 'product_cat', array('fields' => 'ids'));
        
        foreach ($product_categories as $cat_id) {
            delete_transient('rshop_product_slider_' . $cat_id);
        }
    }
}

add_action('save_post', 'rshop_clear_product_slider_cache');
add_action('woocommerce_update_product', 'rshop_clear_product_slider_cache');
add_action('homepage', 'rshop_add_product_sliders_to_home', 5); 