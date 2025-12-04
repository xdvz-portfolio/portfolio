<?php if(pll_current_language() == 'en'){ ?>
<section class="message">
  <div class="container">

    <span class="message-top"><?php the_field('подзаголовок_en','option');?></span>
    <span class="message-title"><?php the_field('заголовок_en','option');?></span>

    <?php echo do_shortcode( '[contact-form-7 id="73" title="Форма Подвал"]' ); ?>

    <div class="gwx-message__bottom">
      <a href="<?php the_field('телеграм_en','option');?>" rel="noopener" target="_blank">
        <svg class="tl">
          <use xlink:href="#icon_telegram"/>
        </svg>
        <span>
                    <?php the_field('заголовок_tg_en','option');?>
                </span>
      </a>
      <a href="<?php the_field('whatsup_en','option');?>" rel="noopener" target="_blank">
        <img src="@asset('images/whatsapp.svg')" alt="">
        <span>
                    <?php the_field('заголовок_whatsup_en','option');?>
                </span>
      </a>
    </div>
  </div>
</section>


<?php } else {  ?>
<section class="message">
  <div class="container">

    <span class="message-top"><?php the_field('подзаголовок_ru','option');?></span>
    <span class="message-title"><?php the_field('заголовок_ru','option');?></span>

    <?php echo do_shortcode( '[contact-form-7 id="1096" title="Форма Подвал rus"]' ); ?>

    <div class="gwx-message__bottom">
      <a href="<?php the_field('телеграм_ru','option');?>" rel="noopener" target="_blank">
        <svg class="tl">
          <use xlink:href="#icon_telegram"/>
        </svg>
        <span>
                    <?php the_field('заголовок_tg_ru','option');?>
                </span>
      </a>
      <a href="<?php the_field('whatsup_ru','option');?>" rel="noopener" target="_blank">
        <img src="@asset('images/whatsapp.svg')" alt="">
        <span>
                    <?php the_field('заголовок_whatsup_ru','option');?>
                </span>
      </a>
    </div>
  </div>
</section>

<?php } ?>

