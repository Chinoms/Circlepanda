<?php
  include_once '../app/connect.php';
  include_once '../module/userdata.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Circlepanda Team</title>
    <?php
    include_once '../metas/external_seo.php';
    $desc = "We're smart, we're fun and we think you'll like us. we're Teamcirclepanda";
    $keyword = "Circlepanda, Social, Team, Group, Together, Work, Community, Creativity, Innovation, Memories, Ideas, Status, Colorful, Family, Friends, Panda, Circle, Group, Partner, People, Blue, Simple, Search, Tools, Images, API, More";
    echo seoMeta($desc, $keyword);
    ?>
    <link rel="icon" href="<?php echo BASE_URL . "asset/images/circlepanda-fa-icon.png" ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/plugins/fontawesome/css/font-awesome.css"; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/about/about.css" ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/pace.css"; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/plugins/semantic-ui/semantic.min.css"?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/w3.css" ?>">
    <script src="<?php echo BASE_URL . "asset/js/jquery.min.js"; ?>"></script>
  </head>
  <body>
    <style media="screen">
      .tm {
        color : #116293;
      }
    </style>
    <?php
      include_once 'menu.php';
    ?>

    <section class="fullbanner bg-blue" style="background: url('<?php echo BASE_URL . "asset/images/team-banner.jpg" ?>') no-repeat fixed; background-size: cover;">
      <div class="left-holder">
        <h1> Team Panda? </h1>
        <p> We're smart, we're fun &amp; we think you'll like us </p>

        <a href="<?php echo BASE_URL . "about/career" ?>" rel="nofollow" class="btn download" data-download="chat-sketch">Join Team</a>
        <a href="#!" rel="nofollow" class="btn download" data-download="chat-sketch">Meet Team</a>
      </div>
    </section>

    <section class="fullbanner bg-grey w3-margin-bottom">
      <div class="center-holder w3-center">
        <h1> Teams &amp; Roles </h1>
        <p class="black">
          We're growing and we’re looking for talented, creative people who are also maybe a very enthusiastic about joining our team.
        </p>
            <div class="position-box adteam">
              <h4>Advertizing Team</h4>
              <p>2 Positions</p>
            </div>
            <div class="position-box uxteam">
              <h4>Design &amp; User Experience</h4>
              <p>5 Positions</p>
            </div>
            <div class="position-box businessteam">
              <h4>Business Development</h4>
              <p>3 Positions</p>
            </div>
            <div class="position-box secteam">
              <h4>Security Team</h4>
              <p>3 Positions</p>
            </div>
            <div class="position-box datateam">
              <h4>Data Analysis</h4>
              <p>2 Positions</p>
            </div>
            <div class="position-box saleteam">
              <h4>Sales and Marketing</h4>
              <p>1 Position</p>
            </div>
            <div class="position-box legteam">
              <h4>Legal &amp; Users Policies</h4>
              <p>3 Positions</p>
            </div>

            <div class="position-box webteam">
              <h4>Web Developement</h4>
              <p>6 Positions</p>
            </div>
            <div class="position-box finteam">
              <h4>Finance Admin</h4>
              <p>1 Position</p>
            </div>
      </div>
    </section>

    <?php
      include_once '../footer.php';
    ?>


    <script src="<?php echo BASE_URL . "asset/plugins/semantic-ui/semantic.min.js"?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/owl.carousel.js" ?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/nicescroll.js" ?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/pace.min.js" ?>" charset="utf-8"></script>
    <script async src="<?php echo BASE_URL . "asset/js/wow.js"; ?>"></script>
  </body>
</html>
