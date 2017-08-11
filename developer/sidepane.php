<section class="sidepane">
  <div class="menu">
    <span class="head">
      <a href="<?php echo BASE_URL . "developer/getstarted" ?>">
        <img src="<?php echo BASE_URL . 'asset/images/circlepanda-logo.png'?> " alt="Circlepanda logo">
      </a> <span style="display: inline-table; margin: -10px 0 0;"> Circlepanda for Dev </span>
    </span>
  </div>
  <div class="menu">
    <a href="<?php echo BASE_URL . "developer/dashboard" ?>" class="list <?php echo $data['url-one'] ?>"> Dashboard </a>
    <a href="<?php echo BASE_URL . "developer/setting" ?>" class="list <?php echo $data['url-two'] ?>"> Settings </a>
    <a href="<?php echo BASE_URL . "developer/review" ?>" class="list <?php echo $data['url-four'] ?>"> App Review </a>
    <div class="ui horizontal divider w3-container" style="color: #fff">
      Products
    </div>
    <a href="<?php echo BASE_URL . "developer/" ?>" class="list"> + Add Product </a>

  </div>
</section>
