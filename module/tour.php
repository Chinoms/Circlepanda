<?php
  session_start();
  include_once '../app/connect.php';
  include_once '../function/__autoload.php';
  include_once 'userdata.php';
  $auth->protect();
  $setup->InitiateSiteTour($conn, $user_id);
?>
