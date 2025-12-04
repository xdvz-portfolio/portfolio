{{--
  Template Name: Главная страница
--}}

@extends('layouts.app')

@section('content')
  <img src="@asset('images/banner-map-m.svg')" alt="" class="hero-background-mobile">
  <section class="hero">
    <h1 class="hero-headline">Доставим <br> Ваши грузы до <br><span class="hero-caption">демо маркетплейсов</span></h1>
    <div class="hero-benefits-wrapper">
      <div class="hero-benefits-element">
        <img src="@asset('images/hero-benefits-icon.svg')" alt="Поставки FBO" class="hero-benefits-icon">
        <span class="hero-benefits-subtitle subtitle">Поставки <br> FBO</span>
      </div>
      <div class="hero-benefits-element">
        <img src="@asset('images/hero-benefits-icon.svg')" alt="Поставки FBS" class="hero-benefits-icon">
        <span class="hero-benefits-subtitle subtitle">Поставки <br> FBS</span>
      </div>
      <div class="hero-benefits-element">
        <img src="@asset('images/hero-benefits-icon.svg')" alt="Забор возвратов" class="hero-benefits-icon">
        <span class="hero-benefits-subtitle hero-benefits-subtitle-mobile-br-fix subtitle">Забор возвратов <br> от маркетплейсов <br> до склада клиента</span>
      </div>
    </div>
    <a href="#tariffs" class="text-button hero-cta">СМОТРЕТЬ ТАРИФЫ</a>
  </section>
  <section class="benefits">
    <div class="benefits-wrapper">
      <h2>Почему выбирают DEMO Logistics</h2>
      <div class="benefits-item-wrapper">
        <div class="benefits-item">
          <div class="benefits-item-header">
            <img src="@asset('images/benefits-shield.svg')" alt="Бережная перевозка" class="benefits-item_icon">
            <span class="benefits-item-headline subtitle">Бережная<br> перевозка</span>
          </div>
          <p class="benefits-item-desc">Перевозимый груз надежно закрепляется в автомобиле</p>
        </div>
        <div class="benefits-item">
          <div class="benefits-item-header">
            <img src="@asset('images/benefits-payment.svg')" alt="Бережная перевозка" class="benefits-item_icon">
            <span class="benefits-item-headline subtitle">Оплата после <br> доставки</span>
          </div>
          <p class="benefits-item-desc">Вы платите только <br> за выполненный заказ</p>
        </div>
        <div class="benefits-item">
          <div class="benefits-item-header">
            <img src="@asset('images/benefits-deadline.svg')" alt="Бережная перевозка" class="benefits-item_icon">
            <span class="benefits-item-headline subtitle">Выполнение заказа <br>в сжатые сроки</span>
          </div>
          <p class="benefits-item-desc">Забираем у вас груз и сразу везем его на маркетплейс</p>
        </div>
        <div class="benefits-item">
          <div class="benefits-item-header">
            <img src="@asset('images/benefits-communication.svg')" alt="Бережная перевозка" class="benefits-item_icon">
            <span class="benefits-item-headline subtitle">Всегда <br>на связи</span>
          </div>
          <p class="benefits-item-desc">Логист постоянно на связи во время выполнения заказа</p>
        </div>
        <div class="benefits-item">
          <div class="benefits-item-header">
            <img src="@asset('images/benefits-agreement.svg')" alt="Бережная перевозка" class="benefits-item_icon">
            <span class="benefits-item-headline subtitle">Работа <br>по договору</span>
          </div>
          <p class="benefits-item-desc">Работаем официально,<br>с прозрачными условиями договора</p>
        </div>
      </div>
      <div class="benefits-item-wrapper-mobile">
        <!-- Slider main container -->
        <div class="swiper benefits-swiper">
          <!-- Additional required wrapper -->
          <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide">
              <div class="benefits-item">
                <div class="benefits-item-header">
                  <img src="@asset('images/benefits-shield.svg')" alt="Бережная перевозка" class="benefits-item_icon">
                  <span class="benefits-item-headline subtitle">Бережная<br> перевозка</span>
                </div>
                <p class="benefits-item-desc">Перевозимый груз надежно закрепляется в автомобиле</p>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="benefits-item">
                <div class="benefits-item-header">
                  <img src="@asset('images/benefits-payment.svg')" alt="Бережная перевозка" class="benefits-item_icon">
                  <span class="benefits-item-headline subtitle">Оплата после <br> доставки</span>
                </div>
                <p class="benefits-item-desc">Вы платите только <br> за выполненный заказ</p>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="benefits-item">
                <div class="benefits-item-header">
                  <img src="@asset('images/benefits-deadline.svg')" alt="Бережная перевозка" class="benefits-item_icon">
                  <span class="benefits-item-headline subtitle">Выполнение заказа<br> в сжатые сроки</span>
                </div>
                <p class="benefits-item-desc">Забираем у вас груз и сразу везем его на маркетплейс</p>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="benefits-item">
                <div class="benefits-item-header">
                  <img src="@asset('images/benefits-communication.svg')" alt="Бережная перевозка" class="benefits-item_icon">
                  <span class="benefits-item-headline subtitle">Всегда <br>на связи</span>
                </div>
                <p class="benefits-item-desc">Логист постоянно на связи во время выполнения заказа</p>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="benefits-item">
                <div class="benefits-item-header">
                  <img src="@asset('images/benefits-agreement.svg')" alt="Бережная перевозка" class="benefits-item_icon">
                  <span class="benefits-item-headline subtitle">Работа <br>по договору</span>
                </div>
                <p class="benefits-item-desc">Работаем официально,<br>с прозрачными условиями договора</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="autopark" class="park">
    <h2 class="park-headline">Наш автопарк</h2>
    <div class="park-car-wrapper">
      @include('components.vehicle-card', [
        'volume' => '8',
        'name' => 'Малый фургон',
        'dimensions' => '1,8 х 1,4 х 3,0 м',
        'capacity' => 'короба'
      ])
      
      @include('components.vehicle-card', [
        'volume' => '16',
        'name' => 'Средний фургон',
        'dimensions' => '1,8 х 2,0 х 4,2 м',
        'capacity' => '1-4-8 европалет'
      ])
      
      @include('components.vehicle-card', [
        'volume' => '24',
        'name' => 'Грузовик',
        'dimensions' => '2,4 х 2,2 х 5,10 м',
        'capacity' => '10 европаллет'
      ])
      
      @include('components.vehicle-card', [
        'volume' => '34',
        'name' => 'Большой грузовик',
        'dimensions' => '2,15 х 2,0 х 6,2 м',
        'capacity' => '12 европаллет'
      ])
      
      @include('components.vehicle-card', [
        'volume' => '42',
        'name' => 'Большой фургон',
        'dimensions' => '2,2 х 2,5 х 6,0 м',
        'capacity' => '15 европаллет'
      ])
      
      @include('components.vehicle-card', [
        'volume' => '82',
        'name' => 'Фура',
        'dimensions' => '2,65 х 2,45 х 13,6 м',
        'capacity' => '33 европаллета'
      ])
    </div>

    <div class="park-car-swiper">
      <div class="swiper swiper-park">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            @include('components.vehicle-card', [
              'volume' => '8',
              'name' => 'Малый фургон',
              'dimensions' => '1,8 х 1,4 х 3,0 м',
              'capacity' => 'короба'
            ])
          </div>
          <div class="swiper-slide">
            @include('components.vehicle-card', [
              'volume' => '16',
              'name' => 'Средний фургон',
              'dimensions' => '1,8 х 2,0 х 4,2 м',
              'capacity' => '1-4-8 европалет'
            ])
          </div>
          <div class="swiper-slide">
            @include('components.vehicle-card', [
              'volume' => '24',
              'name' => 'Грузовик',
              'dimensions' => '2,4 х 2,2 х 5,10 м',
              'capacity' => '10 европаллет'
            ])
          </div>
          <div class="swiper-slide">
            @include('components.vehicle-card', [
              'volume' => '34',
              'name' => 'Большой грузовик',
              'dimensions' => '2,15 х 2,0 х 6,2 м',
              'capacity' => '12 европаллет'
            ])
          </div>
          <div class="swiper-slide">
            @include('components.vehicle-card', [
              'volume' => '42',
              'name' => 'Большой фургон',
              'dimensions' => '2,2 х 2,5 х 6,0 м',
              'capacity' => '15 европаллет'
            ])
          </div>
          <div class="swiper-slide">
            @include('components.vehicle-card', [
              'volume' => '82',
              'name' => 'Фура',
              'dimensions' => '2,65 х 2,45 х 13,6 м',
              'capacity' => '33 европаллета'
            ])
          </div>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div>
    </div>

  </section>
  <section id="tariffs" class="tariffs">
    <h2 class="tariffs-headline">Тарифы</h2>
    <div class="tab-container">
      <div class="tab-nav">
        <div class="select">
          <select class="is-mobile" onchange="openTab(event, this.value)">
            <option value="ozon">Ozon</option>
            <option value="wb">WB</option>
            <option value="yandex">Яндекс</option>
            <option value="another">Другие</option>
          </select>
        </div>
      </div>
      <div class="tab-buttons">
        <button class="tab-btn active" content-id="ozon"><h3>Озон</h3></button>
        <button class="tab-btn" content-id="wb"><h3>WB</h3></button>
        <button class="tab-btn" content-id="yandex"><h3>Яндекс</h3></button>
        <button class="tab-btn" content-id="another"><h3>Прочие</h3></button>
      </div>
      <div class="tab-contents">
        <div class="content tab-content show" id="ozon">
          <div class="content-info">
            <div class="content-info-col">
              <div class="direction">
                <span class="direction-headline">Основные <br>направления</span>
                <div class="direction-desc-wrapper">
                  <p class="direction-desc-el">Черная Грязь</p>
                  <p class="direction-desc-el">Хоругвино</p>
                  <p class="direction-desc-el">Истра</p>
                  <p class="direction-desc-el">Петровское</p>
                  <p class="direction-desc-el">Рябиновая</p>
                  <p class="direction-desc-el">Пушкино</p>
                  <p class="direction-desc-el">Софьино</p>
                </div>
              </div>
            </div>
            <div class="content-info-col">
              <div class="table">
                <div class="divTable">
                  <?php while ( have_rows( 'table', 'option' ) ): the_row(); ?>
                  <div class="divTableHeading">
                    <div class="divTableRow">
                      <div class="divTableHead"><p>Объем поставки <br> (паллетность)</p></div>
                      <div class="divTableHead"><p>Стоимость</p></div>
                    </div>
                  </div>
                  <div class="divTableBody">
                    <div class="divTableRow">
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_1_col_1' ); ?></div>
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_1_col_2' ); ?></p></div>
                    </div>
                    <div class="divTableRow">
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_2_col_1' ); ?></p></div>
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_2_col_2' ); ?></p></div>
                    </div>
                    <div class="divTableRow">
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_3_col_1' ); ?></p></div>
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_3_col_2' ); ?></p></div>
                    </div>
                    <div class="divTableRow">
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_4_col_1' ); ?></p></div>
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_4_col_2' ); ?></p></div>
                    </div>
                    <div class="divTableRow">
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_5_col_1' ); ?></p></div>
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_5_col_2' ); ?></p></div>
                    </div>
                  </div>
                  <div class="divTableFoot">
                    <div class="divTableRow tableFootStyle">
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_6_col_1' ); ?></p></div>
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_6_col_2' ); ?></p></div>
                    </div>
                  </div>
                  <?php endwhile; ?>
                </div>
              </div>
              <div class="table-banner">
                <span class="table-banner-subtitle subtitle">Единый тариф на все маркетплейсы <br> в пределах ЦКАД</span>
              </div>
            </div>
            <div class="content-info-col">
              <div class="map-wrapper">
                <div style="position:relative;overflow:hidden;"><a
                    href="https://yandex.ru/maps?utm_medium=mapframe&utm_source=maps"
                    style="color:#eee;font-size:12px;position:absolute;top:0px;">Яндекс Карты</a><a
                    href="https://yandex.ru/maps/?ll=37.615348%2C55.720271&mode=usermaps&source=constructorLink&um=constructor%3Afc6d7e6d68164531f38a1f4a78094493965228b1eee66a9a420bcf69d2089fd3&utm_medium=mapframe&utm_source=maps&z=8.61"
                    style="color:#eee;font-size:12px;position:absolute;top:14px;">Яндекс Карты — транспорт, навигация,
                    поиск мест</a>
                  <iframe
                    class="map"
                    src="https://yandex.ru/map-widget/v1/?ll=37.615348%2C55.720271&mode=usermaps&source=constructorLink&um=constructor%3Afc6d7e6d68164531f38a1f4a78094493965228b1eee66a9a420bcf69d2089fd3&z=8.61"
                    width="575" height="525" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="content tab-content" id="wb">
          <div class="content-info">
            <div class="content-info-col">
              <div class="direction">
                <span class="direction-headline">Основные <br>направления</span>
                <div class="direction-desc-wrapper">
                  <p class="direction-desc-el">Электросталь</p>
                  <p class="direction-desc-el">Белые столбы</p>
                  <p class="direction-desc-el">Коледино</p>
                  <p class="direction-desc-el">Подольск</p>
                  <p class="direction-desc-el">Радумля</p>
                  <p class="direction-desc-el">Пушкино</p>
                  <p class="direction-desc-el">Обухово</p>
                </div>
              </div>
            </div>
            <div class="content-info-col">
              <div class="table">
                <div class="divTable">
                  <?php while ( have_rows( 'table', 'option' ) ): the_row(); ?>
                  <div class="divTableHeading">
                    <div class="divTableRow">
                      <div class="divTableHead"><p>Объем поставки <br> (паллетность)</p></div>
                      <div class="divTableHead"><p>Стоимость</p></div>
                    </div>
                  </div>
                  <div class="divTableBody">
                    <div class="divTableRow">
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_1_col_1' ); ?></div>
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_1_col_2' ); ?></p></div>
                    </div>
                    <div class="divTableRow">
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_2_col_1' ); ?></p></div>
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_2_col_2' ); ?></p></div>
                    </div>
                    <div class="divTableRow">
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_3_col_1' ); ?></p></div>
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_3_col_2' ); ?></p></div>
                    </div>
                    <div class="divTableRow">
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_4_col_1' ); ?></p></div>
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_4_col_2' ); ?></p></div>
                    </div>
                    <div class="divTableRow">
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_5_col_1' ); ?></p></div>
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_5_col_2' ); ?></p></div>
                    </div>
                  </div>
                  <div class="divTableFoot">
                    <div class="divTableRow tableFootStyle">
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_6_col_1' ); ?></p></div>
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_6_col_2' ); ?></p></div>
                    </div>
                  </div>
                  <?php endwhile; ?>
                </div>
              </div>
              <div class="table-banner">
                <span class="table-banner-subtitle subtitle">Единый тариф на все маркетплейсы <br> в пределах ЦКАД</span>
              </div>
            </div>
            <div class="content-info-col">
              <div class="map-wrapper">
                <div style="position:relative;overflow:hidden;"><a
                    href="https://yandex.ru/maps?utm_medium=mapframe&utm_source=maps"
                    style="color:#eee;font-size:12px;position:absolute;top:0px;">Яндекс Карты</a><a
                    href="https://yandex.ru/maps/?ll=37.970978%2C55.680903&mode=usermaps&source=constructorLink&um=constructor%3A809c8b7e48580950decfae159724e08713e6eed144277c3a291e60678ec021b7&utm_medium=mapframe&utm_source=maps&z=8.65"
                    style="color:#eee;font-size:12px;position:absolute;top:14px;">Яндекс Карты — транспорт, навигация,
                    поиск мест</a>
                  <iframe
                    class="map"
                    src="https://yandex.ru/map-widget/v1/?ll=37.970978%2C55.680903&mode=usermaps&source=constructorLink&um=constructor%3A809c8b7e48580950decfae159724e08713e6eed144277c3a291e60678ec021b7&z=8.65"
                    width="575" height="525" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe>
                </div>
              </div>
            </div>
            </div>
          </div>
          </div>
        <div class="content tab-content" id="yandex">
          <div class="content-info">
            <div class="content-info-col">
              <div class="direction">
                <span class="direction-headline">Основные <br>направления</span>
                <div class="direction-desc-wrapper">
                  <p class="direction-desc-el">Софьино</p>
                  <p class="direction-desc-el">Царицыно</p>
                  <p class="direction-desc-el">Лыковская</p>
                  <p class="direction-desc-el">Томилино</p>
                  <p class="direction-desc-el">Осташковское ш.</p>
                  <p class="direction-desc-el">Мамыри</p>
                </div>
              </div>
            </div>
            <div class="content-info-col">
              <div class="table">
                <div class="divTable">
                  <?php while ( have_rows( 'table', 'option' ) ): the_row(); ?>
                  <div class="divTableHeading">
                    <div class="divTableRow">
                      <div class="divTableHead"><p>Объем поставки <br> (паллетность)</p></div>
                      <div class="divTableHead"><p>Стоимость</p></div>
                    </div>
                  </div>
                  <div class="divTableBody">
                    <div class="divTableRow">
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_1_col_1' ); ?></div>
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_1_col_2' ); ?></p></div>
                    </div>
                    <div class="divTableRow">
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_2_col_1' ); ?></p></div>
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_2_col_2' ); ?></p></div>
                    </div>
                    <div class="divTableRow">
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_3_col_1' ); ?></p></div>
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_3_col_2' ); ?></p></div>
                    </div>
                    <div class="divTableRow">
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_4_col_1' ); ?></p></div>
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_4_col_2' ); ?></p></div>
                    </div>
                    <div class="divTableRow">
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_5_col_1' ); ?></p></div>
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_5_col_2' ); ?></p></div>
                    </div>
                  </div>
                  <div class="divTableFoot">
                    <div class="divTableRow tableFootStyle">
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_6_col_1' ); ?></p></div>
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_6_col_2' ); ?></p></div>
                    </div>
                  </div>
                  <?php endwhile; ?>
                </div>
              </div>
              <div class="table-banner">
                <span class="table-banner-subtitle subtitle">Единый тариф на все маркетплейсы <br> в пределах ЦКАД</span>
              </div>
            </div>
            <div class="content-info-col">
              <div class="map-wrapper">
                <div style="position:relative;overflow:hidden;">
                  <a href="https://yandex.ru/maps?utm_medium=mapframe&utm_source=maps"
                     style="color:#eee;font-size:12px;position:absolute;top:0px;">Яндекс Карты</a>
                  <a
                    href="https://yandex.ru/maps/?ll=37.774165%2C55.732927&mode=usermaps&source=constructorLink&um=constructor%3A6ead3f71e04b6091504818e718cd385feacb67957b67ef2e943542b6a251a6a3&utm_medium=mapframe&utm_source=maps&z=9.84"
                    style="color:#eee;font-size:12px;position:absolute;top:14px;">Яндекс Карты — транспорт, навигация,
                    поиск мест</a>
                  <iframe
                    class="map"
                    src="https://yandex.ru/map-widget/v1/?ll=37.774165%2C55.732927&mode=usermaps&source=constructorLink&um=constructor%3A6ead3f71e04b6091504818e718cd385feacb67957b67ef2e943542b6a251a6a3&z=9.84"
                    width="575" height="525" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
        <div class="content tab-content" id="another">
          <div class="content-info">
            <div class="content-info-col">
              <div class="direction">
                <span class="direction-headline">Основные <br>направления</span>
                <div class="direction-desc-wrapper direction-desc-wrapper-tab-another-fix">
                  <p class="direction-desc-el headline-el">1.&nbsp;СберМаркет</p>
                  <p class="direction-desc-el">Пушкино</p>
                  <p class="direction-desc-el">д. Шарапово</p>
                  <p class="direction-desc-el">Рябиновая</p>
                  <p class="direction-desc-el headline-el">2.&nbsp;МВидео</p>
                  <p class="direction-desc-el">Чехов</p>
                  <p class="direction-desc-el">Котельники</p>
                  <p class="direction-desc-el headline-el">3.&nbsp;ВсеИнструменты</p>
                  <p class="direction-desc-el">Домодедово</p>
                  <p class="direction-desc-el">Щербинка</p>
                </div>
              </div>
            </div>
            <div class="content-info-col">
              <div class="table">
                <div class="divTable">
                  <?php while ( have_rows( 'table', 'option' ) ): the_row(); ?>
                  <div class="divTableHeading">
                    <div class="divTableRow">
                      <div class="divTableHead"><p>Объем поставки <br> (паллетность)</p></div>
                      <div class="divTableHead"><p>Стоимость</p></div>
                    </div>
                  </div>
                  <div class="divTableBody">
                    <div class="divTableRow">
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_1_col_1' ); ?></div>
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_1_col_2' ); ?></p></div>
                    </div>
                    <div class="divTableRow">
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_2_col_1' ); ?></p></div>
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_2_col_2' ); ?></p></div>
                    </div>
                    <div class="divTableRow">
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_3_col_1' ); ?></p></div>
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_3_col_2' ); ?></p></div>
                    </div>
                    <div class="divTableRow">
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_4_col_1' ); ?></p></div>
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_4_col_2' ); ?></p></div>
                    </div>
                    <div class="divTableRow">
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_5_col_1' ); ?></p></div>
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_5_col_2' ); ?></p></div>
                    </div>
                  </div>
                  <div class="divTableFoot">
                    <div class="divTableRow tableFootStyle">
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_6_col_1' ); ?></p></div>
                      <div class="divTableCell"><p><?php the_sub_field( 'sub_field_row_6_col_2' ); ?></p></div>
                    </div>
                  </div>
                  <?php endwhile; ?>
                </div>
              </div>
              <div class="table-banner">
                <span class="table-banner-subtitle subtitle">Единый тариф на все маркетплейсы <br> в пределах ЦКАД</span>
              </div>
            </div>
            <div class="content-info-col">
              <div class="map-wrapper">
                <div style="position:relative;overflow:hidden;"><a
                    href="https://yandex.ru/maps?utm_medium=mapframe&utm_source=maps"
                    style="color:#eee;font-size:12px;position:absolute;top:0px;">Яндекс Карты</a><a
                    href="https://yandex.ru/maps/?ll=38.092569%2C55.626336&mode=usermaps&source=constructorLink&um=constructor%3Adb3a8450be7ff9719a640cd62ebfc1ad4d17f1be28a63b76ae4b7096cbe29571&utm_medium=mapframe&utm_source=maps&z=8.93"
                    style="color:#eee;font-size:12px;position:absolute;top:14px;">Яндекс Карты — транспорт, навигация,
                    поиск мест</a>
                  <iframe
                    class="map"
                    src="https://yandex.ru/map-widget/v1/?ll=38.092569%2C55.626336&mode=usermaps&source=constructorLink&um=constructor%3Adb3a8450be7ff9719a640cd62ebfc1ad4d17f1be28a63b76ae4b7096cbe29571&z=8.93"
                    width="575" height="525" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="conditions">
    <?php while ( have_rows( 'сonditions', 'option' ) ): the_row(); ?>
    <div class="conditions-wrapper">
      <div class="conditions-col">
        <div class="conditions-el">
          <span class="subtitle">1.&nbsp;&nbsp;<?php the_sub_field( 'condition_1' ); ?></span>
          <span class="conditions-caption caption"><?php the_sub_field( 'condition_textarea_1' ); ?></span>
        </div>
        <div class="conditions-el">
          <span class="subtitle">2.&nbsp;&nbsp;<?php the_sub_field( 'condition_2' ); ?></span>
          <span class="conditions-caption caption"><?php the_sub_field( 'condition_textarea_2' ); ?></span>
        </div>
        <div class="conditions-el">
          <span class="subtitle">3.&nbsp;&nbsp;<?php the_sub_field( 'condition_3' );  ?></span>
          <span class="conditions-caption caption"><?php the_sub_field( 'condition_textarea_3' ); ?></span>
        </div>
      </div>
      <div class="conditions-col">
        <div class="conditions-el">
          <span class="subtitle">4.&nbsp;&nbsp;<?php the_sub_field( 'condition_4' ); ?></span>
          <span class="conditions-caption caption"><?php the_sub_field( 'condition_textarea_4' ); ?></span>
        </div>
        <div class="conditions-el">
          <span class="subtitle">5.&nbsp;&nbsp;<?php the_sub_field( 'condition_5' ); ?></span>
          <span class="conditions-caption caption"><?php the_sub_field( 'condition_textarea_5' ); ?></span>
        </div>
        <div class="conditions-el">
          <span class="subtitle">6.&nbsp;&nbsp;<?php the_sub_field( 'condition_6' ); ?></span>
          <span class="conditions-caption caption"><?php the_sub_field( 'condition_textarea_6' ); ?></span>
        </div>
        <div class="conditions-el">
          <span class="subtitle">7.&nbsp;&nbsp;<?php the_sub_field( 'condition_7' ); ?></span>
          <span class="conditions-caption caption"><?php the_sub_field( 'condition_textarea_7' ); ?></span>
        </div>
        <div class="conditions-el">
          <span class="subtitle">8.&nbsp;&nbsp;<?php the_sub_field( 'condition_8' ); ?></span>
          <span class="conditions-caption caption"><?php the_sub_field( 'condition_textarea_8' ); ?></span>
        </div>
      </div>
    </div>
    <?php endwhile; ?>
  </section>
  <div class="footer-banner">
    <h2 class="footer-banner-headline">Забираем груз <br class="footer-banner-headline-br"> и сразу везем <br> его на маркетплейс</h2>
  </div>

@endsection

