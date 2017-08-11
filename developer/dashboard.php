<?php
  session_start();
  include_once '../app/connect.php';
  include_once '../module/userdata.php';
  include_once 'module/appdata.php';
  if(!isset($_SESSION['user_id'])) {
    $_SESSION['prevented_page'] = BASE_URL . "developer/dashboard";
    header('Location: ../login');
  } else {
    unset($_SESSION['prevented_page']);
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> <?php echo $app_name; ?> - Dashboard - Circlepanda for Developers </title>
    <?php
    include_once '../metas/external_seo.php';
    $desc = "Developement";
    $keyword = "Circlepanda, Social, Development, Technology, Version, App, Web, Product, Integrations, Search, Api, Unity, Curl, Php, Python, More";
    echo seoMeta($desc, $keyword);
    ?>
    <link rel="icon" href="<?php echo BASE_URL . "asset/images/circlepanda-fa-icon.png" ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/w3.css" ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/plugins/fontawesome/css/font-awesome.css"; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/plugins/semantic-ui/semantic.min.css"?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/developer/developer.css"?>">
    <script src="<?php echo BASE_URL . "asset/js/jquery.min.js"; ?>"></script>
  </head>
  <body>

    <!-- Menu -->
      <?php
        $data['url-one'] = "active";
        include_once 'sidepane.php';
        include_once 'head.php';
      ?>

      <section class="mainpane">
        <!-- Intro Info -->
        <div class="wrapper first">
          <span class="toppane"> Dashboard </span>
          <div class="w3-container w3-padding-12">
            <div class="w3-col s12 m3">
              <span class="img-icon"></span>
            </div>
            <div class="w3-col s12 m9">

              <div class="ui form">
                <div class="field">
                  <label>App Name</label>
                    <div class="four wide field">
                      <span class="input-format"><?php echo $app_name ?></span>
                    </div>
                  <label>API Version</label>
                    <div class="four wide field">
                      <span class="input-format">v2.8</span>
                    </div>
                  <label>App ID</label>
                    <div class="twelve wide field">
                      <span class="input-format"><?php echo $app_id; ?></span>
                    </div>
                  <label>App Public Key</label>
                    <div class="twelve wide field">
                      <span class="input-format"><?php echo $app_public_key; ?></span>
                    </div>
                  <label>App Secret Key</label>
                    <div class="twelve wide field">
                      <span class="input-format"><?php echo $app_secret_key; ?></span>
                    </div>
                </div>
              </div>

            </div>
          </div>
        </div>

        <!-- SDK Integration -->
        <div class="wrapper w3-container">
          <div class="w3-col s12 m12 w3-padding-24">
            <div class="w3-col s12 m2">
              <i class="material-icons md-72">developer_mode</i>
            </div>
            <div class="w3-col s12 m7">
              <h1>Get Started with the Circlepanda SDK</h1>
              <p>
                Use our quick start guides to set up the Circlepanda SDK for your iOS or Android app, Circlepanda Web Game or website.
              </p>
            </div>
            <div class="w3-col s12 m3 w3-padding-24 w3-center">
              <button class="medium teal ui button choose-platform">
                Choose Platform
              </button>
            </div>
          </div>
        </div>

        <!-- Analytics -->
        <div class="wrapper">
          <span class="toppane"> <?php echo $app_name ?> Analytics </span>
          <div class="w3-col s12 m12 w3-container w3-padding-12">
            <div class="w3-col s12 m8">
              <h1>Set up Analytics</h1>
              <p>
                Analytics helps you grow your business and learn about the actions people take in your app. It only takes 5 minutes to set up.
              </p>
            </div>
            <div class="w3-col s12 m4 w3-padding-24 w3-center">
              <button class="medium ui button">
                Try Demo
              </button>
              <button class="medium teal ui button">
                Get Started
              </button>
            </div>
          </div>
        </div>
      </section>

      <!-- Modal View -->
      <script type="text/javascript">
        $(".choose-platform").on('click', function(){
          console.log('Shit, working');
          $(".page_dim").removeClass('hide');
        });
        $(document).ready(function() {
          var notiftarget = $(".page_dim");
          notiftarget.mouseup(function(e) {
            if(e.target.id != notiftarget.attr('class') && !notiftarget.has(e.target).length) {
              $(".page_dim").addClass('hide');
            }
          });
        });
      </script>
      <section class="page_dim hide">
        <div class="platform-popup ui w3-container w3-center">
          <h1> <?php echo $app_name; ?> </h1>
          <span class="text-tag"> Select a platform to get started </span>
          <div class="w3-container w3-padding-16 list-product">
            <a href="<?php echo BASE_URL . "developer/doc/android" ?>" class="app w3-col s12 m4">
              <i class="material-icons md-48">android</i>
              <h3> Android </h3>
            </a>
            <a href="<?php echo BASE_URL . "developer/doc/games" ?>" class="game w3-col s12 m4">
              <i class="material-icons md-48">games</i>
              <h3> Circlepanda Web Games </h3>
            </a>
            <a href="<?php echo BASE_URL . "developer/doc/web" ?>" class="web w3-col s12 m4">
              <i class="material-icons md-48">public</i>
              <h3> Website </h3>
            </a>
          </div>
        </div>
      </section>

      <script src="<?php echo BASE_URL . "asset/js/developer/developer.js"?>"></script>
  <script src="<?php echo BASE_URL . "asset/plugins/semantic-ui/semantic.min.js"?>"></script>
  <script src="<?php echo BASE_URL . "asset/js/owl.carousel.js" ?>"></script>
  <script src="<?php echo BASE_URL . "asset/js/nicescroll.js" ?>"></script>
  <script src="<?php echo BASE_URL . "asset/js/pace.min.js" ?>"></script>
  <script async src="<?php echo BASE_URL . "asset/js/wow.js"; ?>"></script>
  </body>
</html>
