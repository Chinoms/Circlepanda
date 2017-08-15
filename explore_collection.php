<?php
  session_start();
  include_once 'app/connect.php';
  include_once 'module/userdata.php';
  include_once 'function/__autoload.php';

  # Check for Active User session
  if(!isset($_SESSION['user_id'])) {
      $_SESSION['prevented_page'] = BASE_URL . "explore_collection";
      header("Location: login");
  } else {
    unset($_SESSION['prevented_page']);
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Explore collections </title>
    <?php
      include_once 'metas/seo.php';
      $desc = "Discover Trending Collections on Circlepanda";
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
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/media/collection.media.css" ?>">
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
    <style media="screen">
      .collection {
        display: inline-block;
        margin: 0 0 0 0;
        width:220px;
        height:55px;
        padding: 0px 0 0 70px;
        background-color:#E5E5E5;
        color:#F90;
      }

      .submenu ul a li.explore {
        display: inline-block;
      	color: #FFFFFF;
      	margin: 5px 0 0 0;
      	height: auto;
      	width: auto;
      	padding: 0 60px 15px 60px;
      	border-bottom: 3px solid;
      	border-color: #FFFFFF;
      	transition: .5s ease-in-out;
      }
    </style>
  </head>
  <body>
    <!-- Circlepanda Header -->
    <header class="header collection-header-color">
      <?php
        include_once 'include/header.php';
        include_once 'include/menu/collection_menu.php';
      ?>
    </header>

    <!-- Circlepanda Body Content Space -->
    <section class="house">
      <!-- Circlepanda Menu -->
      <?php include_once 'include/menu_margin.php'; ?>

      <div class="postarea_plus">
        <?php
        # select highly joined collections created by users in general
        $fetch = "SELECT * FROM collection WHERE user_id != $user_id and collection_followers > 1000 ORDER BY Collection_id DESC LIMIT 30";
        $result = mysqli_query($conn, $fetch);
          while ($row = mysqli_fetch_array($result)) {
            echo '<a href="'. BASE_URL .'collection_home/'. $row['Collection_id'] .'" class="display-box" style="background-color:'.$row['Collection_color'].'">
            '. collectionCovercheck($conn, $row['cover_id']) .'
              <img src="'. $row['profile_pic_id'] .'" class="ico-dp w3-circle">
              <div class="w3-container pulldown-top">
              <span class="inner-name"><strong>'. $row['Col_name'] .'</strong></span>
              <p class="contact-define">'. $row['Collection_view'] .'</p>
              <button type="button" class="inner-btn">Follow</button>
              </div>
            </a>';
          }
        ?>
      </div>
    </section>
    <?php include_once 'app/error/modal.php'; ?>

    <!-- Getting how much time a user spent on page -->
    <script type="text/javascript">
        var startTime = new Date();        //Start the clock!
        window.onbeforeunload = function()        //When the user leaves the page(closes the window/tab, clicks a link)...
        {
            var endTime = new Date();        //Get the current time.
            var timeSpent = (endTime - startTime);        //Find out how long it's been.
            var xmlhttp;        //Make a variable for a new ajax request.
            if (window.XMLHttpRequest)        //If it's a decent browser...
            {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();        //Open a new ajax request.
            }
            else        //If it's a bad browser...
            {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");        //Open a different type of ajax call.
            }
            var where = "explore collection";
            var url = "module/analytic?time="+timeSpent+"&where="+where;        //Send the time on the page to a php script of your choosing.
            xmlhttp.open("GET",url,false);        //The false at the end tells ajax to use a synchronous call which wont be severed by the user leaving.
            xmlhttp.send(null);        //Send the request and don't wait for a response.
        }
    </script>
    <!-- End*** _GET -->
    <!-- Circlepanda Ajax Scripts -->
    <script src="<?php echo BASE_URL . "ajax/likes.js" ?>"></script>
    <!-- Circlepand Regular Scripts -->
    <script src="<?php echo BASE_URL . "asset/plugins/bootstrap/js/bootstrap.js" ?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/owl.carousel.js" ?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/protected/structure.js" ?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/nicescroll.js" ?>"></script>
    <!--<script src="<?php # echo BASE_URL . "asset/js/pace.min.js" ?>" charset="utf-8"></script>-->
  </body>
</html>
