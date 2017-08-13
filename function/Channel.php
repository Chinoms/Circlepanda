<?php
  include_once '__autoload.php';
  class Channel //extends HttpError
  {
    public function JoinChannel($conn, $channel_id, $user_id, $date)
    {
      $joinChannel = sprintf("INSERT INTO join_channel (channel_id, user_id, join_date) " .
          "VALUES ('%s', '%s', '%s'); ",
          mysqli_real_escape_string($conn, mysqli_insert_id($conn)),
          mysqli_real_escape_string($conn, $user_id),
          mysqli_real_escape_string($conn, $date),
          mysqli_insert_id($conn));

      if (mysqli_query($conn, $joinChannel)) {
        // Redirect the user to the page that displays user information
        $_SESSION['msg'] = "Joined Channel Successfully";
        header("Location: " . $_SERVER['HTTP_REFERER']);
       } else {
        $_SESSION['msg'] = "Unable to Join Channel at this time try again.";
        header("Location: " . $_SERVER['HTTP_REFERER']);
       }
    }
    function createChannel($conn, $channel_name, $channel_bio, $channel_color, $channel_view, $channel_type, $date, $user_id)
    {
      $insChannel = sprintf("INSERT INTO channel (channel_name, channel_bio, channel_members, channel_color,
      channel_view, channel_type, channel_regdate, user_id, cover_id) " .
                "VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', %d); ",
               mysqli_real_escape_string($conn, $channel_name),
               mysqli_real_escape_string($conn, $channel_bio),
               mysqli_real_escape_string($conn, 1),
               mysqli_real_escape_string($conn, $channel_color),
               mysqli_real_escape_string($conn, $channel_view),
               mysqli_real_escape_string($conn, $channel_type),
               mysqli_real_escape_string($conn, $date),
               mysqli_real_escape_string($conn, $user_id),
               mysqli_insert_id($conn));
      # Insert the user into the database

      if (mysqli_query($conn, $insChannel)) {
        $this->JoinChannel($conn, mysqli_insert_id($conn), $user_id, $date);
        $_SESSION['msg'] = "Successfully created a new Channel";
      } else {
        $_SESSION['msg'] = "Oops! can't create". $channel_name ." Channel at this time.";
        header("Location: " . $_SERVER['HTTP_REFERER']);
      }
    }
    public function InitializeNewChannel($conn, $channel_name, $channel_view, $channel_bio, $channel_type, $channel_color, $image_fieldname, $upload_dir)
    {
      # Potential PHP upload errors
      $php_errors =
      array(1 => 'Maximum file size in php.ini exceeded',
    				2 => 'Maximum file size in HTML form exceeded',
    				3 => 'Only part of the file was uploaded',
    				4 => 'No file was selected to upload.');

    	# Make sure we didn't have an error uploading the image
    	($_FILES[$image_fieldname]['error'] == 0)
    	or $this->handle_error("the server couldn't upload the image you selected.",
    	$php_errors[$_FILES[$image_fieldname]['error']]);

    	# Is this file the result of a valid upload?
    	@is_uploaded_file($_FILES[$image_fieldname]['tmp_name'])
    	or $this->handle_error("you were trying to do something naughty. Shame on you!",
    	"Uploaded request: file named " .
    	"'{$_FILES[$image_fieldname]['tmp_name']}'");

    	# Is this actually an image?
    	@getimagesize($_FILES[$image_fieldname]['tmp_name'])
    	or $this->handle_error("you selected a file for your picture " .
    	"that isn't an image.",
    	"{$_FILES[$image_fieldname]['tmp_name']} " .
    	"isn't a valid image file.");

    	# Name the file uniquely
    	$now = time();
    	while (file_exists($upload_filename = $upload_dir . $now .
    	'-' .
    	$_FILES[$image_fieldname]['name'])) {
    	$now++;
    	}

    	# Insert the image into the images table
    	$image = $_FILES[$image_fieldname];
    	$image_filename = $image['name'];
    	$image_info = getimagesize($image['tmp_name']);
    	$image_mime_type = $image_info['mime'];
    	$image_size = $image['size'];
    	$image_data = file_get_contents($image['tmp_name']);

    if ($_FILES[$image_fieldname]['error'] == 0 || empty($_FILES[$image_fieldname]['tmp_name'])) {
  		$_SESSION['msg'] = "Image not supported";
  		header("Location: " . $_SERVER['HTTP_REFERER']);
	  } else if ($channel_name == "" || $channel_type == "" || $channel_color == "") {
      $_SESSION['msg'] = "Oops! Missing details, please complete fields and try again";
      header("Location: " . $_SERVER['HTTP_REFERER']);
    }

    // Upload Cover Photo
    $insert_image_sql = sprintf("INSERT INTO cover_channel " .
      "(filename, mime_type, file_size, image_data) " .
      "VALUES ('%s', '%s', '%d', '%s');",
      mysqli_real_escape_string($conn, $image_filename),
      mysqli_real_escape_string($conn, $image_mime_type),
      mysqli_real_escape_string($conn, $image_size),
      mysqli_real_escape_string($conn, $image_data));
      if (mysqli_query($conn, $insert_image_sql)) {
        $this->createChannel($conn, $channel_name, $channel_bio, $channel_color, $channel_view, $channel_type, $date, $user_id);
      } else {
        $_SESSION['msg'] = "Image not supported, use a different image";
        header("Location" . $_SERVER['HTTP_REFERER']);
      }
    }
  }
  $channel = new Channel;
?>
