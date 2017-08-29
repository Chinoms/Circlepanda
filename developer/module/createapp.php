<?php
  session_start();
  include_once '../../app/connect.php';
  include_once '../../module/userdata.php';
  include_once '../../function/__autoload.php';

  if (($_SERVER["REQUEST_METHOD"]) === 'POST') {
    $app_name = $_POST['name'];
    $app_email = $_POST['email'];
    $generic_app_id = "ID_" . $int->mt_rand_str(10, '0123456789'); # Result
    $app_public_key = "pk_test_" . $int->mt_rand_str(40, '0123456789abcdefgh'); # Result
    $app_secret_key = "sk_test_" . $int->mt_rand_str(40, '0123456789abcdefgh'); # Result
    $mode = 0;

    $appCreate = sprintf("INSERT INTO app (user_id, app_id, app_name, contact_email, app_secret_key, app_public_key, mode, created_date) " .
          "VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s'); ",
        mysqli_real_escape_string($conn, $user_id),
    		mysqli_real_escape_string($conn, $generic_app_id),
        mysqli_real_escape_string($conn, $app_name),
        mysqli_real_escape_string($conn, $app_email),
    		mysqli_real_escape_string($conn, $app_secret_key),
        mysqli_real_escape_string($conn, $app_public_key),
        mysqli_real_escape_string($conn, $mode),
        mysqli_real_escape_string($conn, $date),
    		mysqli_insert_id($conn));

      if (mysqli_query($conn, $appCreate)) {
        $_SESSION['app_id'] = $generic_app_id;
        $callback_url = BASE_URL . "developer/dashboard";
        echo $callback_url;
      }
  }
?>
