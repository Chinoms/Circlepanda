<?php
	session_start();
	include_once '../app/connect.php';
	include_once '../module/userdata.php';
  include_once '../function/__autoload.php';
  if ($_SERVER['REQEUST_METHOD'] === POST) {
    $gender = trim($_POST['gender']);
    $phone = trim($_POST['phone']);
    $year = trim($_POST['year']);
    $month = trim($_POST['month']);
    $day = trim($_POST['day']);
    $email = $_SESSION['mail_add'];
    // Initiate methods
    $image_fieldname = "dp"; // Assign the image name a better way
    $upload_dir = $upload_dir_dp; // Setting Path images is stored.
    $join->updateAccount($conn, $gender, $phone, $year, $month, $day, $date, $image_fieldname, $upload_dir);
		$subscribe->newslater($conn, $email); // Return => 1 ['Success'] || Return => 0 ['Failed']
  }
?>