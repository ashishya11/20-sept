<?php
include "../config/db.php";

	function save($data){
		global $conn;
		$check = true;
		$uncheck = false;
		// echo "<pre>"; print_r($data['category']);die;
		$name = $data['category'];
		$user_id = "1";
		$stmt = "INSERT INTO category (category_name, created_by) VALUES ('$name','$user_id')";
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
		$id = $data['category_Id'];
		$name = $data['category'];
		$user_id = "2";
		$time = date("Y-m-d H:i:s");
		$stmt = "UPDATE category SET category_name = '$name', modified_on = '$time', modified_by = '$user_id' WHERE id = '$id'";
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
		$stmt = "UPDATE category SET delete_status = '$delete_status', modified_on = '$time', modified_by = '$user_id' WHERE id = '$id'";
		$result = mysqli_query($conn,$stmt);
		if(mysqli_affected_rows($conn)){
			return $check;
		}else{
			return $uncheck;
		}
	}
	function list_category(){
		global $conn;
		$user = array();
		$delete_status = "0";
		$stmt = "SELECT * FROM category WHERE delete_status = '$delete_status'";
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
		$stmt = "SELECT * FROM category WHERE id = '$id'";
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
	function status_update($data){
		// echo "<pre>"; print_r($data);die;
		global $conn;
		$id = $data['id'];
		$user_id = "2";
		$status = $data['status'];
		$time = date("Y-m-d H:i:s");
		$check = true;
		$uncheck = false;
		if ($status != 0) {
			$new_status = "0";
			$stmt = "UPDATE category SET status = '$new_status', modified_on = '$time', modified_by = '$user_id' WHERE id = '$id'";
			$result = mysqli_query($conn,$stmt);
			if(mysqli_affected_rows($conn)){
				return $check;
			}else{
				return $uncheck;
			}
		} else {
			$new_status = "1";
			$stmt = "UPDATE category SET status = '$new_status', modified_on = '$time', modified_by = '$user_id' WHERE id = '$id'";
			$result = mysqli_query($conn,$stmt);
			if(mysqli_affected_rows($conn)){
				return $check;
			}else{
				return $uncheck;
			}
		}	
	}

?>