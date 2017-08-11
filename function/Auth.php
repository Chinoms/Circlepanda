<?php
  class Auth
  {
    function __construct($protected_user_id, $prevented_page)
    {
      $this->user_id = $protected_user_id;
      $this->prevented_page = $prevented_page;
    }
    public function protect()
    {
      if (isset($this->user_id)) {
    		if (isset($this->prevented_page)) {
    			header("Location: " . $this->prevented_page);
    		} else {
    			header("Location: home");
    		}
    	} else {
    		$this->user_id = NULL;
    	}
    }
  }
  $protected_user_id = $_SESSION['user_id'];
  $prevented_page = $_SESSION['prevented_page'];
  $auth = new Auth($protected_user_id, $prevented_page);
?>
