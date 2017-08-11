<?php
  include_once '../../app/mail.php';
  include_once '../../function/userinfo.php';
  class SetupAccount
  {
    function setup($conn, $id, $date)
    {
      $ff = sprintf("INSERT INTO follow_friend (user_id, friends_id, date) " .
          "VALUES ('%s', '%s', '%s'); ",
  			mysqli_real_escape_string($conn, $id),
  			mysqli_real_escape_string($conn, 1),
  			mysqli_real_escape_string($conn, $date),
  			mysqli_insert_id($conn));

  			if(mysqli_query($conn, $ff)){
          $subject = "Circlepanda Notification";
    			$f_email = idtoemail($conn, 1);
          $fullname = idtoname($conn, $id);
          $ex_fullname = idtoname($conn, 1);
    			$body = "<p>" . $fullname . ", Started Following you on Circlepanda. </p>";
    			mailUser($f_email, $ex_fullname, $subject, $body);
        } else {

  		  }
    }
  }
$setup = new SetupAccount;
?>
