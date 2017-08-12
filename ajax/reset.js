$(".searchaccount").on('click', function(){
  event.preventDefault();
  var result = $(".searchresult");
  var q = $(".q").val();
  $.ajax({
      type: "POST",
      url: "../../module/reset/finduser",
      data: "q="+ q,
      success: function(data) {
        if (data == "") {
          $(".report").html('<div class="alert alert-danger text-center" role="alert"><strong>Oh snap!</strong> your password does not match, get it right and try again.</div>');
        } else {
          result.html(data);
        }
      }
  });
});

$(".verify").on('click', function(){
  event.preventDefault();
  var code = $(".verification_field").val();
  if (code == "") {
    $(".report").html('<div class="alert alert-danger text-center" role="alert"><strong>Hey!</strong> you need your verification code, to continue.</div>');
  } else {
    $.ajax({
        type: "POST",
        url: "../../module/reset/verify",
        data: "pin="+ code,
        success: function(data) {
          if (data == "match") {
            window.location.href = "change";
          } else {
            $(".report").html('<div class="alert alert-danger text-center" role="alert"><strong>Uhmmm!</strong> make sure you get the right pin and try again.</div>');
          }
        }
    });
  }
});

$(".changepassword-btn").on('click', function(){
  var code = $(".changepassword").val();
  var re_code = $(".re_changepassword").val();
    $.ajax({
        type: "POST",
        url: "../../module/reset/changepassword",
        data: "newcode="+ code +"&re_newcode="+ re_code,
        success: function(data) {
          if (data == "success") {
            window.location.href = "complete";
          } else if(data == "not match") {
            $(".report").html('<div class="alert alert-danger text-center" role="alert"><strong>Oh snap!</strong> your password does not match, get it right and try again.</div>');
          } else {
            $(".report").html('<div class="alert alert-danger text-center" role="alert"><strong>Oh snap!</strong> your login details are incorrect, get it right and try again.</div>');
          }
        }
    });
});
