<?php
include "../config/db.php";

	function save($data){
		global $conn;
		$check = true;
		$uncheck = false;
		echo "<pre>"; print_r($data);echo"<pre>";print_r($_FILES);die;
		$name = $data['brand'];
		$img = $data['brand_img'];
		$user_id = "1";
		$stmt = "INSERT INTO brand (brand_name, brand_img, created_by) VALUES ('$name','$img','$user_id')";
		$result = mysqli_query($conn,$stmt);
		if(mysqli_affected_rows($conn)){
			return $check;
		}else{
			return $uncheck;
		}
	}
	function update($data){
		// echo "<pre>"; print_r($data);die;
		global $conn;
		$check = true;
		$uncheck = false;
		$id = $data['brand_Id'];
		$name = $data['brand'];
		$user_id = "2";
		$time = date("Y-m-d H:i:s");
		$stmt = "UPDATE brand SET brand_name = '$name', modified_on = '$time', modified_by = '$user_id' WHERE id = '$id'";
		$result = mysqli_query($conn,$stmt);
		if(mysqli_affected_rows($conn)){
			return $check;
		}else{
			return $uncheck;
		}
	}
	function delete($data){
		// echo "<pre>"; print_r($data);die;
		global $conn;
		$id = $data['id'];
		$user_id = "2";
		$delete_status = "1";
		$time = date("Y-m-d H:i:s");
		$check = true;
		$uncheck = false;
		$stmt = "UPDATE brand SET delete_status = '$delete_status', modified_on = '$time', modified_by = '$user_id' WHERE id = '$id'";
		$result = mysqli_query($conn,$stmt);
		if(mysqli_affected_rows($conn)){
			return $check;
		}else{
			return $uncheck;
		}
	}
	function list_brand(){
		global $conn;
		$user = array();
		$delete_status = "0";
		$stmt = "SELECT * FROM brand WHERE delete_status = '$delete_status'";
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
	function check($data){
		// echo "<pre>"; print_r($data);die;
		global $conn;
		$user = array();
		$id = $data['id'];
		$stmt = "SELECT * FROM brand WHERE id = '$id'";
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