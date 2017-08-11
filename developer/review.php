<?php
  session_start();
  include_once '../app/connect.php';
  include_once '../module/userdata.php';
  include_once 'module/appdata.php';
  if(!isset($_SESSION['user_id'])) {
    $_SESSION['prevented_page'] = BASE_URL . "developer/review";
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
        $data['url-four'] = "active";
        include_once 'sidepane.php';
        include_once 'head.php';
      ?>

      <section class="mainpane">
        <!-- Intro Info -->
        <div class="wrapper first">
          <div class="w3-container w3-padding-24">
            <h1>Make Circlepanda public?</h1>
            <div class="w3-container">
              <div class="ui form">
                <div class="ui toggle checkbox modetoggle">
                  <input name="mode" type="checkbox">
                  <label><?php
                    switch ($mode) {
                      case '0':
                      $i = "<span class='mode-status'>Your app is in development and unavailable to the public.</span>";
                        break;
                      default:
                      $i = "<span class='mode-status'>Your app is available to the public.</span>";
                        break;
                    }
                    printf($i);
                  ?></label>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="wrapper">
          <div class="w3-container w3-padding-24">
            <h1>Submit Items for Approval</h1>
            <div class="w3-container">
              <div class="w3-col s12 m6">
                Some Circlepanda integrations require approval before public usage.
                Before submitting your app for review, please consult our <a href="<?php echo BASE_URL . "legal/policy" ?>"> Platform Policy </a>
                and <a href="<?php echo BASE_URL . "legal/policy" ?>"> Review Guidelines. </a>
              </div>
              <div class="w3-col s12 m6 w3-center">
                <button class="large ui teal button">
                  Start a Submission
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- WebSite Url -->
        <div class="wrapper last">
          <span class="toppane"> Website </span>
          <div class="w3-container w3-col s12 m12 w3-padding-24">

            <table class="ui very basic table">
              <thead>
                <tr>
                  <th></th>
                  <th>LOGIN PERMISSIONS</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td data-tooltip="not available to all users because your app is not live" data-position="right center"><i class="icon remove ui red pointer"></i></td>
                  <td>
                    <h4>email</h4>
                    <p>Provides access to the person's primary email address. This permission is approved by default.</p>
                  </td>
                </tr>
                <tr>
                  <td data-tooltip="not available to all users because your app is not live" data-position="right center"><i class="icon remove ui red pointer"></i></td>
                  <td>
                    <h4>public_profile</h4>
                    <p>Provides access to a person's basic information, including first name, last name, profile picture, gender and age range. This permission is approved by default.</p>
                  </td>
                </tr>
                <tr>
                  <td data-tooltip="not available to all users because your app is not live" data-position="right center"><i class="icon remove ui red pointer"></i></td>
                  <td>
                    <h4>user_friends</h4>
                    <p>Provides access to a person's list of friends that also use your app. This permission is approved by default.</p>
                  </td>
                </tr>
              </tbody>
            </table>

          </div>
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


  <script src="<?php echo BASE_URL . "asset/plugins/semantic-ui/semantic.min.js"?>"></script>
  <script src="<?php echo BASE_URL . "asset/js/owl.carousel.js" ?>"></script>
  <script src="<?php echo BASE_URL . "asset/js/nicescroll.js" ?>"></script>
  <script src="<?php echo BASE_URL . "asset/js/pace.min.js" ?>"></script>
  <script async src="<?php echo BASE_URL . "asset/js/wow.js"; ?>"></script>
  <script async src="<?php echo BASE_URL . "asset/js/developer/developer.js"?>"></script>
  </body>
</html>
