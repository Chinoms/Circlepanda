<?php  
	function getTotalFollowers($conn, $id){
		$followers = "SELECT count(*) FROM follow_friend WHERE friends_id = $id";
		$result = mysqli_query($conn, $followers);
			while ($row = mysqli_fetch_array($result)) {
			 	$i = $row[0];
			 	if ($i < 2) {
			 		$i = $i . " Follower";
			 	} else {
			 		$i = $i . " Followers";
			 	}
			 	return $i;
			 } 
	}
?>