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
include_once 'function/images/covercheck.php';
include_once 'function/images/collectioncovercheck.php';
include_once 'function/userinfo.php';
include_once 'function/collectioninfo.php';

//Check for Active User session
if(!isset($_SESSION['user_id'])){
  $_SESSION['prevented_page'] = BASE_URL . "collection_home";
  header("Location: login");
} else {
  unset($_SESSION['prevented_page']);

  # Request for collection ID
  $get_id = $_GET['id'];

  if ($get_id == null) {
    header("Location: my_collection");
  }
  # Select collection Info and Load Page
  $collection_select = "SELECT * FROM collection WHERE Collection_id='$get_id'";
  $result = mysqli_query($conn, $collection_select);
  if ($result) {
    $row = mysqli_fetch_array($result);
    $collection_id       = $row['Collection_id'];
    $collection_name     = htmlentities($row['Col_name'], ENT_QUOTES, 'UTF-8');
    $collection_bio      = htmlentities($row['Col_bio'], ENT_QUOTES, 'UTF-8');
    $collection_members  = $row['collection_followers'];
    $collection_color    = strtolower($row['Collection_color']);
    if ($collection_color) {
      $collection_color = $collection_color;
    } else {
      $collection_color = "Grey";
    }
    $collection_view     = $row['Collection_view'];
    $collection_type	   = $row['Collection_type'];
    $collection_cover    = $row['cover_id'];
    $admin_user_id			 = $row['user_id'];
  }
//end of if.
  $check_avail = "SELECT count(*) FROM collection WHERE Collection_id = " . $get_id;
  $result = mysqli_query($conn, $check_avail);
  if ($result) {
    $row = mysqli_fetch_array($result);
    $i = $row[0];
    if ($i > 0) {
      #do nothing
      #passed test
    } else {
      $msg = "Collection $get_id, Not found.";
      header ("Location: app/error/404?error_message=" . $msg);
    }
  }
  //End of else
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $collection_name; ?> Collection</title>
    <?php
      include_once 'metas/seo.php';
      $desc = $collection_name;
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
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/media/collection.media.css" ?>">
    <script src="<?php echo BASE_URL . "asset/js/jquery.min.js"; ?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/online.min.js"; ?>"></script>
    <script>
        var run = function() {
           if (Offline.state === 'up') {
            Offline.check();
           } setInterval(run, 5000)
         }
    </script>
  </head>
  <body>

    <header style="background-color: <?php echo $collection_color; ?>;">
      <?php include_once 'include/header.php'; ?>
    </header>

    <!-- Left Panel -->
    <section class="left-pane-display" style="<?php echo 'background-color:'.$collection_color ?>">
        <div class="inner-cover">
          <?php echo innercollerctionCovercheck($conn, $collection_cover) ?>
          <span class="inner-cover-holder">
              <a href="javascript:history.back()" class="col-sm-2 clickable-ico">
                <i class="material-icons">undo</i>
              </a>
              <div class="col-sm-2 col-sm-offset-6 clickable-ico">
                <i class="material-icons">share</i>
              </div>
              <?php
                if ($admin_user_id !== $user_id) {
                  echo '<div class="col-sm-2 clickable-ico edit-cpc">
                    <i class="material-icons">more_vert</i>
                    </div>';
                } else {
              echo '<div class="col-sm-2 clickable-ico">
                      <i class="material-icons">more_vert</i>
                    </div>
                    <div class="editor-option hide">
                      <a href="?" data-opt="edit" class="col-sm-12 cc_p">
                        <span>Edit collection</span>
                      </a>
                      <a href="?" data-opt="delete" class="col-sm-12 cc_p">
                        <span>Delete collection</span>
                      </a>
                    </div>';
                  }
                ?>
          </span>
          <?php
            echo '<img src="'. idtodp($conn, $admin_user_id) .'" class="admin-ico-display-picture w3-circle" alt="">
            <p class="admin-name">'.idtoname($conn, $admin_user_id).'</p>
            ';
          ?>
        </div>
        <!-- collection info -->
        <div class="w3-container space-down">
          <?php
            echo '<h2> '.$collection_name.' </h2>
            <p class="type"> '.$collection_type.' </p>
            <p class="member">
            ';
            if ($collection_members < 2) {
              echo $collection_members . " follower";
            } else {
              echo $collection_members . " followers";
            }
            echo " - ";
            $count = "SELECT count(post_id) FROM collection_post WHERE collection_id='$get_id'";
            $result = mysqli_query($conn, $count);
            if ($result) {
              $postcount = mysqli_fetch_array($result);
              echo $postcount[0] . " Post" . " - " . $collection_view;
              echo '</p>';
            }
          ?>
        </div>

        <div class="w3-container">
        <!-- Follow Collection Button Start -->
        <?php
              $followcheck = "SELECT * FROM join_collection WHERE user_id='$user_id' and collection_id='$get_id'";
              $result = mysqli_query($conn, $followcheck);
              if ($result) {
                $row = mysqli_fetch_array($result);
                $joined_collection_id = $row['collection_id'];
                $joined_user_id = $row['user_id'];
              }

              if($admin_user_id == $user_id){
              	//Do nothing
              } else if($user_id == $joined_user_id){
                echo '<a href="'. BASE_URL . 'module/unfollow/collection?id=' . $get_id . '" class="follow-btn active">Following</a>';
              } else {
                echo '<a href="'. BASE_URL . 'module/follow/collection?id=' . $get_id . '" class="follow-btn" style="color:'.$collection_color.'">Follow</a>';
              }
        ?>
        <!-- Follow Collection Button Ends -->
      </div>
      </section>';
    ?>

    <!-- Section.house is a bigger wrapper where all the content goes in -->
    <section class="house">
      <!-- Content Space -->
      <div class="post_inner">
        <!-- Left Content Space -->
        <?php if ($postcount[0] < 1): ?>
          <?php if ($admin_user_id == $_SESSION['user_id']) {
            echo '<h3 class="text-center welcome-message">Your collections is up and ready, Share your first post</h3>';
          } else {
            echo '<h3 class="text-center welcome-message">I\'m glad you\'re here, Be the first to post</h3>';
          }
           ?>
        <?php else: ?>
        <div class="left-content">
          <!--Circlepanda Post space -->
          <?php
            # post
            include_once 'include/post.php';
          ?>

          <!-- Greeting Area -->
          <div class="box text-center" style="background-size: cover; background-image: url(<?php echo BASE_URL . "asset/images/stock/68db4265-fa19-408a-81bc-d8ebed6537db.jpg"; ?>);">
            <span class="w3-container">
              <?php
                echo "<div class='white-txt'>". greetings() . "<h3>" . $fullname . " </h3> </div>";
              ?>
            </span>
          </div>

          <!-- Circlepanda Fetched Post -->
          <?php
            # Users Post
            include_once 'function/post/post.php';
          ?>
        </div>

        <!-- Right Content Space -->
        <div class="right-content">
          <?php
            # Collection Post
            include_once 'function/post/collection_post.php';
          ?>
        </div>

      <?php endif; ?>

      <!-- Post Icon -->
    	<span class="posticon-holder trigger-status">
    		<i class="material-icons md-24">create</i>
    	</span>
    </div>
      <!-- End of House Section -->
    </section>

    <!-- Delete Channel -->
    <span class="t-b-l hide"></span>
    <span class="t-t-l hide">
      <span class="delete">
        <span class="w3-container">
          <h2><i class="fa fa-lightbulb-o"></i> What to know.</h2>
          <p>You can't undo this action once taken, Are you sure you want to permanently delete collection?.</p>
          <span class="w3-container float-right">
            <a href="#cancel" class="close-btn">Cancel</a>
            <a href="<?php echo BASE_URL . "module/collection/delete_collection?collection_id=$get_id"; ?>" class="continue-btn">Delete</a>
            <!-- On Screen server-side style -->
            <style media="screen">
            .continue-btn, .continue-btn:hover{
              color: #FFF;
              background-color: <?php echo $collection_color; ?>;
              }
            </style>
          </span>
        </span>
      </span>
    </span>

        <!-- Circlepanda Comment Pane -->
    <?php
      $data['url'] = BASE_URL . "module/post/collection_post?id=$collection_id";
      include_once 'include/post-modal.php';
    ?>

    <!-- Edit Channels -->
    <span class="change_bottom_tint"></span>
    <span class="change_top_tint">
    <form action="<?php echo BASE_URL . "module/collection/update_collection"?>" target="_self" method="post" enctype="multipart/form-data">
    <section class="edit-wrap">
      <div class="w3-container">
        <h2>Update Collection</h2>
        <input type="text" name="collection_name" value="<?php echo $collection_name ?>" placeholder="Collection Name" class="input-c">

        <textarea type="text" name="collection_bio" onkeyup="countChar(val)" maxlength="500" placeholder="About Collection" class="input-t"><?php echo $collection_bio; ?></textarea>
        <div class="w3-container">
          <span class="text-counter">500</span>
        </div>

        <button class="btn-upload" type="button">
          <label class="myLabel dp-btn">
            <span>
            <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
            <input type="file" name="collectioncover" class="hide" accept="image/*" onchange="loadFile(event)">
              <i class="fa fa-camera"></i> upload photo
            </span>
          </label>
        </button>

        <label for="Collection_type"><h4>Collection type</h4></label>
        <select class="slect-type" name="collection_type">
          <optgroup>
            <option value="<?php echo $collection_type ?>">Choose Collection type</option>
            <option>Actor</option>
            <option>Album</option>
            <option>App</option>
            <option>Appliance</option>
            <option>Art</option>
            <option>Artist/ Director</option>
            <option>Athlete</option>
            <option>Attractions/ Things To Do</option>
            <option>Author</option>
            <option>Automobiles and Parts</option>
            <option>Baby Goods/ Kids Goods</option>
            <option>Bank</option>
            <option>Bar</option>
            <option>Book</option>
            <option>Book Store</option>
            <option>Business Person</option>
            <option>Car</option>
            <option>Cartoon</option>
            <option>Chef</option>
            <option>Church</option>
            <option>Clothing</option>
            <option>Club</option>
            <option>Coach</option>
            <option>Comedian</option>
            <option>Comedy</option>
            <option>Company</option>
            <option>Computers/ Technology</option>
            <option>Concert Tour</option>
            <option>Concert Venue</option>
            <option>Cause</option>
            <option>Consulting/ Business Services</option>
            <option>Doctor</option>
            <option>Education</option>
            <option>Electronics</option>
            <option>Entertainer</option>
            <option>Fashion</option>
            <option>Food</option>
            <option>Food/ Breverages</option>
            <option>Football</option>
            <option>Furnitures</option>
            <option>Games</option>
            <option>Games/ Toys</option>
            <option>Grocery</option>
            <option>Health/ Beauty</option>
            <option>Health/ Medical/ Pharmacy</option>
            <option>Health/ Medical/ Pharmaceuticals</option>
            <option>Hospital</option>
            <option>Hospital/ Clinic</option>
            <option>Hotel</option>
            <option>Insurance Company</option>
            <option>Internet/ Software</option>
            <option>Jewelry/ Watches</option>
            <option>Journalist</option>
            <option>Kitchen/ Cooking</option>
            <option>Lawyer</option>
            <option>Legal Law</option>
            <option>Library</option>
            <option>Local Business</option>
            <option>Magazine</option>
            <option>Media/ News/ Publishing</option>
            <option>Movie</option>
            <option>Movie Theatre</option>
            <option>Music</option>
            <option>Musician/ Band</option>
            <option>Musuem/ Art Gallery</option>
            <option>Nature</option>
            <option>Non-Profit Organization</option>
            <option>Outdoor Gear/ Sporting Goods</option>
            <option>Pet Supplies</option>
            <option>Politician</option>
            <option>Programmer</option>
            <option>Radio Station</option>
            <option>Real Estate</option>
            <option>Record Label</option>
            <option>Religion</option>
            <option>Resturant/ Cafe</option>
            <option>Retail and Consumer Mechandise</option>
            <option>Science</option>
            <option>School</option>
            <option>Shopping/  Retail</option>
            <option>Social Network</option>
            <option>Spas/ Beauty/ Personal Care and </option>
            <option>Sport</option>
            <option>Sport Venue</option>
            <option>Teacher</option>
            <option>Travel/ Leisure</option>
            <option>TV Channel</option>
            <option>TV Show</option>
            <option>Video Games</option>
            <option>Vitamins/ Minerals</option>
            <option>Web Design</option>
            <option>Web Developer</option>
            <option>Web Site</option>
            <option>Writer</option>
            </optgroup>
        </select>

        <h4>Collection Color</h4>
        <div class="w3-col s12">
          <span class="collorballs" style="background-color: Grey" title="Grey"></span>
          <span class="collorballs" style="background-color: Indigo" title="Indigo"></span>
          <span class="collorballs" style="background-color: Orange" title="Orange"></span>
          <span class="collorballs" style="background-color: Teal" title="Teal"></span>
          <span class="collorballs" style="background-color: Mediumaquamarine" title="Mediumaquamarine"></span>
          <span class="collorballs" style="background-color: Purple" title="Purple"></span>
          <span class="collorballs" style="background-color: CornflowerBlue" title="CornflowerBlue"></span>
          <span class="collorballs" style="background-color: IndianRed" title="IndianRed"></span>
          <span class="collorballs" style="background-color: PaleVioletred" title="PaleVioletred"></span>
          <span class="collorballs" style="background-color: Lightskyblue" title="Lightskyblue"></span>
          <span class="collorballs" style="background-color: Crimson" title="Crimson"></span>
          <span class="collorballs" style="background-color: Orchid" title="Orchid"></span>
          <span class="collorballs" style="background-color: Cyan" title="Cyan"></span>
          <span class="collorballs" style="background-color: Seagreen" title="Seagreen"></span>
          <span class="collorballs" style="background-color: DeepPink" title="DeepPink"></span>
          <span class="collorballs" style="background-color: LightSeaGreen" title="LightSeaGreen"></span>
          <span class="collorballs" style="background-color: Tomato" title="Tomato"></span>
          <span class="collorballs" style="background-color: HotPink" title="HotPink"></span>
        </div>
      </div>
      <input type="hidden" name="collection_id" value="<?php echo $get_id; ?>">
      <input type="hidden" name="collection_color" class="color-collection">
      <input type="hidden" name="hack_check" value="<?php echo $_SESSION['user_id']; ?>">
      <div class="w3-container">
        <input type="submit" name="name" value="Save Changes" class="btn-cont next-btn" style="background-color:<?php echo $collection_color; ?>; color: #FFF;">
        <input type="button" name="name" value="Cancel" class="btn-cont cancel-btn bck">
      </div>
    </section>
  </form>
</span>
    <!-- Creat Modal End -->
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
            var where = "<?php echo $collection_name . " collection"; ?>";
            var url = "module/analytic?time="+timeSpent+"&where="+where;        //Send the time on the page to a php script of your choosing.
            xmlhttp.open("GET",url,false);        //The false at the end tells ajax to use a synchronous call which wont be severed by the user leaving.
            xmlhttp.send(null);        //Send the request and don't wait for a response.
        }
      </script>
    <!-- End*** _GET -->
    <!-- Circlepanda Ajax Scripts -->
    <script src="<?php echo BASE_URL . "ajax/follow.js" ?>"></script>
    <script src="<?php echo BASE_URL . "ajax/likes.js" ?>"></script>
    <script src="<?php echo BASE_URL . "ajax/comment.js" ?>"></script>
    <script src="<?php echo BASE_URL . "ajax/collectionlike.js" ?>"></script>
    <!-- Circlepand Regular Scripts -->
    <script src="<?php echo BASE_URL . "asset/js/protected/structure.js" ?>"></script>
    <script src="<?php echo BASE_URL . "asset/plugins/bootstrap/js/bootstrap.js" ?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/owl.carousel.js" ?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/protected/modal.js" ?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/nicescroll.js" ?>"></script>
    <!--<script src="<?php # echo BASE_URL . "asset/js/pace.min.js" ?>" charset="utf-8"></script>-->
  </body>
</html>
