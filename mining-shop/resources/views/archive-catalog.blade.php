{{--
Template Name: Страница каталога
--}}
@include('partials.header')

<?php
$queried_object = get_queried_object();
$taxonomy = $queried_object->taxonomy;
$term_id = $queried_object->term_id;

$GLOBALS['wp_embed']->post_ID = $taxonomy . '_' . $term_id;
?>
<section class="about about__first_section">

        <div class="container">
                <h2 class="title title-top">
                <?php
                if(pll_current_language() == 'en') { ?>Products
                            <?php  } else if(pll_current_language() == 'ru') { ?>
                           Каталог
          <?php  }
        ?>
                </h2>
<div class="cat_subtitle">
<?php
if(pll_current_language() == 'en') { ?>
<?php the_field('cat_subtitle_en', 'option'); ?>
<?php  } else if(pll_current_language() == 'ru') { ?>
<?php the_field('cat_subtitle_ru', 'option'); ?>
<?php  }
?>
</div>

<div class="cat_menu">
 <?php if(pll_current_language() == 'en') { ?>
    <?php
      wp_nav_menu(array(
        'theme_location' => 'primary_cat',
        'menu_class' => 'menu',
        'menu' => 'меню_категорий_en',
        'container' => false
      ));
      ?>
    <?php  }
else if(pll_current_language() == 'ru') { ?>
<?php
      wp_nav_menu(array(
        'theme_location' => 'primary_cat',
        'menu_class' => 'menu',
        'menu' => 'меню_категорий',
        'container' => false
      ));
      ?>
          <?php  }
        ?>

</div>

<div class="cat_items">
    <?php
$_terms = get_terms( array(
    'taxonomy'     => 'catalog_category',
    'orderby'      => 'name',
    'order'        => 'DESC',
) );

foreach ($_terms as $term) :

    $term_slug = $term->slug;
    $_posts = new WP_Query( array(
                'post_type'         => 'catalog',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'catalog_category',
                        'field'    => 'slug',
                        'terms'    => $term_slug,
                    ),
                ),
            ));


    if( $_posts->have_posts() ) :

        echo '<div id="'. $term->slug .'" class="cat_item">';
        echo '<h2 class="cat_title">'. $term->name .'</h2>';
        echo '<div class="cat_desc">';

if(pll_current_language() == 'en') { ?>
<?php
if($desc_acf=get_field("cat_desc_en",get_category($term))){ echo apply_filters("the_content", $desc_acf);}
?>
<?php  } else if(pll_current_language() == 'ru') { ?>
<?php
if($desc_acf=get_field("cat_desc_rf",get_category($term))){ echo apply_filters("the_content", $desc_acf);}
?>
<?php  }

 echo '</div>';
category_description( $category_id );
        echo '<div class="catalog__wrap">';
        while ( $_posts->have_posts() ) : $_posts->the_post();
        ?>
           <a href="<?php the_permalink();?>" class="card card-36x bla">
                        <div class="card__info">
                        <div class="card__box_top">
                        <?php
                        $discount = get_field('price_categorylist_old');
                        if($discount) :
                        ?>

                        <span class="discount"><?php
                if(pll_current_language() == 'en') { ?>Sale
                            <?php  } else if(pll_current_language() == 'ru') { ?>
                           Скидка
          <?php  }?></span>
                        <?php endif; ?>


                                    <img src="<?php the_field('icon_category');?>">

                                    <span class="card__box_top-title"><?php the_field('text_for_icon');?></span>
                                </div>
                                <div class="imgbox"><img class="card-img" src="<?php the_field('photo_for_card');?>" alt=""></div>
                            <span class="card-title"><?php the_title();?></span>
                            <span class="card-subtitle"><?php the_field('subtitle_for_category_list');?></span>

                            <div class="in-stock-bubble"><span class="card__in-stock">
                                    <?php the_field( 'in_stock_title' ); ?>
                                    <span class="right"><?php the_field('in_stock'); ?></span></span></div>


                                <div class="card__box_item">
                                <div class="card__box_down">
                                    <span><?php
                if(pll_current_language() == 'en') { ?>LEARN MORE
                            <?php  } else if(pll_current_language() == 'ru') { ?>
                           ПОДРОБНЕЕ
          <?php  }?></span>
                                </div>
                                <div class="prices">
                                <span class="card-price old"><?php the_field('price_categorylist_old');?></span><br>
                                <span class="card-price"><?php the_field('price_categorylist');?></span>
                                </div>
                            </div>

                        </div>
                    </a>
        <?php
        endwhile;
echo '</div>';
echo '</div>';
    endif;
    wp_reset_postdata();

endforeach;
?>
</div>
        </section>
<script>
    $(function(){
  $('a[href^="#"]').on('click', function(event) {
    event.preventDefault();

    var sc = $(this).attr("href"),
        dn = $(sc).offset().top - 100;
    $('html, body').animate({scrollTop: dn}, 1000);
  });
});

</script>

@include('partials.footer')
