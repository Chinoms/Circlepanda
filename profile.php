<?php
  session_start();
  include_once 'app/connect.php';
  include_once 'module/userdata.php';
  include_once 'function/__autoload.php';
  include_once 'module/imgornot.php';

  # Check for Active User session
  if(!isset($_SESSION['user_id'])) {
      $_SESSION['prevented_page'] = BASE_URL . "profile";
      header("Location: login");
  } else {
    unset($_SESSION['prevented_page']);
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> <?php echo $fullname ?> </title>
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
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/protected/profile.css" ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/media/profile.media.css" ?>">
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
        <!-- Upload Cover Button -->
        <div class="w3-container w3-center">
          <button type="submit" name="send" class="btn coverquerybtn add-btn hide">
            Done <i class="fa fa-spin fa-"></i>
          </button>
        </div>
        <label class="myLabel upload-cover-icon">
          <span>
            <input type="file" name="uploadcover" class="coverquery hide">
              <i class="fa fa-camera"></i>
          </span>
        </label>


        <!-- Bottom Option -->
        <div class="cover-optionholder">
          <!-- Display Photo -->
          <img src="<?php echo $profile_pic_id; ?>" alt="<?php echo $fullname; ?>" class="profile-dp w3-circle">
          <!-- User Info -->
          <div class="user-info">
            <h3>
              <?php
              echo $fullname;
              if ($verified_user == 1) {
                echo '<i class="material-icons">verified_user</i>';
              } else {
                # Null
              }
              ?>
            </h3>
            <p>
              <?php
                if ($bio == 0) {
                  $bio = "Hey, I'm New On Circlepanda";
                } else {
                  $bio = $bio;
                }

                echo $analytics->returnCount($conn, "follow_friend", "friends_id", $user_id) ." follower(s) - " . $bio
              ?>
            </p>
          </div>
          <span class="holder-mobi">
            <button type="button" name="button" class="btn add-btn float-right geteditmodal">Update Info</button>
            <span>
              <i class="material-icons inline-pos-addbtn p-opt">more_vert</i>
              <div class="p-opt-dropdown hide">
                <a href="#"> <span class="list"> Activity log </span> </a>
                <a href="#"> <span class="list"> Report a Problem </span> </a>
              </div>
            </span>
            <div class="abt-txt"> About </div>
          </span>
        </div>
      </section>

      <section class="postarea">
        <h5 class="section-tag"> <?php echo $last_name . "'s" ?> Post </h5>
        <!-- Circlepanda Left Content Space -->
        <div class="left-content">
          <!--Circlepanda Post space -->
          <?php
            # post
            include_once 'include/post.php';
          ?>

          <!-- Circlepanda Fetched Post -->
          <?php
            # Users Post
            include_once 'include/post/self/no-limitpost.php';
            # Collection Post
            include_once 'include/post/self/collectionpost.php';
          ?>
          <!-- End Left content Space -->
        </div>

        <!-- Circlepanda right Content Space -->
        <div class="right-content">
          <?php
            # Channel Post
            include_once 'include/post/self/channelpost.php';
          ?>
        </div>
      </section>

      <!-- About Space -->
      <span class="p-tint-bottom-layer"></span>
      <section class="p-tint-top-layer">
        <section class="about-holder">
          <span class="basic-cont w3-center">
            <?php
              echo "<img src='".$profile_pic_id."' class='bigger-dp'>";
              echo "<h3>". $fullname . "</h3>" . "<h6> @" . $user_name . "</h6>";
              if (!$bio) {
                echo "I'm new here";
              } else {
                echo $bio;
              }
              echo '
              <div class="w3-container">
              <a href="http://www.circlepanda.com/" class="ui_url"> Circlepanda </a>
              </div>
              ';
            ?>

          </span>

          <?php
            if (!$about) {
              echo '';
            } else {
              echo '
              <span class="append-cont">
                <h4 class="bolder"> About </h4>
                <h5> <strong> Tag line </strong> </h5>
                <h6 class="about-text w3-justify"> '. $bio .' </h6>
                <h5 class="bolder"> <strong> Introduction </strong> </h5>
                <h6 class="about-text w3-justify"> '. $about .' </h6>
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
                if (!$facebook_url) {
                  echo '';
                } else {
                  echo '
                  <div class="w3-container">
                    <div class="w3-col s12 m2"> <i class="fa fa-facebook"></i> </div>
                    <div class="w3-col s12 m10"><a href="'.$facebook_url.'">'. slit($facebook_url) .'</a></div>
                  </div>';
                }

                if (!$twitter_url) {
                  echo '';
                } else {
                  echo '
                  <div class="w3-container">
                    <div class="w3-col s12 m2"> <i class="fa fa-twitter"></i> </div>
                    <div class="w3-col s12 m10"><a href="'.$twitter_url.'">@'. slit($twitter_url) .'</a></div>
                  </div>';
                }

                if (!$instagram_url) {
                  echo '';
                } else {
                  echo '
                  <div class="w3-container">
                    <div class="w3-col s12 m2"> <i class="fa fa-instagram"></i> </div>
                    <div class="w3-col s12 m10"><a href="http://www.instagram.com/'.$instagram_url.'">'. $instagram_url .'</a></div>
                  </div>';
                }

                if (!$phone) {
                  echo '';
                } else {
                  echo '
                  <div class="w3-container">
                    <div class="w3-col s12 m2"> <i class="fa fa-phone"></i> </div>
                    <div class="w3-col s12 m10">'. $phone .'</div>
                  </div>';
                }

                if (!$email) {
                  echo '';
                } else {
                  echo '
                  <div class="w3-container">
                    <div class="w3-col s12 m2"> <i class="fa fa-envelope"></i> </div>
                    <div class="w3-col s12 m10">'. $email .'</div>
                  </div>';
                }
              echo '</span>';
          ?>
            <?php
            if (!$work || !$school) {
              echo '';
            } else {
              echo '<span class="append-cont">
              <h4 class="bolder"> Work &amp; Education </h4>
              <div class="w3-container">
                <div class="w3-col s12 m2"> <i class="fa fa-briefcase"></i> </div>
                ';
                if ($work_to == "Till Date") {
                  echo '<div class="w3-col s12 m10">Working at <strong>'. $work .'</strong> since <strong>'. $work_from .'</strong> <strong>'. $work_to .'</strong></div>';
                } else {
                  echo '<div class="w3-col s12 m10">Worked at <strong>'. $work .'</strong> since <strong>'. $work_from .'</strong> - <strong>'. $work_to .'</strong></div>';
                }
                echo '
              </div>

              <div class="w3-container">
                <div class="w3-col s12 m2"> <i class="fa fa-graduation-cap"></i> </div>
                ';
                if ($school_to == "Till Date") {
                  echo '<div class="w3-col s12 m10">Schooling at <strong>'. $school .'</strong> since <strong>'. $school_from .'</strong> <strong>'. $school_to .'</strong></div>';
                } else {
                  echo '<div class="w3-col s12 m10">Schooled at <strong>'. $school .'</strong> since <strong>'. $school_from .'</strong> - <strong>'. $school_to .'</strong></div>';
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
                <div class="w3-col s12 m10">Lives within <strong>' . $country . '</strong>, <strong>' . $state . '</strong> <strong>'. $city .'</strong></div>';
            ?>
          </span>
        </section>
      </section>
      <!-- About End -->

      <?php
        $data['url'] = BASE_URL . 'module/post/regular_post';
        include_once 'include/post-modal.php';
        include_once 'include/updateprofile.php';
      ?>

      <!-- Post Icon -->
    	<span class="posticon-holder trigger-status">
    		<i class="material-icons md-24">create</i>
    	</span>
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
            var where = "profile";
            var url = "module/analytic?time="+timeSpent+"&where="+where;        //Send the time on the page to a php script of your choosing.
            xmlhttp.open("GET",url,false);        //The false at the end tells ajax to use a synchronous call which wont be severed by the user leaving.
            xmlhttp.send(null);        //Send the request and don't wait for a response.
        }
    </script>
    <!-- End*** _GET -->
    <!-- Circlepanda Ajax Scripts -->
    <script src="<?php echo BASE_URL . "ajax/updateuser.js" ?>"></script>
    <script src="<?php echo BASE_URL . "ajax/tour.js" ?>"></script>
    <script src="<?php echo BASE_URL . "ajax/likes.js" ?>"></script>
    <script src="<?php echo BASE_URL . "ajax/collectionlike.js" ?>"></script>
    <script src="<?php echo BASE_URL . "ajax/channellike.js" ?>"></script>
    <script src="<?php echo BASE_URL . "ajax/comment.js" ?>"></script>
    <!-- Circlepand Regular Scripts -->
    <script src="<?php echo BASE_URL . "asset/js/protected/edit.js" ?>"></script>
    <script src="<?php echo BASE_URL . "asset/plugins/bootstrap/js/bootstrap.js" ?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/owl.carousel.js" ?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/nicescroll.js" ?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/protected/structure.js" ?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/protected/profile.js" ?>"></script>
    <!--<script src="<?php # echo BASE_URL . "asset/js/pace.min.js" ?>" charset="utf-8"></script>-->
  </body>
</html>
