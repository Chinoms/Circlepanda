<?php
if (DEVELOPER_MOODE == 1) {
function imagOrNot($conn, $id){
  $checkIfImage_orNot = "SELECT * FROM user_post WHERE post_id = $id";
  $result = mysqli_query($conn, $checkIfImage_orNot);
    if ($result->num_rows > 0) {
      $row = mysqli_fetch_array($result);
      $image_path = $row['image_path'];
      $name = $row['fullname'];
      if ($image_path === "0") {
        $i = '';
      } else {
        $i = '<img src="'. $image_path .'" class="img-post" alt="'.$name.' photo">';
      }
    }
    return $i;
}

function imagOrNotCollection($conn, $id){
  $checkIfImage_orNot = "SELECT * FROM collection_post WHERE post_id = $id";
  $result = mysqli_query($conn, $checkIfImage_orNot);
    if ($result->num_rows > 0) {
      $row = mysqli_fetch_array($result);
      $image_path = $row['image_path'];
      if ($image_path === "0") {
        $i = '';
      } else {
        $i = '<img src="'. $image_path .'" class="img-post" alt="collection photo">';
      }
    }
    return $i;
}

function imagOrNotChannel($conn, $id){
  $checkIfImage_orNot = "SELECT * FROM channel_post WHERE post_id='$id'";
  $result = mysqli_query($conn, $checkIfImage_orNot);
    if ($result->num_rows > 0) {
      $row = mysqli_fetch_array($result);
      $image_path = $row['image_path'];
      if ($image_path === "0") {
        $i = '';
      } else {
        $i = '<img src="'. $image_path .'" class="img-post" alt="channel photo">';
      }
    }
    return $i;
}

function imagOrNotPage($conn, $id){
  $checkIfImage_orNot = "SELECT * FROM page_post WHERE post_id='$id'";
  $result = mysqli_query($conn, $checkIfImage_orNot);
    if ($result->num_rows > 0) {
      $row = mysqli_fetch_array($result);
      $image_path = $row['image_path'];
      if ($image_path === "0") {
        $i = '';
      } else {
        $i = '<img src="'. $image_path .'" class="img-post" alt="page photo">';
      }
    }
    return $i;
}
} else {
  function imagOrNot($conn, $id){
    $checkIfImage_orNot = "SELECT * FROM user_post WHERE post_id = $id";
    $result = mysqli_query($conn, $checkIfImage_orNot);
      if ($result->num_rows > 0) {
        $row = mysqli_fetch_array($result);
        $image_path = $row['image_path'];
        $name = $row['fullname'];
        if ($image_path == 0) {
          $i = '';
        } else {
          $i = '<img src="'. $image_path .'" class="img-post" alt="'.$name.' photo">';
        }
      }
      return $i;
  }

  function imagOrNotCollection($conn, $id){
    $checkIfImage_orNot = "SELECT * FROM collection_post WHERE post_id = $id";
    $result = mysqli_query($conn, $checkIfImage_orNot);
      if ($result->num_rows > 0) {
        $row = mysqli_fetch_array($result);
        $image_path = $row['image_path'];
        if ($image_path == 0) {
          $i = '';
        } else {
          $i = '<img src="'. $image_path .'" class="img-post" alt="collection photo">';
        }
      }
      return $i;
  }

  function imagOrNotChannel($conn, $id){
    $checkIfImage_orNot = "SELECT * FROM channel_post WHERE post_id='$id'";
    $result = mysqli_query($conn, $checkIfImage_orNot);
      if ($result->num_rows > 0) {
        $row = mysqli_fetch_array($result);
        $image_path = $row['image_path'];
        if ($image_path == 0) {
          $i = '';
        } else {
          $i = '<img src="'. $image_path .'" class="img-post" alt="channel photo">';
        }
      }
      return $i;
  }

  function imagOrNotPage($conn, $id){
    $checkIfImage_orNot = "SELECT * FROM page_post WHERE post_id='$id'";
    $result = mysqli_query($conn, $checkIfImage_orNot);
      if ($result->num_rows > 0) {
        $row = mysqli_fetch_array($result);
        $image_path = $row['image_path'];
        if ($image_path == 0) {
          $i = '';
        } else {
          $i = '<img src="'. $image_path .'" class="img-post" alt="page photo">';
        }
      }
      return $i;
  }
}
?>
