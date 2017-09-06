<?php
  class Analytics //extends Track
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
    public function returnCount($conn, $from, $param, $id)
    {
      $count = "SELECT count(*) FROM $from WHERE $param=$id";
      $result = mysqli_query($conn, $count);
      if ($result) {
        $row = mysqli_fetch_array($result);
        $i = $row[0];
      }
    return $i;
    }
  }
  $analytics = new Analytics;
?>
