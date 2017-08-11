<div class="w3-container w3-center">
  <i class="material-icons md-72">done_all</i>
  <h3>Successfully Set Up</h3>
  <h5>That is your Ad Preview</h5>

  <div class="w3-container">
    <?php
      $preview = "SELECT * FROM ad a JOIN ad_image i ON a.id = i.id WHERE a.user_id = '$user_id'";
      # Run the query
      $result = mysqli_query($conn, $preview);
      while ($view = mysqli_fetch_array($result)) {
      echo '<div class="display-box">
      <img src="'. BASE_URL .'module/images/adcover?image_id='. idtodp($conn, $view['user_id']) .'" class="cover" alt="cover photo">
        <img src="'. BASE_URL .'module/images/dp?image_id='. idtodp($conn, $view['user_id']) .'" class="ico-dp w3-circle">
        <div class="w3-container pulldown-top">
          <span class="inner-name"><strong>'. $view['campaign_name'] .'</strong></span>
          <div class="w3-container">
            <p class="contact-define">'. $view['description'] .'</p>
          </div>
          <div class="w3-container w3-center w3-padding-12">
            <a href="' . BASE_URL . 'home" class="ui vertical animated small teal button" tabindex="0">
              <div class="hidden content"><i class="right arrow icon"></i></div>
              <div class="visible content">
                '.btnSwitch($view['objective']).'
              </div>
            </a>
          </div>
        </div>
      </div>';
      }
      ?>
  </div>

  <div class="ui horizontal divider">
    Continue
  </div>
  
  <div class="w3-container w3-padding-12">
    <a href="<?php echo BASE_URL . "home" ?>" class="ui vertical animated blue button" tabindex="0">
      <div class="hidden content"><i class="right arrow icon"></i></div>
      <div class="visible content">
        Continue to Main Site
      </div>
    </a>
  </div>
</div>
