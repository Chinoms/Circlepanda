<?php
  $collectionPost = "SELECT * FROM collection_post WHERE collection_id='$get_id' ORDER BY post_id DESC LIMIT 10";
  $result = mysqli_query($conn, $collectionPost);
    while ($post = mysqli_fetch_array($result)) {
      echo '<div class="box">
        <span class="col-sm-12">
          <img src="' . idtodp($conn, $post['user_id']) .'" class="dp w3-circle" alt="Display Photo">
          <div class="post-info">
            <a href="' . BASE_URL . 'friend/'. idtousername($conn, $post['user_id']) .'" class="name" style="color:#888;"> '. idtoname($conn, $post['user_id']) .' <span class="bold" style="color:'. $post['collection_color'] .'"> <i class="fa fa-caret-right"></i> '. $post['collection_name'] .' </span> </a>
            <time class="float-right"> <i class="material-icons post-option">more_vert</i>
              '. postoption($conn, $post['post_id']) .'
            </time>
            <time class="post-time"> '. time_elapsed_string($post['date']) .' . <i class="fa fa-globe"></i> . Collection </time>
          </div>
        </span>
        '. get_web_path(imagOrNotCollection($conn, $post['post_id'])) .'
        <div class="w3-container top-space">
          <p class="status pad-top">'. $post['status'] .'</p>
        </div>
        <div class="w3-container">
          <a href="#like" class="icon-below w3-circle left-float space ' . checkcollectionlike($conn, $post['post_id'], $user_id) . ' collection-like" data-postid="' . $post['post_id'] . '" data-collectionid="' . $post['collection_id'] . '">
            <i class="material-icons md-16">thumb_up</i>
          </a>
          <span class="like-count">' . likephrase($post['likes']) . '</span>

          <a href="#share" class="icon-below w3-circle float-right space">
            <i class="material-icons md-16">share</i>
          </a>
          <a tabindex="collection" class="icon-below w3-circle float-right space comment" data-postid="'. $post['post_id'] .'">
            <i class="material-icons md-16">chat_bubble</i>
          </a>
        </div>
        <input type="hidden" value="'. $post['post_id'] .'" name="post_id">
      </div>';
    }
?>
