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

    <section class="halfbanner fullbanner board bg-white">
      <div class="center-holder paddiing-lr w3-padding-128">
        <h3 class="w3-center"> Add Board Information </h3>
        <div class="w3-container w3-center">
          <div class="w3-col s12 m6">
            <form class="ui form" action="<?php echo BASE_URL . "module/addboardinfo" ?>" method="post" enctype="multipart/form-data">
              <div class="report ui field"></div>
              <div class="ui input small field w3-col s12 m12">
                <input type="text" name="name" placeholder="Fullname" autofocus>
              </div>
              <div class="ui input small field w3-col s12 m12">
                <input type="text" name="role" placeholder="Role">
              </div>
              <div class="ui input small field w3-col s12 m12">
                <input type="text" name="fb_url" placeholder="Facebook url">
              </div>
              <div class="ui input small field w3-col s12 m12">
                <input type="text" name="twt_url" placeholder="Twitter Handle">
              </div>
              <div class="ui input small field w3-col s12 m12">
                <textarea name="about" class="about" placeholder="Describe yourself"></textarea>
              </div>
              <div class="ui input small field w3-col s12 m12">
                <button class="ui blue button" type="button">
          				<label class="myLabel dp-btn">
          				  <span>
          				  <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
          					<input type="file" name="uploadphoto" class="hide">
          					  <i class="fa fa-camera"></i> upload photo
          				  </span>
          				</label>
          			</button>
              </div>
              <div class="w3-center field">
                <button type="submit" class="ui w3-hover-blue large button" name="send">Add Information</button>
              </div>
            </form>
          </div>
          <!-- Board of Directors -->
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
