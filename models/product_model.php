<?php
include "../config/db.php";
function check($data){
	global $conn;
	$user = array();
	$delete_status = "0";
	$stmt = "SELECT * FROM sub_category WHERE delete_status = '$delete_status'";
	$result = mysqli_query($conn,$stmt);
	if (mysqli_num_rows($result)) {
	 	while($row = mysqli_fetch_assoc($result)){
	 		$user[] = $row;
	 	}
	 	echo json_encode($user);
	 	// return $user;
	} else {
		echo false;
	}
}

?>