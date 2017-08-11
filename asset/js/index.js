// JavaScript Document

$(document).ready(function(e) {
    	$("#slideshowm, > div:gt(0)").hide();

setInterval(function() {
  
  $('#slideshow > div:first')
    .fadeOut(2500)
    .next()
    .fadeIn(2500)
    .end()
    .appendTo('#slideshow');
},  3000);

});

$("#menu_custom").hide();
$('#right-panel').hide();

$(".a").mouseenter(function(e) {
    $(this).css('background-color','#EBF5FA');
});

$(".a").mouseleave(function(e) {
    $(this).css('background-color','transparent');
});

$(".a,.b,.c,.d,.e,.f").css('transition','0.3s linear')

$(document).ready(function(e) {
$('input').focus(function(e) {
    $(this).css('border','1px solid').css('border-color','#666');
});
$('input').blur(function(e) {
    $(this).css('border','hidden');
});

    $('#right-panel').fadeIn(1000);
$("#btn-login").click(function(evt) {
   evt.preventDefault();
   $("#menu_custom").fadeIn(500);
   });//end fade

$("#close,.close-txt").click(function(e) {
    $("#menu_custom").fadeOut(500);
});
//end fade in

$(".a").mouseenter(function(e) {
    $(this).css('background-color','#EBF5FA');
	$(".d").css('color','#F15D1D');
	});

$(".a").mouseleave(function(e) {
    $(this).css('background-color','transparent');
	$(".d").css('color','#999');
});


$(".b").mouseenter(function(e) {
    $(this).css('background-color','#EBF5FA');
	$(".e").css('color','#C82A39');
});

$(".b").mouseleave(function(e) {
    $(this).css('background-color','transparent');
	$(".e").css('color','#999');
});


$(".c").mouseenter(function(e) {
    $(this).css('background-color','#EBF5FA');
	$(".f").css('color','#7F3C63');
});

$(".c").mouseleave(function(e) {
    $(this).css('background-color','transparent');
	$(".f").css('color','#999');
});

});