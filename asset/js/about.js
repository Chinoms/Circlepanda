$(".menu a").on('click', function(){
  $('.menu a').removeClass('active');
  $(this).addClass('active');
});

$(document).ready(function() {
    $('.ui.dropdown').dropdown();
});

$('.more_info').on('click', function(){
  var career_id = $(this).attr('data-id');
  $.ajax({
      type: "POST",
      url: "../module/fetchcareer",
      data: "c_id="+ career_id,
      success: function(data) {
        var obj = JSON.parse(data);
        var id = obj.career_id;
        var title = obj.career_title;
        var app = obj.career_app;
        var about = obj.career_about;
        var date = obj.career_date;
        // Inserting data
        $(".ins.head").text(title);
        $(".ins.tag").text(app);
        $(".modal-more-left p").text(about);
        $(".id").val(id);
      }
  });
  $('.modal-more').removeClass('hide');
});

//On hit Esc key, fade out wrapper
var cancle = $(".cncl").click(function(){
  $('.modal-more').addClass('hide');
});

$(document).keyup(function(e) {
  if (e.which == 27) {
    $('.modal-more').addClass('hide');
  }
});

$(document).ready(function() {
    $('body').mouseup(function(e) {
        if(e.target.id != $('.modal-more').attr('class') && !$('.modal-more').has(e.target).length) {
            $('.modal-more').addClass('hide');
        }
    });
});


$(".modal-more-right").on('submit', function(){
  event.preventDefault();
  var id = $(".id").val();
  var name = $(".name").val();
  var email = $(".email").val();
  var gender = $(".gender option:selected").text();
  var country = $(".country option:selected").text();
  var state = $(".state option:selected").text();
  var url = $(".url").val();
  var about = $(".about").val();

  $.ajax({
      type: "POST",
      url: "../module/applycareer",
      data: "id="+ id+"&name="+ name+"&email="+ email+"&gender="+ gender+"&country="+ country+"&state="+ state+"&url="+ url+"&about="+ about,
      async: false,
      success: function(data) {
        if (data == "success") {
          $(".report").html('<div class="ui message green"><strong>Cool!</strong> Application successful, we\'d get back to you shortly</div>');
        } else {
          $(".report").html('<div class="ui message red"><strong>Oh snap!</strong> Application failed, try again</div>');
        }
      }
  });
});
