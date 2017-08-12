<?php
  $regularPost = "SELECT * FROM user_post WHERE user_id='$user_id' ORDER BY post_id DESC";
  $result = mysqli_query($conn, $regularPost);
    while ($post = mysqli_fetch_array($result)) {
      echo '<div class="box">
        <span class="col-sm-12">
          <img src="'. idtodp($conn, $post['user_id']) .'" class="dp w3-circle" alt="Display Photo">
          <div class="post-info">
            <a href="' . BASE_URL . 'friend/'. idtousername($conn, $post['user_id']) .'" class="name"> '. $post['fullname'] .' <span class="bold"> <i class="fa fa-caret-right"></i> Public </span> </a>
            <time class="float-right"> <i class="material-icons post-option">more_vert</i>
              '. postoption($conn, $post['post_id']) .'
            </time>
            <time class="post-time"> '. time_elapsed_string($post['date']) .' . <i class="fa fa-globe"></i> . Public </time>
          </div>
        </span>
        '. get_web_path(imagOrNot($conn, $post['post_id'])) .'
        <div class="w3-container top-space">
          <p class="status pad-top">'. $post['status'] .'</p>
        </div>
        <div class="w3-container">
          <a href="#like" class="icon-below w3-circle left-float space ' . checklike($conn, $post['post_id'], $user_id) .' like" data-postid="' . $post['post_id'] . '">
            <i class="material-icons md-16">thumb_up</i>
          </a>
          <span class="like-count">' . likephrase($post['likes']) . '</span>

          <a href="#share" class="icon-below w3-circle float-right space">
            <i class="material-icons md-16">share</i>
          </a>
          <a tabindex="userpost" class="icon-below w3-circle float-right space comment" data-postid="'. $post['post_id'] .'">
            <i class="material-icons md-16">chat_bubble</i>
          </a>
        </div>
        <input type="hidden" name="post_id" value="'. $post['post_id'] .'" class="datapostid">
      </div>';
    }
?>


<?php
  /*$regularPost = "SELECT * FROM user_post p JOIN follow_friend f ON f.friends_id = p.user_id WHERE f.user_id='$user_id' ORDER BY post_id DESC LIMIT 10";
  $result = mysqli_query($conn, $regularPost);
    while ($post = mysqli_fetch_array($result)) {
      echo '<div class="box">
        <span class="col-sm-12">
          <img src="' . BASE_URL . 'module/images/dp?image_id='. $profile_pic_id .'" class="dp w3-circle" alt="Display Photo">
          <div class="post-info">
            <a href="' . BASE_URL . 'friend?user_id='. $post['user_id'] .'" class="name"> '. $post['fullname'] .' <span class="bold"> <i class="fa fa-caret-right"></i> Public </span> </a>
            <time class="float-right"> <i class="material-icons post-option">more_vert</i>
              '. postoption($conn, $post['post_id']) .'
            </time>
            <time class="post-time"> '. time_elapsed_string($post['date']) .' . <i class="fa fa-globe"></i> . Public</time>
          </div>
        </span>
        '. imagOrNot($conn, $post['post_id']) .'
        <div class="w3-container top-space">
          <p class="status pad-top">'. $post['status'] .'</p>
        </div>
        <div class="w3-container">
          <a href="#like" class="icon-below w3-circle left-float space ' . checklike($conn, $post['post_id'], $user_id) .' like">
            <i class="material-icons md-16">thumb_up</i>
          </a>
          <span class="like-count">' . likephrase($post['likes']) . '</span>

          <a href="#share" class="icon-below w3-circle float-right space">
            <i class="material-icons md-16">share</i>
          </a>
          <a tabindex="userpost" class="icon-below w3-circle float-right space comment">
            <i class="material-icons md-16">chat_bubble</i>
          </a>
        </div>
        <input type="hidden" value="'. $post['post_id'] .'" class="datapostid">
      </div>';
    }*/
?>
