<?php
session_start();
include_once 'app/connect.php';
include_once 'function/__autoload.php';
$auth->protect();
?>
<!DOCTYPE html>
<html>
<head>
<title>Login to Circepanda</title>
<?php
include_once 'metas/seo.php';
$desc = "Log in to Circlepanda to start sharing and connecting with your friends, family and people you know.";
$keyword = "Circlepanda, Social, Network, Login, Login, Check In, Connect, Circle";
echo seoMeta($desc, $keyword);
?>
<link rel="icon" href="<?php echo BASE_URL . "asset/images/circlepanda-fa-icon.png" ?>">
<link rel="stylesheet" href="<?php echo BASE_URL . "asset/plugins/fontawesome/css/font-awesome.css"; ?>">
<link rel="stylesheet" href="<?php echo BASE_URL . "asset/plugins/bootstrap/css/bootstrap.css"; ?>">
<link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/index/index.ui.css"; ?>">
<link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/media/index.ui.media.css"; ?>">
<link rel="stylesheet" href="<?php echo BASE_URL . "asset/plugins/semantic-ui/semantic.min.css"?>">
<link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/online.min.css"; ?>">
<link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/w3.css" ?>">
<link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/pace.css"; ?>">
<link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/login.css"; ?>">
<script src="<?php echo BASE_URL . "asset/js/jquery.min.js"; ?>"></script>
<script src="<?php echo BASE_URL . "asset/js/online.min.js"; ?>"></script>

</head>
<body>
<script>
		var run = function() {
		 if (Offline.state === 'up') {
			 Offline.check();
			} setInterval(run, 5000);
		}
</script>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1764963443768629',
      xfbml      : true,
      version    : 'v2.6'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

	<div  class="container">
		<div class="row">
			<div class="col-sm-12">
					<form class="login-wrap w3-center ui form" action="<?php echo BASE_URL . "auth/login"; ?>" method="post">
						<!-- Circlepanda Logo -->
						<span class="col-sm-12">
							<a href="<?php echo BASE_URL ?>">
			          <img src="<?php echo BASE_URL . "asset/images/circlepanda-logo.png" ?>" alt="Circlepanda logo">
								<?php echo $_SESSION['user_id']; ?>
			        </a>
						</span>
						<div class="col-sm-12 report">
							<?php
                # Error Inline Display
                include_once 'app/error/inline.php';
              ?>

						</div>
						<div class="ui input small col-sm-12">
		          <input type="text" name="user_name" class="u" placeholder="Username" autofocus>
		        </div>
						<div class="ui input small col-sm-12 loading">
							<input type="password" name="password" class="p" placeholder="Password" id="password">
						</div>
		        <div class="col-sm-12">
							<input type="checkbox" name="visible" onchange="document.getElementById('password').type = this.checked ? 'text' : 'password'">
							<label for="visible">Show Password</label>
              <br></div>
							<div class="col-sm-12">
								<a href="<?php echo BASE_URL . "auth/reset/"?>" class="forgotpassword" name="forgot">	Forgot Password? </a>
              </div>
							<a class="ui button" href="<?php echo BASE_URL . "join/self"?>"> Sign Up </a>
							<button type="submit" class="ui primary button"> Sign In </button>
							<div class="ui horizontal divider w3-container">
		            Or
		          </div>
							<a href="<?php echo BASE_URL . "auth/fb/fbconfig" ?>" class=" ui facebook button " name="button"> Facebook </a>
							<button type="button" class="ui twitter button " name="button"> Twitter </button>
							<button type="button" class="ui github button " name="button"> Github </button>
		        </div>
					</form>

			<!-- Ajaxified Login -->
			<script src="<?php echo BASE_URL . "ajax/login.js" ?>"></script>
	<script src="<?php echo BASE_URL . "asset/plugins/semantic-ui/semantic.min.js"?>"></script>
	<script src="<?php echo BASE_URL . "asset/js/owl.carousel.js" ?>"></script>
	<script src="<?php echo BASE_URL . "asset/js/nicescroll.js" ?>"></script>
	<script src="<?php echo BASE_URL . "asset/js/pace.min.js" ?>" charset="utf-8"></script>
	<script src="<?php echo BASE_URL . "asset/plugins/bootstrap/js/bootstrap.js"; ?>"></script>
</body>
</html>
