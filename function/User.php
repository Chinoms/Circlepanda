<?php
  class User
  {
    public function idto($conn, $id, $selector)
    {
      $query = "SELECT $selector FROM users WHERE user_id='$id'";
      $res = mysqli_query($conn, $query);
        if ($res) {
          $row = mysqli_fetch_array($res);
          $output = $row[$selector];
        }
      return $output;
    }
    public function nickto($conn, $nick, $selector)
    {
      $query = "SELECT $selector FROM users WHERE user_name='$nick'";
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
