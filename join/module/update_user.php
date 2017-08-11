<?php
	session_start();
	include_once '../../app/connect.php';
	include_once '../../module/userdata.php';
	include_once '../../app/mail.php';
	include_once 'Setup.php';

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$gender = trim($_POST['gender']);
		$phone = trim($_POST['phone']);
		$year = trim($_POST['year']);
		$month = trim($_POST['month']);
		$day = trim($_POST['day']);

		/* Newslaters Check */
		if(isset($_POST['newslater'])){
		$newslatter = sprintf("INSERT INTO subscribe (email) " .
		    "VALUES ('%s'); ",
			mysqli_real_escape_string($conn, $email),
		 	mysqli_insert_id($conn));
			mysqli_query($conn, $newslatter);
		}

		# image name <input type="file" name="dp">
		$image_fieldname = "dp";

		if ($_FILES['dp']['size'] !== 0) {

			# Potential PHP upload errors
			$php_errors = array(1 => 'Maximum file size in php.ini exceeded',
								2 => 'Maximum file size in HTML form exceeded',
								3 => 'Only part of the file was uploaded',
								4 => 'No file was selected to upload.');

			# Make sure we didn't have an error uploading the image
			($_FILES[$image_fieldname]['error'] == 0)
			or handle_error("the server couldn't upload the image you selected.",
			$php_errors[$_FILES[$image_fieldname]['error']]);

			# Is this file the result of a valid upload?
			@is_uploaded_file($_FILES[$image_fieldname]['tmp_name'])
			or handle_error("you were trying to do something naughty. Shame on you!",
			"Uploaded request: file named " .
			"'{$_FILES[$image_fieldname]['tmp_name']}'");

			# Is this actually an image?
			@getimagesize($_FILES[$image_fieldname]['tmp_name'])
			or handle_error("you selected a file for your picture " .
			"that isn't an image.",
			"{$_FILES[$image_fieldname]['tmp_name']} " .
			"isn't a valid image file.");

			# Name the file uniquely
			$now = time();
			while (file_exists($upload_filename = $upload_dir_dp . $now .
			'-' .
			$_FILES[$image_fieldname]['name'])) {
			$now++;
			}

			// Finally, move the file to its permanent location
	    @move_uploaded_file($_FILES[$image_fieldname]['tmp_name'], $upload_filename)
	     or handle_error("we had a problem saving your image to " .
	     "its permanent location.",
	     "permissions or related error moving " .
	     "file to {$upload_filename}");

					$update_user = "UPDATE users SET gender='$gender', phone='$phone', year='$year', month='$month', day='$day', profile_pic_id='$upload_filename', confirmed='1' WHERE user_id=$user_id";
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
?>
