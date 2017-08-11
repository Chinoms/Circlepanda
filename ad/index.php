<?php
  session_start();
  include_once '../app/connect.php';
  include_once '../module/userdata.php';
  if(!isset($_SESSION['user_id'])) {
      $_SESSION['prevented_page'] = BASE_URL . "ad/";
  } else {
    unset($_SESSION['prevented_page']);
  }
?>
<!DOCTYPE html>
<head>
  <title> Circlepanda Ads </title>
  <?php
  include_once '../metas/external_seo.php';
  $desc = "Go live, on Circlepanda Ad";
  $keyword = "Circlepanda, Social, Network, Adverts, Ads, Adsense, Publicity, Product, Brand, Showcase, Search, Organization, More";
  echo seoMeta($desc, $keyword);
  ?>
  <link rel="icon" href="<?php echo BASE_URL . "asset/images/circlepanda-fa-icon.png" ?>">
  <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/w3.css" ?>">
  <link rel="stylesheet" href="<?php echo BASE_URL . "asset/plugins/fontawesome/css/font-awesome.css"; ?>">
  <link rel="stylesheet" href="<?php echo BASE_URL . "asset/plugins/semantic-ui/semantic.min.css"?>">
  <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/ad/ad.css"?>">
  <script src="<?php echo BASE_URL . "asset/js/jquery.min.js"; ?>"></script>
  </head>
<body>

  <?php include_once 'header.php'; ?>

  <section class="banner">
    <h1> Circlepanda for Business </h1>
  </section>

  <section class="ad_container w3-padding-32">
    <h1 class="w3-center"> Why your business needs circepanda ads </h1>
    <div class="w3-container w3-center">
      <div class="ad_desc_icon w3-col s12 m12 w3-padding-32">
        <div class="w3-col s12 m4">
          <i class="material-icons md-62">trending_up</i>
          <a href="#" class="no-follow">GET SITE TRAFFIC</a>
          <p>Max Up by Getting The right Attention to your website via Posts</p>
        </div>
        <div class="w3-col s12 m4">
          <i class="material-icons md-62">search</i>
          <a href="#" class="no-follow">FIND RELEVANT FOLLOWERS</a>
          <p>Get People with Interest, Get a connected audience</p>
        </div>
        <div class="w3-col s12 m4">
          <i class="material-icons md-62">people</i>
          <a href="#" class="no-follow">GET TO YOUR AUDIENCE</a>
          <p>Keep Your Users Engaged and help them get to You</p>
        </div>
      </div>
      <button class="ui primary large button">Get Started</button>
    </div>
  </section>

  <?php
  include_once '../footer.php';
  ?>

<!-- Footer -->

<script src="<?php echo BASE_URL . "asset/js/ad/ad.js"?>"></script>
<script src="<?php echo BASE_URL . "asset/plugins/semantic-ui/semantic.min.js"?>"></script>
<script src="<?php echo BASE_URL . "asset/js/owl.carousel.js" ?>"></script>
<script src="<?php echo BASE_URL . "asset/js/nicescroll.js" ?>"></script>
<script src="<?php echo BASE_URL . "asset/js/pace.min.js" ?>"></script>
<script async src="<?php echo BASE_URL . "asset/js/wow.js"; ?>"></script>
</body>
</html>
