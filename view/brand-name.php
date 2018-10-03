<?php
$brandActive = 1;
include "./header.php";
?>
<script>
list_brand();
</script>

<div class="col-lg-9">
	<div class="row">
		<div class="col-lg-12">
			<input type="submit" name="submit" value="Add_New" class="btn btn-primary" id="add-brand">
			<input type="submit" name="submit" value="sort" class="btn btn-primary" id="sort-brand">
			<!-- <div class="input-group mt-1 inputWidth">
				<input name="searchField" class="form-control" type="text" id="searchField" placeholder="keyword">
  				<div class="input-group-append">
    				<input class="input-group-text" type="submit" name="submit" value="search">
  				</div>
			</div> -->
			<hr>
		</div>		
		<div class="col-lg-12">
			<h3 id="msg"></h3>
		</div>
	</div>
	<div class="row mt-2">
		<div class="col-lg-8">
			<div id="list_brand_table">
				
			</div>
		</div>
		<div class="col-lg-4">
			<div class="card hide" id="insert-brand">
				<div class="card-body">
					<form class="form-group" action="../controllers/brand_controller.php" enctype="multipart/form-data" method="POST">
						<h4>Brand_Name</h4>
						<input type="text" name="brand" class="form-control" id="brand_Name" placeholder="brand_Name">
						<div class="text-center mt-1">
							<img id="img1" src="../media/demo pic/no-image.png" class="avatar img-thumbnail" alt="avatar">
						</div>
						<input type="file" name="brand_img" class="border btn-sm mt-1 text-center center-block file-upload" id="brand_img">
						<input type="hidden" name="brand_Id" class="form-control" id="brand_Id">
						<input type="submit" name="submit" value="submit" class="mt-2 btn btn-primary" id="brand_name_submit">
						<input type="submit" name="submit" value="update" class="mt-2 btn btn-primary hide" id="brand_name_update">
					</form>
				</div>
				<!-- <input type="submit" name="submit" value="submit" class="mt-2 btn btn-primary" id="brand_name_submit"> -->
				<input type="submit" name="submit" value="Cancel" class="mt-2 btn btn-secondary can-brand" id="can-brand">
			</div>	
		</div>
	</div>
</div>
<div class="col-lg-1"></div>
<?php
include "./footer.php";
?>