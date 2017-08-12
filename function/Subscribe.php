<?php
  class Subscribe
  {
    function newslater($conn, $email)
    {
      $newslatter = sprintf("INSERT INTO subscribe (email) " .
          "VALUES ('%s'); ",
        mysqli_real_escape_string($conn, $email),
        mysqli_insert_id($conn));
        if (mysqli_query($conn, $newslatter)) {
          return 1;
        } else {
          return 0;
        }
    }
  }
  $subscribe = new Subscribe;
?>
