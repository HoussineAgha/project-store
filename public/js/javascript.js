
$(document).ready(function() {
    $('#discription').summernote();
  });

  // كود السويتشر في صفحة الدفع للسترايب

  $(document).ready(function(){
    $("#credit").click(function(){
      $("#input-strip").show();
    });
    $("#credit").click(function(){
        $("#knetttt").hide();
        $("#cashh").hide();
        $("#paytabss").hide();
      });
  });

// كود السويتشر في صفحة الدفع لمدى

  $(document).ready(function(){
    $("#Knet").click(function(){
      $("#knetttt").show();
    });
    $("#Knet").click(function(){
        $("#input-strip").hide();
        $("#cashh").hide();
        $("#paytabss").hide();
      });
  });

  // كود السويتشر في صفحة الدفع للكاش

  $(document).ready(function(){
    $("#cash").click(function(){
      $("#cashh").show();
    });
    $("#cash").click(function(){
        $("#input-strip").hide();
        $("#knetttt").hide();
        $("#paytabss").hide();
      });
  });
  // كود السويتشر في صفحة الدفع لباي تابس
  $(document).ready(function(){
    $("#paytabs").click(function(){
      $("#paytabss").show();
    });
    $("#paytabs").click(function(){
        $("#input-strip").hide();
        $("#knetttt").hide();
        $("#cashh").hide();
      });
  });

// كود السيليكت في لنوع الشحن في حال كان فري بخفي حقل السعر في حال كان مدفوع بظهر حقل اللي بدي اكتب فيه السعر

$(function() {
    $('#shipping_cost').hide();
    $('#shipping_type').change(function(){
        if($('#shipping_type').val() == 'price_shipping') {
            $('#shipping_cost').show();
        } else {
            $('#shipping_cost').hide();
        }
    });
});
// في صفحة ارسال رسالة عند الادمن في حال اخترنا مستخدم خاص سيظهر مربع لاختيار اسم المستخدم وإلا سيبقى مختفي
$(function() {
    $('#user').hide();
    $('#Choose_Type').change(function(){
        if($('#Choose_Type').val() == 'special') {
            $('#user').show();
        } else {
            $('#user').hide();
        }
    });
});




