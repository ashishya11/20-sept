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
} else {

}

?>