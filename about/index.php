<?php
  include_once '../app/connect.php';
  include_once '../module/userdata.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>About Circlepanda: Connecting creative minds</title>
    <?php
    include_once '../metas/external_seo.php';
    $desc = "Connecting Creative Minds, Making Fun A Culture. Circlepanda Is Social Network, That Connects People From All Around The World, With Common Interest, Likes, And Hobbies, Giving People The Medium To Colaborate Doing Things They Love";
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
      .ab {
        color : #116293;
      }
    </style>
    <?php
      include_once 'menu.php';
    ?>

    <section class="fullbanner bg-blue" style="background: url('<?php echo BASE_URL . "asset/images/circlepanda-fullbanner-image-2.jpg" ?>')">
      <div class="left-holder">
        <h1> Circlepanda? </h1>
        <p> Connect creative minds </p>

        <a href="<?php echo BASE_URL . "about/team" ?>" rel="nofollow" class="btn download" data-download="chat-sketch">Meet Team</a>
        <a href="<?php echo BASE_URL . "#history" ?>" rel="nofollow" class="btn download" data-download="chat-sketch">History</a>
      </div>
    </section>

    <section class="halfbanner fullbanner bg-white w3-padding-16" style="border-top: 3px solid #000000">
      <div class="center-holder w3-center">
        <div class="paddiing-lr">
          <h3> Our Impact </h3>
          <p class="black">
            Circlepanda believes in the freedom of communication and self expression. There are currently too many barriers,
            economical and psychological. Our users communicate at their own time and become social ready just to share what's new, and creativity
            admist friends, groups and teams.
          </p>
          <div class="w3-container w3-padding-16">
            <div class="w3-col s12 m3">
              <h1 class="ui blue">222+</h1>
              <p>Verified Users</p>
            </div>
            <div class="w3-col s12 m3">
              <h1 class="ui blue">45%</h1>
              <p>Sharing</p>
            </div>
            <div class="w3-col s12 m3">
              <h1 class="ui blue">100</h1>
              <p>Monthly active users</p>
            </div>
            <div class="w3-col s12 m3">
              <h1 class="ui blue">3+</h1>
              <p>Languages supported</p>
            </div>
          </div>
        </div>

        <!--<h1> Our Aim </h1>
        <p class="black">
          Circlepanda is here to connect creative minds, giving people the medium to share ideas, meet people with similar interest.
          We are everything you need to find that one person that shares your interest, and get you a perfect team.
          In Circlepanda, fun is a culture and creativity is a tradition.
        </p>-->
      </div>
    </section>

    <section class="halfbanner fullbanner board bg-white">
      <div class="center-holder paddiing-lr w3-padding-70">
        <h3 class="w3-center"> Our Leadership </h3>
        <div class="w3-container w3-center">
          <div class="w3-col s12 m12">
            <h4>LEADERSHIP / EXECUTIVE TEAM + BOARD OF DIRECTORS</h4>
            <?php
              $showboard = "SELECT * FROM board";
              $result = mysqli_query($conn, $showboard);
              while ($s = mysqli_fetch_array($result)) {
                echo '<div class="w3-col s12 m4 w3-padding-8">
                  <h5><a href="' . BASE_URL . 'about/board/'.$s['id'].'">'.$s['name'].'</a></h5>
                  <p>'.$s['role'].'</p>
                </div>';
              }
            ?>
          </div>
          <!-- Board of Directors -->
        </div>
        <hr>
        <div class="w3-center w3-padding-64">
          <h4> Join, make fun a culture. </h4>
          <a href="<?php echo BASE_URL . "join/self" ?>" class="ui primary button">Join now</a>
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
