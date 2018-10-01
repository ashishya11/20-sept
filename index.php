<?php
include "./config/db.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Eugailly</title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="./js/bootstrap.min.js"></script>
	<script type="text/javascript" src="./js/function.js"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="row mt-1">
			<div class="col-lg-12">
				<div class="card">
					<img class="card-img" src="./media/company-logo/color.jpg">
				</div>
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-lg-6">

			</div>
			<div class="col-lg-3">
				<div class="card">
					<div class="card-body">
						<form class="form-group" action="#" onsubmit="return login_check();">
							<h4>Login</h4>
							<input type="text" name="email" class="form-control mt-2" id="email" placeholder="Email_address">
							<input type="password" name="passcode" class="form-control mt-2" id="passcode" placeholder="Password">
							<input type="submit" name="submit" value="submit" class="mt-2 btn btn-primary" id="login_submit">
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-3"></div>			
		</div>
	</div>
</body>
</html>