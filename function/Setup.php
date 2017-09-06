<?php
  include_once 'Mail.php';
  class SetupAccount extends Mail
  {
    function setup($conn, $id, $date)
    {
      $ff = sprintf("INSERT INTO follow_friend (user_id, friends_id, date) " .
          "VALUES ('%s', '%s', '%s'); ",
  			mysqli_real_escape_string($conn, $id),
  			mysqli_real_escape_string($conn, 1),
  			mysqli_real_escape_string($conn, $date),
  			mysqli_insert_id($conn));

  			if (mysqli_query($conn, $ff)) {
          $subject = "Circlepanda Notification";
    			$to = $this->idto($conn, $id, "email");
          $fullname = $this->idto($conn, $id, "fullname");
          $name = $this->idto($conn, 1, "fullname");
    			$body = "<p>" . $fullname . ", Started Following you on Circlepanda. </p>";
          $this->mailUser($to, $name, $subject, $body);
        }
    }
    public function active($conn, $user_id, $date)
    {
      $active = sprintf("INSERT INTO user_active(user_id, status, active_date) " .
          "VALUES ('%s', '%s', '%s'); ",
  			mysqli_real_escape_string($conn, $user_id),
  			mysqli_real_escape_string($conn, 1),
  			mysqli_real_escape_string($conn, $date),
  			mysqli_insert_id($conn));

			if (mysqli_query($conn, $active)) {
        return 200;
      } else {
        return 406;
      }
    }
    public function InitiateSiteTour($conn, $user_id)
    {
      $checkTour = "SELECT * FROM sitetour WHERE user_id='$user_id'";
      $result = mysqli_query($conn, $checkTour);
      if ($result->num_rows > 1) {
      	header("Location: ../home");
      } else {
        $row = mysqli_fetch_array($result);
        $id  = $row['user_id'];
        // Chain Zero => 0
        $status = $hide_greeting = $personal_status = $notification = $messages = $badge = 0;
        // Initiate Tour Query
        $tour = sprintf("INSERT INTO sitetour (status, notification, messages, user_id, badge, hide_greeting, personal_status) " .
        "VALUES ('%s', '%s' ,'%s', '%s', '%s', '%s' ,'%s'); ",
        mysqli_real_escape_string($conn, $status),
        mysqli_real_escape_string($conn, $notification),
        mysqli_real_escape_string($conn, $messages),
        mysqli_real_escape_string($conn, $user_id),
        mysqli_real_escape_string($conn, $badge),
        mysqli_real_escape_string($conn, $hide_greeting),
        mysqli_real_escape_string($conn, $personal_status),
        mysqli_insert_id($conn));
        // Query Data into Database
        if (mysqli_query($conn, $tour)) {
          header("Location: ../home");
        } else {
          $_SESSION['msg'] = "Couldn't set up your account.";
          header("Location: " . $_SERVER['HTTP_REFERER']);
        }
      }
    }
  }
  $setup = new SetupAccount;
?>
