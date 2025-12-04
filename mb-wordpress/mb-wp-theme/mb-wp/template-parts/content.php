<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mb
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="section BlogText__content" id="up">
    <div class="container_center anim_cont">
        <a href="/blog" class="BlogText__arrow wow fadeInUp"><i class="mdi mdi-trending-neutral"></i> Назад</a>

        <div class="BlogText__img wow fadeInUp" data-parallax="scroll" data-image-src="<?php the_field( 'blog_image' ); ?>"></div>

        <div class="answer__title wow fadeInUp">
            <div class="sectionTitle">
                <?php
                if ( is_singular() ) {
                    the_title();
                }
                ?>
            </div>
        </div>
    </div>

    <hr>

    <div class="container_center">
        <div class="helpList__answer answer__text wow fadeInUp">
            <?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'mb' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mb' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->
    </div>
    <div class="BlogText__btn wow fadeInUp">
        <div class="btn btn__transpsrent share">
            <span>Поделиться</span>
            <div class="container">
                <a href="#"><i class="mdi mdi-facebook"></i></a>
                <a href="#"> <i class="mdi mdi-twitter"></i></a>
                <a href="#"> <i class="mdi mdi-instagram"></i></a>
                <a href="#"><i class="mdi mdi-vk"></i></a>
            </div>
        </div>
    </div>
</div>
    <div class="music wow fadeInUp">
        <div class="container_center">
            Музыка. <span>Бизнес.</span> Облако.
        </div>
    </div>

</article><!-- #post-<?php the_ID(); ?> -->
<script>
    $(document)['ready'](function () {
        var animation = LoadAnim('SentSuccess', 'json/license.json', 1);
        animation.play();
    });
</script>