<?php
require_once('../models/brand_model.php');
	
	
	if(isset($_POST) && !empty($_POST)){
		if($_POST['submit'] == 'add'){
			$r = save($_POST);
			// echo"<pre>";print_r($_POST);print_r($_FILES);die;
			if($r){
				header("location:../view/brand-name.php?msg=inserted");
			}else{
				header("location:../view/brand-name.php?msg=!inserted");
			}
		}

		if ($_POST['submit'] == 'delete') {
			// print_r($_POST);die;
			$r = delete($_POST);
			if ($r) {
				echo true;
			} else {
				echo false;
			}
		}

		if ($_POST['submit'] == 'check') {
			$r = check($_POST);
			if ($r) {
				echo json_encode($user);
			}else {
				echo false;
			}
		}

		if ($_POST['submit'] == 'update') {
			$r = update($_POST);
			if ($r) {
				header("location:../view/brand-name.php?msg=updated");
			}else {
				header("location:../view/brand-name.php?msg=!updated");
			}
		}

		if ($_POST['submit'] == 'update_status') {
			
			$r = status_update($_POST);
			if ($r) {
				echo true;
			}else{
				echo false;
			}
		}
	}else{
		list_brand();
	}
	// echo"<pre>";print_r($_POST);
	
?>