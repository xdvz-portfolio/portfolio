new WOW().init();

$(document).ready(function(){

	// new SmoothScroll();

	$(window).on("load",function(){		
		$(".horiz-scroll").mCustomScrollbar({
			axis:"x",
			advanced:{autoExpandHorizontalScroll:true},
			mouseWheel:{scrollAmount: '200' } 
		});
	});

	horiz_scroll();

	function MenuActive() {
		if ($("div").is(".posibility")) {	
			$('.navbar__item').eq(1).children('a').addClass('nav__active');
		} else if ($("div").is(".featuresMusic")){
			$('.navbar__item').eq(2).children('a').addClass('nav__active');
		} else if ($("div").is(".tariffs__fs")){
			$('.navbar__item').eq(3).children('a').addClass('nav__active');
		} else if ($("div").is(".helpFs")){
			$('.navbar__item').eq(4).children('a').addClass('nav__active');
		} else if ($("div").is(".input")) {	
			$('.exit').children('a').addClass('nav__active');
		}
	};

	MenuActive();
	blogItem();

	function cookie() {
		var accept = Cookies.get('accept');

		if (accept == 'true') {
	    	$('.cookies').hide();
		} else {
	    	setTimeout("document.querySelector('.cookies').style.display='block'", 1000);
		}
	};

	$('#cookie-ok').click(function(e){
		e.preventDefault();
	    $('.cookies').fadeOut();
	    Cookies.set('accept', 'true');
	});


	cookie();

	function CheckScrollDown() {
		if ($(window).scrollTop() > 1) {
			$('.navbar').addClass('navbar_scrolled');
			$('.navbar__mob').addClass('navbar_scrolled');
		} else {
			$('.navbar').removeClass('navbar_scrolled');
			$('.navbar__mob').removeClass('navbar_scrolled');
		}
	}

	window.addEventListener('scroll', CheckScrollDown);

	CheckScrollDown();

	var swiper = new Swiper('.blog-slider', {
      spaceBetween: 30,
      effect: 'fade',
      loop: true,
      mousewheel: {
        invert: false,
      },
      // autoHeight: true,
      pagination: {
        el: '.blog-slider__pagination',
        clickable: true,
      }
    });

    var swiper1 = new Swiper('.collectionList__slider', {
      speed: 500,
      centeredSlides: true,
      loop: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      mousewheel: {
        invert: false,
      },
      pagination: {
        el: '.collectionList__pagination',
        clickable: true,
      }
    });   

    // var swiper2 = new Swiper('.playerList__slider', {
    //   speed: 500,
    //   centeredSlides: true,
    //   loop: true,
    //   autoplay: {
    //     delay: 2500,
    //     disableOnInteraction: false,
    //   },
    //   mousewheel: {
    //     invert: false,
    //   },
    //   pagination: {
    //     el: '.playerList__pagination',
    //     clickable: true,
    //   }
    // });



	var tariffsPrice1 = $(".tariffsCalcList__price").eq(0),
		tariffsPrice2 = $(".tariffsCalcList__price").eq(1);
	

	$(".navbar__trigger").click(function(){
	    $('.navbar').toggleClass('open');
	    $('.logo__block').toggleClass('none');
	    $('.navbar__trigger').toggleClass('close');
	    $('.navbar__mob').toggleClass('navbar_scrollednone');
	    $('body').toggleClass('noscroll');
	});

	$('.show').click(function() {
	  $(this).children('.show_icon').toggleClass('active_show');
	  $(this).next('.questionsList__text').toggleClass('questionsList__textactive');
	});

	$('.swicher__Item').on('click', function(){
        $('.year').toggleClass('tariff_active');
		$('.quart').toggleClass('tariff_active');

		var val = parseInt($(".value").text());
		if($("#swich").prop('checked')) {  
			$('.tariffsCalcList__sale > span.sale').html('Экономия 10%');
            if (val === 2) {
				tariffsPrice1.html('<span>3250</span>');
				tariffsPrice2.html('<span>4250</span>');
			} else if (val === 1) {
				tariffsPrice1.html('<span>1650</span>');
				tariffsPrice2.html('<span>2650</span>');
			} else if (val === 0) {
				tariffsPrice1.html('<span>1950</span>');
				tariffsPrice2.html('<span>2950</span>');
			}
        } else {
        	$('.tariffsCalcList__sale > span.sale').html('Экономия 20%');
			if (val === 2) {
				tariffsPrice1.html('<span>2750</span>');
				tariffsPrice2.html('<span>3750</span>');
			} else if (val === 1) {
				tariffsPrice1.html('<span>1150</span>');
				tariffsPrice2.html('<span>2150</span>');
			} else if (val === 0) {
				tariffsPrice1.html('<span>1450</span>');
				tariffsPrice2.html('<span>2450</span>');
			}
        }
	});

	$('#torg').on('click', function(e){
		e.preventDefault();
		$('#torg').addClass('tariffsMob__active');
		$('#rest').removeClass('tariffsMob__active');
		$('#sport').removeClass('tariffsMob__active');
		$(".value").text(1);
		RefreshTariffUrl();
		if($("#swich").prop('checked')) {
			$('.tariffsCalcList__sale > span.sale').html('Экономия 20%');
			tariffsPrice1.html('<span>1150</span>');
			tariffsPrice2.html('<span>2150</span>');
        } else {
        	$('.tariffsCalcList__sale > span.sale').html('Экономия 10%');
			tariffsPrice1.html('<span>1650</span>');
			tariffsPrice2.html('<span>2650</span>');
        }
		$('html, body').animate({ scrollTop: $("#range-scroll").offset().top - 30 }, 500);
      	return false;
	});

	$('#rest').on('click', function(e){
		e.preventDefault();
		$('#torg').removeClass('tariffsMob__active');
		$('#rest').addClass('tariffsMob__active');
		$('#sport').removeClass('tariffsMob__active');
		$(".value").text(0);
		RefreshTariffUrl();
		if($("#swich").prop('checked')) {
			$('.tariffsCalcList__sale > span.sale').html('Экономия 20%');
			tariffsPrice1.html('<span>1450</span>');
			tariffsPrice2.html('<span>2450</span>');
        } else {
        	$('.tariffsCalcList__sale > span.sale').html('Экономия 10%');
			tariffsPrice1.html('<span>1950</span>');
			tariffsPrice2.html('<span>2950</span>');
        }
        $('html, body').animate({ scrollTop: $("#range-scroll").offset().top - 30 }, 500);
      	return false;
	});

	$('#sport').on('click', function(e){
		e.preventDefault();
		SendBtnClick_test();
	});

	$('#sport').on('click', function(e){
		e.preventDefault();
		$('#torg').removeClass('tariffsMob__active');
		$('#rest').removeClass('tariffsMob__active');
		$('#sport').addClass('tariffsMob__active');
		$(".value").text(2);
		RefreshTariffUrl();
		if($("#swich").prop('checked')) {
			$('.tariffsCalcList__sale > span.sale').html('Экономия 20%');
			tariffsPrice1.html('<span>2750</span>');
			tariffsPrice2.html('<span>3750</span>');
        } else {
        	$('.tariffsCalcList__sale > span.sale').html('Экономия 10%');
			tariffsPrice1.html('<span>3250</span>');
			tariffsPrice2.html('<span>4250</span>');
        }
        $('html, body').animate({ scrollTop: $("#range-scroll").offset().top - 30 }, 500);
      	return false;
	});	

	$('#rules').on('change', function() {
	    if ($(this).prop('checked')) {
	        $('#submitForm').removeClass('disabled');
	    } else {
	        $('#submitForm').addClass('disabled');
	    }
	});

	// $('.BlogText__parallax').parallax({
	// 	imageSrc: 'img/blog/BlogText__img.png',
 //   		speed: 1.0
 // 	});

	// $( "#swich" ).on("change", function() {
	// 	$('.year').toggleClass('tariff_active');
	// 	$('.mounth').toggleClass('tariff_active');
	// 	if ($("input[type=range]").val("3")) {
	// 		$(".tariffsCalcList__price").eq(0).html('2750');
	// 	    $(".tariffsCalcList__price").eq(1).html('3750');
	// 	}
 //       	if ($("input[type=range]").val("2")) {
	// 		$(".tariffsCalcList__price").eq(0).html('1150');
	// 	    $(".tariffsCalcList__price").eq(1).html('2150');
	// 	}
	// 	if ($("input[type=range]").val("1")) {
	// 		$(".tariffsCalcList__price").eq(0).html('1450');
	// 	    $(".tariffsCalcList__price").eq(1).html('2450');
	// 	}
 //    });

   	

	// $('.featuresList__slider').slick({
	//     dots: true,
	//     infinite: true,
	//     speed: 1500,
	//     slidesToShow: 2,
	// 	slidesToScroll: 2,
	//     prevArrow: false,
	//     nextArrow: false,
	//     responsive: [
	// 	    {
	// 	      breakpoint: 768,
	// 	      settings: {
	// 	        slidesToShow: 1,
	// 	        slidesToScroll: 1,
	// 	      }
	// 	    }]
 // 	 });

	// $('.rangeList__slider').slick({
	//     dots: true,
	//     infinite: true,
	//     speed: 1500,
	//     slidesToShow: 2,
	// 	slidesToScroll: 1,
	//     prevArrow: false,
	//     nextArrow: false,
	//     responsive: [
	// 	    {
	// 	      breakpoint: 768,
	// 	      settings: {
	// 	        slidesToShow: 1,
	// 	        slidesToScroll: 1,
	// 	      }
	// 	    }]
 // 	 });

	$('.clientsList__slider').slick({
	    infinite: true,
	    speed: 500,
	    autoplay: true,
	    slidesToShow: 4,
		slidesToScroll: 1,
	    prevArrow: false,
	    nextArrow: false,
	    responsive: [
		{
		    breakpoint: 480,
		    settings: {
		      slidesToShow: 2,
		      slidesToScroll: 1,
		   	}
		}]
 	 });

	// $('.posibilitySlider__list').slick({
	//     dots: true,
	//     infinite: true,
	//     speed: 1500,
	//     slidesToShow: 2,
	// 	slidesToScroll: 1,
	//     prevArrow: false,
	//     nextArrow: false,
	//     responsive: [
	// 	    {
	// 	      breakpoint: 768,
	// 	      settings: {
	// 	        slidesToShow: 1,
	// 	        slidesToScroll: 1,
	// 	      }
	// 	    }]
 // 	 });

	// $('.stepSlider__list').slick({
	//     dots: true,
	//     infinite: true,
	//     speed: 1500,
	//     slidesToShow: 2,
	// 	slidesToScroll: 1,
	//     prevArrow: false,
	//     nextArrow: false,
	//     responsive: [
	// 	    {
	// 	      breakpoint: 768,
	// 	      settings: {
	// 	        slidesToShow: 1,
	// 	        slidesToScroll: 1,
	// 	      }
	// 	    }]
 // 	 });


	tabs();

	$('[data-scroll-to]').click( function(){ 
	    var scroll_el = $(this).attr('href'); 
	    if ($(scroll_el).length != 0) {
	    $('html, body').animate({ scrollTop: $(scroll_el).offset().top - 125 }, 500);
	    }
	        console.log($(scroll_el).offset().top);
	    return false;
 	 }); 

	Show();

	$(function(){
	    if ($(window).width() <= 1200){
	        // Подключаем стиль для мобильных
	        $(".playerList").addClass('horiz-scroll');   
	        $(".tariffsCalcList").addClass('horiz-scroll');   
	    }
	    else{
	        $(".playerList").removeClass('horiz-scroll');   
	        $(".tariffsCalcList").removeClass('horiz-scroll');   
	    }
	});
});



function share() {

	var share = $('.share')

	setTimeout(function(){
	  share.classList.add("hover");
	}, 2000);

	setTimeout(function(){
	  share.classList.remove("hover");
	}, 3000);
}
function Show() {
	$('.show').on('click', function () {
 		if ($(this).children('.questions').prop("checked")) {	
		  	$(this).children('.show_icon').removeClass('active_show');
		  	$(this).next('.questionsList__text').removeClass('questionsList__textactive');
		  	$(this).children('.questions').prop('checked', false);
 		} else {
 			$(this).children('.show_icon').addClass('active_show');
		  	$(this).next('.questionsList__text').addClass('questionsList__textactive');
			$(this).children('.questions').prop('checked', true);
 		}
	});

}

function tabs() {
  $('[data-tabs]').on('click', function(event) {
    event.preventDefault();
    var elid=$(this).attr('href');
    
    $('[data-tabs]').parent().removeClass('quest-active');
    $(this).parent().addClass('quest-active');

    $('[data-tabs-pane]').removeClass('answer-active');
    $('.helpList__fs').css('display', 'none');
    $(elid).addClass('answer-active');

  });

  $('[data-tabs-help]').on('click', function(event) {
    event.preventDefault();
    var elid=$(this).attr('href');
    
    $('[data-tabs-help]').parent().removeClass('help-active');
    $(this).parent().addClass('help-active');

    $('[data-tabs-pane-help]').removeClass('help-active');
    $('[data-tabs-pane]').removeClass('answer-active');
    $(elid).addClass('help-active');
    $('.helpList__fs').css('display', 'block');

  });
}

function getFormData($form){
	var unindexed_array = $form.serializeArray();
	var indexed_array = {};

	$.map(unindexed_array, function(n, i){
		indexed_array[n['name']] = n['value'];
	});

	return indexed_array;
}

function LoadAnim(id, path, speed) {
	var animation = bodymovin.loadAnimation({
		container: document.getElementById(id), // Required
		path: path,
		renderer: 'svg',
		loop: true,
		autoplay: false,
	});
	animation.setSpeed(speed);
	animation.setDirection(1);

	return animation;
}

function SendBtnClick() {
	var msgContainer = $('.messageContainer');
	var sendContainer = $('.sendContainer');

	msgContainer.css({
		'z-index': '-1',
		'opacity': '0'
	});
	sendContainer.css({
		'z-index': '1',
		'opacity': '1'
	});
	$('.title_anim-1').addClass('title_anim-1-click');
	$('.title_anim-2').addClass('title_anim-2-click');
	$('#SentSuccess').css('display', 'block');
	$('#SentSuccess2').addClass('SentSuccess2-click');
	if ($(window).width() <= 768) {
		msgContainer.css({
			'display': 'none',
		});
		$('.messageList').css({
			'height': 'auto',
		});
		sendContainer.css({
			'position': 'relative',
			'height': 'auto',
		});
	}
}

function SendBtnClick_test() {
	var msgContainer = $('.messageContainer');
	var sendContainer = $('.sendContainer');

	msgContainer.css({
		'z-index': '-1',
		'opacity': '0'
	});
	sendContainer.css({
		'z-index': '1',
		'opacity': '1'
	});
	$('.title_anim-1').addClass('title_anim-1-click');
	$('.title_anim-2').addClass('title_anim-2-click');
	$('#SentSuccess').css('display', 'block');
	$('#SentSuccess2').addClass('SentSuccess2-click');
	if ($(window).width() <= 768) {
		msgContainer.css({
			'display': 'none',
		});
		$('.messageList').css({
			'height': 'auto',
		});
		sendContainer.css({
			'position': 'relative',
			'height': 'auto',
		});
	}
};

function blogItem() {
    $(".blogList__item").slice(0, 3).css('display', 'block');
    $("#loadMore").on('click', function (e) {
        e.preventDefault();
        $(".blogList__item:hidden").slice(0, 3).css('display', 'block');
        if ($(".blogList__item:hidden").length == 0) {
            $("#load").fadeOut('slow');
        }
        // $('html,body').animate({
        //     scrollTop: $(this).offset().top
        // }, 1500);
    });
};

function horiz_scroll() {
	if ($(window).width() <= 1200) {
		$('.tariffsCalcList').addClass('horiz-scroll');
	} 
}
