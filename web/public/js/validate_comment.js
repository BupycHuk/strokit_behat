/**
 * Created by Aza on 14.01.14.
 */
$(document).ready(function(){
    $('#form_comment form').validate({
       rules: {
            info_faqbundle_faq_email: {
                required: true,
                email: true
            },
            info_faqbundle_faq_phone:{
                required: true
            },
            info_faqbundle_faq_content:{
                required: true
            }
        },
        errorPlacement: function(error,element) {
            return true;
        },
        submitHandler: function(form){
           var formUrl = $(form).attr("action");
           var formData = $(form).serialize();
           $.ajax({
             url: formUrl,
             type: "POST",
             data: formData,
             success: function (data) {
                 $('.comment-form').stop().animate({
                     height: 0,
                     'padding-top': 0
                 }, 300).removeClass('opened');
                 $("#comment_sended").html("<h2>Сообщение отправлено</h2>");//TODO: Сделать мультиязычной
                 $(".open-comment-form").css({backgroundColor: "#8DB1EC", textDecoration: "none", cursor: "default"}).prop("disabled", true);
             },
             error: function () {
                 alert("error");
             }
        });
        }
    });

    $(".comment").jTruncate({
        length: 500,
        moreText: "смотреть полностью",
        lessText: "скрыть",
        ellipsisText: "",
        moreAni: 1000,
        lessAni: 1000
    });
});
