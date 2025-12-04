$(document).ready(function() {
  // Инициализация табов
  function initTabs() {
    $(".js-tabs-simple").each(function(){
      if ($(this).find(".is-active").length) {
        var index = $(this).find(".is-active").index();
        $(this).next().find(".js-tabs-simple-content").eq(index).show();
      } else {
        $(this).find("li").eq(0).addClass("is-active");
        $(this).next().find(".js-tabs-simple-content").eq(0).show();
      }
    });
  }
  
  initTabs();
  
  // Обработчик кликов по табам
  $('.js-tabs-simple a').on("click", function() {
    var tabs = $(this).parents(".js-tabs-simple");
    var tabsCont = tabs.next().find(".js-tabs-simple-content");
    var index = $(this).parent().index();
    
    tabs.find("li").removeClass("is-active");
    $(this).parent().addClass("is-active");
    tabsCont.hide();
    tabsCont.eq(index).show();
    
    return false;
  });

  // Обработка загрузки изображений
  function handleFileSelect(evt) {
    var files = evt.target.files;

    for (var i = 0, f; f = files[i]; i++) {
      if (!f.type.match('image.*')) {
        continue;
      }

      var reader = new FileReader();

      reader.onload = (function(theFile) {
        return function(e) {
          var span = document.createElement('span');
          span.innerHTML = ['<img class="thumb" src="', e.target.result,
            '" title="', escape(theFile.name), '"/>'].join('');
          document.getElementById('list').insertBefore(span, null);
        };
      })(f);

      reader.readAsDataURL(f);
    }
  }

  // Проверяем наличие элемента перед добавлением слушателя
  var filesElement = document.getElementById('files');
  if (filesElement) {
    filesElement.addEventListener('change', handleFileSelect, false);
  }

  // AJAX отправка форм
  $("form").submit(function() {
    var form = $(this);
    $.ajax({
      type: "POST",
      url: "demo-mail.php", // Заглушка для демо
      data: form.serialize()
    }).done(function() {
      $('.modal__thankyou').fadeIn();
      $('.overlay').fadeIn();

      setTimeout(function() {
        form.trigger("reset");
        $('.modal').fadeOut();
        $('.overlay').fadeOut();
        $('.modal__thankyou').fadeOut();
      }, 1000);
    });
    return false;
  });

  // Мобильное меню
  $('.hamburger').on('click', function() {
    $('.mobile__box').addClass('mobile__box_open');
  });

  $('.mobile__box_close').on('click', function() {
    $('.mobile__box').removeClass('mobile__box_open');
  });

  // Футер для мобильных устройств
  if ($(window).width() < 768) {
    $('.footer__title-catalog').on('click', function() {
      $('.footer__catalog_wrap').slideToggle();
      $(this).toggleClass('active');
    });
  }

  // Табы "О нас"
  $(".about__tab_item").not(":first").hide();
  $(".about__tabs-wrap .about__tab").click(function() {
    $(".about__tabs-wrap .about__tab").removeClass("active").eq($(this).index()).addClass("active");
    $(".about__tab_item").hide().eq($(this).index()).fadeIn();
  }).eq(0).addClass("active");

  // Табы для товаров
  $(".tab_item_product").not(":first").hide();
  $(".tabs-wrap_product .tab_product").click(function() {
    $(".tabs-wrap_product .tab_product").removeClass("active").eq($(this).index()).addClass("active");
    $(".tab_item_product").hide().eq($(this).index()).fadeIn();
  }).eq(0).addClass("active");

  // Информационные блоки этапов
  $('.steps__info_btn').on('click', function() {
    $(this).next().toggleClass('active');
    $(this).toggleClass('active');
    var currentBox = $(this).parent().find('.steps__info_box');
    $('.steps__info_btn').not(this).removeClass('active');
    $('.steps__info_box').not(currentBox).removeClass('active');
  });

  // Модальные окна
  $('.btn-modal').on('click', function() {
    $('.modal_1').fadeIn();
    $('.overlay').fadeIn();
  });

  $('.btn-modal_2').on('click', function() {
    $('.modal_2').fadeIn();
    $('.overlay').fadeIn();
  });

  $('.overlay, .modal-close').on('click', function() {
    $('.modal').fadeOut();
    $('.overlay').fadeOut();
  });

  // Копирование в буфер обмена
  new ClipboardJS('.btn-copy');

  // Скролл для десктопа
  if ($(window).width() > 1199) {
    $(window).scroll(function() {
      if ($(".home__catalog").length) {
        var distanceTop = $('.home__catalog').offset().top + 40 - $(window).height();

        if ($(this).scrollTop() > distanceTop) {
          $('.bottom_product').addClass('bottom_product-active');
        } else {
          $('.bottom_product').removeClass('bottom_product-active');
        }
      }
    });
  }

  // Слайдер примеров
  $(".examples-slider").owlCarousel({
    loop: false,
    dots: false,
    nav: true,
    margin: 10,
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
        stagePadding: 0
      }
    }
  });

  // Слайдер отзывов
  $(".reviews__wrap").owlCarousel({
    loop: false,
    dots: false,
    nav: true,
    margin: 10,
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
        stagePadding: 0
      }
    }
  });

  // Слайдер видео-отзывов
  $(".video-review_slider").owlCarousel({
    loop: true,
    dots: false,
    nav: true,
    items: 2,
    margin: 40,
    navClass: ['owl-prev', 'owl-next'],
    navText: false,
    responsive: {
      320: {
        items: 1,
        loop: true,
        margin: 10,
        center: true,
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
        stagePadding: 100
      }
    }
  });

  // Слайдер каталога товаров
  $('#sl1').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    pauseOnHover: false,
    autoplay: false,
    autoplaySpeed: 4000,
    fade: true,
    arrows: true,
    dots: true,
    adaptiveHeight: true,
    responsive: [
      {
        breakpoint: 771,
        settings: {
          adaptiveHeight: true
        }
      }
    ]
  });

  // Стилизация select
  $('.select-styler').styler();
});

// Дополнительная инициализация
$(document).ready(function() {
  $('.steps_2, .steps_3, .steps_4').css('opacity', '1');
  
  var owl = $('.reviews__wrap');
  
  // Переход к отзывам
  $(".gwx-rev").click(function(event) {
    event.preventDefault();
    owl.trigger('to.owl.carousel', [$(this).index(), 300]);

    $("html, body").animate({
      scrollTop: $("#rev").offset().top + "px"
    }, {
      duration: 1500,
      easing: "swing"
    });
  });
});








