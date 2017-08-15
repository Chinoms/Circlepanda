<?php
  class Cover // extends AnotherClass
  {
    // User Cover Photo Check
    public function userCovercheck($conn, $i)
    {
      switch ($i) {
        case 1:
          $x = '<img src="'. BASE_URL .'asset/images/stock/201ef627-c78f-4c96-91ae-8fa0adb09346.jpg" class="cover" alt="cover photo">';
          break;
        default:
          $x = '<img src="'. BASE_URL .'module/images/usercover?image_id='. $i .'" class="cover" alt="cover photo">';
          break;
      }
      return $x;
    }
    // Channel Cover Photo Check
    public function channelCovercheck($conn, $i){
      if (empty($i)) {
        $x = '<img src="'. BASE_URL .'asset/images/stock/201ef627-c78f-4c96-91ae-8fa0adb09346.jpg" class="cover" alt="cover photo">';
      } else {
        $x = '<img src="'. BASE_URL .'module/images/channelcover?image_id='. $i .'" class="cover" alt="cover photo">';
      }
      return $x;
    }

    public function innerchannelCovercheck($conn, $i) {
      if (empty($i)) {
        $x = '<img src="'. BASE_URL .'asset/images/stock/201ef627-c78f-4c96-91ae-8fa0adb09346.jpg" class="inner-cover" alt="cover photo">';
      } else {
        $x = '<img src="'. BASE_URL .'module/images/channelcover?image_id='. $i .'" class="inner-cover" alt="cover photo">';
      }
      return $x;
    }
    // Collection Cover Photo Check
    public function collectionCovercheck($conn, $i){
      if (empty($i)) {
        $x = '<img src="'. BASE_URL .'asset/images/stock/201ef627-c78f-4c96-91ae-8fa0adb09346.jpg" class="cover" alt="cover photo">';
      } else {
        $x = '<img src="'. BASE_URL .'module/images/collectioncover?image_id='. $i .'" class="cover" alt="cover photo">';
      }
      return $x;
    }

    public function innercollerctionCovercheck($conn, $i) {
      if (empty($i)) {
        $x = '<img src="'. BASE_URL .'asset/images/stock/201ef627-c78f-4c96-91ae-8fa0adb09346.jpg" class="inner-cover" alt="cover photo">';
      } else {
        $x = '<img src="'. BASE_URL .'module/images/collectioncover?image_id='. $i .'" class="inner-cover" alt="cover photo">';
      }
      return $x;
    }
    // Page Cover Photo Check
    public function pageCovercheck($conn, $i){
      if (empty($i)) {
        $x = '<img src="'. BASE_URL .'asset/images/stock/201ef627-c78f-4c96-91ae-8fa0adb09346.jpg" class="cover" alt="cover photo">';
      } else {
        $x = '<img src="'. BASE_URL .'module/images/pagecover?image_id='. $i .'" class="cover" alt="cover photo">';
      }
      return $x;
    }

    public function innerpageCovercheck($conn, $i) {
      if (empty($i)) {
        $x = BASE_URL .'asset/images/stock/201ef627-c78f-4c96-91ae-8fa0adb09346.jpg';
      } else {
        $x = BASE_URL .'module/images/pagecover?image_id='. $i;
      }
      return $x;
    }
  }
  $cover = new Cover;
?>
