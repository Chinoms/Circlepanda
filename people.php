<?php
  session_start();
  include_once 'app/connect.php';
  include_once 'module/userdata.php';
  include_once 'function/timeago.php';
  include_once 'module/post/imgornot.php';
  include_once 'function/images/covercheck.php';
  include_once 'function/userinfo.php';

  # Check for Active User session
  if(!isset($_SESSION['user_id'])) {
      $_SESSION['prevented_page'] = BASE_URL . "people";
      header("Location: login");
  } else {
    unset($_SESSION['prevented_page']);
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Circlepanda people</title>
    <?php
      include_once 'metas/seo.php';
      $desc = "People on Circlepanda";
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
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/protected/people.css" ?>">
    <script src="<?php echo BASE_URL . "asset/js/jquery.min.js"; ?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/online.min.js"; ?>"></script>
    <script>
        var run = function() {
         if (Offline.state === 'up')
          Offline.check();
         } setInterval(run, 5000);
    </script>
    <style media="screen">
      .people {
        display: inline-block;
        margin: 0 0 0 0;
        width: 220px;
        height: 55px;
        padding: 0px 0 0 70px;
        background-color: #E5E5E5;
        color: #FFF;
      }

      .submenu ul a li.list {
        display: inline-block;
      	margin: 5px 0 0 0;
      	height: auto;
      	width: auto;
      	padding: 0 60px 15px 60px;
      	border-bottom: 3px solid #000;
      	transition: .5s ease-in-out;
      }

      header i, header a{
        color: #000;
      }
    </style>
  </head>
  <body>
    <!-- Circlepanda Header -->
    <header class="header people-header-color people-menu">
      <?php
        include_once 'include/header.php';
        include_once 'include/people_menu.php';
      ?>
    </header>

    <!-- Circlepanda Body Content Space -->
    <section class="house">
      <!-- Circlepanda Menu -->
      <?php include_once 'include/menu_margin.php'; ?>
      <div class="postarea_plus">
        <?php
          $fol = "SELECT * FROM users u JOIN	follow_friend f ON u.user_id = f.user_id WHERE f.friends_id='$user_id'";
          $result = mysqli_query($conn, $fol);
            if ($result->num_rows > 0) {
              while ($user = mysqli_fetch_array($result)) {
                echo '<a href="'. BASE_URL .'friend?user_id='. $user['user_id'] .'" class="display-box" style="background-color:#fff;">
                '. userCovercheck($conn, $user['user_cover_id']) .'
                  <img src="'. BASE_URL .'module/images/dp?image_id='. $user['profile_pic_id'] .'" class="ico-dp w3-circle">
                  <div class="w3-container pulldown-top">
                  <span class="inner-name"><strong>'. $user['fullname'] .'</strong></span>
                  <p class="contact-define">'. idtofollowers($conn, $user['user_id']) .'</p>
                  <button type="button" class="inner-btn follow-user-btn">Follow</button>
                  </div>
                </a>';
              }
            } else {
              echo '<div class="w3-container nonestat-info w3-center"> You have no follower on circlepanda </div>';
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
            var where = "follower";
            var url = "module/analytic?time="+timeSpent+"&where="+where;        //Send the time on the page to a php script of your choosing.
            xmlhttp.open("GET",url,false);        //The false at the end tells ajax to use a synchronous call which wont be severed by the user leaving.
            xmlhttp.send(null);        //Send the request and don't wait for a response.
        }
    </script>
    <!-- End*** _GET -->
    <!-- Circlepanda Ajax Scripts -->
    <script type="text/javascript">
      $(".follow-user-btn").on('click', function(){
        event.preventDefault();
        $(this).text('following').addClass('active');
        var i = $(".contact-define").text().split(" ");
        alert(+i[0] + +1);
      });
    </script>
    <script src="<?php echo BASE_URL . "ajax/likes.js" ?>"></script>
    <!-- Circlepand Regular Scripts -->
    <script src="<?php echo BASE_URL . "asset/plugins/bootstrap/js/bootstrap.js" ?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/owl.carousel.js" ?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/protected/structure.js" ?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/nicescroll.js" ?>"></script>
    <!--<script src="<?php # echo BASE_URL . "asset/js/pace.min.js" ?>" charset="utf-8"></script>-->
  </body>
</html>
