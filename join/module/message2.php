<?php
  if(isset($_SESSION['message'])) {
    echo '<img src="' . BASE_URL . 'asset/images/circlepanda-404.png" class="pad-top">';
    echo $_SESSION['message'];
    unset($_SESSION['message']);
  } else {
    echo '<img src="' . BASE_URL . 'asset/images/circlepanda-meetfriends.png" class="pad-top">
    <h1>Join Million of fun loving people, make fun a culture.</h1>
    <h1>Connect the <i class="icon globe"></i></h1>';
  }
?>
