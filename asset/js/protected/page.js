var uploadbtn = $(".upload-cover-icon");
$(".page-cover").on('mouseenter', function(){
  uploadbtn.addClass('active');
  uploadbtn.css({
    'font-size':'16px'
  });
  uploadbtn.html('<span>\
  <input type="file" name="uploadphoto" class="hide" accept="image/*" onchange="loadFile(event)">\
  <i class="fa fa-camera"></i> change cover\
  </span>');
});

$(".page-cover").on('mouseleave', function(){
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

$(".p-opt").on('click', function(){
  $('.p-opt-dropdown').toggleClass('hide');
});
