{{--
Template name: Firmware
--}}

@include('partials.header')

@include('components.bottom-panel')

<section class="firmware__promo">
  <div class="container">
    <h2 class="title"><?php the_title() ?></h2>
    <span class="subtitle"><?php the_field('subtitle'); ?></span>
    <img src="@asset('images/firmware.png')" alt="" class="firmware__promo-img">
  </div>
</section>


<section class="firmware__download">
  <div class="container">
    <div class="tab__wrapper">

      <nav class="bg-color">Adaptive tabs</nav>

      <section class="wrapper">
        <ul class="tabs">
          <li class="active">Series A</li>
          <li>Series B</li>
          <li>Series C</li>
          <li>
            <?php if(pll_current_language() == 'en') { ?> Utilities<?php } else if (pll_current_language() == 'ru') { ?>Утилиты<?php } ?>
          </li>
        </ul>

        <ul class="tab__content">
          <li class="active">
            <div class="content__wrapper">
              <h2>Hardware Series A</h2>
              <ul class="firmware__cards">
                <li class="firmware__card">
                  <div class="firmware__card_top-title">SD</div>
                  <h3>Model Pro A1</h3>
                  <span><b><?php if(pll_current_language() == 'en') { ?>UP to<?php } else if (pll_current_language() == 'ru') { ?>До<?php } ?> 110 Th/s</b></span>
                  <span class="firmware__card__descr">
                    <?php if(pll_current_language() == 'en') { ?>Standard / Mod PSU<?php } else if (pll_current_language() == 'ru') { ?>Станд. / Мод. блок<?php } ?>
                  </span>
                  <a class="firmware" target="_blank" rel="noreferrer" href="#">
                    <div class="firmware__download_button">
                      <span><?php if(pll_current_language() == 'en') { ?>Download<?php } else if (pll_current_language() == 'ru') { ?>Скачать<?php } ?></span>
                    </div>
                  </a>
                </li>
                <li class="firmware__card">
                  <div class="firmware__card_top-title">SD</div>
                  <h3>Model Pro A2</h3>
                  <b><?php if(pll_current_language() == 'en') { ?>batch file (in dev)<?php } else if (pll_current_language() == 'ru') { ?>Первые батчи<?php } ?></b>
                  <span class="firmware__card__descr">
                  <?php if(pll_current_language() == 'en') { ?>Standard / Mod PSU<?php } else if (pll_current_language() == 'ru') { ?>Станд. / Мод. блок<?php } ?>
                  </span>
                  <a class="firmware" target="_blank" rel="noreferrer" href="#">
                    <div class="firmware__download_button">
                      <span><?php if(pll_current_language() == 'en') { ?>Download<?php } else if (pll_current_language() == 'ru') { ?>Скачать<?php } ?></span>
                    </div>
                  </a>
                </li>
                <li class="firmware__card">
                  <div class="firmware__card_top-title">SD</div>
                  <h3>Model A3</h3>
                  <b><?php if(pll_current_language() == 'en') { ?>UP to<?php } else if (pll_current_language() == 'ru') { ?>До<?php } ?> 95 Th/s</b>
                  <span class="firmware__card__descr">
                  <?php if(pll_current_language() == 'en') { ?>Standard / Mod PSU<?php } else if (pll_current_language() == 'ru') { ?>Станд. / Мод. блок<?php } ?>
                  </span>
                  <a class="firmware" target="_blank" rel="noreferrer" href="#">
                    <div class="firmware__download_button">
                      <span><?php if(pll_current_language() == 'en') { ?>Download<?php } else if (pll_current_language() == 'ru') { ?>Скачать<?php } ?></span>
                    </div>
                  </a>
                <li class="firmware__card">
                  <div class="firmware__card_top-title">SD</div>
                  <h3>Model A4</h3>
                  <b><?php if(pll_current_language() == 'en') { ?>UP to<?php } else if (pll_current_language() == 'ru') { ?>До<?php } ?> 90 Th/s</b>
                  <span class="firmware__card__descr">
                  <?php if(pll_current_language() == 'en') { ?>Standard / Mod PSU<?php } else if (pll_current_language() == 'ru') { ?>Станд. / Мод. блок<?php } ?>
                  </span>
                  <a class="firmware" target="_blank" rel="noreferrer" href="#">
                    <div class="firmware__download_button">
                      <span><?php if(pll_current_language() == 'en') { ?>Download<?php } else if (pll_current_language() == 'ru') { ?>Скачать<?php } ?></span>
                    </div>
                  </a>
                </li>
                <li class="firmware__card">
                  <div class="firmware__card_top-title">SD</div>
                  <h3>Model Pro A5</h3>
                  <b><?php if(pll_current_language() == 'en') { ?>UP to<?php } else if (pll_current_language() == 'ru') { ?>До<?php } ?> 81 Th/s</b>
                  <span class="firmware__card__descr">
                  <?php if(pll_current_language() == 'en') { ?>Standard / Mod PSU<?php } else if (pll_current_language() == 'ru') { ?>Станд. / Мод. блок<?php } ?>
                  </span>
                  <a class="firmware" target="_blank" rel="noreferrer" href="#">
                    <div class="firmware__download_button">
                      <span><?php if(pll_current_language() == 'en') { ?>Download<?php } else if (pll_current_language() == 'ru') { ?>Скачать<?php } ?></span>
                    </div>
                  </a>
                </li>
              </ul>
            </div>
          </li>

          <li>
            <div class="content__wrapper">
              <h2>Hardware Series B</h2>
              <ul class="firmware__cards">
                <li class="firmware__card">
                  <h3>Model B1/B1 Pro </h3>
                  <span><b><?php if(pll_current_language() == 'en') { ?>UP to<?php } else if (pll_current_language() == 'ru') { ?>До<?php } ?> 80,1 Th/s</b></span>
                  <span class="firmware__card__descr">
                  <?php if(pll_current_language() == 'en') { ?>Standard PSU<?php } else if (pll_current_language() == 'ru') { ?>Стандартный блок<?php } ?>
                  </span>
                  <a class="firmware" target="_blank" rel="noreferrer" href="#">
                    <div class="firmware__download_button">
                      <span><?php if(pll_current_language() == 'en') { ?>Download<?php } else if (pll_current_language() == 'ru') { ?>Скачать<?php } ?></span>
                    </div>
                  </a>
                </li>
                <li class="firmware__card">
                  <div class="firmware__card_top-title">SD</div>
                  <h3>Model B1/B1 Pro </h3>
                  <span><b><?php if(pll_current_language() == 'en') { ?>UP to<?php } else if (pll_current_language() == 'ru') { ?>До<?php } ?> 80,1 Th/s</b></span>
                  <span class="firmware__card__descr">
                  <?php if(pll_current_language() == 'en') { ?>Standard PSU<?php } else if (pll_current_language() == 'ru') { ?>Стандартный блок<?php } ?>
                  </span>
                  <a class="firmware" target="_blank" rel="noreferrer" href="#">
                    <div class="firmware__download_button">
                      <span><?php if(pll_current_language() == 'en') { ?>Download<?php } else if (pll_current_language() == 'ru') { ?>Скачать<?php } ?></span>
                    </div>
                  </a>
                </li>
                <li class="firmware__card">
                  <h3>Model B2</h3>
                  <b><?php if(pll_current_language() == 'en') { ?>UP to<?php } else if (pll_current_language() == 'ru') { ?>До<?php } ?> 95 Th/s</b>
                  <span class="firmware__card__descr">
                  <?php if(pll_current_language() == 'en') { ?>Standard PSU<?php } else if (pll_current_language() == 'ru') { ?>Стандартный блок<?php } ?>
                  </span>
                  <a class="firmware" target="_blank" rel="noreferrer" href="#">
                    <div class="firmware__download_button">
                      <span><?php if(pll_current_language() == 'en') { ?>Download<?php } else if (pll_current_language() == 'ru') { ?>Скачать<?php } ?></span>
                    </div>
                  </a>
                </li>
                <li class="firmware__card">
                  <div class="firmware__card_top-title">SD</div>
                  <h3>Model B2</h3>
                  <b><?php if(pll_current_language() == 'en') { ?>UP to<?php } else if (pll_current_language() == 'ru') { ?>До<?php } ?> 95 Th/s</b>
                  <span class="firmware__card__descr">
                  <?php if(pll_current_language() == 'en') { ?>Standard PSU<?php } else if (pll_current_language() == 'ru') { ?>Стандартный блок<?php } ?>
                  </span>
                  <a class="firmware" target="_blank" rel="noreferrer" href="#">
                    <div class="firmware__download_button">
                      <span><?php if(pll_current_language() == 'en') { ?>Download<?php } else if (pll_current_language() == 'ru') { ?>Скачать<?php } ?></span>
                    </div>
                  </a>
                </li>
                <li class="firmware__card">
                  <h3>Model B3</h3>
                  <b><?php if(pll_current_language() == 'en') { ?>UP to<?php } else if (pll_current_language() == 'ru') { ?>До<?php } ?> 77,5 Th/s</b>
                  <span class="firmware__card__descr">
                  <?php if(pll_current_language() == 'en') { ?>Standard PSU<?php } else if (pll_current_language() == 'ru') { ?>Стандартный блок<?php } ?>
                  </span>
                  <a class="firmware" target="_blank" rel="noreferrer" href="#">
                    <div class="firmware__download_button">
                      <span><?php if(pll_current_language() == 'en') { ?>Download<?php } else if (pll_current_language() == 'ru') { ?>Скачать<?php } ?></span>
                    </div>
                  </a>
                </li>
              </ul>
            </div>
          </li>

          <li>
            <div class="content__wrapper">
              <h2>Hardware Series C</h2>
              <ul class="firmware__cards">
                <li class="firmware__card">
                  <h3>Model C1</h3>
                  <b><?php if(pll_current_language() == 'en') { ?>UP to<?php } else if (pll_current_language() == 'ru') { ?>До<?php } ?> 17,5 Th/s</b>
                  <span class="firmware__card__descr">
                  <?php if(pll_current_language() == 'en') { ?>Standard PSU<?php } else if (pll_current_language() == 'ru') { ?>Стандартный блок<?php } ?>
                  </span>
                  <a class="firmware" target="_blank" rel="noreferrer" href="#">
                    <div class="firmware__download_button">
                      <span><?php if(pll_current_language() == 'en') { ?>Download<?php } else if (pll_current_language() == 'ru') { ?>Скачать<?php } ?></span>
                    </div>
                  </a>
                </li>
                <li class="firmware__card">
                  <div class="firmware__card_top-title">SD</div>
                  <h3>Model C1</h3>
                  <b><?php if(pll_current_language() == 'en') { ?>UP to<?php } else if (pll_current_language() == 'ru') { ?>До<?php } ?> 17,5 Th/s</b>
                  <span class="firmware__card__descr">
                  <?php if(pll_current_language() == 'en') { ?>Standard PSU<?php } else if (pll_current_language() == 'ru') { ?>Стандартный блок<?php } ?>
                  </span>
                  <a class="firmware" target="_blank" rel="noreferrer" href="#">
                    <div class="firmware__download_button">
                      <span><?php if(pll_current_language() == 'en') { ?>Download<?php } else if (pll_current_language() == 'ru') { ?>Скачать<?php } ?></span>
                    </div>
                  </a>
                </li>
              </ul>
            </div>
          </li>

          <li>
            <div class="content__wrapper">
              <h2><?php if(pll_current_language() == 'en') { ?>Useful utilities<?php } else if (pll_current_language() == 'ru') { ?>Полезные утилиты<?php } ?></h2>
              <ul class="firmware__cards">
                <li class="firmware__card">
                  <h3>SD Card Reader</h3>
                  <b><?php if(pll_current_language() == 'en') { ?>For Windows<?php } else if (pll_current_language() == 'ru') { ?>Для Windows<?php } ?></b>
                  <span class="firmware__card__descr">
                      <?php if(pll_current_language() == 'en') { ?>Description<?php } else if (pll_current_language() == 'ru') { ?>Описание<?php } ?>
                  </span>
                  <a class="firmware" target="_blank" rel="noreferrer" href="#">
                    <div class="firmware__download_button">
                      <span><?php if(pll_current_language() == 'en') { ?>Download<?php } else if (pll_current_language() == 'ru') { ?>Скачать<?php } ?></span>
                    </div>
                  </a>
                </li>
                <li class="firmware__card">
                  <h3>Win32DiskImager</h3>
                  <b><?php if(pll_current_language() == 'en') { ?>For Windows<?php } else if (pll_current_language() == 'ru') { ?>Для Windows<?php } ?></b>
                  <span class="firmware__card__descr">
                      <?php if(pll_current_language() == 'en') { ?>Description<?php } else if (pll_current_language() == 'ru') { ?>Описание<?php } ?>
                  </span>
                  <a class="firmware" target="_blank" rel="noreferrer" href="#">
                    <div class="firmware__download_button">
                      <span><?php if(pll_current_language() == 'en') { ?>Download<?php } else if (pll_current_language() == 'ru') { ?>Скачать<?php } ?></span>
                    </div>
                  </a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </section>

    </div>
  </div>
</section>

<section class="firmware__video">
  <div class="container">
    <div class="firmware__video_tabs">
      <div class="firmware__video_tabs-item active">
        <?php if(pll_current_language() == 'en') { ?>Installation Instructions<?php } else if (pll_current_language() == 'ru') { ?>Инструкция по установке<?php } ?>
      </div>
    </div>
    <div class="firmware__video_embeds">
      <div class="firmware__video_embeds-item active">
        <div class="respon_video">
          <iframe width="100%" height="100%" src="https://www.youtube.com/embed/demo-video" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="firmware__instuction">
  <div class="container">
    <h2><?php if(pll_current_language() == 'en') { ?>Installation Instructions<?php } else if (pll_current_language() == 'ru') { ?>Инструкция по установке<?php } ?></h2>
    <div class="firmware__instuction_text">
      <?php the_content(); ?>
    </div>
  </div>
</section>

@include('partials.footer')
