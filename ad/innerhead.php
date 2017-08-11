<header class="w3-padding-8 w3-container w3-col s12 m12">
  <?php

      echo '<div class="w3-col s12 m9">
      <a href="'.BASE_URL.'"><img src="'. BASE_URL . 'asset/images/circlepanda-logo.png" alt="Circlepanda logo"></a>
      </div>';

      echo '<div class="ad_auth_holder w3-col s12 m3 w3-padding-8">
      <img src="'. BASE_URL . 'module/images/dp?image_id=' . $profile_pic_id . '" alt="dp" class="header-dp">
      <a href="'. BASE_URL .'ad/dash">
        <div class="ui animated white fade button" tabindex="0">
        <div class="visible content">Manage Circlepanda Ads</div>
        <div class="hidden content">
          Continue to dashboard
        </div>
        </div>
      </a>
      </div>';
  ?>
  </div>
</header>

<script language="JavaScript">
    window.onbeforeunload = confirmExit;
    function confirmExit() {
        return "You have attempted to leave this page. Are you sure?";
    }
</script>
