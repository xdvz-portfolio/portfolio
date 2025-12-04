<div class="bottom {{ $class ?? 'bottom_product' }}">
  <div class="bottom__social">
    <a href="#" class="social-youtube" rel="noopener" target="_blank">
      <?php the_field('btn_youtube'); ?>
      <svg>
        <use xlink:href="#icon_youtube"/>
      </svg>
    </a>
  </div>
  <div class="bottom__box">
    <div class="bottom__box_info">
      <span class="bottom__box_text">
        <?php the_field('bottom_text'); ?>
      </span>
    </div>
    <div class="bottom__box_btn btn-modal"><?php the_field('bottom_btn'); ?></div>
  </div>
  <div class="bottom__down">
    <a href="#" class="bottom__down_download">
      <svg>
        <use xlink:href="#icon_download"/>
      </svg>
      <span><?php the_field('bottom_download'); ?></span>
    </a>
  </div>
</div> 