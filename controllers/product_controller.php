<?php
include "../models/product_model.php";
// echo "<pre>";print_r($_POST);die;
if (isset($_POST) && !empty($_POST)) {
	if ($_POST['submit'] == "check") {
		$r = check($_POST);
		if ($r) {
			echo json_encode($user);
		}else {
			echo false;
		}
	}
	if ($_POST['submit'] == "check_brand") {
		// echo "<pre>";print_r($_POST);die;
		$r = check_brand($_POST);
		if ($r) {
			echo json_encode($user);
		}else {
			echo false;
		}
	}
	if ($_POST['submit'] == "save") {
		// echo "<pre>";print_r($_POST);print_r($_FILES);die;
		$r = save($_POST);
		// echo "<pre>";print_r($_POST);die;
		if ($r) {
			header("location:../view/product-name.php?msg=inserted");
		}else {
			echo false;
		}
	}
	if ($_POST['submit'] == "list_product") {
		$r = list_product($_POST);
		// echo "<pre>";print_r($_POST);die;
		if ($r) {
			echo json_encode($user);
		}else {
			echo false;
		}
	}
	if ($_POST['submit'] == "update_status") {
		$r = status_update($_POST);
		if ($r) {
			echo true;
		}else{
			echo false;
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
	if ($_POST['submit'] == "product_check") {
		$r = product_check($_POST);
		if ($r) {
			echo json_encode($user);
		}else {
			echo false;
		}
	}
	if ($_POST['submit'] == "update") {
		$r = update($_POST);
		if ($r) {
			header("location:../view/product-name.php?msg=inserted");
		}else {
			echo false;
		}
	}
} else {

}

?>