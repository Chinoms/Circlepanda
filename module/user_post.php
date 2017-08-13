<?php
  session_start();
  include_once '../app/connect.php';
  include_once '../function/__autoload.php';
  include_once 'userdata.php';
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $from = "Public";
    $view = $likes = $profile_pic_id = 0;
    $image_fieldname = "uploadphoto";
    $status = $_POST['status'];
    // Initiate Url in status
    $status = $url->MakeUrls($status);
    // Initiat post methods
    $post->statusPost($conn, $from, $view, $image_fieldname, $upload_dir, $status, $fullname, $date, $likes, $user_id, $profile_pic_id);
  }
?>
