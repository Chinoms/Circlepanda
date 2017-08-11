
/* Date */
$(document).ready(function(){
   var $datepicker1 =  $( "#datepicker1" );
   var $datepicker2 =  $( "#datepicker2" );
   $datepicker1.datepicker();
   $datepicker2.datepicker({
        onClose: function() {
           var fromDate = $datepicker1.datepicker('getDate');
           var toDate = $datepicker2.datepicker('getDate');
           // date difference in millisec
           var diff = new Date(toDate - fromDate);
           // date difference in days
           var days = diff/1000/60/60/24;

           document.getElementById('diff').value = days;
       }
   });
});

$(document).ready(function() {
    $('.ui.dropdown').dropdown();
});

/* Submit Step One */
$(".btn").on('click', function(){
  $('.ad_midform_wrapper.form').addClass('loading');
  var adtype = $(this).attr('data-type');
  $.ajax({
      type: "POST",
      url: "../module/ad/type.php",
      data: "adtype=" + adtype,
      success: function(data) {
        $('.ad_midform_wrapper.form').removeClass('loading');
        window.location.replace(data);
      }, error: function(data) {
        $('.ad_midform_wrapper.form').removeClass('loading');
        console.log(data);
      }
  });
});
