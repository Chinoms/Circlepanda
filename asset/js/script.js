// JavaScript Documents
$(document).ready(function(e) {
    $("#msg").delay(5000).fadeOut(1500);
});

  $(".fr-up-arrow").hide();
$("#friend_request_div").css('height','0px');
$(document).ready(function(e) {
  $("#user_iconium").click(function(){
    $("#friend_request_div").css('height','350px');
    $(".fr-up-arrow").show();
});

  $("#friend_request_div").mouseleave(function(){
    $(this).delay(200).css('height','0px');
    $(".fr-up-arrow").hide();
});


$(".img_icon_back,.img_icon").hide();
$(document).ready(function(e) {
$("#img_icon").mouseover(function(e) {
    $(".img_icon_back,.img_icon").fadeIn(500);
});

$(".img_icon").mouseout(function(e) {
    $(".img_icon_back,.img_icon").fadeOut(500);
  });
});

$("#login-container, #menu_custom").hide();
$(document).ready(function(e) {
   $('#btn_logIn').click(function(evt) {
   evt.preventDefault();
   $('#menu_custom').fadeToggle(1000);
   });//end fade

$("#login").click(function(e) {
    $("#login-container").fadeIn(500);
});
//end fade in


$("#login-close").click(function(e) {
    $("#login-container").fadeOut(500);
});
//end fadeout

$(".ph").hide();
$("#user").hover(function(e) {
   $(".ph").show(1000);
});
//end hover

$(".sub_wrapper").hide();
$(".sub").click(function(e) {
    $(".sub_wrapper").slideToggle(1000);
});

$('#w_n_back').hide();
$('#w_n_front').hover(function(){
  $(this).mouseenter(function(e){
      $('#w_n_back').fadeIn(500);
  });//end mouseenter
},

function(){
	$('#w_n_front').mouseout(function(e) {
		$('#w_n_back').fadeOut(500);
    });//end mouseout
});

//OWL CAROSEL TESTIMONIAL
$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    dots:true,
    dotsEach:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
});

$(document).ready(function(){
  $("html").niceScroll({
      cursorcolor:"#0C9",
      scrollspeed :"100",
      cursorborder:"1px solid #0C9",
      horizrailenabled: "false",
      cursorborderradius: "0px"
    });

  $("#community").niceScroll({
      cursorcolor:"#000",
      scrollspeed :"100",
      cursorborder:"1px solid #000",
      horizrailenabled: "false",
      cursorborderradius: "0px"
    });

  $("#community_suggest").niceScroll({
      cursorcolor:"#09C",
      scrollspeed :"100",
      cursorborder:"1px solid #FFF",
      horizrailenabled: "false",
      cursorborderradius: "0px"
    });
});
