<?php
session_start();
include_once '../app/connect.php';
if(isset($_SESSION['user_id'])) {
  header("Location: ../home?rdr = " . $_SESSION['user_name']);
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Circlepanda - Sign Up</title>
    <?php
    include_once '../metas/seo.php';
    $desc = "Create an account to Join millions discover mutual interest Connect with friends, family and other people you know. Share photos and videos, send messages and get updates.";
    $keyword = "Circlepanda, Network, Social, Register, Sign Up, Join, Connect, Get started";
    echo seoMeta($desc, $keyword);
    ?>
    <link rel="icon" href="<?php echo BASE_URL . "asset/images/circlepanda-fa-icon.png" ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/plugins/bootstrap/css/bootstrap.css"; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/plugins/fontawesome/css/font-awesome.css"; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/circlepanda.min.css"; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/join.min.css"; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/media/join.media.css"; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/w3.css" ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/plugins/semantic-ui/semantic.min.css"; ?>">
    <script type="text/javascript" src="<?php echo BASE_URL . "asset/js/countries.js"; ?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/jquery.min.js" ?>"></script>
  </head>
  <body>

    <section class="circlepanda_container">
      <form class="circlepanda_form float-left" action="<?php echo BASE_URL . "join/module/self"; ?>" method="post" target="_self">
          <!-- Counter Start -->
        <div class="counter">
          <span class="current_count w3-center w3-circle c-color1">1</span>
          of <span class="total_count">2</span>
        </div>
        <!-- Counter Ends -->
        <div class="circlepanda_form_vertcal_middle">
          <!-- Error Message Space -->
         <?php include 'module/message.php'; ?>

          <div class="col-sm-6">
            <input type="text" class="panda ui input" name="fullname" placeholder="Fullname" required="required" autofocus>
          </div>
          <div class="col-sm-6">
            <input type="text" class="panda ui input" name="username" placeholder="Username" required="required">
          </div>
          <!-- Mail -->
          <div class="col-sm-6">
            <input type="email" class="panda ui input e1" name="email" placeholder="E-mail" required="required">
            <span class="val_input_e"></span>
          </div>
          <div class="col-sm-6">
            <input type="password" class="panda ui input p1" name="passcode" placeholder="Password" required="required">
            <span class="val_input_p"></span>
          </div>
          <!-- Location -->
          <div class="col-sm-4">
            <select class="c-select panda ui select" name="country" id="country" required="required">
              <optgroup>
		            <option value="Select Country">Select Country</option>
	             </optgroup>
            </select>
          </div>
          <div class="col-sm-4">
            <select class="c-select panda ui select" name="state" id="state" required="required">
              <optgroup>
		            <option value="Select State">Select State</option>
              </optgroup>
            </select>
          </div>
          <div class="col-sm-4">
            <input type="text" class="panda ui input" name="city" placeholder="City" required="required">
          </div>
          <div class="col-sm-12 w3-center w3-margin">
            <h4>Already have an Account? <a href="<?php echo BASE_URL . "login" ?>"> Sign in </a> </h4>
            <button type="submit" class="ui w3-hover-blue large button" name="send">Submit and Continue</button>
          </div>
        </div>
      </form>
      <div class="right circlepanda_wrapper w3-center float-right ui p_blue">
        <!-- Error Message -->
        <?php include_once 'module/message2.php'; ?>
      </div>
    </section>


    <script language="javascript">
	    populateCountries("country","state");
    </script>
    <script src="<?php echo BASE_URL . "asset/js/jquery.min.js" ?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/owl.carousel.js"; ?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/wow.js"; ?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/circlepanda.js"; ?>"></script>
    <script src="<?php echo BASE_URL . "asset/plugins/semantic-ui/semantic.min.js"; ?>" charset="utf-8"></script>
  </body>
</html>
