<?php
  session_start();
  include_once 'userdata.php';
  include_once '../function/__autoload.php';
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $image_fieldname = "channel_cover";
    // Requests DATA's
    $channel_name	 = $_POST['channel_name'];
    $channel_view  = $_POST['channel_view'];
    $channel_bio	 = $_POST['about_channel'];
    $channel_type  = $_POST['channel_type'];
    $channel_color = $_POST['channel_color'];
    $channel->InitializeNewChannel($conn, $channel_name, $channel_view, $channel_bio, $channel_type, $channel_color, $image_fieldname, $upload_dir);
  }
?>
