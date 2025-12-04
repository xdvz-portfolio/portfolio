<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mb
 */
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<!--title here-->
    <link rel="icon" type="<?php bloginfo('template_url'); ?>/img/png" href="<?php bloginfo('template_url'); ?>/img/favicon.png" />
    <link rel="icon" type="<?php bloginfo('template_url'); ?>/img/png" href="<?php bloginfo('template_url'); ?>/img/favicon-32.png" sizes="32x32" />
    <link rel="icon" type="<?php bloginfo('template_url'); ?>/img/png" href="<?php bloginfo('template_url'); ?>/img/favicon-57.png" sizes="57x57" />
    <link rel="icon" type="<?php bloginfo('template_url'); ?>/img/png" href="<?php bloginfo('template_url'); ?>/img/favicon-76.png" sizes="76x76" />
    <?php wp_deregister_script('jquery'); ?>
    <?php wp_head(); ?>

</head>

<body style="visibility: hidden"
      onload="setTimeout ('document.body.style.visibility = \'visible\'', 0)">

<div class="progress-container">
    <span class="progress-bar"></span>
</div>

<body>
<div class="cookies">
    <p>Сайт использует файлы cookie.</p>
    <p>Продолжая использование сайта Вы соглашаетесь с условиями <a href="/policy">Политики конфиденциальности</a></p>
    <a href="" class="btn" id="cookie-ok">Согласен</a>
</div>
<div class="navbar">
    <div class="container_center">
        <div class="navbar__left-content">
            <a href="/" class="navbar__logo">
                <img src="<?php bloginfo('template_url'); ?>/img/logo.png" srcset="<?php bloginfo('template_url'); ?>/img/logo@2x.png 2x, <?php bloginfo('template_url'); ?>/img/logo@3x.png 3x" alt="mb" />
            </a>
            <a href="/" class="navbar__logo navbar__logo-mob navbar__none">
                <img src="<?php bloginfo('template_url'); ?>/img/logo_ear.png" srcset="<?php bloginfo('template_url'); ?>/img/logo_ear@2x.png 2x, <?php bloginfo('template_url'); ?>/img/logo_ear@3x.png 3x" alt="mb" />
            </a>
        </div>

        <div class="navbar__center-content">
            <div class="navbar__menu">
                <div class="navbar__item navbar__none"><a href="/"><span>Главная <img src="<?php bloginfo('template_url'); ?>/img/about/mdi-chevron-up.png" alt=""></span></a></div>
                <div class="navbar__item"><a href="/features">Возможности</a></div>
                <div class="navbar__item"><a href="/music">Музыка</a></div>
                <div class="navbar__item"><a href="/price">Цены</a></div>
                <div class="navbar__item"><a href="/help">Помощь</a></div>
                <div class="navbar__item navbar__none"><a href="https://mb.com/" target="_blank">Правообладателям</a></div>
                <div class="navbar__item navbar__none"><a href="/contact">Контакты</a></div>
            </div>
        </div>

        <div class="navbar__right-content">
            <a href="/request" class="btn">Подключить</a>
            <div class="navbar__item exit"><a href="/login">Войти</a></div>
            <div class="btn__block">
                <a href="/message" class="btn btn__transpsrent">Сообщение</a>
            </div>
        </div>
    </div>
</div>

<div class="navbar__mob">
    <div class="container_center">
        <div class="navbar__left-content">
            <a href="/" class="navbar__logo logo__block">
                <img src="<?php bloginfo('template_url'); ?>/img/logo.png" srcset="<?php bloginfo('template_url'); ?>/img/logo@2x.png 2x, <?php bloginfo('template_url'); ?>/img/logo@3x.png 3x" alt="mb" />
            </a>
            <a href="/" class="navbar__logo navbar__logo-ear logo__block none">
                <img src="<?php bloginfo('template_url'); ?>/img/logo_ear.png" srcset="<?php bloginfo('template_url'); ?>/img/logo_ear@2x.png 2x, <?php bloginfo('template_url'); ?>/img/logo_ear@3x.png 3x" alt="mb" />
            </a>
        </div>
        <div class="navbar__right-content navbar__trigger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>

<div data-scroll>
    <div data-scroll-content>
        <header class="fscreen none" id="up"><span class="typed-text"></span></header>






















<!--<!doctype html>-->
<!--<html --><?php //language_attributes(); ?><!-- -->
<!--<head>-->
<!--	<meta charset="--><?php //bloginfo( 'charset' ); ?><!--">-->
<!--	<meta name="viewport" content="width=device-width, initial-scale=1">-->
<!--	<link rel="profile" href="https://gmpg.org/xfn/11">-->
<!---->
<!--	--><?php //wp_head(); ?>
<!--</head>-->

<!--<body --><?php //body_class(); ?>
<?php //wp_body_open(); ?>
<!--<div id="page" class="site">-->
<!--	<a class="skip-link screen-reader-text" href="#primary">--><?php //esc_html_e( 'Skip to content', 'mb' ); ?><!--</a>-->
<!---->
<!--	<header id="masthead" class="site-header">-->
<!--		<div class="site-branding">-->
<!--			--><?php
//			the_custom_logo();
//			if ( is_front_page() && is_home() ) :
//				?>
<!--				<h1 class="site-title"><a href="--><?php //echo esc_url( home_url( '/' ) ); ?><!--" rel="home">--><?php //bloginfo( 'name' ); ?><!--</a></h1>-->
<!--				--><?php
//			else :
//				?>
<!--				<p class="site-title"><a href="--><?php //echo esc_url( home_url( '/' ) ); ?><!--" rel="home">--><?php //bloginfo( 'name' ); ?><!--</a></p>-->
<!--				--><?php
//			endif;
//			$mb_description = get_bloginfo( 'description', 'display' );
//			if ( $mb_description || is_customize_preview() ) :
//				?>
<!--				<p class="site-description">--><?php //echo $mb_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><!--</p>-->
<!--			--><?php //endif; ?>
<!--		</div>-->
        <!-- .site-branding -->
<!---->
<!--		<nav id="site-navigation" class="main-navigation">-->
<!--			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">--><?php //esc_html_e( 'Primary Menu', 'mb' ); ?><!--</button>-->
<!--			--><?php
//			wp_nav_menu(
//				array(
//					'theme_location' => 'menu-1',
//					'menu_id'        => 'primary-menu',
//				)
//			);
//			?>
<!--		</nav>-->
        <!-- #site-navigation -->
<!--	</header>-->
    <!-- #masthead -->
