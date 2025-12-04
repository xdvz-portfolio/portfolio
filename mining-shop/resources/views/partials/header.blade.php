<body <?php body_class(); ?>>

<header class="header">
  <div class="container">

    <div class="header__wrap">

      <div class="header__item">
        <a href="{{ home_url('/') }}" class="logo">
          <img src="@asset('images/logo.svg')">
        </a>
        <div class="mobile__box_lang">
          <?php
          pll_the_languages( array(
            'show_flags' => 1,
          ) );
          ?>
        </div>
        <div class="hamburger">
          <span></span>
          <span></span>
          <span></span>
        </div>

        {{ wp_nav_menu( array(
          'theme_location'  => 'first',
          'menu'            => 'main_menu',
          'container'       => 'div',
          'container_class' => '',
          'container_id'    => '',
          'menu_class'      => 'menu',
          'menu_id'         => '',
          'echo'            => true,
          'fallback_cb'     => 'wp_page_menu',
          'before'          => '',
          'after'           => '',
          'link_before'     => '',
          'link_after'      => '',
          'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
          'depth'           => 0,
          'walker'          => '',
        ) ) }}


        <div class="langsel">
          <?php
          pll_the_languages( array(
            'show_flags' => 1,
            'show_names' => 0,
          ) );
          ?>
        </div>
      </div>

      <div class="header__item">
        <div class="header__contacts">
          <div class="header__contacts_item">
            <a href="" class="header__contacts_item-link">info@example.com</a>
            <span class="header__contacts_item-text1 btn-copy"
                  data-clipboard-text="info@example.com">@php (dynamic_sidebar( 'sidebar_copy' ))</span>
          </div>
          <div class="header__contacts_item">
            <a href="tel:+12345678901" class="header__contacts_item-link">+1 (234) 567-8901</a>
            <span class="header__contacts_item-text1 btn-modal">@php (dynamic_sidebar( 'sidebar_call' ))</span>
          </div>
          <div class="header__contacts_item header__contacts_item-time">
            <a href="" class="header__contacts_item-link">09:00-18:00 UTC</a>
            <span class="header__contacts_item-text2">@php (dynamic_sidebar( 'sidebar_time' ))</span>
          </div>
        </div>
      </div>

    </div>

  </div>
</header>

<div class="catalog_menu">
  <div class="container">


    @php(
	wp_nav_menu( array(
      'theme_location'  => 'second',
      'menu'            => 'main_menu',
      'container'       => 'div',
      'container_class' => '',
      'container_id'    => '',
      'menu_class'      => 'catalog_menu_wrap',
      'menu_id'         => '',
      'echo'            => true,
      'fallback_cb'     => 'wp_page_menu',
      'before'          => '',
      'after'           => '',
      'link_before'     => '',
      'link_after'      => '',
      'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
      'depth'           => 0,
      'walker'          => '',
    ) )
)

  </div>
</div>

<div class="mobile__box">

  <div class="mobile__box_close"></div>

  <div class="mobile__box_menu">
    @php(    wp_nav_menu( array(
      'theme_location'  => 'first',
      'menu'            => 'main_menu',
      'container'       => 'div',
      'container_class' => '',
      'container_id'    => '',
      'menu_class'      => 'menu',
      'menu_id'         => '',
      'echo'            => true,
      'fallback_cb'     => 'wp_page_menu',
      'before'          => '',
      'after'           => '',
      'link_before'     => '',
      'link_after'      => '',
      'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
      'depth'           => 0,
      'walker'          => '',
    ) ))
  </div>

  <div class="mobile__box_down">
    <div class="mobile__box_menu_social">
      <a href="#">
        <img src="@asset('images/vk.svg')" alt="">
      </a>
      <a href="#">
        <img src="@asset('images/telegram.svg')" alt="">
      </a>
      <a href="#">
        <img src="@asset('images/youtube.svg')" alt="">
      </a>
    </div>
    <a href="#" class="download">
      <img src="@asset('images/download.svg')" alt="">
      <span>@php (dynamic_sidebar( 'sidebar_download' ))</span>
    </a>
  </div>

</div>
