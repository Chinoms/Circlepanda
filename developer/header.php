<header>
  <div class="w3-col s12 m6 w3-padding-16 w3-container">
    <div class="ui secondary right menu">
      <a class="<?php echo $data['uri-one']; ?> item">Doc</a>
      <a class="<?php echo $data['uri-two']; ?> item">Community</a>
      <a class="<?php echo $data['uri-three']; ?> item">Support</a>
    </div>
  </div>

  <div class="logo-space w3-col s12 m3 w3-padding-12">
    <a href="<?php echo BASE_URL ?>">
      <img src="<?php echo BASE_URL . 'asset/images/circlepanda-logo.png' ?>" alt="Circlepanda logo">
    </a>
  </div>
  <?php
    include_once 'function/chooseapp.php';
    if (!isset($_SESSION['user_id'])) {
      echo '<div class="ad_auth_holder w3-col s12 m3 w3-padding-12">
      <a href="' . BASE_URL . 'join/self" class="ui button">Sign up</a>
      <a href="' . BASE_URL . 'login" class="ui primary button">Login</a>
      </div>';
    } else {
      echo '
      <div class="ad_auth_holder w3-col s12 m3 w3-padding-12">
        <img src="' . $profile_pic_id . '" alt="dp" class="header-dp">
        '. appChoice($conn, $user_id) .'
      </div>';
    }
  ?>
</header>
