<?php
  include_once '__autoload.php';
  class Likes
  {
    # check if you've liked this post, then make the like button active
    public function checklike($conn, $id, $user_id, $tbname, $joined_tbname) {
      # Check if liker is owner of post
      $checkliker = "SELECT * FROM $tbname p JOIN $joined_tbname l ON l.post_id = p.post_id WHERE l.user_id='$user_id' and l.post_id ='$id'";
      $result = mysqli_query($conn, $checkliker);
      if ($result) {
        $row = mysqli_fetch_array($result);
        $fetched_id = $row['user_id'];
          if ($user_id == $fetched_id) {
            return "liked";
          } else {
            return NULL;
          }
        }
    }

    public function likephrase($id){
      switch ($id) {
        case '0':
          $i = $id . " like";
          break;
        case '1':
          $i = $id . " like";
          break;
        default:
          $i = $id . " likes";
          break;
      }
      return $i;
    }
  }
  $likes = new Likes;
?>
