$(document).ready(function(){

	$('.has-child').hover(function(){
        if($(this).hasClass('hovered')){
            $(this).removeClass('hovered').children('.drop-menu').stop().slideToggle(300);
        }else{
            $(this).addClass('hovered').children('.drop-menu').stop().slideToggle(300);
        }
    });

    $('.white-block .inner-block').hover(function(){
        if($(this).hasClass('hovered')){
            $(this).removeClass('hovered').children('.img').css('top', 0);
            $(this).children('h2').css('bottom', '13px');
        }else{
            $(this).addClass('hovered').children('.img').css('top', -$(this).height());
            $(this).children('h2').css('bottom', -$(this).height());
            $(this).children('.img').stop().animate({
                top: '0'
            }, 300);
            $(this).children('h2').stop().animate({
                bottom: '13px'
            }, 300);
        }
    });

    $('.color-block').hover(function(){
        if($(this).hasClass('hovered')){
            $(this).removeClass('hovered').children('img').css('top', 0);
            $(this).children('h2').css('top', '34%');
        }else{
            $(this).addClass('hovered').children('img').css('top', -$(this).height());
            $(this).children('h2').css('top', '100%');
            $(this).children('img').stop().animate({
                top: '0'
            }, 300);
            $(this).children('h2').stop().animate({
                top: '34%'
            }, 300);
        }
    });

});

