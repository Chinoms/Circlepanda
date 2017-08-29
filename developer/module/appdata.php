<?php
  $id = $_SESSION['app_id'];
  $appdata = "SELECT * FROM app WHERE app_id='$id'";
  $result = mysqli_query($conn, $appdata);
    if ($result) {
      $row = mysqli_fetch_array($result);
      $admin_id = $row['user_id'];
      $admin_email = $row['contact_email'];
      $app_id = $row['app_id'];
      $app_name = $row['app_name'];
      $app_secret_key = $row['app_secret_key'];
      $app_public_key = $row['app_public_key'];
      $app_desc = $row['app_desc'];
      $app_url = $row['app_url'];
      $app_category = $row['app_category'];
      $policy_url = $row['policy_url'];
      $terms_url = $row['terms_url'];
      $app_image_id = $row['app_image_id'];
      $website_url = $row['website_url'];
      $webhook_url = $row['webhook_url'];
      $callback_url = $row['callback_url'];
      $mode = $row['mode'];
      $created_date = $row['created_date'];
    }
?>
