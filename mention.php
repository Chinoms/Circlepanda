<?php
  session_start();
  include_once 'app/connect.php';
  include_once 'function/mention.php';
  include_once 'function/userinfo.php';

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    # Split the @ Sign
    $output = echo mention($i);
    # Get the User_id using the username
    $convertUsernametoId = usernametoid($conn, $output);
    # redirect user to The mentioned page passing The mentioned parameter (user_id)
    header("Location: friend?user_id=". $convertUsernametoId);
  }

?>
