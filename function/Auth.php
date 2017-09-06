<?php
  class Auth
  {
    function __construct($protected_user_id, $prevented_page)
    {
      $this->user_id = $protected_user_id;
      $this->prevented_page = $prevented_page;
    }
    public function protect()
    {
      if (isset($this->user_id)) {
    		if (isset($this->prevented_page)) {
    			header("Location: " . $this->prevented_page);
    		} else {
    			header("Location: home");
    		}
    	} else {
    		$this->user_id = NULL;
    	}
    }
    public function login_attempt($conn, $u_name, $p_word, $ip, $date)
    {
  		$viewer = getenv( "HTTP_USER_AGENT" );
  		 $browser = "An unidentified browser";
  		 if(preg_match ("/MSIE/i", "$viewer")) {
  		 	$browser = "Internet Explorer";
  		 } else if(preg_match ("/Netscape/i", "$viewer")) {
  		 	$browser = "Netscape";
  		 } else if(preg_match ("/Mozilla/i", "$viewer")) {
  		 	$browser = "Mozilla";
  		 }
  		 	$platform = "An unidentified OS!";
  		 if(preg_match("/Windows/i", "$viewer")) {
  		 $platform = "Windows!";
  		 } else if (preg_match( "/Linux/i", "$viewer")) {
  		 $platform = "Linux!";
  		 }
  		 $browser_versioning =  $browser . " on " .  $platform;
  		$login_attempt = sprintf("INSERT INTO login_attempt (ip_address, browser_v, username, password, time_login) " .
                "VALUES ('%s', '%s', '%s', '%s', '%s'); ",
  			   mysqli_real_escape_string($conn, $ip),
  			   mysqli_real_escape_string($conn, $browser_versioning),
  			   mysqli_real_escape_string($conn, $u_name),
  				 mysqli_real_escape_string($conn, $p_word),
  	       mysqli_real_escape_string($conn, $date),
  			   mysqli_insert_id($conn));

              // Insert the user into the database
  			if(mysqli_query($conn, $login_attempt)){
  				echo 'failed';
  			}
  			end($conn);
  	}
    public function login($conn, $name, $code)
    {
      // Escape Hackers threat From Username field
    	$name = stripslashes(mysqli_real_escape_string($conn, ucfirst(strtolower($name))));
      $name = str_replace(' ', '', $name);
      // Escape Hackers threat From Password field
    	$code = stripslashes(mysqli_real_escape_string($conn, $code));
    	$code = mysqli_real_escape_string($conn, md5($code));

      // Initiate Query
      $result = mysqli_query($conn, "SELECT * FROM users WHERE user_name = '$name' AND passcode ='$code'");
      if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_array($result);
        if($data['user_name']==$name && $data['passcode']==$code) {
          $_SESSION['user_name'] = $_POST['user_name'];
        	$_SESSION['user_id'] = $data['user_id'];
          //Check if you went to a protected page and send back to that page, to ease stress.
        	if (isset($_SESSION['prevented_page'])) {
        		$url = $_SESSION['prevented_page'];
        		echo $url;
        	} else {
        		echo BASE_URL . 'home';
        	}
        } else {
          $this->login_attempt($conn, $u_name, $p_word, $ip, $date);
        }
      }
    }

    public function active($conn, $user_id, $status, $date)
    {
      $updateActive = "UPDATE user_active SET status='$status' WHERE user_id=$user_id";
      if (mysqli_query($conn, $updateActive)) {
        return 200;
      }
    }
    public function logout()
    {
      if (isset($this->user_id)) {
        // set the expiration date to one hour ago
        setcookie("user", $this->user_id, time() - 3600);
        unset($_SESSION['user_id']);
        header("Location: " . BASE_URL);
      } else {
        header("Location: " . $_SERVER['HTTP_REFERER']);
      }
    }
  }

  if (isset($_SESSION['user_id'])) {
    $protected_user_id = $_SESSION['user_id'];
  } else {
    $protected_user_id = NULL;
  }
  if (isset($_SESSION['prevented_page'])) {
    $prevented_page = $_SESSION['prevented_page'];
  } else {
    $prevented_page = NULL;
  }
  $auth = new Auth($protected_user_id, $prevented_page);
?>
