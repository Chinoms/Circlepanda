<?php
  class Date
  {
    function time_elapsed_string($datetime, $full = false)
    {
      $now = new DateTime;
      $ago = new DateTime($datetime);
      $diff = $now->diff($ago);

      $diff->w = floor($diff->d / 7);
      $diff->d -= $diff->w * 7;

      $string = array(
          'y' => 'year',
          'm' => 'month',
          'w' => 'week',
          'd' => 'day',
          'h' => 'hour',
          'i' => 'min',
          's' => 'sec',
      );
      foreach ($string as $k => &$v) {
          if ($diff->$k) {
              $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
          } else {
              unset($string[$k]);
          }
      }

      if (!$full) $string = array_slice($string, 0, 1);
      return $string ? implode(', ', $string) . ' ago' : 'Just now';
    }

    function greetings()
    {
      $dt = new DateTime();
      //echo $dt->format('H:i:s');
      if ($dt->format('H') < 11) {
        $i = "Good Morning";
      } else if ($dt->format('H') < 15) {
        $i = "Good Afternoon";
      } else if ($dt->format('H') < 20) {
        $i = "Good Evening";
      } else {
        $i = "Good Night";
      }
      return $i;
    }
  }
  $time = new Date;
?>
