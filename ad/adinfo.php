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
  $desc = "Go live, on circlepanda Ad";
  $keyword = "Circlepanda, Social, Network, Adverts, Ads, Adsense, Publicity, Product, Brand, Showcase, Search, Organization, More";
  echo seoMeta($desc, $keyword);
  ?>
  <link rel="icon" href="<?php echo BASE_URL . "asset/images/circlepanda-fa-icon.png" ?>">
  <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/w3.css" ?>">
  <link rel="stylesheet" href="<?php echo BASE_URL . "asset/plugins/fontawesome/css/font-awesome.css"; ?>">
  <link rel="stylesheet" href="<?php echo BASE_URL . "asset/plugins/semantic-ui/semantic.min.css"?>">
  <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/ad/ad.css"?>">
  <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/jquery-ui.css"?>">
  <script src="<?php echo BASE_URL . "asset/js/jquery.min.js"; ?>"></script>
  </head>
<body>

  <?php
    include_once 'innerhead.php';
  ?>

  <section class="ad_inner_container w3-padding-32">
    <section class="ad_midform_wrapper ui">
      <!-- Ad Progress Tracker -->
      <div class="ui mini steps">
        <div class="completed step steptrack-one">
          <i class="asterisk icon"></i>
          <div class="content">
            <div class="title">Ad Type</div>
            <div class="description">Choose ad type</div>
          </div>
        </div>
        <div class="active step steptrack-two">
          <i class="info icon"></i>
          <div class="content">
            <div class="title">Ad Info</div>
            <div class="description">Add Ad information</div>
          </div>
        </div>
        <div class="disabled step steptrack-three">
          <i class="bullseye icon"></i>
          <div class="content">
            <div class="title">Ad Target</div>
            <div class="description">Target your audience</div>
          </div>
        </div>
        <div class="disabled step steptrack-four">
          <i class="payment icon"></i>
          <div class="content">
            <div class="title">Payment</div>
            <div class="description">Continue Payments</div>
          </div>
        </div>
        <div class="disabled step steptrack-five">
          <i class="rocket icon"></i>
          <div class="content">
            <div class="title">Publish</div>
            <div class="description">Publish &amp; Save</div>
          </div>
        </div>
      </div>

      <!-- Body -->
      <div class="w3-container w3-padding-8">
        <?php
          # Ad Info
          include_once 'steps/steptwo.php';
          ?>
      </div>
    </section>
  </section>

  <?php
  include_once '../footer.php';
  ?>

<!-- Footer -->

<script src="<?php echo BASE_URL . "asset/js/ad/ad.js"?>"></script>
<script src="<?php echo BASE_URL . "asset/js/jquery-ui.min.js"?>"></script>
<script src="<?php echo BASE_URL . "asset/plugins/semantic-ui/semantic.min.js"?>"></script>
<script src="<?php echo BASE_URL . "asset/js/owl.carousel.js" ?>"></script>
<script src="<?php echo BASE_URL . "asset/js/nicescroll.js" ?>"></script>
<script src="<?php echo BASE_URL . "asset/js/pace.min.js" ?>"></script>
<script async src="<?php echo BASE_URL . "asset/js/wow.js"; ?>"></script>
</body>
</html>
