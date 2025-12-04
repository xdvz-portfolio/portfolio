<?php
/**
 * Template Name: Главная страница
 */

get_header();
?>

    <main id="primary" class="site-main" xmlns="http://www.w3.org/1999/html">
        <header class="main-screen">

            <div class="main">
                <div class="branding-block">
                    <div class="branding-block__logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="Corporate Business" class="logo">
                    </div>

                    <div class="branding-block-item__container">
                        <div class="branding-block-item">
                            <a href="tel:+15551234567" class="branding-block__link">+1 (555) 123-45-67</a>
                        </div>

                        <div class="branding-block-item">
                            <a href="mailto:info@corporatedemo.com" class="branding-block__link">info@corporatedemo.com</a>
                        </div>

                        <div class="branding-block-item">
                            <span class="branding-block__link">123 Business Street</span>
                        </div>
                    </div>


                </div>
                    <span class="main__headline">Создаем инновационные <br/> решения для бизнеса <br/> каждый день</span>
            </div>

            <div class="nav-links">
                <div class="nav-links-column">

                    <div class="nav-links-item">
                        <a class="nav-links-item__link" href="/">
                        <div class="nav-links-item__block">
                            <p class="nav-links-item__text">Транспорт</p>
                            <img class="nav-links-item__arrow" src="<?php echo get_template_directory_uri(); ?>/img/arrow.svg" alt="Стрелка">
                        </div>
                        </a>
                    </div>

                    <div class="nav-links-item">
                        <a class="nav-links-item__link" href="/">
                        <div class="nav-links-item__block">
                            <p class="nav-links-item__text">Разработка</p>
                            <img class="nav-links-item__arrow" src="<?php echo get_template_directory_uri(); ?>/img/arrow.svg" alt="Стрелка">
                        </div>
                        </a>
                    </div>

                    <div class="nav-links-item">
                        <a class="nav-links-item__link" href="/">
                        <div class="nav-links-item__block">
                            <p class="nav-links-item__text">Консалтинг</p>
                            <img class="nav-links-item__arrow" src="<?php echo get_template_directory_uri(); ?>/img/arrow.svg" alt="Стрелка">
                        </div>
                        </a>
                    </div>

                    <div class="nav-links-item">
                        <a class="nav-links-item__link" href="/">
                        <div class="nav-links-item__block">
                            <p class="nav-links-item__text">Финансы</p>
                            <img class="nav-links-item__arrow" src="<?php echo get_template_directory_uri(); ?>/img/arrow.svg" alt="Стрелка">
                        </div>
                        </a>
                    </div>

                </div>

                <div class="nav-links-column">
                    <div class="nav-links-item">
                        <a class="nav-links-item__link" href="/">
                        <div class="nav-links-item__block">
                            <p class="nav-links-item__text">Производство</p>
                            <img class="nav-links-item__arrow" src="<?php echo get_template_directory_uri(); ?>/img/arrow.svg" alt="Стрелка">
                        </div>
                        </a>
                    </div>
                    <div class="nav-links-item">
                        <a class="nav-links-item__link" href="/">
                        <div class="nav-links-item__block">
                            <p class="nav-links-item__text">Недвижимость</p>
                            <img class="nav-links-item__arrow" src="<?php echo get_template_directory_uri(); ?>/img/arrow.svg" alt="Стрелка">
                        </div>
                        </a>
                    </div>
                    <div class="nav-links-item">
                        <a class="nav-links-item__link" href="/">
                        <div class="nav-links-item__block">
                            <p class="nav-links-item__text">Бухгалтерия</p>
                            <img class="nav-links-item__arrow" src="<?php echo get_template_directory_uri(); ?>/img/arrow.svg" alt="Стрелка">
                        </div>
                        </a>
                    </div>
                    <div class="nav-links-item">
                        <a class="nav-links-item__link" href="/">
                        <div class="nav-links-item__block">
                            <p class="nav-links-item__text">Маркетинг</p>
                            <img class="nav-links-item__arrow" src="<?php echo get_template_directory_uri(); ?>/img/arrow.svg" alt="Стрелка">
                        </div>
                        </a>
                    </div>
                </div>
            </div>

        </header>

        <section class="menu">
            <div class="menu-wrapper">
                <a href="/" class="menu__link">Контакты</a>
                <span class="menu__div">/</span>
                <a href="/" class="menu__link">Блог</a>
                <span class="menu__div">/</span>
                <a href="/" class="menu__link">Презентация</a>
                <span class="menu__div">/</span>
                <a href="/" class="menu__link">О компании</a>
                <span class="menu__div">/</span>
                <a href="/" class="menu__link">Документы</a>
            </div>
        </section>

        <section class="about">
            <div class="about__image">
                <?php if ( get_field( 'about_image' ) ) : ?>
                    <img src="<?php the_field( 'about_image' ); ?>"  alt="О компании" class="about-image"/>
                <?php endif ?>
            </div>
            <div class="about-text">
                <div class="about-text__block">
                    <span class="about-text__numb">/01</span>
                    <p class="about__text"><?php the_field( 'about_text_1' ); ?></p>
                </div>
                <div class="about-text__block">
                    <span class="about-text__numb">/02</span>
                    <p><?php the_field( 'about_text_2' ); ?></p>
                </div>
                <div class="about-text__block">
                    <span class="about-text__numb">/03</span>
                    <p><?php the_field( 'about_text_3' ); ?></p>
                </div>
            </div>
        </section>

        <section class="mission">
            <div class="mission-wrapper__text">
                <h2>Наша миссия</h2>
                <p class="mission__text">
	                <?php the_field( 'mission_text_1' ); ?>
                </p>
            </div>
            <div class="mission-wrapper__image">
                <img src="<?php the_field( 'mission_image' ); ?>"  alt="Миссия компании" class="mission__image"/>
            </div>
        </section>

        <section class="statistics">
                <div class="statistics-top__container">
                    <h2 class="statistics__headline">На нашем счету</h2>
                    <div class="statistics-cta__box">
                        <p class="statistics-cta__text">Заказать звонок</p>
                        <img class="statistics-cta__arrow" src="<?php echo get_template_directory_uri(); ?>/img/arrow.svg" alt="Стрелка">
                    </div>
                </div>

                <div class="statistics-bottom__container">

                    <div class="statistics-info__block">
                        <?php if (have_rows('first_block')) : ?>
                            <?php while (have_rows('first_block')) : the_row(); ?>
                            <span class="statistics-info__headline"><?php the_sub_field('headline'); ?></span>
                            <span class="statistics-info__descr"><?php the_sub_field('description'); ?></span>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                    <div class="statistics-info__block">
                        <?php if (have_rows('second_block')) : ?>
                            <?php while (have_rows('second_block')) : the_row(); ?>
                            <span class="statistics-info__headline"><?php the_sub_field('headline'); ?></span>
                            <span class="statistics-info__descr"><?php the_sub_field('description'); ?></span>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                    <div class="statistics-info__block">
                        <?php if (have_rows('thrid_block')) : ?>
                            <?php while (have_rows('thrid_block')) : the_row(); ?>
                            <span class="statistics-info__headline"><?php the_sub_field('headline'); ?></span>
                            <span class="statistics-info__descr"><?php the_sub_field('description'); ?></span>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
        </section>

        <section class="additional-info">

            <div class="additional-info-block">
                <div class="additional-info__wrapper">

                <?php if ( have_rows( 'additional_about_first_block' ) ) : ?>
                    <?php while ( have_rows( 'additional_about_first_block' ) ) : the_row(); ?>
                        <div class="additional-info-block__left">
                            <?php if ( get_sub_field( 'additional_about_image' ) ) : ?>
                                <img src="<?php the_sub_field( 'additional_about_image' ); ?>" class="additional-info__image" />
                            <?php endif ?>
                        </div>
                        <div class="additional-info-block__right">
                            <span class="additional-info__numb">/01</span>
                            <span class="additional-info__text"><?php the_sub_field( 'additional_about_text' ); ?></span>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                </div>
            </div>

            <div class="additional-info-block">
                <div class="additional-info__wrapper reversive__column">

                <?php if ( have_rows( 'additional_about_second_block' ) ) : ?>
                    <?php while ( have_rows( 'additional_about_second_block' ) ) : the_row(); ?>
                <div class="additional-info-block__left">

                    <span class="additional-info__numb">/02</span>
                       <span class="additional-info__text"><?php the_sub_field( 'additional_about_text_2' ); ?></span>
                </div>

                <div class="additional-info-block__right">
                        <?php if ( get_sub_field( 'additional_about_image_2' ) ) : ?>
                            <img src="<?php the_sub_field( 'additional_about_image_2' ); ?>" class="additional-info__image"/>
                        <?php endif ?>
                </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                </div>
            </div>
        </section>
    </main><!-- #main -->

<?php
get_footer();