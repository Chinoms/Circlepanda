<?php
  $pagePost = "SELECT * FROM page_post WHERE page_id='$get_id' ORDER BY post_id DESC LIMIT 10";
  $result = mysqli_query($conn, $pagePost);
    while ($post = mysqli_fetch_array($result)) {
      echo '<div class="box">
        <span class="col-sm-12">
          <img src="' . idtodp($conn, $post['user_id']) .'" class="dp w3-circle" alt="Display Photo">
          <div class="post-info">
            <a href="' . BASE_URL . 'friend/'. idtousername($conn, $post['user_id']) .'" class="name" style="color:#888;"> '. idtoname($conn, $post['user_id']) .' <span class="bold" style="color:'. $post['page_color'] .'"> <i class="fa fa-caret-right"></i> '. $post['page_name'] .' </span> </a>
            <time class="float-right"> <i class="material-icons post-option">more_vert</i>
              '. pagepostoption($conn, $post['user_id'], $post['post_id']) .'
            </time>
            <time class="post-time"> '. time_elapsed_string($post['date']) .' . <i class="fa fa-globe"></i> . Page </time>
          </div>
        </span>
        '. get_web_path(imagOrNotPage($conn, $post['post_id'])) .'
        <div class="w3-container top-space">
          <p class="status pad-top">'. $post['status'] .'</p>
        </div>
        <div class="w3-container">
          <a href="#like" class="icon-below w3-circle left-float space ' . checkpagelike($conn, $post['post_id'], $user_id) . ' page-like" data-postid="' . $post['post_id'] . '" data-pageid="' . $post['page_id'] . '">
            <i class="material-icons md-16">thumb_up</i>
          </a>
          <span class="like-count">' . likephrase($post['likes']) . '</span>

          <a href="#share" class="icon-below w3-circle float-right space">
            <i class="material-icons md-16">share</i>
          </a>
          <a tabindex="page" class="icon-below w3-circle float-right space comment"  data-postid="'. $post['post_id'] .'">
            <i class="material-icons md-16">chat_bubble</i>
          </a>
        </div>
        <input type="hidden" value="'. $post['post_id'] .'" name="post_id">
      </div>';
    }
?>
