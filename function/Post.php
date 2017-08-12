<?php
  include_once '__autoload.php';
  class Post extends Image
  {
    public function statusPost($conn, $from, $view, $image_fieldname, $upload_dir, $status)
    {
      $this->uploadImage($conn, $image_fieldname, $upload_dir);

      	// Function testing
      	$status = preg_replace("/[\r\n]+/", "<br>", $status);
      	// Make Url clickable
        $status=$this->MakeUrls($status);
      	$status=preg_replace('/#(\\w+)/','<a href="'. BASE_URL .'hash?hash=$1">$0</a>',$status);
      	// Check for Mentions
      	$status=preg_replace('/(@\w+)/','<a href="'. BASE_URL .'mention?name=$1">$0</a>',$status);

      	// Reg ErrorException
      	$status = str_replace('<script>', '', $status);
      	$status = str_replace('</script>', '', $status);
      	$status = str_replace('<p>', '', $status);
      	$status = str_replace('</p>', '', $status);
      	$status = str_replace('<style>', '', $status);
      	$status = str_replace('</style>', '', $status);
      	$likes = 0;


        // Initiat Post Script
         else {

        $insert_sql = sprintf("INSERT INTO user_post (fullname, view, status, date, likes, user_id, profile_pic_id, image_path) " .
                    "VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s'); ",
      			    mysqli_real_escape_string($conn, $fullname),
      			    mysqli_real_escape_string($conn, $view),
      			    mysqli_real_escape_string($conn, $status),
      			    mysqli_real_escape_string($conn, $date),
      			    mysqli_real_escape_string($conn, $likes),
      			    mysqli_real_escape_string($conn, $user_id),
      			    mysqli_real_escape_string($conn, $profile_pic_id),
                mysqli_real_escape_string($conn, 0),
      			    mysqli_insert_id($conn));

      	// Insert the Post into the database
      	if (mysqli_query($conn, $insert_sql)) {
      		$_SESSION['msg'] = "Your status was successfully updated";
      		header("Location: "  . $_SERVER['HTTP_REFERER']);
      	} else {
      	  $_SESSION['msg'] = "Unsuccessful status update";
      		header("Location: "  . $_SERVER['HTTP_REFERER']);
      	}
      }
    }
  }

?>
