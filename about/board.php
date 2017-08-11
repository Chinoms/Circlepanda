<?php
include_once '../app/connect.php';
include_once '../module/userdata.php';
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $ref = $_GET['ref'];
  $getinfo = "SELECT * FROM board WHERE id='$ref'";
  $result = mysqli_query($conn, $getinfo);
  if ($result) {
    $row = mysqli_fetch_array($result);
    $name = $row['name'];
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>About <?php echo ucfirst(strtolower($name)) ?></title>
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

    <section class="halfbanner fullbanner board bg-white">
      <div class="center-holder paddiing-lr w3-padding-128">
        <div class="w3-container">
          <div class="w3-col s12 m12">
            <?php
              $getinfo = "SELECT * FROM board WHERE id='$ref'";
              $result = mysqli_query($conn, $getinfo);
              while ($row = mysqli_fetch_array($result)) {
                echo '
                <div class="w3-col s12 m3 w3-left">
                  <img src="'.get_web_path($row['image_path']).'" alt="Circlepanda-board-dp" class="board-dp">
                </div>
                <div class="w3-col s12 m9">
                <div> <strong>'.$row['name'].' | '.$row['role'].'</strong> </div> <br>
                  '.$row['about'].'
                  <div class="w3-center">
                  <a href="http://'.$row['facebook'].'" class="ui circular facebook icon button">
                    <i class="facebook icon"></i>
                  </a>
                  <a href="http://'.$row['twitter'].'" class="ui circular twitter icon button">
                    <i class="twitter icon"></i>
                  </a>
                  </div>
                </div>';
              }
            ?>
          </div>
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
