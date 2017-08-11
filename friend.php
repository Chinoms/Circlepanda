<?php
  session_start();
  include_once 'app/connect.php';
  include_once 'module/userdata.php';
  include_once 'function/greeting.php';
  include_once 'include/comment.php';
  include_once 'function/timeago.php';
  include_once 'function/likes/postlike.php';
  include_once 'module/post/imgornot.php';
  include_once 'function/urltitle.php';
  include_once 'function/post/option.php';
  include_once 'function/count.php';
  include_once 'function/images/covercheck.php';
  include_once 'function/images/channelcovercheck.php';
  include_once 'function/images/collectioncovercheck.php';
  include_once 'function/images/pagecovercheck.php';
  include_once 'function/userinfo.php';
  include_once 'function/collectioninfo.php';

  # Check for Active User session
  if(!isset($_SESSION['user_id'])) {
      $_SESSION['prevented_page'] = BASE_URL . "friend";
      header("Location: login");
  } else {
    unset($_SESSION['prevented_page']);
    $id = usernametoid($conn, $_GET['user_name']);
    $my_id = $user_id;
    if ($user_id == $id) {
      header("location: profile");
    }

    /*
    * Get User Information
    */
    $select_query = sprintf("SELECT * FROM users WHERE user_id = %d",
    $id);
    $result = mysqli_query($conn, $select_query);
    if ($result) {
      $row = mysqli_fetch_array($result);
      $fr_user_id        = $row['user_id'];
      $fr_fullname       = $row['fullname'];
      list($fr_first_name, $fr_last_name) = explode(' ', htmlentities($row['fullname'], ENT_QUOTES, 'UTF-8'));
      $fr_user_name 	    = $row['user_name'];
      $fr_email          = strtolower($row['email']);
      $fr_gender         = $row['gender'];
      $fr_phone   	      = $row['phone'];
      $fr_country	      = $row['country'];
      $fr_state 	        = $row['state'];
      $fr_city	          = $row['city'];
      $fr_year           = $row['year'];
      $fr_bio            = $row['bio'];
      $fr_cover_id       = $row['user_cover_id'];
      $fr_verified_user  = $row['verified_user'];
      $fr_profile_pic_id = get_web_path($row['profile_pic_id']);
    }

    # From Table = "users_status"
    $select_advance_query = sprintf("SELECT * FROM users_status WHERE user_id = %d",
    $id);
    $result = mysqli_query($conn, $select_advance_query);
    if ($result) {
      $row = mysqli_fetch_array($result);
      $fr_relationship = $row['relationship'];
      $fr_looking = $row['looking'];
      $fr_school = $row['school'];
      $fr_school_from = $row['school_from'];
      $fr_school_to = $row['school_to'];
      $fr_work = $row['work'];
      $fr_work_from = $row['work_from'];
      $fr_work_to = $row['work_to'];
      $fr_work_as = $row['work_as'];
      $fr_studied = $row['studied'];
      $fr_website = $row['website'];
      $fr_about = $row['about'];
      $fr_facebook_url = $row['facebook_url'];
      $fr_twitter_url = $row['twitter_url'];
      $fr_instagram_url = $row['instagram_url'];
      $fr_address = $row['address'];
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> <?php echo $fr_fullname . " " . $not_count ?> </title>
    <?php
      include_once 'metas/seo.php';
      $desc = $bio;
      $keyword = "Circlepanda, $fullname, Social, Network, Profile, Circle";
      echo seoMeta($desc, $keyword);
    ?>
    <link rel="icon" href="<?php echo BASE_URL . "asset/images/circlepanda-fa-icon.png" ?>">
    <!-- Site Style -->
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/structure.css" ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/online.min.css"; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/media/profile.media.css" ?>">
    <!--<link rel="stylesheet" href="<?php # echo BASE_URL . "asset/css/pace.css"; ?>">-->
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/plugins/fontawesome/css/font-awesome.css"; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/plugins/bootstrap/css/bootstrap.css"; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/w3.css" ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/protected/profile.css" ?>">
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
      .profile {
        display: inline-block;
        margin: 0 0 0 0;
        width:220px;
        height:55px;
        padding: 0px 0 0 70px;
        background-color:#E5E5E5;
        color:#0C9;
      }
    </style>
  </head>
  <body>
    <!-- Circlepanda Header -->
    <header class="profile-header-color">
      <?php include_once 'include/header.php' ?>
    </header>

    <!-- Circlepanda Body Content Space -->
    <section class="house">
      <!-- Circlepanda Menu -->
      <?php include_once 'include/menu.php'; ?>

      <!-- Circlepanda Cover photo -->
      <section class="profile-cover">
        <!-- Bottom Option -->
        <div class="cover-optionholder">
          <!-- Display Photo -->
          <img src="<?php echo $fr_profile_pic_id; ?>" alt="" class="profile-dp w3-circle">
          <!-- User Info -->
          <div class="user-info">
            <h3>
              <?php
              echo $fr_fullname;
              if ($fr_verified_user == 1) {
                echo '<i class="material-icons">verified_user</i>';
              } else {
                # Null
              }
              ?>
            </h3>
            <p>
              <?php
                if ($fr_bio == 0) {
                  $fr_bio = "Hey, I'm New On Circlepanda";
                } else {
                  $fr_bio = $bio;
                }

                echo "<span class='countfollowers'>" . returnCount($conn, "follow_friend", "friends_id", $fr_user_id) . "</span> follower(s) - " . $fr_bio
              ?>
            </p>
          </div>
          <?php
            $chkfollow = "SELECT * FROM follow_friend WHERE user_id = $my_id and friends_id = $fr_user_id";
            $result = mysqli_query($conn, $chkfollow);
              if ($result) {
                $row = mysqli_fetch_array($result);
                $f_id = $row['user_id'];
                if ($f_id) {
                  echo '<button type="button" name="button" class="btn add-btn follow active float-right" data-userid="'. $fr_user_id .'" data-set="follow"> Following <i class="fa fa-check-circle"></i> </button>';
                } else {
                  echo '<button type="button" name="button" class="btn add-btn follow float-right" data-userid="'. $fr_user_id .'" data-set="follow"> Follow </button>';
                }
              }
          ?>
          <span>
            <i class="material-icons inline-pos-addbtn p-opt">more_vert</i>
            <div class="p-opt-dropdown hide">
              <a href="#"> <span class="list"> Add Close </span> </a>
              <a href="#"> <span class="list"> Send message </span> </a>
              <a href="#"> <span class="list"> Report User </span> </a>
            </div>
          </span>
          <div class="abt-txt"> About </div>
        </div>
      </section>


      <section class="postarea">
        <h5 class="section-tag">
          <?php
          if(!$fr_last_name){
            echo $fr_first_name;
          } else {
            echo $fr_last_name;
          } ?> 's Post </h5>
        <!-- Circlepanda Left Content Space -->
        <div class="left-content">

          <!-- Circlepanda Fetched Post -->
          <?php
            # Users Post
            include_once 'function/post/self/fr_no-limitpost.php';
            # Collection Post
            include_once 'function/post/self/fr_collectionpost.php';
          ?>
          <!-- End Left content Space -->
        </div>

        <!-- Circlepanda right Content Space -->
        <div class="right-content">
          <?php
            # Channel Post
            include_once 'function/post/self/fr_channelpost.php';
          ?>
        </div>
      </section>


      <!-- About Space -->
      <span class="p-tint-bottom-layer"></span>
      <section class="p-tint-top-layer">
        <section class="about-holder">
          <span class="basic-cont w3-center">
            <?php
              echo "<img src='".$fr_profile_pic_id."' class='bigger-dp'>";
              echo "<h3>". $fr_fullname . "</h3>" . "<h6> @" . $fr_user_name . "</h6>";
              if (!$fr_bio) {
                echo "I'm new here";
              } else {
                echo $fr_bio;
              }
              echo '
              <div class="w3-container">
              <a href="http://www.circlepanda.com/" class="ui_url"> Circlepanda </a>
              </div>
              ';
            ?>

          </span>

          <?php
            if (!$fr_about) {
              echo '';
            } else {
              echo '
              <span class="append-cont">
                <h4 class="bolder"> About </h4>
                <h5> <strong> Tag line </strong> </h5>
                <h6 class="about-text w3-justify"> '. $fr_bio .' </h6>
                <h5 class="bolder"> <strong> Introduction </strong> </h5>
                <h6 class="about-text w3-justify"> '. $fr_about .' </h6>
              </span>
              ';
            }
          ?>

          <?php
            function slit($param){
              list($a, $b, $c, $d) = explode("/", $param);
              return $d;
            }
              echo '<span class="append-cont">
                <h4 class="bolder"> Contact </h4>';
                if (!$fr_facebook_url) {
                  echo '';
                } else {
                  echo '
                  <div class="w3-container">
                    <div class="w3-col s12 m2"> <i class="fa fa-facebook"></i> </div>
                    <div class="w3-col s12 m10"><a href="'.$fr_facebook_url.'">'. slit($fr_facebook_url) .'</a></div>
                  </div>';
                }

                if (!$fr_twitter_url) {
                  echo '';
                } else {
                  echo '
                  <div class="w3-container">
                    <div class="w3-col s12 m2"> <i class="fa fa-twitter"></i> </div>
                    <div class="w3-col s12 m10"><a href="'.$fr_twitter_url.'">@'. slit($fr_twitter_url) .'</a></div>
                  </div>';
                }

                if (!$fr_instagram_url) {
                  echo '';
                } else {
                  echo '
                  <div class="w3-container">
                    <div class="w3-col s12 m2"> <i class="fa fa-instagram"></i> </div>
                    <div class="w3-col s12 m10"><a href="http://www.instagram.com/'.$fr_instagram_url.'">'. $fr_instagram_url .'</a></div>
                  </div>';
                }

                if (!$fr_phone) {
                  echo '';
                } else {
                  echo '
                  <div class="w3-container">
                    <div class="w3-col s12 m2"> <i class="fa fa-phone"></i> </div>
                    <div class="w3-col s12 m10">'. $fr_phone .'</div>
                  </div>';
                }

                if (!$fr_email) {
                  echo '';
                } else {
                  echo '
                  <div class="w3-container">
                    <div class="w3-col s12 m2"> <i class="fa fa-envelope"></i> </div>
                    <div class="w3-col s12 m10">'. $fr_email .'</div>
                  </div>';
                }
              echo '</span>';
          ?>
            <?php
            if (!$fr_work || !$fr_school) {
              echo '';
            } else {
              echo '<span class="append-cont">
              <h4 class="bolder"> Work &amp; Education </h4>
              <div class="w3-container">
                <div class="w3-col s12 m2"> <i class="fa fa-briefcase"></i> </div>
                ';
                if ($fr_work_to == "Till Date") {
                  echo '<div class="w3-col s12 m10">Working at <strong>'. $fr_work .'</strong> since <strong>'. $fr_work_from .'</strong> <strong>'. $fr_work_to .'</strong></div>';
                } else {
                  echo '<div class="w3-col s12 m10">Worked at <strong>'. $fr_work .'</strong> since <strong>'. $fr_work_from .'</strong> - <strong>'. $fr_work_to .'</strong></div>';
                }
                echo '
              </div>

              <div class="w3-container">
                <div class="w3-col s12 m2"> <i class="fa fa-graduation-cap"></i> </div>
                ';
                if ($fr_school_to == "Till Date") {
                  echo '<div class="w3-col s12 m10">Schooling at <strong>'. $fr_school .'</strong> since <strong>'. $fr_school_from .'</strong> <strong>'. $fr_school_to .'</strong></div>';
                } else {
                  echo '<div class="w3-col s12 m10">Schooled at <strong>'. $fr_school .'</strong> since <strong>'. $fr_school_from .'</strong> - <strong>'. $fr_school_to .'</strong></div>';
                }
                echo '
              </div>
              </span>';
            }
            ?>
          <span class="append-cont">
            <h4 class="bolder">Places</h4>
            <?php
              echo '<div class="w3-container">
                <div class="w3-col s12 m2"> <i class="fa fa-map-marker"></i> </div>
                <div class="w3-col s12 m10">Lives within <strong>' . $fr_country . '</strong>, <strong>' . $fr_state . '</strong> <strong>'. $fr_city .'</strong></div>';
            ?>
          </span>
        </section>
      </section>
      <!-- About End -->

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
            var where = "channel";
            var url = "module/analytic?time="+timeSpent+"&where="+where;        //Send the time on the page to a php script of your choosing.
            xmlhttp.open("GET",url,false);        //The false at the end tells ajax to use a synchronous call which wont be severed by the user leaving.
            xmlhttp.send(null);        //Send the request and don't wait for a response.
        }
    </script>
    <!-- End*** _GET -->
    <!-- Circlepanda Ajax Scripts -->
    <script src="<?php echo BASE_URL . "ajax/tour.js" ?>"></script>
    <script src="<?php echo BASE_URL . "ajax/follow.js" ?>"></script>
    <script src="<?php echo BASE_URL . "ajax/likes.js" ?>"></script>
    <script src="<?php echo BASE_URL . "ajax/collectionlike.js" ?>"></script>
    <script src="<?php echo BASE_URL . "ajax/channellike.js" ?>"></script>
    <script src="<?php echo BASE_URL . "ajax/comment.js" ?>"></script>
    <!-- Circlepand Regular Scripts -->
    <script src="<?php echo BASE_URL . "asset/plugins/bootstrap/js/bootstrap.js" ?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/protected/structure.js" ?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/protected/profile.js" ?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/owl.carousel.js" ?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/nicescroll.js" ?>"></script>
    <!--<script src="<?php # echo BASE_URL . "asset/js/pace.min.js" ?>" charset="utf-8"></script>-->
  </body>
</html>
