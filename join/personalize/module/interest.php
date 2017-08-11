<?php
	session_start();
	include_once '../../../app/connect.php';
	include_once '../../../module/userdata.php';

	if (isset($_POST['interest'])) {
		$interest = $_POST['interest'];

		$check = "SELECT * FROM user_interest WHERE user_id = $user_id";
		$result = mysqli_query($conn, $check);
			while ($row = mysqli_fetch_array($result)) {
				$i = $row["interest"];
			}

			if ($i !== $interest) {
				$addInterest = sprintf("INSERT INTO user_interest (user_id, interest, date) " .
			      "VALUES ('%s', '%s', '%s'); ",
				    mysqli_real_escape_string($conn, $user_id),
				    mysqli_real_escape_string($conn, $interest),
				    mysqli_real_escape_string($conn, $date),
				    mysqli_insert_id($conn));

					if(mysqli_query($conn, $addInterest)) {
						$i = "Successfully Added";
					} else {
						$i = "Failed";
					}
					return $i;
			}
	}

?>
