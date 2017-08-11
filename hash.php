<?php
  session_start();
  include_once 'app/connect.php';
  include_once 'module/userdata.php';
  include_once 'function/timeago.php';
  include_once 'function/likes/postlike.php';
  include_once 'module/post/imgornot.php';
  include_once 'function/urltitle.php';
  include_once 'function/post/option.php';
  include_once 'function/userinfo.php';
  include_once 'function/collectioninfo.php';


  # Check for Active User session
  if(!isset($_SESSION['user_id'])) {
      $_SESSION['prevented_page'] = BASE_URL . "hash";
      header("Location: login");
  } else {
    unset($_SESSION['prevented_page']);
  }

  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $hash = $_GET['hash'];
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Circlepanda - #<?php echo $hash; ?></title>
    <?php
      include_once 'metas/seo.php';
      $desc = "Welcome to Circlepanda";
      $keyword = "Circlepanda, Social, Network, Chat, Messaging, Hangout, Meet, Team, Channel, Collection, Page, Community, Creativity, Fun, Memories, Ideas, Status, Colorful, Family, Friends, Panda, Circle, Group, Partner, People, Blue, Simple, Search, Tools, Images, API, More";
      echo seoMeta($desc, $keyword);
    ?>
    <link rel="icon" href="<?php echo BASE_URL . "asset/images/circlepanda-fa-icon.png" ?>">
    <!-- Site Style -->
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/structure.css" ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/online.min.css"; ?>">
    <!--<link rel="stylesheet" href="<?php # echo BASE_URL . "asset/css/pace.css"; ?>">-->
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/plugins/fontawesome/css/font-awesome.css"; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/plugins/bootstrap/css/bootstrap.css"; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/w3.css" ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/media/home.media.css" ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/protected/home.css" ?>">
    <!-- Hangout Inner CSS StaRt -->
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/hangout/innerui.css" ?>">
    <!-- Hangout Inner CSS ENd -->
    <script src="<?php echo BASE_URL . "asset/js/jquery.min.js"; ?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/online.min.js"; ?>"></script>
    <script>
         var run = function() {
           if (Offline.state === 'up') {
              Offline.check();
            } setInterval(run, 5000)
          }
    </script>
    <style media="screen">
      .home {
        display: inline-block;
        margin: 0 0 0 0;
        width:220px;
        height:55px;
        padding: 0px 0 0 70px;
        background-color:#E5E5E5;
        color:#069;
      }
    </style>
  </head>
  <body>
    <!-- Circlepanda Header -->
    <header class="home-header-color">
      <?php include_once 'include/header.php' ?>
    </header>

    <!-- Circlepanda Body Content Space -->
    <section class="house">
      <!-- Circlepanda Comment Modal -->
        <?php
          # Comment modal
          include_once 'include/comment.php';
        ?>

      <!-- Circlepanda Menu -->
      <?php include_once 'include/menu.php'; ?>

      <!-- Content Space -->
      <div class="postarea">

        <div class="tag-filter">
          <span class="tag-block active"> <?php echo "#".$hash ?> </span>
          &nbsp;&nbsp; 12 Posts found
        </div>
        <!-- Circlepanda Middle Content Space -->
        <div class="middle-content">
          <?php include_once 'function/hash.php'; ?>
        </div>
        <!-- End Middle content Space -->
      </div>
    </section>
    <?php include_once 'app/error/modal.php'; ?>
    <!-- End*** _GET -->
    <!-- Circlepanda Ajax Scripts -->
    <script src="<?php echo BASE_URL . "ajax/tour.js" ?>"></script>
    <script src="<?php echo BASE_URL . "ajax/likes.js" ?>"></script>
    <script src="<?php echo BASE_URL . "ajax/collectionlike.js" ?>"></script>
    <script src="<?php echo BASE_URL . "ajax/channellike.js" ?>"></script>
    <script src="<?php echo BASE_URL . "ajax/comment.js" ?>"></script>
    <!-- Circlepand Regular Scripts -->
    <!--<script src="<?php # echo BASE_URL . "asset/js/pace.min.js" ?>" charset="utf-8"></script>-->
    <script src="<?php echo BASE_URL . "asset/js/hangout/hangout-inner.js" ?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/protected/structure.js" ?>"></script>
    <script src="<?php echo BASE_URL . "asset/plugins/bootstrap/js/bootstrap.js" ?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/owl.carousel.js" ?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/nicescroll.js" ?>"></script>
  </body>
</html>
