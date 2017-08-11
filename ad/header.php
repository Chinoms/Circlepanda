<header class="w3-padding-8 w3-container w3-col s12 m12">
  <?php
    if (!isset($_SESSION['user_id'])) {
      echo '<div class="w3-col s12 m9">
      <a href="'.BASE_URL.'"><img src="'. BASE_URL . 'asset/images/circlepanda-logo.png" alt="Circlepanda logo"></a>
      </div>';
    } else {
      echo '<div class="w3-col s12 m10">
      <a href="'.BASE_URL.'"><img src="'. BASE_URL . 'asset/images/circlepanda-logo.png" alt="Circlepanda logo"></a>
      </div>';
    }

    if (!isset($_SESSION['user_id'])) {
      echo '<div class="ad_auth_holder w3-col s12 m3 w3-padding-8">
      <a href="' . BASE_URL . 'join/self" class="ui button">Sign up</a>
      <a href="' . BASE_URL . 'login" class="ui primary button">Login</a>
      </div>';
    } else {
      echo '<div class="ad_auth_holder w3-col s12 m2 w3-padding-8">
      <img src="' . $profile_pic_id . '" alt="dp" class="header-dp">
      <a href="'. BASE_URL .'ad/create">
        <div class="ui animated white fade button" tabindex="0">
        <div class="visible content">Get Started</div>
        <div class="hidden content">
          Continue
        </div>
        </div>
      </a>
      </div>';
    }
  ?>
  </div>
</header>
