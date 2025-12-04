<?php
require_once('inc/rshop-styles-and-scripts.php');
require_once('inc/rshop-template-hooks.php');
require_once('inc/rshop-template-functions.php');
require_once('inc/rshop-wc-template-hooks.php');
require_once('inc/rshop-wc-template-functions.php');
require_once('inc/rshop-product-loop-attributes.php');
require_once ('inc/rshop-checkout.php');

// try to fix redirects dubl-material
remove_filter('template_redirect', 'redirect_canonical');

/* Корректное отображение количества товара с плавающей точкой в корзине и на странице чекаута */
remove_filter('woocommerce_stock_amount', 'intval');
add_filter('woocommerce_stock_amount', 'floatval');

/**
 * Sets Action Scheduler cleanup batch size.
 *
 * Default: 20
 *
 * @see https://wpcodebook.com/woocommerce-action-scheduler-cleanup-php/
 */
add_filter( 'action_scheduler_cleanup_batch_size', function ( $batch_size ) {
	return 100;
} );

/**
 * Sets Action Scheduler retention period to 14 days.
 *
 * Default: one month.
 *
 * @see https://wpcodebook.com/woocommerce-action-scheduler-cleanup-php/
 */
add_filter( 'action_scheduler_retention_period', function ( $period ) {
	return 14 * DAY_IN_SECONDS;
} );

/**
 * Calculate regular price.
 *
 * @param mixed $price Price.
 * @param WC_Product $product Product.
 *
 * @return mixed
 */


function calc_regular_price($price, $product)
{
    $cat_id = [1279];
    $cat_ids = $product->get_category_ids();

    if (!array_intersect($cat_id, $cat_ids)) {
        return $price;
    }
    return $price * 1.2;
}

add_filter('woocommerce_product_get_regular_price', 'calc_regular_price', 10, 2);

/**
 * Calculate sale price.
 *
 * @param mixed $price Price.
 * @param WC_Product $product Product.
 *
 * @return mixed
 */
function calc_sale_price($price, $product)
{
    $cat_id = [1279];
    $cat_ids = $product->get_category_ids();

    if (!array_intersect($cat_id, $cat_ids)) {
        return $price;
    }

    remove_filter('woocommerce_product_get_regular_price', 'calc_sale_price', 10, 2);
    $price = $product->get_regular_price();
    add_filter('woocommerce_product_get_regular_price', 'calc_sale_price', 10, 2);
//    var_dump($cat_ids);
    return $price;
}



//ОБНОВЛЕНИЕ ИНДЕКСА FWP (фильтров на стр категорий) ПОСЛЕ КАЖДОЙ ВЫГРУЗКИ В WPAI

function fwp_import_posts( $import_id ) {
    if ( function_exists( 'FWP' ) ) {
        FWP()->indexer->index();
    }
}
add_action( 'pmxi_after_xml_import', 'fwp_import_posts' );


// ЗАПУСК СЛЕДУЮЩЕГО ИМПОРТА

function after_xml_import($import_id, $import)
{

    // ID 23. КОЖА запускает химию
    if ($import_id == 23) {

        // Call the next import's trigger URL. ХИМИЯ
        wp_remote_get("https://rshop.ru/wp-load.php?import_key=qB_I.wlx&import_id=24&action=trigger",
            [
                'timeout' => 45,
                'httpversion' => '1.1',
                'blocking'  => false,
                'sslverify' => false
            ]
        );

        wp_mail( 'imxras@gmail.com', 'Import Report', 'koja done himiya import triggered' );


    }

    //химия запускает фото 
    if ($import_id == 24) {

        // Call the next import's trigger URL. фото
        wp_remote_get("https://rshop.ru/wp-load.php?import_key=qB_I.wlx&import_id=28&action=trigger",
            [
                'timeout' => 45,
                'httpversion' => '1.1',
                'blocking'  => false,
                'sslverify' => false
            ]
        );
        wp_mail( 'imxras@gmail.com', 'Import Report', 'himiya done photo import triggered' );
    }

}
add_action('pmxi_after_xml_import', 'after_xml_import', 10, 2);


// Related products plugin fix (https://www.webtoffee.com/related-products-woocommerce-user-guide/#sub_category)
add_filter('wt_crp_subcategory_only', '__return_true');




// ОТКЛ УВЕДОМЛЕНИЯ


add_filter('woocommerce_product_description_heading', '__return_null');


/**
 * РЕГИСТРАЦИЯ
 * ВИДЖЕТОВ
 */
function rn_widgets_init()
{

    register_sidebar(array(
        'name' => 'Виджет над товарами',
        'id' => 'product_cat_widget',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h2 class="rounded">',
        'after_title' => '</h2>',
    ));

//    register_sidebar(array(
//        'name' => 'Виджет для контактов',
//        'id' => 'header_contact_widget',
//        'before_widget' => '<div class="header-contacts-widget">',
//        'after_widget' => '</div>',
//        'before_title' => '<h2 class="rounded">',
//        'after_title' => '</h2>',
//    ));

    register_nav_menus(array(
            'head_beyond_category_koja' => 'Кожа',
            'head_beyond_category_instr' => 'Инструменты',
            'head_beyond_category_himiya' => 'Химия',
            'head_beyond_category_furni' => 'Фурнитура',
            'head_beyond_category_galant' => 'Галантерейная',
            'head_beyond_category_odejda' => 'Для одежды',
            'head_beyond_category_obuv' => 'Для обуви',
            'head_beyond_category_nitki' => 'Для ниток',
        )
    );

}

add_action('widgets_init', 'rn_widgets_init');

// remove sidebar for woocommerce pages


add_action( 'wp_head', 'remove_storefront_sidebar');
function remove_storefront_sidebar() {
    if (is_page_template('page-home.php')
        or is_cart()
        or is_product()
        or is_page() )
    {
        remove_action( 'storefront_sidebar', 'storefront_get_sidebar', 10 );
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

// ПОДМЕНЮ ДЛЯ КАТЕГОРИЙ

add_action('woocommerce_before_shop_loop', 'add_menu_beyond_category', 4);

if (!function_exists('add_menu_beyond_category')) {
    function add_menu_beyond_category()
    {


        // КОЖА

        if (is_product_category(array(1191, 1248))) {
            ?>
            <div class="header-widget-region" role="complementary">
                <div class="col-full">
                    <?php wp_nav_menu(array('theme_location' => 'head_beyond_category_koja')); ?>
                </div>
            </div>
            <?php
        }


        // ИНСТРУМЕНТЫ

        if (is_product_category(array(25, 202, 192, 1230, 1231, 201, 1176))) {
            ?>
            <div class="header-widget-region" role="complementary">
                <div class="col-full">
                    <?php wp_nav_menu(array('theme_location' => 'head_beyond_category_instr')); ?>
                </div>
            </div>
            <?php
        }


        //ХИМИЯ

        if (is_product_category(array(27, 383, 368, 365, 356, 354, 1238, 1353, 1338, 1343))) {
            ?>
            <div class="header-widget-region" role="complementary">
                <div class="col-full">
                    <?php wp_nav_menu(array('theme_location' => 'head_beyond_category_himiya')); ?>
                </div>
            </div>
            <?php
        }


        // ФУРНИТУРА

        if (is_product_category(array(26, 20, 1236, 339, 205, 347, 1258, 349, 341, 1468, 1341))) {
            ?>
            <div class="header-widget-region" role="complementary">
                <div class="col-full">
                    <?php wp_nav_menu(array('theme_location' => 'head_beyond_category_furni')); ?>
                </div>
            </div>
            <?php
        }

        //ГАЛАНТЕРЕЙНАЯ


        if (is_product_category(array(36, 132, 149, 96, 1250, 1228, 1241, 9493, 9492, 8486, 9503))) {
            ?>
            <div class="header-widget-region" role="complementary">
                <div class="col-full">
                    <?php wp_nav_menu(array('theme_location' => 'head_beyond_category_galant')); ?>
                </div>
            </div>
            <?php
        }


        //ДЛЯ ОДЕЖДЫ

        if (is_product_category(array(402, 275, 1251, 1252))) {
            ?>
            <div class="header-widget-region" role="complementary">
                <div class="col-full">
                    <?php wp_nav_menu(array('theme_location' => 'head_beyond_category_odejda')); ?>
                </div>
            </div>
            <?php
        }

        //ДЛЯ ОБУВИ

        if (is_product_category(array(1233, 9495, 9494))) {
            ?>
            <div class="header-widget-region" role="complementary">
                <div class="col-full">
                    <?php wp_nav_menu(array('theme_location' => 'head_beyond_category_obuv')); ?>
                </div>
            </div>
            <?php
        }

        //ДЛЯ НИТОК

        if (is_product_category(array(1232, 9507, 9508))) {
            ?>
            <div class="header-widget-region" role="complementary">
                <div class="col-full">
                    <?php wp_nav_menu(array('theme_location' => 'head_beyond_category_nitki')); ?>
                </div>
            </div>
            <?php
        }

    }

}

// РАЗМЕР ИЗОБРАЖЕНИЙ

add_filter( 'woocommerce_get_image_size_single', 'true_single_image_size' ); // woocommerce_single

function true_single_image_size( $size_options ) {

    return array(
        'width'  => 800,
        'height' => 800,
        'crop'   => 1, // 1 – жёсткая обрезка, 0 – сохранение пропорций
    );

}

add_filter( 'woocommerce_account_menu_items', 'rename_account_checkpoint', 9999 );

function rename_account_checkpoint( $items ) {
    $items['points-and-rewards'] = 'Система лояльности';
    return $items;
}

function user_role_update( $user_id, $new_role ) {
    $site_url = get_bloginfo('wpurl');
    $user_info = get_userdata( $user_id );
    $to = $user_info->user_email;
    $subject = "Подключение к системе лояльности на сайте ".$site_url;
    $message = "Здравствуйте, " .$user_info->display_name . "! Вы успешно подключены к системе лояльности на сайте ".$site_url." Бонусные баллы будут начислены Вам в ближайшее время.";
    wp_mail($to, $subject, $message);
}
add_action( 'set_user_role', 'user_role_update', 10, 2);

add_filter( 'xa_user_impexp_alter_user_meta', 'xa_user_impexp_alter_user_meta', 10, 3 );

if( ! function_exists('xa_user_impexp_alter_user_meta') )
{
    function xa_user_impexp_alter_user_meta( $found_customer, $user_meta_fields, $meta_array)
    {
        global $wpdb;
        $xa_db_reward_table = $wpdb->prefix.'wc_points_rewards_user_points';
        foreach ($user_meta_fields as $key => $meta) {
            $meta_value = (!empty($meta_array[$key]) ) ? maybe_unserialize($meta_array[$key]) : '';
            if( $key == 'wc_points_balance' && !empty($meta_value) )
            {
                $temp = $wpdb->update( $xa_db_reward_table, array('points_balance'=> $meta_value), array('user_id' => $found_customer));
                if(! $temp)
                    $wpdb->insert( $xa_db_reward_table, array('points_balance'=> $meta_value, 'user_id' => $found_customer ));
            }
        }
        return $found_customer;
    }
}


