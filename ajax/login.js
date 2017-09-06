$(".login-wrap").on('submit', function(){
  event.preventDefault();
  $(this).addClass('loading');
  var name = $(".u").val();
  var code = $(".p").val();
  var data = 'user_name='+name+'&password='+code;
  $.ajax({
  type: "POST",
  url: "module/login.php",
  data: data,
  success: function(data) {
     console.log(data);
     if (data == 'failed') {
       $('.report').html('<div class="alert alert-danger text-center" role="alert"><strong>Oh snap!</strong> your login details are incorrect, get it right and try again.</div>');
       $('.login-wrap').removeClass('loading');
     } else {
       $('.login-wrap').removeClass('loading');
       window.location.replace(data);
     }
   },
   error: function(data) {
     $('.login-wrap').removeClass('loading');
      $('.report').html('<div class="alert alert-danger text-center" role="alert"><strong>Oh snap!</strong> your login details are incorrect, get it right and try again.</div>');
      console.log(data);
     }
  });
});
