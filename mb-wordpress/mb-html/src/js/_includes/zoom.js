var $ScalebleBg = $(".scaleble-bg"),
    wh = $(window).height(),
    i = 100,
    lastScroll = 0;


if ($("div").is(".editor__bg")||$("div").is(".blogList__bg")) {
    if ($(window).width() <= 768){
        // Подключаем стиль для мобильных
        if ($("div").is(".editor__bg")) {
            $ScalebleBg.css('background-size','auto 100%');
        } else{
            $ScalebleBg.css('background-size','100% auto'); 
        }
    }
    else{
        $ScalebleBg.css('background-size','auto 100%');
    }
}

$(document).scroll(function() {
    if ($("div").is(".editor__bg")||$("div").is(".blogList__bg")) {    
        if( $(document).scrollTop() > ($ScalebleBg.offset().top - wh) ) {
        
            var CurentScroll = $(this).scrollTop();
            
            if (CurentScroll > lastScroll) {
                i = i+0.3;
            } else {
              if (i <= 100) {
                i = 100;
              } else{
                i = i-0.3;
              }
            }
            
            lastScroll = CurentScroll;

            if ($(window).width() <= 768){
                // Подключаем стиль для мобильных
                if ($("div").is(".editor__bg")) {
                    $ScalebleBg.css('background-size', "auto " + i + '%');
                } else{
                    $ScalebleBg.css('background-size', i + '%' + " auto");
                }
            }
            else{
                $ScalebleBg.css('background-size', "auto " + i + '%');
            }
          
        };
    }
    
    
});