
$(document).ready(function() {
    $('#discription').summernote();
  });

  // كود السويتشر في صفحة الدفع للسترايب

  $(document).ready(function(){
    $("#credit").click(function(){
      $("#dfdf").show();
    });
    $("#credit").click(function(){
        $("#knetttt").hide();
      });
  });

// كود السويتشر في صفحة الدفع  للسترايب

  $(document).ready(function(){
    $("#Knet").click(function(){
      $("#knetttt").show();
    });
    $("#Knet").click(function(){
        $("#dfdf").hide();
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





