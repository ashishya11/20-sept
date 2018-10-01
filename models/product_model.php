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
				print_r($filetmpname);
				$folder = "..\media\product_logo/";
				move_uploaded_file($filetmpname, $folder.$newfilename);
				if (!move_uploaded_file($filetmpname, $folder.$newfilename)) {
					echo "hi";
				}
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
	die;
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
?>

