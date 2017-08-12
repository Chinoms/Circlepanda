<?php
  define('CON', '1');
  class SandBox
  {
    if (CON === 1) {
      public function text()
      {
        $i = "CON is on";
        return $i;
      }
    } else {
      public function text()
      {
        $i = "CON is off";
        return $i;
      }
    }
  }
  $test = new SandBox;
  echo $test->text();
?>
