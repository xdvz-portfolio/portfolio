{{--
Template name: Home
--}}

@include('partials.header')
<link rel="stylesheet" href="{{ asset('dist/scripts/demo-slider/slider.css') }}">
<link rel="stylesheet" href="{{ asset('dist/scripts/demo-slider/slider-eng.css') }}">
{{--<div class="pageback"></div>--}}

@include('components.bottom-panel', ['class' => 'bottom-home_1 bottom_product'])

@include('components.bottom-panel', ['class' => 'bottom-home_2'])

<div id="fullpage">

<div id="slider-header"></div>

<?php
if (pll_current_language() == 'en') { ?>
<script src="{{ asset('dist/scripts/react-slider/slider-eng.js') }}"></script>
<?php } else if (pll_current_language() == 'ru') { ?>
<script src="{{ asset('dist/scripts/react-slider/slider.js') }}"></script>
<?php }
?>

<div class="mobile_version">
  <div class="section steps steps_1">
    <div class="steps__top steps__top_1">
      <h2 class="title title_first"><?php the_field('title_1'); ?></h2>
      <span class="subtitle"><?php the_field('subtitle_1'); ?></span>
    </div>
    <img src="@asset('images/slide1-main.jpg')" alt="" class="steps__img">
    <div class="patent-mobile">
      <a href="/firmware/" target="_blank">
        <img src="@asset('images/85_th.svg')" alt="" class="patent-img">
        <div class="patent-info-mobile">
          <span><?php the_field('patent_text'); ?></span>
          <?php
          if(pll_current_language() == 'en') { ?><span><u>Software Optimization</u></span>
          <?php  } else if(pll_current_language() == 'ru') { ?>
          <span><u>Оптимизация ПО</u></span>
          <?php  }
          ?>
        </div>
      </a>
    </div>
  </div>
  <div class="section steps steps_2">
    <div class="steps__top steps steps_2">
      <h2 class="title"><?php the_field('title_2'); ?></h2>
      <span class="subtitle"><?php the_field('subtitle_2'); ?></span>
    </div>
    <img src="@asset('images/slide2-main.jpg')" alt="" class="steps__img">

  </div>
  <div class="section steps steps_3">
    <div class="steps__top">
      <h2 class="title"><?php the_field('title_3'); ?></h2>
      <span class="subtitle"><?php the_field('subtitle_3'); ?></span>
    </div>
    <img src="@asset('images/slide3-main.jpg')" alt="" class="steps__img">

  </div>
</div>
<div class="section steps steps_4">
  <div class="steps__wrap">
    <div class="steps__t">
      <h2 class="steps_4-title"><?php the_field('title_4'); ?></h2>
      <span class="steps_4-subtitle"><?php the_field('subtitle_4'); ?></span>
      <?php
      if (pll_current_language() == 'en') { ?>
      <a href="/firmware">
        <img src="@asset('images/step_4-laptop.png')" alt="" class="steps_4-laptop"></a>
      <?php } else if (pll_current_language() == 'ru') { ?>
      <a href="/firmware">
        <img src="@asset('images/step_4-laptop.png')" alt="" class="steps_4-laptop"></a>
      <?php }
      ?>
    </div>
    @include('components.bottom-panel', ['class' => 'bottom-home_2'])
  </div>


  <section id="home__catalog" class="home__catalog">
    <div class="container">

      <h2 class="title"><?php the_field('catalog_title'); ?></h2>
      <span class="subtitle"><?php the_field('catalog_subtitle'); ?></span>

      <div class="catalog__wrap">


        <?php

        // check if the repeater field has rows of data
        if (have_rows('товар')):

            // loop through the rows of data
            while (have_rows('товар')) : the_row(); ?>
                <div class="catalog__item">
                    <div class="catalog__item-img">
                        <img src="<?php echo get_sub_field('товар_изображение'); ?>" alt=""/>
                    </div>
                    <div class="catalog__item-info">
                        <div class="catalog__item-title"><?php echo get_sub_field('товар_название'); ?></div>
                        <div class="catalog__item-price"><?php echo get_sub_field('товар_цена'); ?></div>
                        <div class="catalog__item-btn btn-modal"><?php the_field('catalog_btn'); ?></div>
                    </div>
                </div>
            <?php endwhile;

        else :

            // no rows found

        endif;

        ?>

      </div>

    </div>
  </section>

</div>


</div>


@include('partials.footer')
