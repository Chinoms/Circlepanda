<?php
session_start();
 include_once "app/connect.php";
 //Check, if user is already login, then Jump to secured page
 if(isset($_SESSION['user_id'])) {
   header("Location: home?rdr=" . $_SESSION['user_name']);
 }
?>
<!DOCTYPE html>
<head>
  <title> Circlepanda - Connecting Creative Minds, Families and Friends </title>
  <?php
    include_once 'metas/seo.php';
    $desc = "Connecting Creative Minds, Making Fun A Culture. Circlepanda Is Social Network, That Connects People From All Around The World, With Common Interest, Likes, And Hobbies, Giving People The Medium To Collaborate Doing Things They Love";
    $keyword = "Circlepanda, Social, Network, Fun, Memories, Messaging, Partner, Hangout, Meet, Team, Channel, Collection, Page, Community, Creativity, Ideas, Status, Colorful, Family, Friends, Panda, Circle, Group, People, Images, Api, More";
    echo seoMeta($desc, $keyword);
  ?>
  <link rel="icon" href="<?php echo BASE_URL . "asset/images/circlepanda-fa-icon.png" ?>">
  <link rel="stylesheet" href="<?php echo BASE_URL . "asset/plugins/fontawesome/css/font-awesome.css"; ?>">
  <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/index/javascript.fullPage.css"; ?>">
  <link rel="stylesheet" href="<?php echo BASE_URL . "asset/plugins/bootstrap/css/bootstrap.css"; ?>" type="text/css">
  <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/index/index.ui.css"; ?>">
  <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/media/index.ui.media.css"; ?>">
  <link rel="stylesheet" href="<?php echo BASE_URL . "asset/plugins/semantic-ui/semantic.min.css"?>">
  <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/w3.css" ?>">
  <link rel="manifest" href="<?php echo BASE_URL . "manifest.json" ?>">
  <script async src="https://cdn.onesignal.com/sdks/OneSignalSDK.js"></script>
  <script>
    var OneSignal = window.OneSignal || [];
    OneSignal.push(["init", {
      appId: "e92afe39-4051-4e4b-8037-fa29fee3b786",
      autoRegister: false,
      notifyButton: {
        enable: true /* Set to false to hide */
      },
      safari_web_id: 'web.onesignal.auto.68a78e72-ca6b-43d3-aa15-83c87cfb9ced',
      // Your other init options here
      persistNotification: false // Automatically dismiss the notification after ~20 seconds in Chrome Deskop v47+
    }]);
  </script>
  </head>
<body onload="initialiseState()">

  <!-- Circlepanda header Section -->
  <section class="header-pane">
    <div class="w3-container">
      <span class="w3-col s12 m4 w3-padding-24 w3-center">
        <a href="<?php echo BASE_URL ?>">
          <img src="<?php echo BASE_URL . "asset/images/circlepanda-logo.png" ?>" alt="Circlepanda logo">
        </a>
      </span>
      <span class="w3-col s12 m3 w3-padding-12 w3-right w3-center">
        <a href="<?php echo BASE_URL . "login" ?>" class="btn-override log">Login</a>
        <a href="<?php echo BASE_URL . "join/self" ?>" class="btn-override bg-white">Sign Up</a>
      </span>
    </div>

    <!-- Circlepanda Social Sharers [btn link] -->
     <span class="social-holder">
        <a target="_blank" data-toggle="tooltip" data-placement="left" title="Share on facebook" href="https://www.facebook.com/sharer/sharer.php?u=www.circlepanda.com" class="social-icon img-circle fb"><i class="fa fa-facebook"></i></a>
        <a target="_blank" href="https://twitter.com/home?status=www.circlepanda.com" class="social-icon img-circle tw"><i class="fa fa-twitter"></i></a>
        <a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=www.circlepanda.com&title=Making%20fun%20a%20culture%20at%20circle%20panda&summary=To%20find%20a%20friend%20you%20need%20to%20be%20one.&source=" class="social-icon img-circle ig"><i class="fa fa-linkedin"></i></a>
        <a target="_blank" href="https://plus.google.com/share?url=www.circlepanda.com" class="social-icon img-circle gp"><i class="fa fa-google"></i></a>
      </span>
   </section>

  <!-- Chevron Icon (Circlepanda) -->
  <a href="#Memories" class="nav-down animated bounce"><i class="fa fa-chevron-down"></i></a>

  <!-- Footer Section (Circlepanda) -->
  <section class="footer text-center">
    <nav class="footer-nav">
      <ul>
        <a href="<?php echo BASE_URL . "about/"?>"><li>About</li></a>
        <a href="<?php echo BASE_URL . "developer/"?>"><li>Developer</li></a>
        <a href="<?php echo BASE_URL . "about/blog"?>"><li>Blog</li></a>
        <a href="<?php echo BASE_URL . "developer/api"?>"><li>Api</li></a>
        <a href="<?php echo BASE_URL . "support/"?>"><li>Guide</li></a>
        <a href="<?php echo BASE_URL . "about/career"?>"><li>Career</li></a>
        <a href="<?php echo BASE_URL . "support/"?>"><li>Support</li></a>
        <a href="<?php echo BASE_URL . "ad/"?>"><li>Create Ad</li></a>
        <a href="<?php echo BASE_URL . "legal/privacy"?>"><li>Privacy</li></a>
        <a href="<?php echo BASE_URL . "legal/"?>"><li>Terms of service</li></a>
        <a href="<?php echo BASE_URL . "support/forum"?>"><li>Help</li></a>
      </ul>
    </nav>
  </section>

<div id="fullpage">
	<div class="section " id="section0">
		<div class="content">
      <div class="type-wrap">
        It's
          <div id="typed-strings">
            <p>all about you</p>
            <p>all about fun</p>
            <p>all about good morning and good night</p>
            <p>always a Good time at Circlepanda</p>
          </div>
          <span id="typed" style="white-space:pre;"></span>
          <p>Whatever Makes you happy</p>
      </div>
		</div>
	</div>
  <!-- Making fun a culture at circle panda  -->
	<div class="section" id="section1">
	   <div class="slide" id="slide1">
		<span class="semi-content">
     <h1>Stay Connected</h1>
     <hr>
     <p>Smile along with millions of creative minded people.</p>
		</span>
	   </div>
  </div>
  <div class="section" id="section2">
    <div class="content">
      <h1>Images</h1>
      <p>A Selfie won't hurt. That's how we keep Memories</p>
    </div>
  </div>
    <div class="section" id="section3">
    <span class="semi-content">
	<h1>Stay Curious</h1>
      <p>There’s always something new to discover.</p>
		</span>
  </div>
  </div>

<!-- Footer -->
<script src="<?php echo BASE_URL . "asset/js/jquery.min.js"; ?>"></script>
  <script src="<?php echo BASE_URL . "asset/plugins/typed.js-master/js/typed.js"; ?>"></script>
  	<script>
  	    $(function(){
  	        $("#typed").typed({
  	            // strings: ["Typed.js is a <strong>jQuery</strong> plugin.", "It <em>types</em> out sentences.", "And then deletes them.", "Try it out!"],
  	            stringsElement: $('#typed-strings'),
  	            typeSpeed: 70,
  	            backDelay: 500,
  	            loop: false,
  	            contentType: 'html', // or text
  	            // defaults to false for infinite loop
  	            loopCount: false,
  	            callback: function(){ foo(); },
  	            resetCallback: function() { newTyped(); }
  	        });

  	        $(".reset").click(function(){
  	            $("#typed").typed('reset');
  	        });

  	    });
  	    function newTyped(){ /* A new typed object */ }
  	    function foo()
        {
          console.log("Callback");
        }
      </script>
<script type="text/javascript" src="<?php echo BASE_URL . "asset/js/javascript.fullPage.js"; ?>"></script>
<script type="text/javascript">
	fullpage.initialize('#fullpage', {
		anchors: ['Fun', 'Memories', 'Images', 'Explore'],
		menu: '#menu',
		css3:true
	});
</script>
<script type="text/javascript">
  /*
  function initialiseState() {
    if (Notification.permission !== 'granted') {
      console.log('The user has not granted the notification permission.');
      return;
    } else if (Notification.permission === “blocked”) {
     /* the user has previously denied push. Can't reprompt. */
    //} else {
      /* show a prompt to the user */
    //}

    // Use serviceWorker.ready so this is only invoked
    // when the service worker is available.
    /*navigator.serviceWorker.ready.then(function(serviceWorkerRegistration) {
      serviceWorkerRegistration.pushManager.getSubscription()
        .then(function(subscription) {
          if (!subscription) {
            // Set appropriate app states.
            return;
          }
        })
        .catch(function(err) {
          console.log('Error during getSubscription()', err);
        });
    });
  }
  */
</script>
<!--<script src="<?php # echo BASE_URL . "OneSignalSDKUpdaterWorker.js" ?>"></script>
<script src="<?php # echo BASE_URL . "OneSignalSDKWorker.js" ?>"></script>-->
<script src="<?php echo BASE_URL . "asset/plugins/semantic-ui/semantic.min.js"?>"></script>
<script async src="<?php echo BASE_URL . "asset/plugins/bootstrap/js/bootstrap.js"; ?>"></script>
<script async src="<?php echo BASE_URL . "asset/js/wow.js"; ?>"></script>
</body>
</html>
