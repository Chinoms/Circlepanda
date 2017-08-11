<?php
  session_start();
  include_once '../../app/connect.php';
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $_SESSION['app_id'] = $app_id = $_GET['app_id'];
    header("Location: ../dashboard");
  }
?>
