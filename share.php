<?php
include_once 'app/connect.php';
include_once 'module/userdata.php';
if(!isset($_SESSION['user_id'])) {
  $_SESSION['prevented_page'] = BASE_URL . "share";
} else {
  unset($_SESSION['prevented_page']);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $url = $_GET['url'];
  $status = $_GET['status'];
  $view = $_GET['view'];
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Share - Circlepanda</title>
    <link rel="icon" href="<?php echo BASE_URL . "asset/images/circlepanda-fa-icon.png" ?>">
    <!-- Site Style -->
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/structure.css" ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/online.min.css"; ?>">
    <!--<link rel="stylesheet" href="<?php # echo BASE_URL . "asset/css/pace.css"; ?>">-->
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/plugins/semantic-ui/semantic.min.css"?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/plugins/fontawesome/css/font-awesome.css"; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/w3.css" ?>">
    <script src="<?php echo BASE_URL . "asset/js/jquery.min.js"; ?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/online.min.js"; ?>"></script>
    <script>
        var run = function() {
         if (Offline.state === 'up') {
          Offline.check();
         } setInterval(run, 5000);
       }
    </script>
  </head>
  <body>
    <?php include_once 'app/error/modal.php'; ?>
    <form class="ui form sharewrap w3-container">
      <div class="field w3-padding-12">
        <label>Share Post</label>
        <textarea name="name" placeholder="What's on your mind?"></textarea>
        <div class="field w3-center w3-padding-12">
          <button type="button" onclick="javascript:closeWindow()" class="ui small button">
            Discard
          </button>
          <button type="submit" class="ui small blue button">
            Share post
          </button>
        </div>
      </div>

    </form>

    <!-- Circlepanda Ajax Scripts -->
    <script src="<?php echo BASE_URL . "ajax/likes.js" ?>"></script>
    <!-- Circlepand Regular Scripts -->
    <script src="<?php echo BASE_URL . "asset/js/owl.carousel.js" ?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/protected/structure.js" ?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/nicescroll.js" ?>"></script>
    <script src="<?php echo BASE_URL . "asset/plugins/semantic-ui/semantic.min.js"?>"></script>
    <!--<script src="<?php # echo BASE_URL . "asset/js/pace.min.js" ?>" charset="utf-8"></script>-->
  </body>
</html>
