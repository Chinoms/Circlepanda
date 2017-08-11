var uploadbtn = $(".upload-cover-icon");
$(".profile-cover").on('mouseenter', function(){
  uploadbtn.addClass('active');
  uploadbtn.css({
    'font-size':'16px'
  });
  uploadbtn.html('<span>\
  <input type="file" name="uploadphoto" class="hide" accept="image/*" onchange="loadFile(event)">\
  <i class="fa fa-camera"></i> upload photo\
  </span>');
});

$(".profile-cover").on('mouseleave', function(){
  uploadbtn.removeClass('active');
  uploadbtn.css({
    'font-size':'24px'
  });
  uploadbtn.html('<span>\
  <input type="file" name="uploadphoto" class="hide" accept="image/*" onchange="loadFile(event)">\
  <i class="fa fa-camera"></i>\
  </span>');
});

var tints = $(".p-tint-bottom-layer, .p-tint-top-layer");
var all = $(".about-holder, .p-tint-bottom-layer, .p-tint-top-layer");

$(".abt-txt").on('click', function(){
  all.fadeIn();
});

// On hit Esc key, fade out wrapper
$(document).keyup(function(e){
  if (e.which == 27) {
    all.fadeOut(300);
  }
});

$(document).ready(function()
{
    tints.mouseup(function(e)
    {
        var subject = $(".about-holder");
        if(e.target.id != subject.attr('class') && !subject.has(e.target).length) {
            all.fadeOut();
        }
    });
});

// Customize Scrollbar
$(document).ready(function() {
  $(".about-holder").niceScroll({
    cursorcolor:"transparent",
    scrollspeed :"5",
    cursorborder:"1px solid transparent",
    horizrailenabled: "false",
    cursorborderradius: "0px"
  });
});


//
$(".p-opt").on('click', function(){
  $('.p-opt-dropdown').toggleClass('hide');
});

/*
  For Cover Photo
  Jquery Behind It
*/
$('img.coverquery').on('select', function(){
  alert(1);
  $(".coverquerybtn").removeClass('hide');
  /*if ($('img.coverquery').attr('src') !== "") {

  } else {

  }*/
});
