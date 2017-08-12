<?php
  include_once '__autoload.php';
  class Analytics extends Track
  {
    public function realCount($conn, $tbname)
    {
      $countVar = "SELECT COUNT(*) FROM $tbname";
      $res = mysqli_query($conn, $countVar);
      if ($res) {
        $row = mysqli_fetch_array($res);
        $output = $row[0];
        return $output;
      }
    }
  }
  $analytics = new Analytics;
?>
