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
    public function logout()
    {
      if (isset($this->user_id)) {
        // set the expiration date to one hour ago
        setcookie("user", $this->user_id, time() - 3600);
        unset($_SESSION['user_id']);
        header("Location: " . BASE_URL);
      } else {
        header("Location: " . $_SERVER['HTTP_REFERER']);
      }
    }
  }
  $protected_user_id = $_SESSION['user_id'];
  if (isset($_SESSION['prevented_page'])) {
    $prevented_page = $_SESSION['prevented_page'];
  } else {
    $prevented_page = NULL;
  }
  $auth = new Auth($protected_user_id, $prevented_page);
?>
