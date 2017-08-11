<?php
 if(isset($_SESSION['message'])) {
     echo '<div class="alert alert-danger" role="alert">
       <strong>Oh snap!</strong>' . $_SESSION['message'] . '
     </div>';
   unset($_SESSION['message']);
 }
 ?>
