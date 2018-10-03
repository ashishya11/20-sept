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
function check_brand($data){
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
function save($data){
	// echo "<pre>";print_r($data);
	global $conn;
	$check = true;
	$uncheck = false;
	$user_id = "1";
	$category_id = $data['category'];
	$sub_category_id = $data['sub_category'];
	$brand_id = $data['brand_list'];
	$product_name = $data['product_name'];
	$price = $data['product_price'];
	$quantity = $data['product_quantity'];
	$desc = $data['product_desc'];
	$img = $_FILES['product_img'];
	if(!empty($img)){
		$newimgname = array();
	    $img_desc = reArrayFiles($img);
	    // echo "<pre>";print_r($img_desc);die;
	    $img_count = count($img_desc);
	    if ($img_count > 0) {
	    	for ($i=0; $i < $img_count; $i++) { 
	    		// echo "<pre>";print_r($img_desc[$i]['name']);
	    		$temp = explode(".", $img_desc[$i]["name"]);
	    		// echo"<pre>";print_r($temp);
				$newfilename = round(microtime(true)) . rand(1,99) . '.' . end($temp);
				$filetmpname = $img_desc[$i]['tmp_name'];
				// print_r($folder.$newfilename);
				$folder = "/var/www/html/20-sept/media/product_logo/";
				// print_r($folder.$newfilename);
				move_uploaded_file($filetmpname, $folder.$newfilename);
				array_push($newimgname, $newfilename);
			}
			$new_name = json_encode($newimgname);
			$stmt = "INSERT INTO product (product_name, created_by, category_id, sub_category_id, brand_id, price, quantity, product_description, product_img, modified_by) VALUES ('$product_name','$user_id','$category_id','$sub_category_id','$brand_id','$price','$quantity','$desc','$new_name','$user_id')";
			$result = mysqli_query($conn,$stmt);
			if(mysqli_affected_rows($conn)){
				return $check;
			}else{
				return $uncheck;
			}
	    }
	    
	}		
	// echo"<pre>";print_r($filetmpname);echo"<pre>";print_r($_FILES);die;
}
function reArrayFiles($file){
    $file_ary = array();
    $file_count = count($file['name']);
    $file_key = array_keys($file);
    
    for($i=0;$i<$file_count;$i++)
    {
        foreach($file_key as $val)
        {
            $file_ary[$i][$val] = $file[$val][$i];
        }
    }
    return $file_ary;
    // echo "<pre>";print_r($file_ary);die;
    
}
function list_product(){
	global $conn;
	$user = array();
	$delete_status = "0";
	$stmt = "SELECT * FROM product WHERE delete_status = '$delete_status'";
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
		$stmt = "UPDATE product SET status = '$new_status', modified_on = '$time', modified_by = '$user_id' WHERE id = '$id'";
		$result = mysqli_query($conn,$stmt);
		if(mysqli_affected_rows($conn)){
			return $check;
		}else{
			return $uncheck;
		}
	} else {
		$new_status = "1";
		$stmt = "UPDATE product SET status = '$new_status', modified_on = '$time', modified_by = '$user_id' WHERE id = '$id'";
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
	$stmt = "UPDATE product SET delete_status = '$delete_status', modified_on = '$time', modified_by = '$user_id' WHERE id = '$id'";
	$result = mysqli_query($conn,$stmt);
	if(mysqli_affected_rows($conn)){
		return $check;
	}else{
		return $uncheck;
	}
}
function product_check($data){
	global $conn;
	$user = array();
	$id = $data['id'];
	$stmt = "SELECT * FROM product WHERE id = '$id'";
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
	// echo "<pre>";print_r($data);
	global $conn;
	$check = true;
	$uncheck = false;
	$id = $data['product_Id'];
	$user_id = "1";
	$time = date("Y-m-d H:i:s");
	$category_id = $data['category'];
	$sub_category_id = $data['sub_category'];
	$brand_id = $data['brand_list'];
	$product_name = $data['product_name'];
	$price = $data['product_price'];
	$quantity = $data['product_quantity'];
	$desc = $data['product_desc'];
	$img = $_FILES['product_img'];
	$img1 = $_FILES['product_img']['error']['0'];
	if($img1 === 0){
		
		$newimgname = array();
	    $img_desc = reArrayFiles($img);
	    // echo "<pre>";print_r($img_desc);die;
	    $img_count = count($img_desc);
	    if ($img_count > 0) {
	    	for ($i=0; $i < $img_count; $i++) { 
	    		// echo "<pre>";print_r($img_desc[$i]['name']);
	    		$temp = explode(".", $img_desc[$i]["name"]);
	    		// echo"<pre>";print_r($temp);
				$newfilename = round(microtime(true)) . rand(1,99) . '.' . end($temp);
				$filetmpname = $img_desc[$i]['tmp_name'];
				// print_r($filetmpname);
				$folder = "/var/www/html/20-sept/media/product_logo/";
				move_uploaded_file($filetmpname, $folder.$newfilename);
				// if (!move_uploaded_file($filetmpname, $folder.$newfilename)) {
				// 	echo "hi";
				// }
				array_push($newimgname, $newfilename);
			}
			$new_name = json_encode($newimgname);
			$stmt = "UPDATE product SET product_name = '$product_name', category_id = '$category_id', sub_category_id = '$sub_category_id', brand_id = '$brand_id', price = '$price', quantity = '$quantity', product_description = '$desc', product_img = '$new_name', modified_by = '$user_id', modified_on = '$time' WHERE id = '$id'";
			$result = mysqli_query($conn,$stmt);
			if(mysqli_affected_rows($conn)){
				return $check;
			}else{
				return $uncheck;
			}
	    }
	    
	}else {
	    	
	    	$stmt = "UPDATE product SET product_name = '$product_name', category_id = '$category_id', sub_category_id = '$sub_category_id', brand_id = '$brand_id', price = '$price', quantity = '$quantity', product_description = '$desc', modified_by = '$user_id', modified_on = '$time' WHERE id = '$id'";
			$result = mysqli_query($conn,$stmt);
			if(mysqli_affected_rows($conn)){
				return $check;
			}else{
				return $uncheck;
			}
	    }		
}
?>

