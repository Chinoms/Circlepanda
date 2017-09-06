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
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Get Started </title>
    <?php
      include_once 'metas/seo.php';
      $desc = "Getting Started on Circlepanda";
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
  </head>
  <body>

    <section>

    </section>

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
            var where = "Getting Started";
            var url = "module/analytic?time="+timeSpent+"&where="+where;        //Send the time on the page to a php script of your choosing.
            xmlhttp.open("GET",url,false);        //The false at the end tells ajax to use a synchronous call which wont be severed by the user leaving.
            xmlhttp.send(null);        //Send the request and don't wait for a response.
        }
    </script>
    <!-- End*** _GET -->
    <!-- Circlepanda Ajax Scripts -->
    <script src="<?php echo BASE_URL . "ajax/tour.js" ?>"></script>
    <!-- Circlepand Regular Scripts -->
    <!--<script src="<?php # echo BASE_URL . "asset/js/pace.min.js" ?>" charset="utf-8"></script>-->
    <script src="<?php echo BASE_URL . "asset/js/protected/structure.js" ?>"></script>
    <script src="<?php echo BASE_URL . "asset/plugins/bootstrap/js/bootstrap.js" ?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/nicescroll.js" ?>"></script>
  </body>
</html>
