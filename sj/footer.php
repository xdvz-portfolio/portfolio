<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Demo Business
 */

?>

<footer id="colophon" class="site-footer">
    <div class="footer-wrapper">

        <div class="footer-wrapper__left">
            <span class="footer__headline">Напишите нам</span>
            <div class="footer-social">
                <span class="footer-social__text">Мы в соц сетях:</span>
                <span class="footer-social__icon">In</span>
                <span class="footer-social__icon">Fb</span>
            </div>
            <span class="footer-copyrights">© Demo Business. All rights reserved</span>
        </div>

        <div class="footer-wrapper__right">
            <a class="footer-nav__link" href="/">
            <div class="footer-nav__block">
                <span class="footer-nav__text">Лицензии</span>
                <img src="<?php echo get_template_directory_uri(); ?>/img/arrow.svg" alt="Стрелка" class="footer-nav__arrow">
            </div>
            </a>
            <a class="footer-nav__link" href="/">
            <div class="footer-nav__block">
                <span class="footer-nav__text">Презентация</span>
                <img src="<?php echo get_template_directory_uri(); ?>/img/arrow.svg" alt="Стрелка" class="footer-nav__arrow">
            </div>
            </a>
            <a class="footer-nav__link" href="/">
            <div class="footer-nav__block">
                <span class="footer-nav__text">Контакты</span>
                <img src="<?php echo get_template_directory_uri(); ?>/img/arrow.svg" alt="Стрелка" class="footer-nav__arrow">
            </div>
            </a>
            <a class="footer-nav__link" href="/">
            <div class="footer-nav__block">
                <span class="footer-nav__text">Вакансии</span>
                <img src="<?php echo get_template_directory_uri(); ?>/img/arrow.svg" alt="Стрелка" class="footer-nav__arrow">
            </div>
            </a>
        </div>

    </div>


</footer><!-- #colophon -->


</div> <!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
