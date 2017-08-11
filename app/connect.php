<?php
	include_once 'app.php';
	$conn =
	mysqli_connect(DATABASE_HOST, DATABASE_USERNAME, DATABASE_PASSWORD)
	or handle_error("There was a problem connecting to the database " .
	"that holds the information we need to get you connected.",
	mysqli_error($conn));



		mysqli_select_db($conn, DATABASE_NAME)
	or handle_error("There's a configuration problem with our database." .
	"Can not Select a database table",
	mysqli_error($conn));
?>
