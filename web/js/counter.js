var h = setInterval(function(){
    $(".counter").each(function(){
        var c = +$(this).data('current') || 0;
        var max = +$(this).data('max');
        if(++c <= max){
             $(this).data('current', c).text(">"+c);
        }
        else $(this).removeClass('counter');
    });
    if(!$(".counter").length){
        clearInterval(h);
    }
 }, 1);