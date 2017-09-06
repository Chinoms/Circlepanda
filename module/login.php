<?php
  session_start();
  include_once '../app/connect.php';
  include_once '../function/__autoload.php';
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['user_name'];
    $code = $_POST['password'];
    $auth->login($conn, $name, $code);
  }
?>
