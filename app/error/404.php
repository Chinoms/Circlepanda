<?php
  include_once '../../app/connect.php';
  include_once '../../module/userdata.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Circlepanda 404</title>
    <?php
    include_once '../../metas/external_seo.php';
    $desc = "Circlepanda 404";
    $keyword = "Circlepanda, notfound, 404, error";
    echo seoMeta($desc, $keyword);
    ?>
    <link rel="icon" href="<?php echo BASE_URL . "asset/images/circlepanda-fa-icon.png" ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/plugins/fontawesome/css/font-awesome.css"; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/error.css" ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/pace.css"; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/plugins/semantic-ui/semantic.min.css"?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/w3.css" ?>">
    <script src="<?php echo BASE_URL . "asset/js/jquery.min.js"; ?>"></script>
  </head>
  <body>
    <section class="errormodal w3-center">
      <img src="<?php echo BASE_URL . "asset/images/circlepanda-404.png" ?>" alt="Circlepanda 404">
      <p class="error-report">
        <?php
          if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $error_message = $_GET['error_message'];
            $system_error_message = $_GET['system_error_message'];
            if (DEVELOPMENT_PHASE == 1) {
              $system_error_message = $_GET['system_error_message'];
            } else if (DEVELOPMENT_PHASE == 2 ){
              $system_error_message = Null;
            }
            if (!$error_message) {
              echo 'Something went wrong, and that\'s how you ended up here.';
            } else {
              echo $error_message . " we're working on this";
            }
          }
          echo '
          <a href="'. BASE_URL .'">
            <div class="ui animated white large blue fade button" tabindex="0">
            <div class="visible content">Return Home</div>
            <div class="hidden content">
              <i class="icon home"></i>
            </div>
            </div>
          </a>
          ';
        ?>
      </p>
    </section>
    <?php
      include_once '../../footer.php';
    ?>


    <script src="<?php echo BASE_URL . "asset/plugins/semantic-ui/semantic.min.js"?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/owl.carousel.js" ?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/nicescroll.js" ?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/pace.min.js" ?>" charset="utf-8"></script>
    <script async src="<?php echo BASE_URL . "asset/js/wow.js"; ?>"></script>
  </body>
</html>
