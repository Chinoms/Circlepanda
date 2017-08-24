<?php
  session_start();
  include_once '../app/connect.php';
  include_once '../function/__autoload.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Circlepanda | Register </title>
    <?php
    include_once '../metas/seo.php';
    $desc = "Join millions with creativity and passion for what they do best";
    $keyword = "Circlepanda, Social, Register, Sign Up, Millions, Join, Now";
    echo seoMeta($desc, $keyword);
    ?>
    <link rel="icon" href="<?php echo BASE_URL . "asset/images/circlepanda-fa-icon.png" ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/plugins/bootstrap/css/bootstrap.css"; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/plugins/fontawesome/css/font-awesome.css"; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/circlepanda.min.css"; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/join.css"; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/media/join.media.css"; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/w3.css" ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/plugins/semantic-ui/semantic.min.css"; ?>">
    <script src="<?php echo BASE_URL . "asset/js/jquery.min.js" ?>"></script>
  </head>
  <body>

    <section class="circlepanda_container">
      <form class="circlepanda_form float-right" action="<?php echo BASE_URL . "module/update_user"; ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8" target="_self">
        <!-- Counter Start -->
        <div class="counter">
          <span class="current_count c-color2 w3-center w3-circle">2</span>
          of <span class="total_count">2</span>
        </div>
        <!-- Counter Ends -->
        <div class="circlepanda_form_vertcal_middle1">
          <!-- Error Message Space -->
         <?php echo $error->inline_error(); ?>

           <div class="col-sm-12 w3-center">
             <img src="" id="output" class="img-dp w3-circle">
           </div>

          <div class="col-sm-6">
            <select class="c-select panda ui select" name="gender" required="required">
              <option value="gender">Gender</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>
          <div class="col-sm-6">
            <input type="tel" class="panda ui input" name="phone" placeholder="Phone">
          </div>
          <!-- Birthday -->
          <div class="col-sm-4">
            <select class="c-select panda ui select" name="year">
              <option value="Year">Year</option>
				<?php
				    for($year = 1900; $year <= 2015; $year++) {
				?>
				<option value="<?php echo $year; ?>"> <?php echo $year ?></option>
				<?php
					}
				?>
            </select>
          </div>
          <div class="col-sm-4">
            <select class="c-select panda ui select" name="month">
              <optgroup>
      					<option value="1">Month</option>
                <option value="1">Jan</option>
      					<option value="2">Feb</option>
      					<option value="3">Mar</option>
      					<option value="4">Apr</option>
      					<option value="5">May</option>
      					<option value="6">Jun</option>
      					<option value="7">Jul</option>
      					<option value="8">Aug</option>
      					<option value="9">Sep</option>
      					<option value="10">Oct</option>
      					<option value="11">Nov</option>
      					<option value="12">Dec</option>
      				</optgroup>
            </select>
          </div>
          <div class="col-sm-4">
            <select class="c-select panda ui select" name="day">
              <option value="Day">Day</option>
					<?php
					    for($day = 1; $day <= 31; $day++) {
					?>
				<option value="<?php echo $day; ?>"> <?php echo $day ?></option>
					<?php
						}
					?>
            </select>
          </div>

          <div class="w3-col s12 m12 w3-center">
            <button class="ui blue button" type="button">
      				<label class="myLabel dp-btn">
      				  <span>
      				  <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
      					<input type="file" name="dp" class="hide" accept="image/*" onchange="loadFile(event)">
      					  <i class="fa fa-camera"></i> upload photo
      				  </span>
      				</label>
      			</button>
          </div>

          <div class="w3-col s12 m9 col-sm-offset-3">
            <div class="ui toggle checkbox">
            <input name="terms" type="checkbox" checked="check">
            <label>I accept <a href="<?php echo BASE_URL . "legal/terms"; ?>">terms of service</a></label>
          </div>
          </div>
          <div class="w3-col s12 m9 col-sm-offset-3">
          <div class="ui toggle checkbox">
            <input name="newslater" type="checkbox">
            <label>Subscribe to weekly newsletter</label>
          </div>
          </div>
          <div class="col-sm-12 w3-center w3-margin">
            <button type="submit" class="ui w3-hover-teal large button" name="send">Submit and Continue</button>
          </div>
        </div>
      </form>
      <div class="right circlepanda_wrapper w3-center float-left p_seagreen">
        <!-- Error Message -->
        <?php
          $error->inline_error();
          echo
          '<img src="' . BASE_URL . 'asset/images/circlepanda-meetfriends.png" class="pad-top">
            <h1>Join Million of fun loving people, make fun a culture.</h1>
          <h1>Connect the <i class="icon globe"></i></h1>';
        ?>
      </div>
    </section>

    <script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
    </script>
    <script src="<?php echo BASE_URL . "asset/js/owl.carousel.js"; ?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/wow.js"; ?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/circlepanda.js"; ?>"></script>
    <script src="<?php echo BASE_URL . "asset/plugins/semantic-ui/semantic.min.js"; ?>"></script>
  </body>
</html>
