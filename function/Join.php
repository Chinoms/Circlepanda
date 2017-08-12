<?php
  include_once '__autoload.php';
  class Join extends Image
  {
    public function joinCirclepanda($conn, $fullname, $user_name, $email, $passcode, $gender, $year, $month, $day, $bio, $phone, $country, $state, $city, $user_cover_photo, $ip, $user_token, $date, $confirmed)
    {
      $join = sprintf("INSERT INTO users (fullname, user_name, email, passcode, gender," .
          "year, month, day, bio, phone, country, state, city, user_cover_id, ip, user_token," .
  				"join_date, confirmed, profile_pic_id) " .
          "VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s'); ",
  			mysqli_real_escape_string($conn, $fullname),
  			mysqli_real_escape_string($conn, $user_name),
  			mysqli_real_escape_string($conn, $email),
        mysqli_real_escape_string($conn, md5($passcode)),
  			mysqli_real_escape_string($conn, $gender),
  			mysqli_real_escape_string($conn, $year),
  			mysqli_real_escape_string($conn, $month),
  			mysqli_real_escape_string($conn, $day),
  			mysqli_real_escape_string($conn, $bio),
  			mysqli_real_escape_string($conn, $phone),
  			mysqli_real_escape_string($conn, $country),
  			mysqli_real_escape_string($conn, $state),
  			mysqli_real_escape_string($conn, $city),
  			mysqli_real_escape_string($conn, $user_cover_photo),
  			mysqli_real_escape_string($conn, htmlentities($ip)),
  			mysqli_real_escape_string($conn, $user_token),
  			mysqli_real_escape_string($conn, $date),
        mysqli_real_escape_string($conn, $confirmed),
  	    mysqli_real_escape_string($conn, 0),
     	 	mysqli_insert_id($conn));

  			$_SESSION['mail_add'] = $email;
        // Insert new user into the database
  			if(mysqli_query($conn, $join)){
  				$_SESSION['user_name'] = $_POST['username'];
  				$_SESSION['user_id'] = $user_id = mysqli_insert_id($conn);
  				header("Location: ../join/cont");
  			} else {
        	$_SESSION['message'] = "<h1>there's an error, we couldn't create your account at the moment</h1>";
  				header("Location: ../join/self");
  		  }
    }
    public function updateAccount($conn, $gender, $phone, $year, $month, $day, $date, $image_fieldname, $upload_dir)
    {
        $upload_filename = $this->uploadImage($conn, $image_fieldname, $upload_dir);
        if ($upload_filename !== NULL) {
          $update_user = "UPDATE users SET gender='$gender', phone='$phone', year='$year', month='$month', day='$day', profile_pic_id='$upload_filename', confirmed='1' WHERE user_id=$user_id";
  				if(mysqli_query($conn, $update_user)) {
  					# mail function
  					$body = "
  						Welcome to Circlepanda. <br>
  						A Place you get to meet friends, and have fun.
  						Circlepanda, connects creative minds, Family and friends.
  					";
  					mailUser($email, $fullname, 'Welcome to Circlepanda', $body);
  					header("Location: ../personalize/getstarted");
  				} else {
  					$_SESSION['message'] = "<h1>Your profile photo was unsuccessfully uploaded</h1><h1>:(</h1>";
  					header("Location: " . $_SERVER['HTTP_REFERER']);
  				}
      } else {
        $update_user = "UPDATE users SET gender='$gender', phone='$phone', year='$year', month='$month', day='$day', profile_pic_id='/Applications/MAMP/htdocs/circlepanda/uploads/dp/dp.png', confirmed='1' WHERE user_id=$user_id";
          if(mysqli_query($conn, $update_user)) {
            $setup->setup($conn, $user_id, $date);
            # mail function
            $body = "
            Welcome to Circlepanda. <br>
            A Place you get to meet friends, and have fun.
            Circlepanda, connects creative minds, Family and friends.
            ";
            mailUser($email, $fullname, 'Welcome to Circlepanda', $body);
            header("Location: ../personalize/getstarted");
          } else {
            $_SESSION['message'] = "<h1>Something went wrong, try againshortly</h1>";
            header("Location: " . $_SERVER['HTTP_REFERER']);
          }
      }
    }
  }
$join = new Join;
?>
