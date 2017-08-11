var all = $(".tint-toplayer, .tint-bottomlayer, .first-create-wrap, .last-create-wrap");
var tinted = $(".tint-toplayer, .tint-bottomlayer");
var wrap = $('.first-create-wrap');
var wrap_second = $(".last-create-wrap");
var bothwrap = $(".first-create-wrap, .last-create-wrap");

$(".toggle-modal").on('click', function(){
  event.preventDefault();
  tinted.fadeIn();
  wrap.slideDown(500);
});

//On hit Esc key, fade out wrapper
var cancle = $(".cncl").click(function(){
  tinted.fadeOut(300);
  wrap.hide();
});

$(document).keyup(function(e) {
  if (e.which == 27) {
    tinted.fadeOut(300);
    all.hide();
  }
});

$(document).ready(function() {
    tinted.mouseup(function(e) {
        if(e.target.id != qwrap.attr('class') && !bothwrap.has(e.target).length) {
            all.fadeOut();
        }
    });
});


$(".input-c").focus(function(){
  $(this).css({
    'border-bottom': '1px solid',
    'border-color': '#4C9ED9'
  });
});

$(".input-c").blur(function(){
  $(this).css({
    'border-bottom': '1px solid',
    'border-color': '#CCC'
  });
});

$(".next-btn").click(function(){
  wrap.fadeOut(100);
  wrap_second.slideDown(500);
});

$(".bck").click(function(){
  wrap.slideDown(500);
  wrap_second.fadeOut(100);
});

//Get selected color and Insert into hidden input fields for channels
$(".collorballs").each(function(){
  $(this).on('click', function(){
    var channel = $(this).attr('title');
    $(".color-channel").attr('value', channel);
  });
});

//Get selected color and Insert into hidden input fields collection
$(".collorballs").each(function(){
  $(this).on('click', function(){
    var collection = $(this).attr('title');
    $(".color-collection").attr('value', collection);
  });
});


//Get selected color and Insert into hidden input fields page
$(".collorballs").each(function(){
  $(this).on('click', function(){
    var page = $(this).attr('title');
    $(".color-page").attr('value', page);
  });
});

function countChar(val) {
  var len = val.value.length;
  if (len >= 500) {
    val.value = val.value.substring(0, 500);
  } else {
    $('.text-counter').text( 500 - len );
  }
};
