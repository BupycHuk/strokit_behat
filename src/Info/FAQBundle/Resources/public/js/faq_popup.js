/**
 * Created by Aza on 09.01.14.
 */
$(function(){
    $(document).on('click','.faq_show_popup', function(){
        var path = $(this).attr('href');
        $.ajax({
           url: path,
           success: function(data){
               $('#faq_popup').empty().html(data).dialog({
                    closeText: "",
                    height: 795,
                    width: 930
                   }
               );
           }
        });
    });
});