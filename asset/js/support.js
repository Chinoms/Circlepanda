$("input[type='search']").on('keyup', function(){
  var keystring = $(this).val();
  var keylen = keystring.length;
  if (keylen > 2) {
    $(".faqsearch").addClass('loading');
    $(".result").addClass('loading');
    /*
      $.ajax({
          type: "POST",
          url: "support/module/searchfaq.php",
          data: "keyword=" + keystring,
          success: function(data) {
            $(".result").html(data);
             console.log(data);
          }
      });
    */
  } else {
    $(".faqsearch").removeClass('loading');
    $(".result").removeClass('loading');
  }
});
