$(".geteditmodal").click(function(){
    event.preventDefault();
    $(".personal_holder").removeClass('hide');
});

$(".can").click(function(){
  $(".personal_holder").addClass('hide');
});

/* Profile script for edit starts */
$("a.menu_span").on('click', function(){
  $('a.menu_span').removeClass('active');
  $(this).addClass('active');
  var hook = $(this).attr('href');
  $(".right_ph_pane").addClass('hide');
  switch (hook) {
    case "#worknedu":
    $(".worknedu-switch").removeClass('hide');
      break;
    case "#contact":
    $(".contact-switch").removeClass('hide');
      break;
    case "#photo":
    $(".photo-switch").removeClass('hide');
      break;
    case "#relation":
    $(".relationship-switch").removeClass('hide');
      break;
    case "#about":
    $(".about-switch").removeClass('hide');
      break;
    default:

  }
});
/* Profile script for edit ends */

$(document).ready(function()
{
    $("body").mouseup(function(e)
    {
        var subject = $(".personal_holder");
        if(e.target.id != subject.attr('class') && !subject.has(e.target).length) {
            subject.addClass('hide');
        }
    });
});
