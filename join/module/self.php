<?php
session_start();
include_once '../../app/connect.php';
include_once '../../function/generatetoken.php';

if (isset($_POST['send'])) {
	$fullname = trim($_POST['fullname']);
	$username = trim(ucfirst(strtolower($_POST['username'])));
	$user_name = str_replace(' ', '', $username);
	$email = trim($_POST['email']);
	$passcode = $_POST['passcode'];
	$gender = $year = $month = $day = $bio = $phone = $confirmed = 0;
	$country = $_POST['country'];
	$state = trim($_POST['state']);
	$city = trim($_POST['city']);
	$user_cover_photo = 1;
	$user_token = mt_rand_str(16, '0123456789ABCDEF'); # Result
	$city = htmlentities($city, ENT_QUOTES, 'UTF-8');

		$insert_sql = sprintf("INSERT INTO users (fullname, user_name, email, " .
                "passcode, gender, year, month, day, bio, phone, country, " .
				"state, city, user_cover_id, ip, user_token, join_date, confirmed, profile_pic_id) " .
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
	    mysqli_real_escape_string($conn, 0),
	    mysqli_real_escape_string($conn, $confirmed),
   	 	mysqli_insert_id($conn));

			$_SESSION['mail_add'] = $email;
      # Insert new user into the database
			if(mysqli_query($conn, $insert_sql)){
				$_SESSION['user_name'] = $_POST['username'];
				$_SESSION['user_id'] = $user_id = mysqli_insert_id($conn);
				header("Location: ../cont");
			} else {
      	$_SESSION['message'] = "<h1>there's an error, we couldn't create your account at the moment</h1>";
				header("Location: ../cont");
		  }
			end($conn);
}
?>
