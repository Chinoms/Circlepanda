<?php
  session_start();
  include_once '../app/connect.php';
  include_once '../module/userdata.php';
  if(!isset($_SESSION['user_id'])) {
      $_SESSION['prevented_page'] = BASE_URL . "developer/";
      header("Location: ../login");
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
    <style media="screen">
      header {
        background-color: transparent;
        border-bottom: transparent;
      }
    </style>

    <header>

      <?php
        if (!isset($_SESSION['user_id'])) {
          echo '<div class="w3-container w3-col s12 m9 w3-padding-12">
            <a href="'. BASE_URL .'">
              <img src="' . BASE_URL . 'asset/images/circlepanda-logo.png" alt="Circlepanda logo">
            </a>
          </div>';
        } else {
          echo '<div class="w3-container w3-col s12 m10 w3-padding-12">
            <a href="'. BASE_URL .'">
              <img src="' . BASE_URL . 'asset/images/circlepanda-logo.png" alt="Circlepanda logo">
            </a>
          </div>';
        }

      ?>
      <?php
        if (!isset($_SESSION['user_id'])) {
          echo '<div class="ad_auth_holder w3-col s12 m3 w3-padding-12">
          <a href="' . BASE_URL . 'join/self" class="ui button">Sign up</a>
          <a href="' . BASE_URL . 'login" class="ui primary button">Login</a>
          </div>';
        } else {
          echo '<div class="ad_auth_holder w3-col s12 m2 w3-padding-12">
          <img src="' . $profile_pic_id . '" alt="dp" class="header-dp">
          <a href="'. BASE_URL .'developer/dashboard">
            <div class="ui animated white fade button" tabindex="0">
            <div class="visible content">Dashboard</div>
            <div class="hidden content">
              Let\'s go
            </div>
            </div>
          </a>
          </div>';
        }
      ?>
    </header>

    <section class="container w3-container" style="background: url('<?php echo BASE_URL . "asset/images/developer-bg.jpg" ?>')">
      <div class="middle-row">
        <form class="form-wrap ui form registerapp" action="<?php echo BASE_URL . "developer/module/createapp" ?>" method="post">
          <h1>Create a New App</h1>
          <p>Get started integrating Circlepanda into your app or website</p>

          <div class="field">
            <label>Display name</label>
            <div class="field fluid">
              <input type="text" class="appname" name="name" placeholder="Type the name you want associated with this app">
            </div>
            <label>Contact Email</label>
            <div class="field fluid">
              <input type="email" class="email" <?php echo "value='$email'" ?> name="email" placeholder="Used for important communication about your app">
            </div>
          </div>
          <div class="ui horizontal divider">
            By Proceeding
          </div>
          <div class="ui w3-container">
            <p class="sm">
              you agree to the <a href="<?php echo BASE_URL . "legal/policy" ?>"> Circlepanda Platform Policies </a>
            </p>
          </div>
          <div class="w3-container w3-center w3-padding-24">
            <a href="javascript:history.back()" class="ui button">
              Cancel
            </a>
            <button type="submit" class="ui primary button">
              Create App
            </button>
          </div>
        </form>
      </div>
    </section>

    <!-- Footer -->
    <?php
    include_once '../footer.php';
    ?>

  <script src="<?php echo BASE_URL . "asset/js/jquery-ui.min.js"?>"></script>
  <script src="<?php echo BASE_URL . "asset/plugins/semantic-ui/semantic.min.js"?>"></script>
  <script src="<?php echo BASE_URL . "asset/js/owl.carousel.js" ?>"></script>
  <script src="<?php echo BASE_URL . "asset/js/nicescroll.js" ?>"></script>
  <script src="<?php echo BASE_URL . "asset/js/pace.min.js" ?>"></script>
  <script async src="<?php echo BASE_URL . "asset/js/wow.js"; ?>"></script>
  <script async src="<?php echo BASE_URL . "asset/js/developer/developer.js"?>"></script>
  </body>
</html>
