/* New Post Notification */
// Ajax Check for New Post, and Display
var postNotif = $(".newpost-notif");
// Hide for the moment till fix this ajax post fetcher
postNotif.hide();
// on click function
postNotif.on('click', function(){
  // fetch post ajax
  //fade Out
  $(this).fadeOut(200);
});

$(document).ready(function() {
    $('.ui.dropdown').dropdown();
});

/* Menu */
$(".menu-toggle").on('click', function() {
      $('.menu-top-plus, .menu').fadeToggle(400);
  });

/* Notification */
var notif = $(".general-notif");
var notifAll = $(".general-notif, .n-tint-top-layer, .n-tint-bottom-layer");
$(".notif").on('click', function(){
  notifAll.fadeIn();
  $(".dropdown-whatsnew").addClass('hide');
  $(".dropdown-message").addClass('hide');
});
$(".close-notif").on('click', function(){
  notifAll.fadeOut();
});

$(document).ready(function() {
  var notiftarget = $(".n-tint-top-layer, .n-tint-bottom-layer");
  notiftarget.mouseup(function(e) {
    if(e.target.id != notiftarget.attr('class') && !notiftarget.has(e.target).length) {
      notifAll.fadeOut();
    }
  });
});

//Image Manipulation
var loadFile = function(event) {
  var output = document.getElementById('output');
  output.src = URL.createObjectURL(event.target.files[0]);
};

$(document).ready(function() {
  var tints = $('.tint-bottomlayer, .tint-toplayer');
  tints.mouseup(function(e) {
    var subject = $(".comment-pane");
    if(e.target.id != subject.attr('class') && !subject.has(e.target).length) {
      subject.fadeOut();
      tints.fadeOut();
    }
  });
});

/* For User Post */
$(".trigger-status").on('click', function(){
  var post = $(".postmodal, .tint-bottomlayer-post, .tint-toplayer-post");
  post.fadeIn();
});

$(document).ready(function() {
  $('.tint-bottomlayer-post, .tint-toplayer-post').mouseup(function(e) {
    var subject = $(".postmodal, .tint-bottomlayer-post, .tint-toplayer-post");
    if(e.target.id != subject.attr('class') && !subject.has(e.target).length) {
      subject.fadeOut();
    }
  });
});

$(".cancel").on('click', function(){
  $(".postmodal, .tint-bottomlayer-post, .tint-toplayer-post").fadeOut();
});

$(".text-space").on('focus', function(){
  $(this).on('keyup', function(){
    var textlength = $(this).val().length;
    if (textlength < 30) {
      $(this).css({
        'font-size':'30px',
        'transition':'.5s ease-in-out'
      });
    } else if (textlength < 60) {
      $(this).css({
        'font-size':'20px',
        'transition':'.5s ease-in-out'
      });
    } else {
      $(this).css({
        'font-size':'16px',
        'transition':'.5s ease-in-out'
      });
    }
  });
});


$(".post-option").on('click', function(){
  $(".dropdown-option").removeClass('hide');
});

$(document).ready(function() {
  $('body').mouseup(function(e) {
    var subject = $(".dropdown-option");
    if(e.target.id != subject.attr('class') && !subject.has(e.target).length) {
      subject.addClass('hide');
    }
  });
});

/* Load More Post On Scroll */
$(window).scroll(function() {
    if($(window).scrollTop() == $(document).height() - $(window).height()) {
           // ajax call get data from server and append to the div
    }
});

/* Refresh A Portion Of the Page */
$(document).ready(function() {
var auto_refresh = setInterval(function(){
    $('.View').load('Small.php').fadeIn("slow");
  }, 15000); // refresh every 15000 milliseconds
  $.ajaxSetup({ cache: true });
});

$(document).ready(function() {
    setInterval(function() {
    $('.left-content, .right-content');
  }, 3000);
});


/* Edit of Collection, and Channel */
var all = $(".change_bottom_tint, .change_top_tint, .edit-wrap");

/* close current webpage onclick */
function closeWindow(){
  window.open(window.location, '_self').close();
}

/* Notification Update Seen Ajax protocol */
$(".notif").on('click', function(){
  event.preventDefault();
  $.ajax({
      type: "POST",
      url: "module/updatenotif.php",
      data: {},
      success: function(data) {
         console.log(data);
      }
  });
});

/*
  Dynamically Check for Post with Longer Post Caption Limit Text Key
*/
$(document).on('ready', function(){
  var ShowChar = 100;
  var ellipestext = "...";
  var moretext = "read more";
  var lesstext = "shrink text";
  $('.more').each(function(){
    var content = $(this).html();
    if (content.length > showChar) {
      var c = content.substr(0, showChar);
      var h = content.substr(showChar-1, content.length - showChar);

      var html = c + '<span class="moreellipses">' + ellipestext + '&nbsp; </span> <span class="morecontent"></span>' + h +'</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
      $(this).html(html);
    }
  });

  $(".morelink").on('click', function(){
    if ($(this).hasClass('less')) {
      $(this).removeClass('less');
      $(this).html(moretext);
    } else {
      $(this).addClass('less');
      $(this).html(lesstext);
    }
    $(this).parent().prev().toggle();
    $(this).prev().toggle();
    return false;
  });
});


/*
  General Inner Event listener on CLick for Collection, Channel, and Page.
*/
$(".edit-cpc").on('click', function(){
  $('.editor-option').toggleClass('hide');
});

/*******/
$('.wn').on('click', function(){
  $(".dropdown-message").addClass('hide');
  $(".dropdown-whatsnew").toggleClass('hide');
});

$('.nwmsg').on('click', function(){
  $(".dropdown-whatsnew").addClass('hide');
  $(".dropdown-message").toggleClass('hide');
});

/* Inner channel and Collection Menu Button */
$(".clickable-ico").on('click', function(){
  $(".editor-option").toggleClass('hide');
});

$("a.cc_p").on('click', function(){
  event.preventDefault();
  var ref = $(this).attr('data-opt');
  switch (ref) {
    case "edit":
      var tintedit = $(".change_bottom_tint, .change_top_tint");
      var main = $(".edit-wrap");
      tintedit.fadeIn(500);
      main.show(500);

      $(document).keyup(function(e) {
        if (e.which == 27) {
          tintedit.fadeOut(300);
          main.hide();
        }
      });

      $(document).ready(function() {
          tintedit.mouseup(function(e) {
              if(e.target.id != main.attr('class') && !main.has(e.target).length) {
                  tintedit.fadeOut(300);
                  main.fadeOut(300);
              }
          });
      });

      $(".cancel-btn").on('click', function(){
        tintedit.fadeOut(300);
        main.hide();
      });
      break;
    case "delete":
      var alldel = $(".t-b-l, .t-t-l, .delete");
      var maindel = $(".delete");
      var tintdel = $(".t-b-l, .t-t-l");
      tintdel.removeClass('hide');
      $(".close-btn").on('click', function(){
        event.preventDefault();
        tintdel.addClass('hide');
      });
      break;
    default:

  }
});

// drop-down-profile
$(".dp-big").on('click', function(){
  $(".drop-down-profile").fadeToggle(500);
});

$(document).keyup(function(e) {
  if (e.which == 27) {
    $(".drop-down-profile").fadeOut(500);
  }
});

$(document).ready(function() {
    $("body").mouseup(function(e) {
        var subject = $(".holder-mini-menu");
        var dropdown = $(".drop-down-profile");
        if(e.target.id != subject.attr('class') && !subject.has(e.target).length) {
            dropdown.fadeOut();
        }
    });
});

$(document).ready(function(){
  var msg = $(".msg");
  msg.fadeIn(500);
  msg.on('click', function(){
    msg.fadeOut(300);
  });
});
