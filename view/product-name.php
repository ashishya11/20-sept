<?php
$productActive = 1;
include "./header.php";
?>
<script>
	category_list();
	sub_category_list();
	brand_list();
	product_list();
</script>
<div class="col-lg-9">
	<div class="row">
		<div class="col-lg-12">
			<input type="submit" name="submit" value="Add_New" class="btn btn-primary" id="add-product">
			<hr>
		</div>
	</div>
	<div class="row mt-2">
		<div class="col-lg-8">
			<div id="list_product_table">
				
			</div>
		</div>
		<div class="col-lg-4">
			<div class="card hide" id="insert-product">
					<div class="card-body">
						<form class="form-group" action="../controllers/product_controller.php" method="POST" enctype="multipart/form-data">
							<h4>Product_Name</h4>
							<select class="form-control mb-2" id="category_list" name="category" onchange="funct(value)">
							
							</select>
							<select class="form-control mb-2" id="sub_category_list" name="sub_category">
							
							</select>
							<select class="form-control mb-2" id="brand_list" name="brand_list">
							
							</select>
							<input type="text" name="product_name" class="form-control mb-2" id="product_Name" placeholder="Product_Name">
							<!-- <div class="row">
								<div class="col-lg-6">
									<div class="text-center mt-1">
										<img id="img1" src="../media/demo pic/no-image.png" class="avatar1 img-thumbnail" alt="avatar">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="text-center mt-1">
										<img id="img1" src="../media/demo pic/no-image.png" class="avatar1 img-thumbnail" alt="avatar">
									</div>
								</div>
							</div> -->
							<input type="file" name="product_img[]" class="border btn-sm mt-1 text-center center-block file-upload" id="product_img" multiple>
							<input type="text" name="product_price" class="form-control mt-1" id="product_price" placeholder="Product_Price">
							<input type="text" name="product_quantity" class="form-control mt-1" id="product_quantity" placeholder="Product_Quantity">
							<textarea type="text" name="product_desc" class="form-control desc mt-1" id="product_Desc" placeholder="Product_Description"></textarea>
							<input type="hidden" name="product_Id" class="form-control" id="product_Id">
							<input type="submit" name="submit" value="save" class="mt-2 btn btn-primary" id="product_name_submit">
							<input type="submit" name="submit" value="update" class="mt-2 btn btn-primary hide" id="product_name_update">
						</form>
					</div>
					<!-- <input type="submit" name="submit" value="submit" class="mt-2 btn btn-primary" id="product_name_submit"> -->
					<input type="submit" name="submit" value="Cancel" class="mt-2 btn btn-secondary" id="can-product">
			</div>
		</div>
	</div>
</div>
<div class="col-lg-1"></div>
<?php
include "./footer.php";
?>		