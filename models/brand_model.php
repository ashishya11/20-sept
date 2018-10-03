<?php
include "../config/db.php";

	function save($data){
		global $conn;
		$check = true;
		$uncheck = false;
		$temp = explode(".", $_FILES["brand_img"]["name"]);
		$newfilename = round(microtime(true)) . '.' . end($temp);
		$filetmpname = $_FILES['brand_img']['tmp_name'];
		$folder = "/var/www/html/20-sept/media/brand-logo/";
		move_uploaded_file($filetmpname, $folder.$newfilename);
		// echo"<pre>";print_r($filetmpname);echo"<pre>";print_r($_FILES);die;
		$name = $data['brand'];
		$user_id = "1";
		$stmt = "INSERT INTO brand (brand_name, brand_img, created_by, modified_by) VALUES ('$name','$newfilename','$user_id','$user_id')";
		$result = mysqli_query($conn,$stmt);
		if(mysqli_affected_rows($conn)){
			return $check;
		}else{
			return $uncheck;
		}
	}
	function update($data){
		// echo "<pre>"; print_r($_FILES);die;
		global $conn;
		$check = true;
		$uncheck = false;
		$id = $data['brand_Id'];
		$name = $data['brand'];
		$user_id = "2";
		$time = date("Y-m-d H:i:s");
		if (isset($_FILES) && ($_FILES['brand_img']['error'] == 0)) {
			// echo "in";die;
			$temp = explode(".", $_FILES["brand_img"]["name"]);
			$newfilename = round(microtime(true)) . '.' . end($temp);
			$filetmpname = $_FILES['brand_img']['tmp_name'];
			$folder = "media/brand-logo/";
			move_uploaded_file($filetmpname, $folder.$newfilename);
			$stmt = "UPDATE brand SET brand_name = '$name', modified_on = '$time', modified_by = '$user_id', brand_img = '$newfilename' WHERE id = '$id'";
			$result = mysqli_query($conn,$stmt);
			if(mysqli_affected_rows($conn)){
				return $check;
			}else{
				return $uncheck;
			}
		}else {
			// echo "out";die;
			$stmt = "UPDATE brand SET brand_name = '$name', modified_on = '$time', modified_by = '$user_id' WHERE id = '$id'";
			$result = mysqli_query($conn,$stmt);
			if(mysqli_affected_rows($conn)){
				return $check;
			}else{
				return $uncheck;
			}
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
			$stmt = "UPDATE brand SET status = '$new_status', modified_on = '$time', modified_by = '$user_id' WHERE id = '$id'";
			$result = mysqli_query($conn,$stmt);
			if(mysqli_affected_rows($conn)){
				return $check;
			}else{
				return $uncheck;
			}
		} else {
			$new_status = "1";
			$stmt = "UPDATE brand SET status = '$new_status', modified_on = '$time', modified_by = '$user_id' WHERE id = '$id'";
			$result = mysqli_query($conn,$stmt);
			if(mysqli_affected_rows($conn)){
				return $check;
			}else{
				return $uncheck;
			}
		}
		
		
	}

?>







