// $(function() {
//     var tariffsPrice = $(".tariffsCalcList__price");
//         tariffsPrice1 = $(".tariffsCalcList__price").eq(0);
//         tariffsPrice2 = $(".tariffsCalcList__price").eq(1);
    
//     $( "#slider-range-max" ).slider({
//         range: "min",
//         min: 0,
//         max: 2,
//         value: 1,
//         slide: function( event, ui ) { 
//             $(".value").text(ui.value); 

//             var val = $(".value").text();
//             if( val == 0){
//                 tariffsItem1.addClass("rangeList__item-select"); 
//                 tariffsItem2.removeClass("rangeList__item-select");
//                 tariffsItem3.removeClass("rangeList__item-select");
//                 if($("#swich").prop('checked')) { 
//                     tariffsPrice1.html('1450');
//                     tariffsPrice2.html('2450');
//                 } else{
//                     tariffsPrice1.html('1950');
//                     tariffsPrice2.html('2950');
//                 }
//             } else if( val == 1){
//                 tariffsItem1.removeClass("rangeList__item-select"); 
//                 tariffsItem2.addClass("rangeList__item-select");
//                 tariffsItem3.removeClass("rangeList__item-select");
//                 if($("#swich").prop('checked')) { 
//                     tariffsPrice1.html('1150');
//                     tariffsPrice2.html('2150');
//                 } else{
//                     tariffsPrice1.html('1650');
//                     tariffsPrice2.html('2650');
//                 } 
//             } else if( val == 2){
//                 tariffsItem1.removeClass("rangeList__item-select"); 
//                 tariffsItem2.removeClass("rangeList__item-select");
//                 tariffsItem3.addClass("rangeList__item-select");
//                 if($("#swich").prop('checked')) { 
//                     tariffsPrice1.html('2750');
//                     tariffsPrice2.html('3750');
//                 } else{
//                     tariffsPrice1.html('3250');
//                     tariffsPrice2.html('4250');
//                 }
//             }
//         }
//     });     
    
//     var n = 2;
//     var percent = 100 / n;
    
//     for (var x = 0; x <= n; x++){
        
//         $(".ui-slider" ).append("<span class='dots' style='left:"+ x * percent + "%'></span>");
//     }
// });
