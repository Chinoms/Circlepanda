<?php
  session_start();
  include_once 'app/connect.php';
  include_once 'module/userdata.php';
  include_once 'function/__autoload.php';
  include_once 'module/imgornot.php';

  # Check for Active User session
  if(!isset($_SESSION['user_id'])) {
      $_SESSION['prevented_page'] = BASE_URL . "home";
      header("Location: login");
  } else {
    unset($_SESSION['prevented_page']);
    // Select site tour details
    $tour = "SELECT * FROM sitetour WHERE user_id = $user_id";
    $result = mysqli_query($conn, $tour);
    if ($result) {
      $row = mysqli_fetch_array($result);
      $id  = $row['user_id'];
      $badge = $row['badge'];
      $notification = $row['notification'];
      $messages = $row['messages'];
      $status = $row['status'];
      $p_status = $row['personal_status'];
    }

    if(!$id) {
    	header("Location: module/tour");
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Circlepanda </title>
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
      <!-- Circlepanda Comment Modal End -->
      <?php
        // check if you've been introduced before now yes ? no :
        if ($id == $user_id && $notification == 0 && $status == 0) {
          include_once 'include/intro.php';
        }
        // Circlepanda Menu
        include_once 'include/menu.php';
      ?>

      <!-- Content Space -->
      <div class="postarea">

        <!-- Circlepanda Left Content Space -->
        <div class="left-content">
          <!--Circlepanda Post space -->
          <?php
            # post
            include_once 'include/post.php';
            # page
            include_once 'include/page/page_allpost.php';
          ?>
          <!-- Circlepanda Greeting Space -->
          <div class="box text-center" style="background-size: cover; background-image: url(<?php echo BASE_URL . "asset/images/stock/68db4265-fa19-408a-81bc-d8ebed6537db.jpg"; ?>);">
            <span class="w3-container">
              <?php
                echo '<div class="white-txt">'. $time->greetings() . '<h3>' . $fullname . '</h3> </div>';
              ?>
            </span>
          </div>


          <!-- Circlepanda Fetched Post -->
          <?php
          # Users Post
          include_once 'include/post/post.php';
          // People you know
          $io = "SELECT * FROM users WHERE user_id != '$user_id'";
          $result = mysqli_query($conn, $io);
          if ($result->num_rows > 0) {
            echo '<div class="box">';
            include_once 'include/peopleyoumayknow.php';
            echo '</div>';
          }
          // Channel
          include_once 'include/channel/channel_allpost.php';
          ?>
          <!-- End Left content Space -->
        </div>


        <!-- Circlepanda right Content Space -->
        <div class="right-content">
            <?php
              # collection
              include_once 'include/collection/collection_allpost.php';

              $io = "SELECT * FROM channel WHERE user_id != '$user_id'";
              $result = mysqli_query($conn, $io);
              if ($result->num_rows > 0) {
                echo '<div class="box">';
                include_once 'include/featuredchannel.php';
                echo '</div>';
              }

              $io = "SELECT * FROM collection WHERE user_id != '$user_id'";
              $result = mysqli_query($conn, $io);
              if ($result->num_rows > 0) {
                echo '<div class="box">';
                include_once 'include/featuredcollection.php';
                echo '</div>';
              }
            ?>
        </div>
      </div>

      <!-- Circlepanda Chat Pane -->
      <div class="chat-pane">
        <?php
          # Chat head
          include_once 'include/hangout/chat.php';
        ?>
      </div>
      <!-- Circlepanda Chat Pane End -->

      <!-- Post Icon -->
    	<span class="posticon-holder trigger-status">
    		<i class="material-icons md-24">create</i>
    	</span>
    </section>



    <!-- Circlepanda post start -->
    <?php
      $data['url'] = BASE_URL . 'module/user_post';
      include_once 'include/post-modal.php';
    ?>
    <!-- Circlepanda post end -->
    <?php include_once 'app/error/modal.php'; ?>
    <?php
      # include_once 'include/chat_widget.php';
    ?>

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
            var where = "home";
            var url = "module/analytic?time="+timeSpent+"&where="+where;        //Send the time on the page to a php script of your choosing.
            xmlhttp.open("GET",url,false);        //The false at the end tells ajax to use a synchronous call which wont be severed by the user leaving.
            xmlhttp.send(null);        //Send the request and don't wait for a response.
        }
    </script>
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
