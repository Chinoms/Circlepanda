$(".channel-like").on('click', function(){
  var btn = $(this);
  // grab like text. eg = 20 likes
  var likeCount = $(".like-count").text();
  // split text. eg a = 20 and b = likes
  var split = likeCount.split(" ");
  // grab splitted text a
  var likeNo = split[0];
  // grab post id
  var postId = $(this).attr("data-postid");
  var channelId = $(this).attr("data-channelid");

  // function to add +1 to current like value
  function sumCalc($a) {
    var sum = +$a + +1;
    return sum;
  }
  // calling function
  var i = sumCalc(likeNo);
  // switch condition case statement to check if it should be called like || likes
  switch (i) {
    case 1:
      var e = "like";
      break;
    default:
      var e = "likes";
  }

  // Send like request using Ajax HTTPRequest
  $.ajax({
      type: "POST",
      url: "module/likes/likechannelpost.php",
      data: "post_id=" + postId + "&channel_id=" + channelId + "&ajax=" + 1,
      success: function(data) {
        // If successful add class to signify liked
        btn.addClass('liked');
        // And Update text space to new like value
        $(".like-count").text(i + ' ' + e);
        // Print Other statement as json on developer console
         console.log(data);
      }
  });
});
