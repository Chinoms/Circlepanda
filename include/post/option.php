<?php
function postoption($conn, $id) {
  $check = "SELECT * FROM user_post WHERE user_id = $id";
  $result = mysqli_query($conn, $check);
    while ($row = mysqli_fetch_array($result)) {
      switch ($row['user_id']) {
        case $id:
          $i = '<div class="dropdown-option hide">
            <a href="'. BASE_URL .'module/post/option/edit"> <span> <i class="fa fa-edit"></i> edit</span> </a>
            <a href="'. BASE_URL .'module/post/option/delete"> <span> <i class="fa fa-trash-o"></i> delete </span> </a>
          </div>';
          break;
        default:
          $i = '<div class="dropdown-option hide">
          <a href="'. BASE_URL .'module/post/option/save"> <span> <i class="fa fa-bookmark"></i> save</span> </a>
          <a href="'. BASE_URL .'module/post/option/report"> <span> <i class="fa fa-exclamation"></i> report</span> </a>
        </div>';
          break;
      }
      return $i;
    }
}

function pagepostoption($conn, $user_id, $id) {
  $check = "SELECT * FROM page_post WHERE user_id = $user_id and page_id = $id";
  $result = mysqli_query($conn, $check);
    while ($row = mysqli_fetch_array($result)) {
      switch ($row['user_id']) {
        case $id:
          $i = '<div class="dropdown-option hide">
            <a href="'. BASE_URL .'module/post/option/edit"> <span> <i class="fa fa-edit"></i> edit</span> </a>
            <a href="'. BASE_URL .'module/post/option/delete"> <span> <i class="fa fa-trash-o"></i> delete </span> </a>
          </div>';
          break;
        default:
          $i = '<div class="dropdown-option hide">
          <a href="'. BASE_URL .'module/post/option/save"> <span> <i class="fa fa-bookmark"></i> save</span> </a>
          <a href="'. BASE_URL .'module/post/option/report"> <span> <i class="fa fa-exclamation"></i> report</span> </a>
        </div>';
          break;
      }
      return $i;
    }
}
?>
