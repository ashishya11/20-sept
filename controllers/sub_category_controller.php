<?php
require_once('../models/sub_category_model.php');

if (isset($_POST) && !empty($_POST)) {
	if ($_POST['submit'] == 'add') {
		$r = save($_POST);
			// echo"<pre>";print_r($_POST);die;
		if($r){
			header("location:../view/sub-category-name.php?msg=inserted");
		}else{
			header("location:../view/sub-category-name.php?msg=!inserted");
		}
	}
	if ($_POST['submit'] == 'check') {
		list_category();
	}
	if ($_POST['submit'] == 'list') {
		list_sub_category();
	}
	if ($_POST['submit'] == 'select') {
		$r = select($_POST);
		if ($r) {
			echo json_encode($user);
		}else {
			echo false;
		}
	}
	if ($_POST['submit'] == "update") {
		$r = update($_POST);
		if ($r) {
			header("location:../view/sub-category-name.php?msg=updated");
		}else {
			header("location:../view/sub-category-name.php?msg=!updated");
		}
	}
	if ($_POST['submit'] == "delete") {
		$r = delete($_POST);
		if ($r) {
			echo true;
		} else {
			echo false;
		}
	}
	if ($_POST['submit'] == 'update_status') {
		// echo"<pre>";print_r($_POST);die;	
		$r = status_update($_POST);
		if ($r) {
			echo true;
		}else{
			echo false;
		}
	}
} else {
	
}

?>