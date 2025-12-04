{{--
Template name: Contacts
--}}

@include('partials.header')

<div class="bottom bottom_product contacts-bottom">
  <div class="bottom__social">
    <a href="https://www.youtube.com/channel/UCKtVLffFs7z3B0h8FB7kkwA" class="gwx-youtube" rel="noopener"
       target="_blank">
      <?php the_field( 'btn_youtube' ); ?>
      <svg>
        <use xlink:href="#icon_youtube"/>
      </svg>
    </a>
  </div>
  <div class="bottom__box">
    <div class="bottom__box_info">
                <span class="bottom__box_text">
                    <?php the_field( 'bottom-text' ); ?>
                </span>
    </div>
    <div class="bottom__box_btn btn-modal">
      <?php the_field( 'bottom-btn' ); ?>
    </div>
  </div>
  <div class="bottom__down">
    <a href="<?php the_field( 'bottom_download_link' );?>" class="bottom__down_download">
      <svg>
        <use xlink:href="#icon_download"/>
      </svg>
      <span><?php the_field( 'bottom_download' ); ?></span>
    </a>
  </div>
</div>

<section class="contacts">

  <img src="@asset('images/bg__contacts.png')" alt="" class="contacts_bg">
  <img src="@asset('images/bg__contacts-1024.png')" alt="" class="contacts_bg-1024">
  <img src="@asset('images/bg__contacts-768.png')" alt="" class="contacts_bg-768">
  <img src="@asset('images/bg__contacts-767.png')" alt="" class="contacts_bg-767">

  <div class="container">
    <h2 class="title title-top">@php (the_title())</h2>
    <div class="contacts__wrap">
      <div class="contacts__item">
        <span class="contacts__item-title"><?php the_field( 'address-title' ); ?></span>
        <span class="contacts__item-link"><?php the_field( 'address' ); ?></span>
      </div>
      <div class="contacts__item">
        <span class="contacts__item-title"><?php the_field( 'phone' ); ?></span>
        <a href="tel:+79264113827" class="contacts__item-link">+7 (926) 411-38-27</a>
      </div>
      <div class="contacts__item">
        <span class="contacts__item-title"><?php the_field( 'e-mail' ); ?></span>
        <a href="mailto:cooling@mining-store-demogroup.com" class="contacts__item-link">cooling@mining-store-demogroup.com</a>
      </div>
      <br>
      <a href="https://wa.me/79264113827" rel="noopener" target="_blank">
        <svg width="33" height="33" viewBox="0 0 19 19" fill="#098DC4" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd"
                d="M9.12772 0H9.13228C14.1663 0 18.26 4.09595 18.26 9.13C18.26 14.1641 14.1663 18.26 9.13228 18.26C7.27547 18.26 5.55332 17.7076 4.10964 16.7513L0.600298 17.8731L1.73812 14.4813C0.643665 12.9783 0 11.1272 0 9.13C0 4.0948 4.09366 0 9.12772 0ZM12.6531 14.1814C13.3504 14.0307 14.2246 13.5149 14.4449 12.8929C14.6652 12.2698 14.6652 11.7391 14.6012 11.6261C14.5496 11.5365 14.4276 11.4777 14.2454 11.39C14.198 11.3672 14.1465 11.3424 14.0911 11.3145C13.8229 11.181 12.5185 10.5362 12.272 10.4506C12.03 10.3593 11.7995 10.3913 11.6169 10.6492C11.5821 10.6978 11.5475 10.7465 11.513 10.795C11.2927 11.1048 11.0802 11.4037 10.9036 11.5942C10.7427 11.7653 10.4802 11.787 10.2599 11.6957C10.2359 11.6857 10.2084 11.6746 10.1776 11.6621C9.82882 11.5213 9.05528 11.2089 8.11894 10.3753C7.3292 9.67229 6.79281 8.79695 6.6376 8.53446C6.48521 8.27114 6.61666 8.11674 6.73814 7.97403C6.74039 7.97139 6.74264 7.96875 6.74488 7.96612C6.8232 7.86921 6.89921 7.78851 6.9756 7.70741C7.03055 7.64908 7.08569 7.59053 7.14203 7.52559C7.1504 7.51595 7.15854 7.50659 7.16647 7.49748C7.2861 7.35992 7.35734 7.27801 7.43762 7.10676C7.52892 6.92986 7.46387 6.74726 7.39881 6.61259C7.35406 6.51828 7.07757 5.84746 6.84023 5.27159C6.73866 5.02516 6.64426 4.79613 6.57826 4.63709C6.40136 4.21369 6.2667 4.19771 5.9985 4.1863C5.99029 4.18589 5.98199 4.18547 5.97361 4.18504C5.88883 4.18075 5.79547 4.17603 5.69265 4.17603C5.34342 4.17603 4.97937 4.27874 4.7591 4.50356C4.75141 4.51142 4.74338 4.51958 4.73506 4.52805C4.45327 4.81463 3.82556 5.45302 3.82556 6.72558C3.82556 8.00059 4.73023 9.23454 4.89762 9.46285C4.90224 9.46914 4.90629 9.47467 4.90975 9.47941C4.91982 9.49264 4.9388 9.52013 4.96643 9.56015C5.30821 10.0551 6.97294 12.4659 9.45535 13.4943C11.553 14.364 12.1761 14.2829 12.6531 14.1814Z"
                fill="#098DC4"/>
        </svg>
      </a>
      &nbsp;&nbsp;&nbsp;&nbsp;
      <a href="https://tlgg.ru/mining-store-demogroup" rel="noopener" target="_blank">
        <svg
          xmlns:dc="http://purl.org/dc/elements/1.1/"
          xmlns:cc="http://creativecommons.org/ns#"
          xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
          xmlns:svg="http://www.w3.org/2000/svg"
          xmlns="http://www.w3.org/2000/svg"
          xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
          xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
          id="svg2"
          version="1.1"
          inkscape:version="0.91+devel r"
          width="36"
          height="36"
          viewBox="0 0 512 512"
          sodipodi:docname="telegram.svg">
          <metadata
            id="metadata8">
            <rdf:RDF>
              <cc:Work
                rdf:about="">
                <dc:format>image/svg+xml</dc:format>
                <dc:type
                  rdf:resource="http://purl.org/dc/dcmitype/StillImage"/>
                <dc:title/>
              </cc:Work>
            </rdf:RDF>
          </metadata>
          <defs
            id="defs6"/>
          <sodipodi:namedview
            pagecolor="#ffffff"
            bordercolor="#666666"
            borderopacity="1"
            objecttolerance="10"
            gridtolerance="10"
            guidetolerance="10"
            inkscape:pageopacity="0"
            inkscape:pageshadow="2"
            inkscape:window-width="1920"
            inkscape:window-height="1024"
            id="namedview4"
            showgrid="false"
            showguides="false"
            inkscape:zoom="1.625"
            inkscape:cx="607.07692"
            inkscape:cy="256"
            inkscape:window-x="0"
            inkscape:window-y="29"
            inkscape:window-maximized="1"
            inkscape:current-layer="svg2"/>
          <circle
            style="opacity:1;fill:#4aaee8;fill-opacity:1;stroke:none;stroke-width:91.3417511;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
            id="path3344"
            cx="256"
            cy="256"
            r="225"/>
          <path
            style="opacity:1;fill:#ffffff;fill-opacity:1;stroke:none;stroke-width:91.3417511;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
            d="m 263.5553,362.57139 c -2.47405,-2.49722 -11.18811,-17.70742 -19.36459,-33.80047 -8.17651,-16.09305 -16.52273,-31.62674 -18.54717,-34.51935 -2.30764,-3.29722 -15.36044,-11.13747 -34.98817,-21.01588 -35.30919,-17.77074 -40.05393,-21.58385 -39.09856,-31.42161 0.87293,-8.98884 4.4521,-10.8486 54.15657,-28.14004 22.73442,-7.90897 59.40415,-20.66244 81.4883,-28.34108 22.08414,-7.67862 42.60204,-13.96114 45.59532,-13.96114 6.24973,0 12.12164,5.52466 12.12164,11.40481 0,2.21336 -7.3663,25.29767 -16.36953,51.29851 -9.00326,26.00084 -19.33718,55.90095 -22.96426,66.44468 -12.2606,35.64064 -21.63633,59.51235 -24.7674,63.06053 -4.29348,4.86547 -11.88159,4.42194 -17.26215,-1.00896 z"
            id="path3340"
            inkscape:connector-curvature="0"/>
        </svg>
      </a>
      &nbsp;&nbsp;&nbsp;&nbsp;
      <a href="https://vk.com/mining-store-demogroup" rel="noopener" target="_blank">
        <svg data-name="Layer 45" height="39" id="Layer_45" viewBox="0 0 24 24" width="39"
             xmlns="http://www.w3.org/2000/svg"><title/>
          <path
            d="M21.54736,7H18.25688a.74281.74281,0,0,0-.65452.39156s-1.31237,2.41693-1.73392,3.231C14.73438,12.8125,14,12.125,14,11.10863V7.60417A1.10417,1.10417,0,0,0,12.89583,6.5h-2.474a1.9818,1.9818,0,0,0-1.751.8125s1.25626-.20312,1.25626,1.48958c0,.41974.02162,1.62723.04132,2.64a.72943.72943,0,0,1-1.273.50431,21.54029,21.54029,0,0,1-2.4982-4.54359A.69314.69314,0,0,0,5.5668,7C4.8532,7,3.42522,7,2.57719,7a.508.508,0,0,0-.47969.68481C3.00529,10.17487,6.91576,18,11.37917,18h1.87865A.74219.74219,0,0,0,14,17.25781V16.12342a.7293.7293,0,0,1,1.22868-.5315l2.24861,2.1127A1.08911,1.08911,0,0,0,18.223,18h2.95281c1.42415,0,1.42415-.98824.64768-1.75294-.54645-.53817-2.51832-2.61663-2.51832-2.61663A1.01862,1.01862,0,0,1,19.2268,12.307c.63737-.83876,1.67988-2.21175,2.122-2.79993C21.95313,8.70313,23.04688,7,21.54736,7Z"
            style="fill:#577fa8"/>
        </svg>
      </a>

    </div>
  </div>
</section>

@include('partials.message-box')
@include('partials.footer')
