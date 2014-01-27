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
    $("body").on("click", "a[rel='facebox'], a[rel='colorbox']",function (event) {
        event.preventDefault();
    $.colorbox({
        href:$(this).attr('href'),
        title:" ",
        previous:true,
        next:true,
        arrowKey:false,
        rel: false,
        current: false,
        opacity:0.8,
        maxWidth: '100%',
        onComplete:function(){$(this).colorbox.resize();},
        open:true});
    return false;
    });
/*
    $("a[rel='facebox'], a[rel='colorbox']").colorbox({
        title:" ",
        previous:true,
        next:true,
        arrowKey:false,
        rel: false,
        current: false,
        opacity:0.8,
        maxWidth: '100%',
        onComplete:function(){$(this).colorbox.resize();}
    });
*/
    $(document).bind("cbox_complete", function(){
        var height = $(window).height() - 100;
        var blockHeight = $(".scroll-block").height();
        if(height <  blockHeight){
            $(".scroll-block").height(height).perfectScrollbar({wheelSpeed: 30, suppressScrollX: true});
        }
        if(typeof(initialize) == "function"){
            initialize();
        }
    });

    $(document).on('click', '.open-comment-form', function(){
        if($('.comment-form').hasClass('opened')){
            $('.comment-form').stop().animate({
                height: 0,
                'padding-top': 0
            }, 300).removeClass('opened');
        }else{
            $('.comment-form').stop().animate({
                height: '265px',
                'padding-top': '27px'
            }, 300).addClass('opened');
        }
        window.setTimeout(function(){$("cbox_complete").colorbox.resize();},350);
        return false;
    });

});

