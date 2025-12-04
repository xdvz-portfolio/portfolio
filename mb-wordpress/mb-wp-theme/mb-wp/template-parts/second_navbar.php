<?php
/**
 * Template part second navbar
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mb
 */

?>

<div class="navbar">
    <div class="container_center">
        <div class="navbar__left-content">
            <a href="/index" class="navbar__logo">
                <img src="<?php bloginfo('template_url'); ?>/img/logo.png" srcset="<?php bloginfo('template_url'); ?>/img/logo@2x.png 2x, <?php bloginfo('template_url'); ?>/img/logo@3x.png 3x" alt="mb" />
            </a>
            <a href="/index" class="navbar__logo navbar__logo-mob navbar__none">
                <img src="<?php bloginfo('template_url'); ?>/img/logo_ear.png" srcset="<?php bloginfo('template_url'); ?>/img/logo_ear@2x.png 2x, <?php bloginfo('template_url'); ?>/img/logo_ear@3x.png 3x" alt="mb" />
            </a>
        </div>

        <div class="navbar__center-content">
            <div class="navbar__menu">
                <div class="navbar__item navbar__none"><a href="/index"><span>Главная <img src="<?php bloginfo('template_url'); ?>/img/about/mdi-chevron-up.png" alt=""></span></a></div>
                <div class="navbar__item"><a href="/features">Возможности</a></div>
                <div class="navbar__item"><a href="/pricel">Цены</a></div>
                <div class="navbar__item"><a href="/helpl">Помощь</a></div>
                <div class="navbar__item navbar__none"><a href="/copyright">Правообладателям</a></div>
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
            <a href="/index" class="navbar__logo logo__block">
                <img src="<?php bloginfo('template_url'); ?>/img/logo.png" srcset="<?php bloginfo('template_url'); ?>/img/logo@2x.png 2x, <?php bloginfo('template_url'); ?>/img/logo@3x.png 3x" alt="mb" />
            </a>
            <a href="/index" class="navbar__logo navbar__logo-ear logo__block none">
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
