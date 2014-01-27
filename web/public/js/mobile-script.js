$(document).ready(function(){

	$('.drop-menu').width($('#wrapper').width());

    $('.top-menu-call').click(function(){
        if($(this).next().hasClass('open')){
            $(this).next().slideUp(function(){
                $('.header').css('background-color', 'transparent');
            }).removeClass('open');
        }else{
            $(this).next().slideDown().addClass('open');
            $('.header').css('background-color', '#387112');
        }
        return false;
    });

});

