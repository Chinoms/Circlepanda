<?php
  session_start();
  include_once '../app/connect.php';
  include_once '../function/__autoload.php';
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSON['user_id'];
    $status = $_POST['status'];
    $auth->active($conn, $user_id, $status, $date);
  }
?>
