<?php

?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/function.js"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="row mt-1">
			<div class="col-lg-12">
				<div class="card">
					<img class="card-img" src="../media/company-logo/color.jpg">
				</div>
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-lg-2">
				<div class="nav flex-column nav-pills bord pos" id="v-pills-tab" role="tablist" aria-orientation="vertical">
					<p class="a"><img class="img-prop bord" src="../media/company-logo/eUgailly.jpg"></p>
				    <a class="a nav-link <?php if(isset($homeActive)) echo 'active';?>" href="home.php" aria-selected="true">Home</a>
				    <a class="a nav-link <?php if(isset($categoryActive)) echo 'active';?>" href="category-name.php" aria-selected="false">Category</a>
				    <a class="a nav-link <?php if(isset($sub_categoryActive)) echo 'active';?>" href="sub-category-name.php" aria-selected="false">Sub_Category</a>
				    <a class="a nav-link <?php if(isset($brandActive)) echo 'active';?>" href="brand-name.php" aria-selected="false">Brand</a>
				    <a class="a nav-link <?php if(isset($productActive)) echo 'active';?>" href="product-name.php" aria-selected="false">Product</a>
    			</div>
			</div>