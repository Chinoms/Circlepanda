<?php
  include_once '__autoload.php';
  class User
  {
    function idto($conn, $id, $selector)
    {
      $query = "SELECT $selector FROM users WHERE user_id='$id'";
      $res = mysqli_query($conn, $query);
        if ($res) {
          $row = mysqli_fetch_array($res);
          $output = $row[$selector];
        }
      return $output;
    }
  }
$convertIdto = new User;
?>
