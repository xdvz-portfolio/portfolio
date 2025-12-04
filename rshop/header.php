<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2.0">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <meta name="yandex-verification" content="709ec7a0d1934a29" />
    <meta name="google-site-verification" content="IAi7rmYKtptsaaBcsA4Hv2TAoYiPd9hyUYqqpLbbYCM" />

    <?php wp_head(); ?>
</head>
<script>
    (function($) {
        $(document).on('facetwp-loaded', function() {
            if (FWP.loaded) {
                $('html, body').animate({
                    scrollTop: $('.col-full').offset().top
                }, 500);
                
                // Обновляем высоту открытых фильтров после загрузки данных
                $('.filter__header.active').each(function() {
                    let $filterBody = $(this).next('.filter__body');
                    // Открываем контейнер фильтра без ограничения высоты
                    $filterBody.css({
                        'max-height': 'none', 
                        'overflow': 'visible'
                    });
                    
                    // Настраиваем только facetwp-facet для скроллинга
                    let $facets = $filterBody.find('.facetwp-facet');
                    $facets.css({
                        'max-height': '300px',
                        'overflow-y': 'auto'
                    });
                    
                    // Настраиваем вложенные элементы expand без скролла
                    $facets.find('.facetwp-expand').css({
                        'max-height': '300px',
                        'overflow-y': 'visible'
                    });
                });
            }
        });
    })(jQuery);
</script>
<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<?php do_action( 'storefront_before_site' ); ?>

<div id="page" class="hfeed site">
    <?php do_action( 'storefront_before_header' ); ?>

    <header id="masthead" class="site-header" role="banner" style="<?php storefront_header_styles(); ?>">

        <?php
        /**
         * Functions hooked into storefront_header action
         *
         * @hooked storefront_header_container                 - 0
         * @hooked storefront_skip_links                       - 5
         * @hooked storefront_social_icons                     - 10
         * @hooked storefront_site_branding                    - 20
         * @hooked storefront_secondary_navigation             - 30
         * @hooked storefront_product_search                   - 40
         * @hooked storefront_header_container_close           - 41
         * @hooked storefront_primary_navigation_wrapper       - 42
         * @hooked storefront_primary_navigation               - 50
         * @hooked storefront_header_cart                      - 60
         * @hooked storefront_primary_navigation_wrapper_close - 68
         */
        do_action( 'storefront_header' );
        ?>

    </header><!-- #masthead -->

    <?php
    /**
     * Functions hooked in to storefront_before_content
     *
     * @hooked storefront_header_widget_region - 10
     * @hooked woocommerce_breadcrumb - 10
     */
    do_action( 'storefront_before_content' );
    ?>


    <div id="content" class="site-content" tabindex="-1">
        <div class="col-full">

<?php
do_action( 'storefront_content_top' );
