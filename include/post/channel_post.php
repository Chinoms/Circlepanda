<?php
  $channelPost = "SELECT * FROM channel_post WHERE channel_id='$get_id' ORDER BY post_id DESC LIMIT 10";
  $result = mysqli_query($conn, $channelPost);
    while ($post = mysqli_fetch_array($result)) {
      echo '<div class="box">
        <span class="col-sm-12">
          <img src="' . $image->get_web_path($convertIdto->idto($conn, $post['user_id'], "profile_pic_id")) .'" class="dp w3-circle" alt="Display Photo">
          <div class="post-info">
            <a href="' . BASE_URL . 'friend/'. $convertIdto->idto($conn, $post['user_id'], "user_name") .'" class="name" style="color:#888;"> '. idto($conn, $post['user_id'], "fullname") .' <span class="bold" style="color:'. $post['channel_color'] .'"> <i class="fa fa-caret-right"></i> '. $post['channel_name'] .' </span> </a>
            <time class="float-right"> <i class="material-icons post-option">more_vert</i>
              '. $option->postoption($conn, $post['post_id'], "channel_post") .'
            </time>
            <time class="post-time"> '. $time->time_elapsed_string($post['date']) .' . <i class="fa fa-globe"></i> . Public </time>
          </div>
        </span>
        '. $image->get_web_path(imagOrNotChannel($conn, $post['post_id'])) .'
        <div class="w3-container top-space">
          <p class="status pad-top">'. $post['status'] .'</p>
        </div>
        <div class="w3-container">
          <a href="#like" class="icon-below w3-circle left-float space ' . $likes->checklike($conn, $post['post_id'], $user_id, "channel_post", "channel_like") . ' channel-like" data-postid="' . $post['post_id'] . '" data-channelid="' . $post['channel_id'] . '">
            <i class="material-icons md-16">thumb_up</i>
          </a>
          <span class="like-count">' . $likes->likephrase($post['likes']) . '</span>

          <a href="#share" class="icon-below w3-circle float-right space">
            <i class="material-icons md-16">share</i>
          </a>
          <a tabindex="channel" class="icon-below w3-circle float-right space comment" data-postid="'. $post['post_id'] .'">
            <i class="material-icons md-16">chat_bubble</i>
          </a>
        </div>
        <input type="hidden" value="'. $post['post_id'] .'" name="post_id">
      </div>';
    }
?>
