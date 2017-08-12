<?php
session_start();
include_once '../app/connect.php';
include_once '../function/__autoload.php';

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
	$user_token = $int->mt_rand_str(16, '0123456789ABCDEF');
	$city = htmlentities($city, ENT_QUOTES, 'UTF-8');
  // Initial Join Class
  $join->joinCirclepanda($conn, $fullname, $user_name, $email, $passcode, $gender, $year, $month, $day, $bio, $phone, $country, $state, $city, $user_cover_photo, $ip, $user_token, $date, $confirmed);
}
?>
