<?php
# Build the SELECT statement
$chat = "SELECT * FROM follow_friend WHERE friends_id='$user_id' ORDER BY id DESC";
# Run the query
$result = mysqli_query($conn, $chat);
while ($c = mysqli_fetch_array($result)) {
  echo
  '<a href="javascript:register_popup(\''. $convertIdto->idto($conn, $c['user_id'], "fullname") .'\', \''. $convertIdto->idto($conn, $c['user_id'], "fullname") .'\');" class="linker" id="'. $convertIdto->idto($conn, $c['user_id'], "profile_pic_id") .'">
    <img src="'. $image->get_web_path($convertIdto->idto($conn, $c['user_id'], "profile_pic_id")) .'" class="chat-icon" title="'. $convertIdto->idto($conn, $c['user_id'], "fullname") .'">
  </a>';
}
?>
