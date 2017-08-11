<?php
  session_start();
  include_once 'app/connect.php';
  include_once 'module/userdata.php';
  include_once 'function/greeting.php';
  include_once 'include/comment.php';
  include_once 'function/count.php';
  include_once 'function/likes/postlike.php';
  include_once 'module/post/imgornot.php';
  include_once 'function/urltitle.php';
  include_once 'function/timeago.php';
  include_once 'function/post/option.php';
  include_once 'function/images/covercheck.php';
  include_once 'function/images/pagecovercheck.php';
  include_once 'function/pageinfo.php';
  include_once 'function/userinfo.php';
  include_once 'function/images/fetchpost.php';

  # Check for Active User session
  if(!isset($_SESSION['user_id'])) {
      $_SESSION['prevented_page'] = BASE_URL . "page_home?id=".$_POST['id'];
      header("Location: login");
  } else {
    unset($_SESSION['prevented_page']);

    # Request for collection ID
    $get_id = $_GET['id'];

    if ($get_id == null) {
      header("Location: page");
    }
    # Select collection Info and Load Page
    $page_select = "SELECT * FROM page WHERE page_id='$get_id'";
    $result = mysqli_query($conn, $page_select);
    if ($result) {
      $row = mysqli_fetch_array($result);
      $page_id       = $row['page_id'];
      $page_name     = htmlentities($row['page_name'], ENT_QUOTES, 'UTF-8');
      $page_bio      = htmlentities($row['page_desc'], ENT_QUOTES, 'UTF-8');
      $page_members  = $row['page_members'];
      $page_color    = strtolower($row['page_color']);
      $page_view     = $row['page_view'];
      $page_type	   = $row['page_type'];
      $page_cover    = $row['cover_id'];
      $admin_user_id = $row['user_id'];
    }
  //end of if.
    $check_avail = "SELECT * FROM page WHERE page_id='$get_id'";
    $result = mysqli_query($conn, $check_avail);
    if ($result->num_rows > 0) {
      $row = mysqli_fetch_array($result);
    } else {
      $msg = "Page with ID -> $get_id, Not found.";
      header ("Location: app/error/404?error_message=" . $msg);
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $page_name; ?> - Home</title>
    <?php
      include_once 'metas/seo.php';
      $desc = $page_bio;
      $keyword = "Circlepanda, Social, Network, Page, Messaging, Hangout, Meet, Team, Channel, Collection, Page, Community, Creativity, Fun, Memories, Ideas, Status, Colorful, Family, Friends, Panda, Circle, Group, Partner, People, Blue, Simple, Search, Tools, Images, API, More";
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
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/protected/page.css" ?>">
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
    <!-- Circlepanda Header -->
    <header class="page-header-color" style="background-color:<?php echo $page_color; ?>">
      <?php include_once 'include/header.php' ?>
    </header>

    <!-- Circlepanda Body Content Space -->
    <section class="house">
      <section class="col-sm-2">
        <nav class="page-menu">
          <!-- Display Photo -->
          <img src="<?php echo BASE_URL . "module/images/dp?image_id=" . idtodp($conn, $admin_user_id); ?>" alt="circepanda-page-admin-dp" alt="" class="page-dp">
          <h4><?php echo $page_name ?> </h4>
          <h6><?php echo $page_type ?></h6>

          <div class="">
            <div class="__tab active"> Home </div>
            <div class="__tab"> Reviews </div>
            <div class="__tab"> Videos </div>
            <div class="__tab"> Photos </div>
            <div class="__tab"> About </div>
          </div>
        </nav>
      </section>
      <!-- Circlepanda Cover photo -->
      <section class="page-cover" style="background: url('<?php echo innerpageCovercheck($conn, $page_cover); ?>'); background-size: cover;">
        <div class="infront">
          <label class="myLabel upload-cover-icon">
            <span>
              <input type="file" name="uploadcover" class="coverquery hide">
                <i class="fa fa-camera"></i>
            </span>
          </label>


          <!-- Bottom Option -->
          <div class="cover-optionholder">
            <!-- User Info -->
            <style media="screen">
            .add-btn.active {
              background-color: <?php echo $page_color; ?>;
            }
            </style>
            <button type="button" name="button" class="btn add-btn <?php echo liked() ?> float-right">Like Page</button>
            <span>
              <i class="material-icons inline-pos-addbtn p-opt">more_vert</i>
              <div class="p-opt-dropdown hide">
                <a href="#"> <span class="list"> Page </span> </a>
                <a href="#"> <span class="list"> Messages </span> </a>
                <a href="#"> <span class="list"> Notifications </span> </a>
                <a href="#"> <span class="list"> Insights </span> </a>
                <a href="#"> <span class="list"> Promotion </span> </a>
                <a href="#"> <span class="list"> Settings </span> </a>
              </div>
            </span>
            <div class="abt-txt"> About </div>
          </div>
        </div>
      </section>
      <div class="bottombar">

      </div>

      <section class="post-wrap">
        <div class="l_post-wrap-inner">
          <?php
            # post
            include_once 'include/post.php';
          ?>
          <!-- Circlepanda Greeting Space -->
          <div class="box text-center" style="background-size: cover; background-image: url(<?php echo BASE_URL . "asset/images/stock/68db4265-fa19-408a-81bc-d8ebed6537db.jpg"; ?>);">
            <span class="w3-container">
              <?php
                echo "<div class='white-txt'>". greetings() . "<h3>" . $fullname . " </h3> </div>";
              ?>
            </span>
          </div>
          <?php
          include_once 'function/post/page_post.php';
          ?>

          <!-- End of Post Container -->
        </div>
        <div class="s_post-wrap-inner">
          <!-- Shared Photos On Page -->
          <div class="box w3-container">
            <h6><?php echo "Shared Photos from <strong>". $page_name ."</strong>"?></h6>
            <div class="w3-container">
              <?php echo $photo->pagePost($conn, "photo-grid", $page_id); ?>
            </div>
            <a href="#" class="w3-right w3-bold">See more</a>
          </div>

          <div class="box">
            <div class="w3-container">
              <h6><?php echo "Members of " . $page_name; ?></h6>
                <?php
                  $m = "SELECT * FROM join_page WHERE page_id = '$page_id' ORDER by RAND() LIMIT 6";
                  $result = mysqli_query($conn, $m);
                  while ($memrow = mysqli_fetch_array($result)) {
                    echo '
                    <a href="'.BASE_URL.'friend?user_id='.$memrow['user_id'].'" class="pg_friends">
                      <img src="' . BASE_URL . 'module/images/dp?image_id=' . idtodp($conn, $memrow['user_id']) . '" class="pg_icon_dp" alt="">
                      <div class="pg_name">
                        '.idtoname($conn, $memrow['user_id']).'
                      </div>
                    </a>
                    ';
                  }
                ?>
            </div>
          </div>

          <!-- Featured Page -->
            <?php
            $io = "SELECT * FROM page WHERE user_id != '$user_id'";
            $result = mysqli_query($conn, $io);
            if ($result->num_rows > 0) {
              echo '<div class="box">';
              include_once 'include/featuredpage.php';
              echo '</div>';
            }
            ?>

        </div>
      </section>

      <?php
        # post modal
        $data['url'] = BASE_URL . 'module/post/page_post.php?id='.$page_id;
        include_once 'include/post-modal.php';
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
            var where = "<?php echo $page_name; ?>";
            var url = "module/analytic?time="+timeSpent+"&where="+where;        //Send the time on the page to a php script of your choosing.
            xmlhttp.open("GET",url,false);        //The false at the end tells ajax to use a synchronous call which wont be severed by the user leaving.
            xmlhttp.send(null);        //Send the request and don't wait for a response.
        }
    </script>
    <!-- End*** _GET -->
    <!-- Circlepanda Ajax Scripts -->
    <script src="<?php echo BASE_URL . "ajax/likes.js" ?>"></script>
    <script src="<?php echo BASE_URL . "ajax/pagelike.js" ?>"></script>
    <script src="<?php echo BASE_URL . "ajax/comment.js" ?>"></script>
    <!-- Circlepand Regular Scripts -->
    <script src="<?php echo BASE_URL . "asset/plugins/bootstrap/js/bootstrap.js" ?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/owl.carousel.js" ?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/protected/structure.js" ?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/protected/page.js" ?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/nicescroll.js" ?>"></script>
    <!--<script src="<?php # echo BASE_URL . "asset/js/pace.min.js" ?>" charset="utf-8"></script>-->
  </body>
</html>
