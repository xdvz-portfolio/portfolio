@include('partials.header')

<div class="bottom bottom_product">
  <div class="bottom__social">
    <a href="#" class="social-youtube" rel="noopener" target="_blank">
      <?php the_field( 'btn_youtube' ); ?>
      <svg>
        <use xlink:href="#icon_youtube"/>
      </svg>
    </a>
  </div>
  <div class="bottom__box">
    <div class="bottom__box_info">
      <div class="btn_switch_wr">


        <div class="switch-style-icon"><img src="@asset('images/barrel.svg')" alt=""></div>
        <span class="bottom__box_show_price_text">
                <?php
          if(pll_current_language() == 'en') { ?>
                     Add cooling module
                <?php  } else if(pll_current_language() == 'ru') { ?>
                Добавить модуль охлаждения
                <?php  }
          ?>
                </span>

      </div>
      <div class="bottom__box_switch">
        <label class="el-switch">
          <script>
            function showPrice() {
              var checkBox = document.getElementById("myCheck");
              var salePrice = document.getElementById("show_p");
              var standartPrice = document.getElementById("hide_p");
              var crossPrice = document.getElementById("cross_p");
              if (checkBox.checked == true){
                salePrice.style.display = "block";
                standartPrice.style.display = "none";
                crossPrice.style.display = "block";
              } else {
                standartPrice.style.display = "block";
                salePrice.style.display = "none";
                crossPrice.style.display = "none";
              }
            }
          </script>
          <input type="checkbox" id="myCheck"  onclick="showPrice()">
          <span class="el-switch-style"></span>
        </label>
      </div>
      <div class="bottom__box_price">
        <span id="show_p" style="display:none" class="bottom__box_price-down"><?php the_field( 'down_price_bottom' ); ?></span>
        <span id="hide_p"  class="bottom__box_price-top"><?php the_field( 'down_price_top' ); ?></span>
      </div>
    </div>
    <div class="bottom__box_btn btn-modal"><?php the_field( 'down_btn' ); ?>
      <br><br>
      <?php the_field( 'in_stock_title' ); ?>
      <?php the_field( 'in_stock' ); ?>
    </div>
  </div>
  <div class="bottom__down">
    <?php $bottom_download_link = get_field( 'bottom_download_link' ); ?>
    <?php if ( $bottom_download_link ) { ?>
    <a href="<?php echo $bottom_download_link['url']; ?>" target="_blank" class="bottom__down_download">
      <img src="@asset('images/pdf_icon.png')" width="40" height="40" alt="">
      <span><?php the_field( 'bottom_download' ); ?></span>
    </a>
  <?php } ?>
  </div>
</div>
<section class="product__promo">
  <div class="container">

    <div class="product__promo_wrap">
      <h2 class="product-title"><?php the_title() ?> </h2>
      <span class="product-subtitle">
                    <?php the_field( 'subtitle' ); ?>
                </span>
      <div class="product-img">
        <?php

        $images = get_field('additional_photos');
        $size = 'full'; // (thumbnail, medium, large, full or custom size)

        if( $images ): ?>
        <div id="sl1">
          <?php foreach( $images as $image ): ?>
          <div class="sl1_item">
            <?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
          </div>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>
      </div>
      <div class="product__wrap">
        <?php if( get_field('icon_info_text') ): ?>

        <div class="product__item">
          <div class="product__item_icon"><img src="<?php the_field( 'icon_info_text' ); ?>" alt=""></div>
          <span class="product__item-text"><?php the_field( 'info_text_1' ); ?></span>
        </div><?php endif; ?>

        <?php if( get_field('icon_info_text_2') ): ?>

        <div class="product__item">
          <div class="product__item_icon"><img src="<?php the_field( 'icon_info_text_2' ); ?>" alt=""></div>
          <span class="product__item-text"><?php the_field( 'info_text_2' ); ?></span>
        </div><?php endif; ?>

        <?php if( get_field('icon_info_text_3') ): ?>

        <div class="product__item">
          <div class="product__item_icon"><img src="<?php the_field( 'icon_info_text_3' ); ?>" alt=""></div>
          <span class="product__item-text"><?php the_field( 'info_text_3' ); ?></span>
        </div><?php endif; ?>

        <?php if( get_field('icon_info_text_4') ): ?>


        <div class="product__item">
          <div class="product__item_icon"><img src="<?php the_field( 'icon_info_text_4' ); ?>" alt=""></div>
          <span class="product__item-text"><?php the_field( 'info_text_4' ); ?></span>
        </div><?php endif; ?>

        <?php if( get_field('icon_info_text_5') ): ?>

        <div class="product__item">
          <div class="product__item_icon"><img src="<?php the_field( 'icon_info_text_5' ); ?>" alt=""></div>
          <span class="product__item-text"><?php the_field( 'info_text_5' ); ?></span>
        </div><?php endif; ?>

        <?php if( get_field('icon_info_text_6') ): ?>

        <div class="product__item">
          <div class="product__item_icon"><img src="<?php the_field( 'icon_info_text_6' ); ?>" alt=""></div>
          <span class="product__item-text"><?php the_field( 'info_text_6' ); ?></span>
        </div><?php endif; ?>

      </div>
    </div>

  </div>
</section>

<section class="product__info">
  <div class="container">

    <!-- Tabs BEGIN -->
    <div class="tabs-wrap_product">
      <div class="tabs_product">
        <span class="tab_product"><?php the_field( 'tabs_title_1' ); ?></span>
        <span class="tab_product"><?php the_field( 'tabs_title_2' ); ?></span>
        <span class="tab_product"><?php the_field( 'tabs_title_4' ); ?></span>
        <span class="tab_product"><?php the_field( 'tabs_title_5' ); ?></span>
      </div>
      <div class="tab_content_product">
        <div class="tab_item_product">
          <div class="product__table">
            <div class="product__table_row">
              <div class="product__table_row_column"><?php the_field( 'tabs_question_1' ); ?></div>
              <div class="product__table_row_column"><?php the_field( 'tabs_answer_1' ); ?></div>
            </div>
            <div class="product__table_row">
              <div class="product__table_row_column"><?php the_field( 'tabs_question_2' ); ?></div>
              <div class="product__table_row_column"><?php the_field( 'tabs_answer_2' ); ?></div>
            </div>
            <div class="product__table_row">
              <div class="product__table_row_column"><?php the_field( 'tabs_question_3' ); ?></div>
              <div class="product__table_row_column"><?php the_field( 'tabs_answer_3' ); ?></div>
            </div>
            <div class="product__table_row">
              <div class="product__table_row_column"><?php the_field( 'tabs_question_4' ); ?></div>
              <div class="product__table_row_column"><?php the_field( 'tabs_answer_4' ); ?></div>
            </div>
            <div class="product__table_row">
              <div class="product__table_row_column"><?php the_field( 'tabs_question_5' ); ?></div>
              <div class="product__table_row_column"><?php the_field( 'tabs_answer_5' ); ?></div>
            </div>
            <div class="product__table_row">
              <div class="product__table_row_column"><?php the_field( 'tabs_question_6' ); ?></div>
              <div class="product__table_row_column"><?php the_field( 'tabs_answer_6' ); ?></div>
            </div>
            <div class="product__table_row">
              <div class="product__table_row_column"><?php the_field( 'tabs_question_7' ); ?></div>
              <div class="product__table_row_column"><?php the_field( 'tabs_answer_7' ); ?></div>
            </div>

          </div>

        </div>
        <div class="tab_item_product">

          <?php

          // check if the repeater field has rows of data
          if( have_rows('слайдер') ):
            echo '<div class="product__media">';

            // loop through the rows of data
            while ( have_rows('слайдер') ) : the_row();

              ?>
          <div class="product__media_item">
            <img src="<?php the_sub_field('изображение');?>">
          </div>
                <?php
            endwhile;
            echo '</div>';

          else :

            // no rows found

          endif;

          ?>
        </div>
        <div class="tab_item_product">
          <div class="product__text product__text_4">
            <?php the_field( 'tabs_text_4' ); ?>
          </div>
        </div>
        <div class="tab_item_product">
          <div class="product__text product__text_5">
            <?php the_field( 'tabs_text_5' ); ?>
          </div>
        </div>
      </div>
    </div>
    <!-- Tabs END -->
  </div>
</section>

<section class="product__content">
  <div class="container">

    <h2><?php the_field( 'content_title' ); ?> </h2>

    <div class="product__content_wrap">
      <?php the_content(); ?>
    </div>

  </div>
</section>

<section class="product__recommendations">
  <div class="container">
    <h2><?php the_field( 'other_title' ); ?></h2>
    <div class="product__recommendations_wrap">
      <?php
      $posts = get_field('другие_товары');
      if( $posts ): ?>
        <div class="product__recommendations_wrap">
          <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
            <?php setup_postdata($post); ?>
            <a href="<?php the_permalink(); ?>" class="product__recommendations_item">
              <img src="<?php the_field( 'photo_for_card' ); ?>" alt="">
              <span class="product__recommendations_item-title"><?php the_title(); ?></span>
              <span class="product__recommendations_item-text"><?php the_field( 'subtitle_for_category_list' ); ?></span>
              <div class="product__recommendations_item-price">
                <span><?php the_field( 'price_categorylist' ); ?></span>
              </div>
            </a>
          <?php endforeach; ?>
        </div>
        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
      <?php endif; ?>

    </div>
  </div>
</section>

<script>
  $(document).ready(function() {
    $(".tabs_product").on("click", ".tab_product", function() {
      let activeContent = $(this).index();

      $(".tabs_product .tab_product").removeClass("active");
      $(".tab_content_product .tab_item_product").removeClass("active");

      $(this).addClass("active");
      $(".tab_content_product .tab_item_product").eq(activeContent).addClass("active");
    });

    $(".tabs_product .tab_product").first().addClass("active");
    $(".tab_item_product").first().addClass("active");
  });

  $('.product__media').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: true
  });
  $('#sl1').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: true
  });
</script>
<script>
</script>

@include('partials.footer')
