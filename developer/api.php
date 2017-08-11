<?php
  session_start();
  include_once '../app/connect.php';
  include_once '../module/userdata.php';
  if(!isset($_SESSION['user_id'])) {
      $_SESSION['prevented_page'] = BASE_URL . "developer/";
  } else {
    unset($_SESSION['prevented_page']);
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Circlepanda Development </title>
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
    <?php
      $data['uri-zero'] = "active";
      include_once 'header.php';
    ?>

    <section class="banner w3-container top">
      <h1>Circlepanda Developer Experience</h1>
      <p>
        Use Circlepanda's core infrastructure, API integration and Developer App.
        Secure and fully featured for all enterprises.
        Committed to open source and industry leading price-performance.
      </p>
    </section>
    <section class="banner w3-container w3-center">
      <div class="w3-container">
        <div class="w3-col s12 m3">
          <i class="material-icons md-72">android</i>
          <h3>App Developement</h3>
        </div>
        <div class="w3-col s12 m3">
          <i class="material-icons md-72">question_answer</i>
          <h3>Support</h3>
        </div>
        <div class="w3-col s12 m3">
          <i class="material-icons md-72">extension</i>
          <h3>Integration</h3>
        </div>
        <div class="w3-col s12 m3">
          <i class="material-icons md-72">book</i>
          <h3>Docs</h3>
        </div>
      </div>

      <div class="w3-padding-48 w3-center">
        <button class="ui blue medium button" type="button" name="button">
          View all docs
        </button>
      </div>
    </section>

    <?php
      if (!isset($_SESSION['user_id'])) {
        echo '<section class="banner w3-container">
          <h1>Ready to start development?</h1>
          <p>
            Sign up or log in using your Circlepanda account to get credentials, set up test accounts, and more.
          </p>
          <div class="w3-padding-24">
            <a href="' . BASE_URL . 'join/self" class="ui blue medium button">
              Sign up
            </a>
            <a href="' . BASE_URL . 'login" class="ui medium button">
              Login
            </a>
          </div>
        </section>';
      }
    ?>

    <!-- Footer -->
    <?php
    include_once '../footer.php';
    ?>

  <script src="<?php echo BASE_URL . "asset/js/developer/developer.js"?>"></script>
  <script src="<?php echo BASE_URL . "asset/js/jquery-ui.min.js"?>"></script>
  <script src="<?php echo BASE_URL . "asset/plugins/semantic-ui/semantic.min.js"?>"></script>
  <script src="<?php echo BASE_URL . "asset/js/owl.carousel.js" ?>"></script>
  <script src="<?php echo BASE_URL . "asset/js/nicescroll.js" ?>"></script>
  <script src="<?php echo BASE_URL . "asset/js/pace.min.js" ?>"></script>
  <script async src="<?php echo BASE_URL . "asset/js/wow.js"; ?>"></script>
  </body>
</html>
