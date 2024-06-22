$(document).ready(function(){
    $('.menuBurger').click(function(event){
        $('.menuBurger,.menuNav').toggleClass('activeMenu');
        $('body').toggleClass('lock');
    });
});

$(document).ready(function(){
    $('.menuLink').click(function(event){
        $('.menuBurger,.menuNav').toggleClass('activeMenu');
        $('body').toggleClass('lock');
    });
});

// При прокручивании добавляем цвет для header

var scrolled;
window.onscroll = function() {
    scrolled = window.pageYOffset || document.documentElement.scrollTop;
    if(scrolled > 70){
        $(".menu").css({"background": "#000000ab", "transition": "0.4s"})
    }
    if(70 > scrolled){
        $(".menu").css({"background": "none", "transition": "0.4s"})         
    }

}