<?php
  class User
  {
    function idto($conn, $id, $selector, $row)
    {
      $query = "SELECT fullname FROM users WHERE user_id='$id'";
      $res = mysqli_query($conn, $query);
        if ($res) {
          $row = mysqli_fetch_array($res);
          $output = $row['fullname'];
        }
      return $output;
    }
  }
$convertIdto = new User;
?>
