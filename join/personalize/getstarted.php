<?php
	session_start();
	include_once '../../app/connect.php';
  include_once '../../module/userdata.php';
	if (isset($_SESSION['user_id'])) {
		header("Location: ../../home");
	}
?>
<html>
<head>
	<title>Get Started</title>
  <?php
  include_once '../../metas/seo.php';
  $desc = "Get Started, personalize your profile, here at circlepanda";
  $keyword = "Circlepanda, Social, Register, Sign Up, Customize, Personalize, Person, Personal, Profile, Looks, User, Dashboard";
  echo seoMeta($desc, $keyword);
  ?>
  <link rel="icon" href="<?php echo BASE_URL . "asset/images/circlepanda-fa-icon.png" ?>">
	<link href="https://fonts.googleapis.com/css?family=Baloo+Bhaina|Raleway|Ranga" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/personalize/personalize.css" ?>">
	<link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/personalize/getstarted.css" ?>">
	<link rel="stylesheet" href="<?php echo BASE_URL . "asset/plugins/fontawesome/css/font-awesome.min.css"; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/pace.css"; ?>">
		<link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/w3.css" ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/online.min.css"; ?>">
		<link rel="stylesheet" href="<?php echo BASE_URL . "asset/plugins/semantic-ui/semantic.min.css";?>">
    <script type="application/javascript" src="<?php echo BASE_URL . "asset/js/online.min.js"; ?>"></script>
	<script src="<?php echo BASE_URL . "asset/js/jquery.min.js" ?>"></script>
</head>
<body>

	<section class="content">
		<header></header>
		<img src="<?php echo BASE_URL . "asset/images/bodywork1.png"?>" class="icon-start w3-padding-48">
		<div class="w3-container w3-center">
			<?php
				for ($i=0; $i < 12; $i++) {
					echo '
						<div class="choice-box w3-padding-16">
							<span class="w3-col s12 m2">
								<h2><i class="fa fa-dashboard"></i></h2>
							</span>
							<span class="w3-col s12 m10">
								<h3> Hey what\'s up </h3>
							</span>
						</div>
					';
				}
			?>
			<div class="w3-container w3-center">
				<button type="button" class="ui huge primary button"> Get Started </button>
			</div>
		</div>
		<div class="w3-container">

		</div>
	</section>

	<script src="<?php echo BASE_URL . "asset/plugins/semantic-ui/semantic.min.js" ?>"></script>
	<script src="<?php echo BASE_URL . "asset/js/personalize/personalize.js" ?>"></script>
	<script src="<?php echo BASE_URL . "asset/js/owl.carousel.js" ?>"></script>
  <script src="<?php echo BASE_URL . "asset/js/nicescroll.js" ?>"></script>
  <script src="<?php echo BASE_URL . "asset/js/pace.min.js" ?>" charset="utf-8"></script>
</body>
</html>
