<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mb
 */

?>

<footer class="footer">

    <div class="footer__top">
        <div class="container_center">
            <div class="footer__logo">
                <img src="<?php bloginfo('template_url'); ?>/img/logo_ear.png" srcset="<?php bloginfo('template_url'); ?>/img/logo_ear@2x.png 2x, <?php bloginfo('template_url'); ?>/img/logo_ear@3x.png 3x" alt="mb" />
            </div>
            <div class="footer__nav">
                <ul class="">
                    <li><a href="/features">Возможности</a></li>
                    <li><a href="/music">Музыка</a></li>
                    <li><a href="/price">Цены</a></li>
                    <li><a href="/help">Помощь</a></li>
                    <li><a href="https://mb.com/" target="_blank">Правообладателям</a></li>
                    <li><a href="/blog">Блог</a></li>
                    <li><a href="/contact">Контакты</a></li>
                </ul>
            </div>
            <div class="contact__icon footer__contacts">
                <a rel="nofollow" href="https://t.me/mb" target="_blank"><i class="mdi mdi-telegram"></i></a>
                <a rel="nofollow" href="https://wa.me/121212121212" target="_blank"><i class="mdi mdi-whatsapp"></i></a>
                <a rel="nofollow" href="https://instagram.com/mb.ru" target="_blank"><i class="mdi mdi-instagram"></i></a>
            </div>
        </div>
    </div>

    <div class="footer__down">
        <div class="container_center">
            <div class="footer__copy">
                © 2014-2020 mb
            </div>
            <div class="contact__icon footer__contacts block__icon">
                <a rel="nofollow" href="https://t.me/mb" target="_blank"><i class="mdi mdi-telegram"></i></a>
                <a rel="nofollow" href="https://wa.me/121212121212" target="_blank"><i class="mdi mdi-whatsapp"></i></a>
                <a rel="nofollow" href="https://instagram.com/mb.ru" target="_blank"><i class="mdi mdi-instagram"></i></a>
            </div>
            <div class="footer__rules">
                <div class="footer__rulesitem"><a href="/agreement">Правила сервиса |</a></div>
                <div class="footer__rulesitem"><a href="/policy"> Политика конфиденциальности</a></div>
            </div>
            <div class="footer__rules block">
                <div class="footer__rulesitem"><a href="/agreement">Правила сервиса.</a></div><br>
                <div class="footer__rulesitem"><a href="/policy"> Политика конфиденциальности</a>.</div>
            </div>
        </div>
    </div>

</footer>
<!--{% endblock %}-->

<!--{% block js %}-->
<script src="<?php bloginfo('template_url'); ?>/mb-base/public/js/app.js"></script>
<!--{% endblock %}-->
<!--{% block metrika %}-->
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(57309730, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
    });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/57309730" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<!--{% endblock %}-->
<!--{% block footer %}{% endblock %}-->
</div>
</div>


<?php wp_footer(); ?>

</body>
</html>
