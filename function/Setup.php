<?php
  include_once '__autoload.php';
  class SetupAccount extends Mail
  {
    function __construct($id, $date)
    {
      $this->id = $id;
      $this->date = $date;
    }
    function setup($conn)
    {
      $ff = sprintf("INSERT INTO follow_friend (user_id, friends_id, date) " .
          "VALUES ('%s', '%s', '%s'); ",
  			mysqli_real_escape_string($conn, $this->id),
  			mysqli_real_escape_string($conn, 1),
  			mysqli_real_escape_string($conn, $this->date),
  			mysqli_insert_id($conn));

  			if(mysqli_query($conn, $ff)){
          $subject = "Circlepanda Notification";
    			$f_email = $this->idto($conn, $id, $selector, $row);
          $fullname = idtoname($conn, $id);
          $ex_fullname = idtoname($conn, 1);
    			$body = "<p>" . $fullname . ", Started Following you on Circlepanda. </p>";
          $this->mailUser($to, $name, $subject, $body);
          mailUser($f_email, $ex_fullname, $subject, $body);
        } else {

  		  }
    }
  }
  $setup = new SetupAccount;
?>
