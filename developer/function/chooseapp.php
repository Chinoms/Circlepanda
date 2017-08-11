<?php
  function appChoice($conn, $id)
  {
    $choose = "SELECT * FROM app WHERE user_id='$id'";
    $result = mysqli_query($conn, $choose);
    $data = '<div class="ui floating dropdown labeled search icon button">
    <i class="grid layout icon"></i>
    <span class="text">Choose App</span>
    <div class="menu">
    <a href="#null" class="item">Choose App</a>';
      while ($lists = mysqli_fetch_array($result)) {
        $data .= '
          <a href="'.BASE_URL.'developer/module/session?app_id='. $lists['app_id'] .'" class="item">'. $lists['app_name'] .'</a>
        ';
      }
      $data .= '</div>
      </div>';
    return $data;
  }
?>
