<?php
  include_once '../app/connect.php';
  include_once '../module/userdata.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Circlepanda Blog</title>
    <?php
    include_once '../metas/external_seo.php';
    $desc = "Find out what's new, coming soon and what's no more all on Circlepanda Blog";
    $keyword = "Circlepanda, Social, Network, Chat, Messaging, Hangout, Meet, Team, Channel, Collection, Page, Community, Creativity, Fun, Memories, Ideas, Status, Colorful, Family, Friends, Panda, Circle, Group, Partner, People, Blue, Simple, Search, Tools, Images, API, More";
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
      .bg {
        color : #116293;
      }
    </style>
    <?php
      include_once 'menu.php';
    ?>

    <section class="halfbanner fullbanner bg-blue" style="background: url('<?php echo BASE_URL . "asset/images/blog-banner.jpg" ?>') no-repeat; background-size: cover;">
      <div class="left-holder negative">
        <h1> What's New? </h1>
        <p> Keeping you connected to everything from Circlepanda </p>

      </div>
    </section>

    <section class="fullbanner bg-white w3-padding-128">
      <div class="w3-container blog-wrapper">
        <?php for ($i=0; $i < 3; $i++) {
          echo '<div class="blog-card">
          <img src="'.BASE_URL.'asset/images/career-banner.jpg" class="blog-banner">
            <div class="blog-pad">
            <span class="head">Software Engineer</span>
            <span class="tag">circlepanda.com</span>
            <span class="body">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </span>
              <div class="w3-right"><span class="readmore-btn"> <span class="adj_up"> Read More </span> <i class="material-icons md-24">arrow_forward</i> </span></div>
            </div>
          </div>';
        } ?>
      </div>
      <div class="blog-pagination">
        <a href="?" class="ui circular icon button">
          <<
        </a>
        <a href="?" class="ui circular icon button">
          1
        </a>
        <a href="?" class="ui circular icon button">
          2
        </a>
        <a href="?" class="ui circular icon button">
          3
        </a>
        <a href="?" class="ui circular icon button">
          >>
        </a>
        </a>
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
