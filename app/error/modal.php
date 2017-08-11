<?php
    if (isset($_SESSION['msg'])) {
      echo '<div id="msg"><b>' . $_SESSION['msg'] . '</b> - Few seconds ago </div>';
      unset($_SESSION['msg']);
    }
?>
