<?php
include "../config/db.php";
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
function save($data){
	// echo "<pre>"; print_r($data);die;
	global $conn;
	$check = true;
	$uncheck = false;
	$category_id = $data['category'];
	$name = $data['sub_category'];
	$user_id = "1";
	$stmt = "INSERT INTO sub_category (category_id, sub_category_name, created_by) VALUES ('$category_id','$name','$user_id')";
	$result = mysqli_query($conn,$stmt);
	if(mysqli_affected_rows($conn)){
		return $check;
	}else{
		return $uncheck;
	}
}
function list_sub_category(){
	global $conn;
	$user = array();
	$delete_status = "0";
	$stmt = "SELECT category.category_name, sub_category.sub_category_name, sub_category.id, sub_category.status FROM category, sub_category WHERE category.id = sub_category.category_id";
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
function select($data){
	// echo "<pre>"; print_r($data);die;
	global $conn;
	$user = array();
	$id = $data['id'];
	$stmt = "SELECT * FROM sub_category WHERE id = '$id'";
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
function update($data){
	// echo "<pre>"; print_r($data);die;
	global $conn;
	$check = true;
	$uncheck = false;
	$id = $data['sub_category_id'];
	$name = $data['sub_category'];
	$user_id = "2";
	$time = date("Y-m-d H:i:s");
	$stmt = "UPDATE sub_category SET sub_category_name = '$name', modified_on = '$time', modified_by = '$user_id' WHERE id = '$id'";
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
	echo$stmt = "UPDATE sub_category SET delete_status = '$delete_status', modified_on = '$time', modified_by = '$user_id' WHERE id = '$id'";
	$result = mysqli_query($conn,$stmt);
	if(mysqli_affected_rows($conn)){
		return $check;
	}else{
		return $uncheck;
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
		$stmt = "UPDATE sub_category SET status = '$new_status', modified_on = '$time', modified_by = '$user_id' WHERE id = '$id'";
		$result = mysqli_query($conn,$stmt);
		if(mysqli_affected_rows($conn)){
			return $check;
		}else{
			return $uncheck;
		}
	} else {
		$new_status = "1";
		$stmt = "UPDATE sub_category SET status = '$new_status', modified_on = '$time', modified_by = '$user_id' WHERE id = '$id'";
		$result = mysqli_query($conn,$stmt);
		if(mysqli_affected_rows($conn)){
			return $check;
		}else{
			return $uncheck;
		}
	}		
}
?>