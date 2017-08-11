$('.c-checkbox').prop('indeterminate', true);
$(document).ready(function() {
    $('.ui.dropdown').dropdown();
});

// Create Developer App
$(".form-wrap").on('submit', function(){
  event.preventDefault();
  $(this).addClass('loading');
});

// Switch App Mode Via Ajax
$(".modetoggle").on('change', function(){
  $('.mode-status').text('Your app is available to the public.');
});

//Ajax Create App
$('.registerapp').on('submit', function(){
  event.preventDefault();
  $(this).addClass('loading');
  var name = $(".appname").val();
  var email = $(".email").val();
  if (name!=''||email!='') {
    $.ajax({
        type: "POST",
        url: "module/createapp.php",
        data: 'name='+ name +'&email='+ email,
				cache: false,
        success: function(data) {
          if (data !== '') {
            $('.registerapp').removeClass('loading');
            window.location.replace(data);
          }
        }
    });
  }
});
