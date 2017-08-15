<?php
  $i = "Hello world";
  $i = escapeshellarg($i);
  $i = escapeshellcmd($i);
  proc_open('zap.py', $i);
?>
