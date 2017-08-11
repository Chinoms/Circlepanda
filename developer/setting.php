<?php
  session_start();
  include_once '../app/connect.php';
  include_once '../module/userdata.php';
  include_once 'module/appdata.php';
  include_once 'function/checknull.php';
  if(!isset($_SESSION['user_id'])) {
    $_SESSION['prevented_page'] = BASE_URL . "developer/setting";
    header('Location: ../login');
  } else {
    unset($_SESSION['prevented_page']);
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> <?php echo $app_name; ?> - Dashboard - Circlepanda for Developers </title>
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

    <!-- Menu -->
      <?php
        $data['url-two'] = "active";
        include_once 'sidepane.php';
        include_once 'head.php';
      ?>

      <section class="mainpane">
        <!-- Intro Info -->
        <div class="wrapper first">
          <div class="w3-container w3-padding-12">
            <div class="ui equal width form">
              <div class="fields">
                <div class="field">
                  <label>App Id</label>
                  <input type="text" placeholder="App id" value="<?php echo $app_id; ?>" disabled="">
                </div>
                <div class="field">
                  <label>Display Name</label>
                  <input type="text" value="<?php echo $app_name; ?>" placeholder="App Name" disabled="">
                </div>
              </div>
              <div class="fields">
                <div class="field">
                  <label>App Secret Key</label>
                  <input type="text" value="<?php echo $app_secret_key; ?>" placeholder="●●●●●●●●" disabled="">
                </div>
                <div class="field">
                  <label>App Public Key</label>
                  <input type="text" value="<?php echo $app_public_key; ?>" disabled="">
                </div>
              </div>
              <div class="fields">
                <div class="field">
                  <label>App Domains</label>
                  <input type="text" value="<?php echo checkurl($app_url); ?>" placeholder="">
                </div>
                <div class="field">
                  <label>Contact Email</label>
                  <input type="email" value="<?php echo $admin_email; ?>" placeholder="Used for important communication about your app">
                </div>
              </div>
              <div class="fields">
                <div class="field">
                  <label>Privacy Policy URL</label>
                  <input type="text" value="<?php echo checkurl($policy_url); ?>" placeholder="Privacy policy for login dialogue and App details">
                </div>
                <div class="field">
                  <label>Terms of Service URL</label>
                  <input type="text" value="<?php echo checkurl($terms_url); ?>" placeholder="Terms of Service for login dialogue and App details">
                </div>
              </div>
              <div class="fields">
                <div class="field w3-padding-12">
                  <label class="myLabel btn-selector">
                    <div typ="file" class="ui blue button" data-tooltip="Image Size (216 x 120)px" data-position="right center">
                      <input type="file" name="adphoto" class="hide" accept="image/*" onchange="loadFile(event)">
                        <i class="fa fa-camera"></i> &nbsp; Choose App icon
                    </div>
                  </label>
                </div>
                <div class="field">
                  <label>Category</label>
                  <div class="ui form search multiple selection dropdown">
                  <input type="hidden" name="gender">
                  <i class="dropdown icon"></i>
                  <div class="default text">Category</div>
                  <div class="menu">
                      <div class="item" data-value="1">Art</div>
                      <div class="item" data-value="2">Book</div>
                      <div class="item" data-value="3">Education</div>
                      <div class="item" data-value="4">Games</div>
                      <div class="item" data-value="5">Hospital</div>
                      <div class="item" data-value="6">Hotel</div>
                      <div class="item" data-value="7">Internet/ Software</div>
                      <div class="item" data-value="8">Library</div>
                      <div class="item" data-value="9">Local Business</div>
                      <div class="item" data-value="10">Magazine</div>
                      <div class="item" data-value="11">Music</div>
                      <div class="item" data-value="12">Programming</div>
                      <div class="item" data-value="13">Religion</div>
                      <div class="item" data-value="14">Science</div>
                      <div class="item" data-value="15">School</div>
                      <div class="item" data-value="16">Social Network</div>
                      <div class="item" data-value="17">Sport</div>
                      <div class="item" data-value="18">Writer</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="fields">
              <div class="field">
                <label>Callback URL</label>
                <input type="text" value="<?php echo checkurl($callback_url); ?>" placeholder="">
              </div>
              <div class="field">
                <label>Webhook URL</label>
                <input type="text" value="<?php echo checkurl($webhook_url); ?>" placeholder="">
              </div>
            </div>
          </div>
        </div>
      </div>

        <!-- WebSite Url -->
        <div class="wrapper">
          <span class="toppane"> Website </span>
          <div class="w3-container w3-col s12 m12 w3-padding-24">
            <div class="ui form">
              <div class="field">
                <label>Site URL</label>
                <input type="text" value="<?php echo checkurl($website_url); ?>" placeholder="URL of your site">
              </div>
            </div>
          </div>
        </div>

        <div class="wrapper last w3-container w3-center w3-padding-24 addplatform pointer">
          <strong> + Add Platform </strong>
        </div>
      </section>

      <section class="save-footer w3-center">
        <div class="w3-container w3-padding-12">
          <button class="ui teal button">
            Save Changes
          </button>
          <button class="ui button">
            Discard
          </button>
        </div>
      </section>


  <script src="<?php echo BASE_URL . "asset/js/developer/developer.js"?>"></script>
  <script src="<?php echo BASE_URL . "asset/plugins/semantic-ui/semantic.min.js"?>"></script>
  <script src="<?php echo BASE_URL . "asset/js/owl.carousel.js" ?>"></script>
  <script src="<?php echo BASE_URL . "asset/js/nicescroll.js" ?>"></script>
  <script src="<?php echo BASE_URL . "asset/js/pace.min.js" ?>"></script>
  <script async src="<?php echo BASE_URL . "asset/js/wow.js"; ?>"></script>
  </body>
</html>
