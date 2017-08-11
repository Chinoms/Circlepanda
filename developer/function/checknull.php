<?php
  function checkurl($param) {
    if ($param !== '') {
      $i = $param;
    } else {
      $i = "http://";
    }
    return $i;
  }
?>
