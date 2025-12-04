{{--
Template name: Reviews
--}}

@include('partials.header')

<section class="reviews">
  <div class="container">

    <div class="reviews__top">
      <h2 class="title"><?php the_title() ?></h2>

      <span class="subtitle">
                <?php the_field( 'subtitle' ); ?>
            </span>
      <div class="map">
        <img src="@asset('images/map.svg')" alt=""
             class="map-svg-gwx">
        <?php $reviews = get_field( 'reviews_circle' ); ?>
        <?php $youtube = get_field( 'youtube_circle' ); ?>
        <div class="gwx-rev" style="
         <?php
        echo "top:" . $reviews['review']['y'] . ';';
        echo "left:" . $reviews['review']['x'] . ';';
        echo "height:" . $reviews['review']['width'] . 'px;';
        echo "width:" . $reviews['review']['width'] . 'px;';
        if ( ! $reviews['review']['show'] ) {
          echo "display: none";
        }
        ?>">
          <img src="@asset('images/rev.svg')" alt="">
        </div>
        <div class="gwx-rev" style="
                <?php
        echo "top:" . $reviews['review-2']['y'] . ';';
        echo "left:" . $reviews['review-2']['x'] . ';';
        echo "height:" . $reviews['review-2']['width'] . 'px;';
        echo "width:" . $reviews['review-2']['width'] . 'px;';
        if ( ! $reviews['review-2']['show'] ) {
          echo "display: none";
        }
        ?>">
          <img src="@asset('images/rev.svg')" alt="">
        </div>

        <div class="gwx-rev" style="
                <?php
        echo "top:" . $reviews['review-3']['y'] . ';';
        echo "left:" . $reviews['review-3']['x'] . ';';
        echo "height:" . $reviews['review-3']['width'] . 'px;';
        echo "width:" . $reviews['review-3']['width'] . 'px;';
        if ( ! $reviews['review-3']['show'] ) {
          echo "display: none";
        }
        ?>">
          <img src="@asset('images/rev.svg')" alt="">
        </div>
        <div class="gwx-rev" style="
                <?php
        echo "top:" . $reviews['review-4']['y'] . ';';
        echo "left:" . $reviews['review-4']['x'] . ';';
        echo "height:" . $reviews['review-4']['width'] . 'px;';
        echo "width:" . $reviews['review-4']['width'] . 'px;';
        if ( ! $reviews['review-4']['show'] ) {
          echo "display: none";
        }
        ?>">
          <img src="@asset('images/rev.svg')" alt="">
        </div>
        <div class="gwx-rev" style="
                <?php
        echo "top:" . $reviews['review-5']['y'] . ';';
        echo "left:" . $reviews['review-5']['x'] . ';';
        echo "height:" . $reviews['review-5']['width'] . 'px;';
        echo "width:" . $reviews['review-5']['width'] . 'px;';
        if ( ! $reviews['review-5']['show'] ) {
          echo "display: none";
        }
        ?>">
          <img src="@asset('images/rev.svg')" alt="">
        </div>
        <div class="gwx-rev" style="
                <?php
        echo "top:" . $reviews['review-6']['y'] . ';';
        echo "left:" . $reviews['review-6']['x'] . ';';
        echo "height:" . $reviews['review-6']['width'] . 'px;';
        echo "width:" . $reviews['review-6']['width'] . 'px;';
        if ( ! $reviews['review-6']['show'] ) {
          echo "display: none";
        }
        ?>">
          <img src="@asset('images/rev.svg')" alt="">
        </div>
        <div class="gwx-rev" style="
                <?php
        echo "top:" . $reviews['review-7']['y'] . ';';
        echo "left:" . $reviews['review-7']['x'] . ';';
        echo "height:" . $reviews['review-7']['width'] . 'px;';
        echo "width:" . $reviews['review-7']['width'] . 'px;';
        if ( ! $reviews['review-7']['show'] ) {
          echo "display: none";
        }
        ?>">
          <img src="@asset('images/rev.svg')" alt="">
        </div>

        <div class="gwx-rev" style="
                <?php
        echo "top:" . $reviews['review-8']['y'] . ';';
        echo "left:" . $reviews['review-8']['x'] . ';';
        echo "height:" . $reviews['review-8']['width'] . 'px;';
        echo "width:" . $reviews['review-8']['width'] . 'px;';
        if ( ! $reviews['review-8']['show'] ) {
          echo "display: none";
        }
        ?>">
          <img src="@asset('images/rev.svg')" alt="">
        </div>

        <!-- Youtube links-->

        <a href="<?php echo $youtube['circle-1']['link'] ?>" rel="noopener" target="_blank" class="gwx-you"
           style="
            <?php
           echo "top:" . $youtube['circle-1']['y'] . ';';
           echo "left:" . $youtube['circle-1']['x'] . ';';
           echo "height:" . $youtube['circle-1']['width'] . 'px;';
           echo "width:" . $youtube['circle-1']['width'] . 'px;';
           if ( ! $youtube['circle-1']['show'] ) {
             echo "display: none";
           }
           ?>">

          <img src="@asset('images/you.svg')" alt="">
        </a>
        <a href="<?php echo $youtube['circle-2']['link'] ?>" rel="noopener" target="_blank" class="gwx-you"
           style="
                                        <?php
           echo "top:" . $youtube['circle-2']['y'] . ';';
           echo "left:" . $youtube['circle-2']['x'] . ';';
           echo "height:" . $youtube['circle-2']['width'] . 'px;';
           echo "width:" . $youtube['circle-2']['width'] . 'px;';
           if ( ! $youtube['circle-2']['show'] ) {
             echo "display: none";
           }
           ?>">

          <img src="@asset('images/you.svg')" alt="">
        </a>
        <a href="<?php echo $youtube['circle-3']['link'] ?>" rel="noopener" target="_blank" class="gwx-you"
           style="
                                        <?php
           echo "top:" . $youtube['circle-3']['y'] . ';';
           echo "left:" . $youtube['circle-3']['x'] . ';';
           echo "height:" . $youtube['circle-3']['width'] . 'px;';
           echo "width:" . $youtube['circle-3']['width'] . 'px;';
           if ( ! $youtube['circle-3']['show'] ) {
             echo "display: none";
           }
           ?>">

          <img src="@asset('images/you.svg')" alt="">
        </a>
        <a href="<?php echo $youtube['circle-4']['link'] ?>" rel="noopener" target="_blank" class="gwx-you"
           style="
                                        <?php
           echo "top:" . $youtube['circle-4']['y'] . ';';
           echo "left:" . $youtube['circle-4']['x'] . ';';
           echo "height:" . $youtube['circle-4']['width'] . 'px;';
           echo "width:" . $youtube['circle-4']['width'] . 'px;';
           if ( ! $youtube['circle-4']['show'] ) {
             echo "display: none";
           }
           ?>">

          <img src="@asset('images/you.svg')" alt="">
        </a>
        <a href="<?php echo $youtube['circle-5']['link'] ?>" rel="noopener" target="_blank" class="gwx-you"
           style="
                                        <?php
           echo "top:" . $youtube['circle-5']['y'] . ';';
           echo "left:" . $youtube['circle-5']['x'] . ';';
           echo "height:" . $youtube['circle-5']['width'] . 'px;';
           echo "width:" . $youtube['circle-5']['width'] . 'px;';
           if ( ! $youtube['circle-5']['show'] ) {
             echo "display: none";
           }
           ?>">
          <img src="@asset('images/you.svg')" alt="">
        </a>
        <a href="<?php echo $youtube['circle-6']['link'] ?>" rel="noopener" target="_blank" class="gwx-you"
           style="
                                        <?php
           echo "top:" . $youtube['circle-6']['y'] . ';';
           echo "left:" . $youtube['circle-6']['x'] . ';';
           echo "height:" . $youtube['circle-6']['width'] . 'px;';
           echo "width:" . $youtube['circle-6']['width'] . 'px;';
           if ( ! $youtube['circle-6']['show'] ) {
             echo "display: none";
           }
           ?>">

          <img src="@asset('images/you.svg')" alt="">
        </a>
        <a href="<?php echo $youtube['circle-7']['link'] ?>" rel="noopener" target="_blank" class="gwx-you"
           style="
                                        <?php
           echo "top:" . $youtube['circle-7']['y'] . ';';
           echo "left:" . $youtube['circle-7']['x'] . ';';
           echo "height:" . $youtube['circle-7']['width'] . 'px;';
           echo "width:" . $youtube['circle-7']['width'] . 'px;';
           if ( ! $youtube['circle-7']['show'] ) {
             echo "display: none";
           }
           ?>">

          <img src="@asset('images/you.svg')" alt="">
        </a>
        <a href="<?php echo $youtube['circle-8']['link'] ?>" rel="noopener" target="_blank" class="gwx-you"
           style="
                                        <?php
           echo "top:" . $youtube['circle-8']['y'] . ';';
           echo "left:" . $youtube['circle-8']['x'] . ';';
           echo "height:" . $youtube['circle-8']['width'] . 'px;';
           echo "width:" . $youtube['circle-8']['width'] . 'px;';
           if ( ! $youtube['circle-8']['show'] ) {
             echo "display: none";
           }
           ?>">

          <img src="@asset('images/you.svg')" alt="">
        </a>
        <a href="<?php echo $youtube['circle-9']['link'] ?>" rel="noopener" target="_blank" class="gwx-you"
           style="
                                        <?php
           echo "top:" . $youtube['circle-9']['y'] . ';';
           echo "left:" . $youtube['circle-9']['x'] . ';';
           echo "height:" . $youtube['circle-9']['width'] . 'px;';
           echo "width:" . $youtube['circle-9']['width'] . 'px;';
           if ( ! $youtube['circle-9']['show'] ) {
             echo "display: none";
           }
           ?>">

          <img src="@asset('images/you.svg')" alt="">
        </a>
        <a href="<?php echo $youtube['circle-10']['link'] ?>" rel="noopener" target="_blank" class="gwx-you"
           style="
                                        <?php
           echo "top:" . $youtube['circle-10']['y'] . ';';
           echo "left:" . $youtube['circle-10']['x'] . ';';
           echo "height:" . $youtube['circle-10']['width'] . 'px;';
           echo "width:" . $youtube['circle-10']['width'] . 'px;';
           if ( ! $youtube['circle-10']['show'] ) {
             echo "display: none";
           }
           ?>">

          <img src="@asset('images/you.svg')" alt="">
        </a>
        <a href="<?php echo $youtube['circle-11']['link'] ?>" rel="noopener" target="_blank" class="gwx-you"
           style="
                                        <?php
           echo "top:" . $youtube['circle-11']['y'] . ';';
           echo "left:" . $youtube['circle-11']['x'] . ';';
           echo "height:" . $youtube['circle-11']['width'] . 'px;';
           echo "width:" . $youtube['circle-11']['width'] . 'px;';
           if ( ! $youtube['circle-11']['show'] ) {
             echo "display: none";
           }
           ?>">

          <img src="@asset('images/you.svg')" alt="">
        </a>


      </div>
    </div>

    <div id="rev" class="reviews__wrap owl-carousel">

      <?php

      $posts = get_posts( ['post_type' => 'reviews', 'posts_per_page' => -1] );

      foreach($posts as $k => $post) {
      setup_postdata($post);

      //	l($post);
      $photo_1 = get_post_meta( $post->ID,'photo_1', true );
      $photo_2 = get_post_meta( $post->ID,'photo_2', true );
      $photo_3 = get_post_meta( $post->ID,'photo_3', true );
      $photo_4 = get_post_meta( $post->ID,'photo_4', true );
      $photo_5 = get_post_meta( $post->ID,'photo_5', true );
      $size = '450x600';
      //$k = 1;

      ?>
      <div class="reviews__item">
        <div class="reviews__item_gallery">
          <?php if ( $photo_1 ) { ?>
          <a href="<?php echo wp_get_attachment_image_url( $photo_1, 'full' ) ?>" data-fancybox="gallery_<?=$k?>" >
            <?php echo wp_get_attachment_image( $photo_1, $size ); ?>
          </a>
          <?php } ?>
          <?php if ( $photo_2 ) { ?>
          <a href="<?php echo wp_get_attachment_image_url( $photo_2, 'full' ) ?>" data-fancybox="gallery_<?=$k?>" >
            <?php //echo wp_get_attachment_image( $photo_2, $size); ?>
          </a>
          <?php } ?>
          <?php if ( $photo_3 ) { ?>
          <a href="<?php echo wp_get_attachment_image_url( $photo_3, 'full' ) ?>" data-fancybox="gallery_<?=$k?>" >
            <?php //echo wp_get_attachment_image( $photo_3,$size ); ?>
          </a>
          <?php } ?>
          <?php if ( $photo_4 ) { ?>
          <a href="<?php echo wp_get_attachment_image_url( $photo_4, 'full' ) ?>" data-fancybox="gallery_<?=$k?>" >
            <?php //echo wp_get_attachment_image( $photo_4, $size); ?>
          </a>
          <?php } ?>
          <?php if ( $photo_5 ) { ?>
          <a href="<?php echo wp_get_attachment_image_url( $photo_5, 'full' ) ?>" data-fancybox="gallery_<?=$k?>" >
            <?php// echo wp_get_attachment_image( $photo_5, $size ); ?>
          </a>
          <?php } ?>
        </div>
        <div class="reviews__item_info">
          <div class="reviews__item_info_row">
            <dib>
              <span class="reviews__item_info-name" data-id="<?=$post->ID?>"><?php the_title(); ?></span>
              <span class="reviews__item_info-city"><?php the_field( 'city' ); ?></span>
            </dib>
            <div class="reviews__item_info-date">
              <span class="reviews__item_info-date-day"><?php the_field( 'calendar_day' ); ?></span>
              <span class="reviews__item_info-date-month"><?php the_field( 'calendar_month' ); ?></span>
              <span class="reviews__item_info-date-year"><?php the_field( 'calendar_year' ); ?></span>
            </div>
          </div>
          <div class="reviews__item_info_row">
            <span class="reviews__item_info-text"><?php the_content(); ?></span>
            <span class="reviews__item_info-purchase"><?php the_field( 'time_of_pucrhase' ); ?></span>
          </div>
          <div class="reviews__item_info_row">
            <div class="reviews__item_info_rating">
              <div class="reviews__item_info_rating_item">
                <span class="reviews__item_info_rating-title"><?php the_field( 'equipment_evaluation_title' ); ?></span>
                <div class="reviews__item_info_rating-stars">
                  <?php $equipment_evaluation_stars = get_field( 'equipment_evaluation_stars' ); ?>
                  <?php if ( $equipment_evaluation_stars ) { ?>
                                                <?php echo wp_get_attachment_image( $equipment_evaluation_stars, 'full' ); ?>
                                            <?php } ?>
                </div>
                <span class="reviews__item_info_rating-number"><?php the_field( 'equipment_evaluation_number' ); ?></span>
              </div>
              <div class="reviews__item_info_rating_item">
                <span class="reviews__item_info_rating-title"><?php the_field( 'service_rating_title' ); ?></span>
                <div class="reviews__item_info_rating-stars">
                  <?php $service_rating_stars = get_field( 'service_rating_stars' ); ?>
                  <?php if ( $service_rating_stars ) { ?>
                  <img src="<?php echo $service_rating_stars['url']; ?>" alt="<?php echo $service_rating_stars['alt']; ?>" />
                  <?php } ?>
                </div>
                <span class="reviews__item_info_rating-number"><?php the_field( 'service_rating_number' ); ?></span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
      <?php wp_reset_postdata(); ?>
    </div>

  </div>
</section>
<section class="video-reviews">
  <div class="container">
    <div class="video-review_title">
      <?php the_field( 'block_title_videoreviews' ); ?>
    </div>
    <div class="video-review_slider owl-carousel">
      <?php

      // check if the repeater field has rows of data
      if ( have_rows( 'video_review' ) ):

      // loop through the rows of data
      while ( have_rows( 'video_review' ) ) : the_row(); ?>
      <div class="video-item">
        <a href="<?php the_sub_field( 'video_link' ); ?>" target="_blank">
          <img src="<?php the_sub_field( 'video_image' ); ?>">
          <div class="viedo-info">
            <div class="video-title">
              <?php the_sub_field( 'video_title' ); ?>
            </div>
            <div class="video-duration">
              <?php the_sub_field( 'video_duration' ); ?>
            </div>
            <div class="video-date">
              <?php the_sub_field( 'video_date' ); ?>
            </div>
          </div>
        </a>

      </div>
      <?php endwhile;

      else :

        // no rows found

      endif;

      ?>         </div>
  </div>
</section>
<script>
  jQuery(function ($) {
    $(".examples-slider").owlCarousel({
      loop: false,
      dots: false,
      nav: true,
      margin: 10,
      // autoplay: true,
      // smartSpeed: 1000,
      // autoplayTimeout: 2000,
      navClass: ['owl-prev', 'owl-next'],
      navText: false,
      responsive: {
        320: {
          items: 1,
          loop: true,
          margin: 10,
          stagePadding: 15,
          mouseDrag: false,
          touchDrag: true
        },
        374: {
          items: 1,
          loop: true,
          margin: 10,
          stagePadding: 20,
          mouseDrag: false,
          touchDrag: true
        },
        767: {
          items: 1,
          loop: true,
          margin: 20,
          stagePadding: 40,
          mouseDrag: false,
          touchDrag: true
        },
        1024: {
          items: 1,
          loop: true,
          margin: 20,
          stagePadding: 60,
          mouseDrag: false,
          touchDrag: true
        },
        1025: {
          items: 1,
          loop: true,
          margin: 20,
          stagePadding: 0,
        }
      }
    });
    $(".reviews__wrap").owlCarousel({
      loop: false,
      dots: false,
      nav: true,
      margin: 10,
      // autoplay: true,
      // smartSpeed: 1000,
      // autoplayTimeout: 2000,
      navClass: ['owl-prev', 'owl-next'],
      navText: false,
      responsive: {
        320: {
          items: 1,
          loop: true,
          margin: 10,
          stagePadding: 15,
          mouseDrag: false,
          touchDrag: true
        },
        374: {
          items: 1,
          loop: true,
          margin: 10,
          stagePadding: 20,
          mouseDrag: false,
          touchDrag: true
        },
        767: {
          items: 1,
          loop: true,
          margin: 20,
          stagePadding: 40,
          mouseDrag: false,
          touchDrag: true
        },
        1024: {
          items: 1,
          loop: true,
          margin: 20,
          stagePadding: 60,
          mouseDrag: false,
          touchDrag: true
        },
        1025: {
          items: 1,
          loop: true,
          margin: 20,
          stagePadding: 0,
        }
      }
    });


    $(".video-review_slider").owlCarousel({
      loop: true,
      dots: false,
      nav: true,
      items: 2,
      margin: 40,
      // autoplay: true,
      // smartSpeed: 1000,
      // autoplayTimeout: 2000,
      navClass: ['owl-prev', 'owl-next'],
      navText: false,
      responsive: {
        320: {
          items: 1,
          loop: true,
          margin: 10,
          cetner: true,
          stagePadding: 30,
          mouseDrag: false,
          touchDrag: true
        },
        374: {
          items: 1,
          loop: true,
          margin: 10,
          center: true,
          stagePadding: 30,
          mouseDrag: false,
          touchDrag: true
        },
        767: {
          items: 1,
          loop: true,
          margin: 40,
          center: true,
          stagePadding: 210,
          mouseDrag: false,
          touchDrag: true
        },
        1024: {
          items: 3,
          loop: true,
          margin: 20,
          stagePadding: 60,
          mouseDrag: false,
          touchDrag: true
        },
        1025: {
          items: 3,
          loop: true,
          margin: 0,
          stagePadding: 100,
        }
      }
    });
  });

</script>
@include('partials.message-box')
@include('partials.footer')
