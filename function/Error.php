<?php
  include_once 'Mail.php';
  class HttpError extends Mail
  {
    // Config error page
    function debug_print($message) {
    	if (DEBUG_MODE) {
    		echo $message;
    	}
    }
    // Config error handler function
    function handle_error($user_error_message, $system_error_message) {
    	header("Location: " . BASE_URL . "app/error/404?" .
    	"error_message={$user_error_message}&" .
    	"system_error_message={$system_error_message}");
    	exit($conn);
    }
  }
  $error = new HttpError;
?>
