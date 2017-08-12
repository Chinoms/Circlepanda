var allcomment = $(".tint-bottomlayer, .tint-toplayer, .comment-pane");
var tints = $(".tint-bottomlayer, .tint-toplayer");
var comment = $(".comment-pane");

$(".comment").on('click', function(){
  var postId = $(this).attr('data-postid');
  var postType = $(this).attr('tabindex');
  $("#pid").val(postId);
  $("#type").val(postType);
  allcomment.fadeIn(500);
  /* Ajax function for Fetchin Comment using Post Id */
  function ajaxfetchcomment(url, postId)
  {
    $.ajax({
        type: "POST",
        url: url,
        data: "post_id=" + postId,
        success: function(data) {
          $(".encor").html(data);
        }
    });
  }
  switch (postType) {
    // Userpost
    case "userpost":
    var url = "module/post/comment/postcomment.php";
    ajaxfetchcomment(url, postId);
      break;
    // Channel
    case "channel":
    var url = "module/post/comment/postchannelcomment.php";
    ajaxfetchcomment(url, postId);
      break;
    // Collection
    case "collection":
    var url = "module/post/comment/postcollectioncomment.php";
    ajaxfetchcomment(url, postId);
      break;
    // Page
    case "page":
    var url = "module/post/comment/postpagecomment.php";
    ajaxfetchcomment(url, postId);
      break;
      // Void Switch Loop
    default:
    /* Remain Void */
  }
});

/* Comment */
comment.on('submit', function(){
  event.preventDefault();
  var postType = $("#type").val();
  var postId = $("#pid").val();
  var commentMessage = $(".typos").val();
  $("input").val('');
  if ($.trim(commentMessage) !== "") {
    /* Ajax function for Inserting Comment using Post Id */
    function ajaxinsertcomment(url, postId, commentMessage)
    {
      $.ajax({
          type: "POST",
          url: url,
          data: "post_id=" + postId + "&comment=" + commentMessage,
          success: function(data) {
            $(".encor").html(data);
             console.log(data);
          }
      });
    }
    switch (postType) {
      // Userpost
      case "userpost":
      var url = "module/post/comment/addcomment.php";
      ajaxinsertcomment(url, postId, commentMessage);
        break;
      // Channel
      case "channel":
      var url = "module/post/comment/addchannelcomment.php";
      ajaxinsertcomment(url, postId, commentMessage);
        break;
      // Collection
      case "collection":
      var url = "module/post/comment/addcollectioncomment.php";
      ajaxinsertcomment(url, postId, commentMessage);
        break;
      // Page
      case "page":
      var url = "module/post/comment/addpagecomment.php";
      ajaxinsertcomment(url, postId, commentMessage);
        break;
        // Void Switch Loop
      default:
      /* Remain Void */
    }
  } else {
    // Do nothing
  }
});
