@extends('layouts.app')

@section('content')
  {{-- Hero Banner Section --}}
  <section class="carousel">
    <picture>
      <source
        srcset="@asset('images/hero-banner-mobile.png')"
        media="(max-width: 550px)"
      />
      <source
        srcset="@asset('images/hero-banner-tablet.png')"
        media="(max-width: 850px)"
      />
      <img
        src="@asset('images/hero-banner-full.png')"
        alt="Живая изгородь"
        class="hero-banner"
      />
    </picture>
  </section>

  {{-- About Section --}}
  <section id="about" class="about">
    <div class="container">
      <div class="about-headline">
        <div class="about-headline__row">
          <h2><span class="headline-prefix">О НАС</span>От минимального участия и бюджета,</h2>
        </div>
        <div class="about-headline__row">
          <h2>до комплексного сервиса по уходу за изгородью</h2>
        </div>
      </div>
      <div class="about-desc">
        <p>Здесь описательный текст о компании, о преимуществах<br />
           Наша компания предлагает полный спектр услуг по созданию и обслуживанию живых изгородей.<br />
           Мы используем только качественные материалы и современные технологии.<br />
           Индивидуальный подход к каждому клиенту - наш главный принцип работы.<br />
           Гарантируем качество и долговечность наших изделий.</p>
      </div>
    </div>
  </section>

  {{-- Products Section (Desktop) --}}
  <section id="products" class="products">
    <div class="container">
      @php
        $products = [
          [
            'title' => 'Готовая живая изгородь',
            'description' => 'Готовое решение для быстрого озеленения участка',
            'features' => ['Готовая изгородь', 'Сорт ивы Премиум', 'Быстрая установка'],
            'price' => '1000'
          ],
          [
            'title' => 'Изгородь под заказ',
            'description' => 'Индивидуальное решение для вашего участка',
            'features' => ['Индивидуальный проект', 'Выбор сорта ивы', 'Любая форма'],
            'price' => '1500'
          ],
          [
            'title' => 'Декоративная изгородь',
            'description' => 'Оригинальное украшение для вашего сада',
            'features' => ['Уникальный дизайн', 'Декоративные элементы', 'Высокая эстетика'],
            'price' => '2000'
          ]
        ];
      @endphp

      @foreach($products as $product)
        <div class="products-block">
          <h2>{{ $product['title'] }}</h2>
          <p>{{ $product['description'] }}</p>
          <div class="products-block-bullet__wrapper">
            @foreach($product['features'] as $feature)
              <div class="products-block-bullet">
                <p>{{ $feature }}</p>
              </div>
            @endforeach
          </div>
          <div class="products-block-cta__wrapper">
            <a href="#" class="cta-click">
              <div class="products-block-cta button">Оставить заявку</div>
            </a>
            <div class="products-block-cta-price">от {{ $product['price'] }} ₽</div>
          </div>
        </div>
      @endforeach
    </div>
  </section>

  {{-- Products Section (Mobile) --}}
  <section id="products-mobile" class="products-mobile">
    <div class="container">
      <div class="products-block-mobile">
        @foreach($products as $product)
          <div class="products-block-mobile-item">
            <div class="products-block-mobile__image">
              <h2>{{ $product['title'] }}</h2>
            </div>
            <p class="products-block-mobile__desc">{{ $product['description'] }}</p>
            <div class="products-block-mobile__bullet-wrapper">
              @foreach($product['features'] as $feature)
                <div class="products-block-mobile__bullet">{{ $feature }}</div>
              @endforeach
            </div>
            <div class="products-block-mobile__cta-wrapper">
              <div class="products-block-mobile__cta-price">от {{ $product['price'] }} ₽</div>
              <a href="#" class="cta-click">
                <div class="products-block-mobile__cta-button button">Оставить заявку</div>
              </a>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- Services Section --}}
  <section id="services" class="services">
    <div class="container">
      <div class="services__header">
        <div class="services__header-column"><span class="headline-prefix">УСЛУГИ</span><h2>ОБСЛУЖИВАНИЕ ИЗГОРОДЕЙ</h2></div>
        <div class="services__header-column">
          <a href="#" class="cta-click">
            <div class="services-cta button">ОСТАВИТЬ ЗАЯВКУ</div>
          </a>
        </div>
      </div>
      <div class="services-item__wrapper">
        @php
          $services = [
            [
              'image' => 'services-item-1.png',
              'title' => 'ОБРЕЗКА',
              'price' => '1000'
            ],
            [
              'image' => 'services-item-2.png',
              'title' => 'ФОРМИРОВАНИЕ',
              'price' => '1000'
            ],
            [
              'image' => 'services-item-3.png',
              'title' => 'УДОБРЕНИЕ',
              'price' => '1000'
            ],
            [
              'image' => 'services-item-4.png',
              'title' => 'МУЛЬЧИРОВАНИЕ',
              'price' => '1000'
            ]
          ];
        @endphp
        <div class="services-item__column">
          <div class="services-item">
            <img src="@asset('images/services-item-1.png')" alt="Обрезка" class="services-item__img">
            <div class="services-item-desc">
              <h3>ОБРЕЗКА</h3>
              <span class="services-item-price text-2">ОТ 1000 ₽</span>
            </div>
          </div>
          <div class="services-item">
            <img src="@asset('images/services-item-2.png')" alt="Формирование" class="services-item__img">
            <div class="services-item-desc">
              <h3>ФОРМИРОВАНИЕ</h3>
              <span class="services-item-price text-2">ОТ 1000 ₽</span>
            </div>
          </div>
        </div>
        <div class="services-item__column">
          <div class="services-item">
            <img src="@asset('images/services-item-3.png')" alt="Удобрение" class="services-item__img">
            <div class="services-item-desc">
              <h3>УДОБРЕНИЕ</h3>
              <span class="services-item-price text-2">ОТ 1000 ₽</span>
            </div>
          </div>
          <div class="services-item">
            <img src="@asset('images/services-item-4.png')" alt="Мульчирование" class="services-item__img">
            <div class="services-item-desc">
              <h3>МУЛЬЧИРОВАНИЕ</h3>
              <span class="services-item-price text-2">ОТ 1000 ₽</span>
            </div>
          </div>
        </div>
      </div>
      <div class="services-cta__mobile-container">
        <a href="#" class="cta-click">
          <div class="button services-cta__mobile">ОСТАВИТЬ ЗАЯВКУ</div>
        </a>
      </div>
    </div>
  </section>

  {{-- Contacts Section --}}
  <section id="contacts" class="contacts">
    <div class="container">
      <h2>КОНТАКТЫ</h2>
      <div class="contacts-info">
        <div class="contacts-info-item">
          <span class="contacts-info__headline">Адрес</span>
          <p>Москва, ул. Садовая, д.10</p>
        </div>
        <div class="contacts-info-item">
          <span class="contacts-info__headline">Телефон</span>
          <p>+7 (999) 123-45-67</p>
        </div>
        <div class="contacts-info-item">
          <span class="contacts-info__headline">Электронная почта</span>
          <p>info@example.com</p>
        </div>
      </div>
      <div class="contacts-map">
        <script type="text/javascript"
                charset="utf-8"
                async
                src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A3d9b3aa973695d3a5c51550af9ef3fc3310e43e5fd19ef60318c00bb98ecb3c6&amp;width=1920&amp;height=415&amp;lang=ru_RU&amp;scroll=false"
        >
        </script>
      </div>
    </div>
  </section>
@endsection
