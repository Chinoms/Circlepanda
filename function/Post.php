<?php
  include_once 'ImageHandler.php';
  class Post extends Image
  {
    public function statusPost($conn, $from, $view, $image_fieldname, $upload_dir, $status, $fullname, $date, $likes, $user_id, $profile_pic_id)
    {
      $upload_filename = $this->uploadImage($conn, $image_fieldname, $upload_dir);
      if ($upload_filename !== NULL) {
        $upload_filename = $upload_filename;
      } else {
        $upload_filename = 0;
      }

    	// Function testing
    	$status = preg_replace("/[\r\n]+/", "<br>", $status);
    	$status=preg_replace('/#(\\w+)/','<a href="'. BASE_URL .'hash?hash=$1">$0</a>',$status);
    	// Check for Mentions
    	$status=preg_replace('/(@\w+)/','<a href="'. BASE_URL .'mention?name=$1">$0</a>',$status);

    	// Reg ErrorException
    	$status = str_replace('<script>', '', $status);
      $status = str_replace('</script>', '', $status);
      // Query Status Post
      $insertStatus = sprintf("INSERT INTO user_post (fullname, view, status, date, likes, user_id, profile_pic_id, image_path) " .
              "VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s'); ",
			    mysqli_real_escape_string($conn, $fullname),
			    mysqli_real_escape_string($conn, $view),
			    mysqli_real_escape_string($conn, $status),
			    mysqli_real_escape_string($conn, $date),
			    mysqli_real_escape_string($conn, 0),
			    mysqli_real_escape_string($conn, $user_id),
			    mysqli_real_escape_string($conn, $profile_pic_id),
          mysqli_real_escape_string($conn, $upload_filename),
			    mysqli_insert_id($conn));

    	// Insert the Post into the database
    	if (mysqli_query($conn, $insertStatus)) {
    		$_SESSION['msg'] = "Your status was successfully updated";
    		header("Location: "  . $_SERVER['HTTP_REFERER']);
    	} else {
    	  $_SESSION['msg'] = "Unsuccessful status update";
    		header("Location: "  . $_SERVER['HTTP_REFERER']);
    	}
    }
    public function channelPost($conn, $from, $view, $image_fieldname, $upload_dir, $status, $channel_id, $channel_color, $channel_name, $date, $likes, $user_id, $profile_pic_id)
    {
      $upload_filename = $this->uploadImage($conn, $image_fieldname, $upload_dir);
      if ($upload_filename !== NULL) {
        $upload_filename = $upload_filename;
      } else {
        $upload_filename = 0;
      }

    	// Function testing
    	$status = preg_replace("/[\r\n]+/", "<br>", $status);
    	$status=preg_replace('/#(\\w+)/','<a href="'. BASE_URL .'hash?hash=$1">$0</a>',$status);
    	// Check for Mentions
    	$status=preg_replace('/(@\w+)/','<a href="'. BASE_URL .'mention?name=$1">$0</a>',$status);

    	// Reg ErrorException
    	$status = str_replace('<script>', '', $status);
      $status = str_replace('</script>', '', $status);
      // Query Status Post
      $insertStatus = sprintf("INSERT INTO channel_post (status, date, likes, user_id, channel_id, channel_color, channel_name, image_path) " .
              "VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s'); ",
          mysqli_real_escape_string($conn, $status),
          mysqli_real_escape_string($conn, $date),
          mysqli_real_escape_string($conn, 0),
          mysqli_real_escape_string($conn, $user_id),
          mysqli_real_escape_string($conn, $channel_id),
			    mysqli_real_escape_string($conn, $channel_color),
			    mysqli_real_escape_string($conn, $channel_name),
          mysqli_real_escape_string($conn, $upload_filename),
			    mysqli_insert_id($conn));

    	// Insert the Post into the database
    	if (mysqli_query($conn, $insertStatus)) {
    		$_SESSION['msg'] = "Your status was successfully updated";
    		header("Location: "  . $_SERVER['HTTP_REFERER']);
    	} else {
    	  $_SESSION['msg'] = "Unsuccessful status update";
    		header("Location: "  . $_SERVER['HTTP_REFERER']);
    	}
    }
  }
  $post = new Post;
?>
