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
			echo true;
		}else {
			echo false;
		}
	}
} else {

}

?>