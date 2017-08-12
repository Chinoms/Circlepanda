<?php
  /*
    All users Information in Hiarachy Structure is Fetched And Kept
    In a Variable in the Userdata File for Easy Use
  */
  # From Table = "users"
  if (isset($_SESSION['user_id'])) {
    $user_sesion_id = $_SESSION['user_id'];
  } else {
    $user_sesion_id = NULL;
  }
  $select_query = sprintf("SELECT * FROM users WHERE user_id = %d",
  $user_sesion_id);
  $result = mysqli_query($conn, $select_query);
  if ($result) {
    $row = mysqli_fetch_array($result);
    $user_id        = $row['user_id'];
    $fullname       = $row['fullname'];
    if ($user_sesion_id !== NULL) {
      list($first_name, $last_name) = explode(' ', htmlentities($row['fullname'], ENT_QUOTES, 'UTF-8'));
    }
    $user_name 	    = $row['user_name'];
    $email          = strtolower($row['email']);
    $passcode       = $row['passcode'];
    $gender         = $row['gender'];
    $phone   	      = $row['phone'];
    $country	      = $row['country'];
    $state 	        = $row['state'];
    $city	          = $row['city'];
    $year           = $row['year'];
    $bio            = $row['bio'];
    $cover_id       = $row['user_cover_id'];
    $verified_user  = $row['verified_user'];
    $profile_pic_id = get_web_path($row['profile_pic_id']);
  }

  # From Table = "users_status"
  $select_advance_query = sprintf("SELECT * FROM users_status WHERE user_id = %d",
  $user_sesion_id);
  $result = mysqli_query($conn, $select_advance_query);
  if ($result) {
    $row = mysqli_fetch_array($result);
    $relationship = $row['relationship'];
    $looking = $row['looking'];
    $school = $row['school'];
    $school_from = $row['school_from'];
    $school_to = $row['school_to'];
    $work = $row['work'];
    $work_from = $row['work_from'];
    $work_to = $row['work_to'];
    $work_as = $row['work_as'];
    $studied = $row['studied'];
    $website = $row['website'];
    $about = $row['about'];
    $facebook_url = $row['facebook_url'];
    $twitter_url = $row['twitter_url'];
    $instagram_url = $row['instagram_url'];
    $address = $row['address'];
  }
?>
