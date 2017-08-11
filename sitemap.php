<?php
  session_start();
  include_once 'app/connect.php';
  include_once 'module/userdata.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Circlepanda Sitemap - Circlepanda </title>
    <?php
    include_once 'metas/external_seo.php';
    $desc = "Looking for a page on Circlepanda? Find list of pages available on the Circlepanda with this sitemap.";
    $keyword = "Circlepanda, Sitemap, Tree, Map, Site, Location, Web, Search, Navigation, Php, More";
    echo seoMeta($desc, $keyword);
    ?>
    <link rel="icon" href="<?php echo BASE_URL . "asset/images/circlepanda-fa-icon.png" ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/w3.css" ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/plugins/fontawesome/css/font-awesome.css"; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/plugins/semantic-ui/semantic.min.css"?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/sitemap.css"?>">
    <script src="<?php echo BASE_URL . "asset/js/jquery.min.js"; ?>"></script>
  </head>
  <body>

    <header>
      <div class="w3-container w3-col s12 m8 w3-padding-12">
        <a href="<?php echo BASE_URL ?>">
          <img src="<?php echo BASE_URL . 'asset/images/circlepanda-logo.png'?>" alt="Circlepanda logo">
        </a>
      </div>

      <?php
        if (!isset($_SESSION['user_id'])) {
          echo '<div class="ad_auth_holder w3-col s12 m4 w3-padding-12">
          <a href="' . BASE_URL . 'join/self" class="ui button">Sign up</a>
          <a href="' . BASE_URL . 'login" class="ui primary button">Login</a>
          </div>';
        }
      ?>
    </header>


    <section class="banner w3-container top greyinverse">
      <div class="w3-container w3-center w3-padding-48">
        <h1>Circlepanda Sitemap</h1>
      </div>
    </section>
    <section class="banner w3-container">
      <div class="w3-container w3-padding-36">
        <div class="w3-col s12 m6">
          <div class="w3-container dropout">
            <h2>Using Circlepanda</h2>
            <a href="<?php echo BASE_URL . "about/" ?>"> About </a>
            <a href="<?php echo BASE_URL . "about/career" ?>"> Career </a>
            <a href="<?php echo BASE_URL . "about/team" ?>"> Team </a>
          </div>
          <div class="w3-container dropout w3-padding-36">
            <h2>Circlepanda Legals</h2>
            <a href="<?php echo BASE_URL . "legal/" ?>"> Terms of Service </a>
            <a href="<?php echo BASE_URL . "legal/privacy" ?>"> Privacy </a>
            <a href="<?php echo BASE_URL . "legal/security" ?>"> Security </a>
            <a href="<?php echo BASE_URL . "legal/cookie" ?>"> Cookies </a>
            <a href="<?php echo BASE_URL . "legal/policy" ?>"> Policies </a>
          </div>
          <div class="w3-container dropout w3-padding-36">
            <h2>Circlepanda Business</h2>
            <a href="<?php echo BASE_URL . "ad/" ?>"> Circlepanda Ads </a>
          </div>

        </div>
        <div class="w3-col s12 m6">
          <div class="w3-container dropout">
            <h2>Help and security</h2>
            <a href="<?php echo BASE_URL . "support/security" ?>"> Circlepanda Security center </a>
            <a href="<?php echo BASE_URL . "support/help" ?>"> Circlepanda Help center </a>
            <a href="<?php echo BASE_URL . "support/forum" ?>"> Circlepanda Discussion Board </a>
            <a href="<?php echo BASE_URL . "support/contact" ?>"> Contact us </a>
            <a href="<?php echo BASE_URL . "support/feedback" ?>"> Feedback </a>
          </div>
          <div class="w3-container dropout w3-padding-36">
            <h2>More from Circlepanda</h2>
            <a href="<?php echo BASE_URL . "developer/" ?>"> Developers </a>
            <a href="<?php echo BASE_URL . "about/blog" ?>"> Circlepanda Blog </a>
            <a href="<?php echo BASE_URL . "about/press" ?>"> Circlepanda Press Center </a>
            <a href="http://www.facebook.com/#linkname"> Circlepanda on Facebook </a>
            <a href="http://www.twitter.com/#linkname"> Circlepanda on Twitter </a>
            <a href="http://www.instagram.com/#linkname"> Circlepanda on Instagram </a>
          </div>
        </div>
      </div>
    </section>
    <!-- Footer -->
    <?php
    include_once 'footer.php';
    ?>

  <script src="<?php echo BASE_URL . "asset/js/jquery-ui.min.js"?>"></script>
  <script src="<?php echo BASE_URL . "asset/plugins/semantic-ui/semantic.min.js"?>"></script>
  <script src="<?php echo BASE_URL . "asset/js/owl.carousel.js" ?>"></script>
  <script src="<?php echo BASE_URL . "asset/js/nicescroll.js" ?>"></script>
  <script async src="<?php echo BASE_URL . "asset/js/wow.js"; ?>"></script>
  </body>
</html>
