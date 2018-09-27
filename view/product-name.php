<?php
$productActive = 1;
include "./header.php";
?>
<div class="col-lg-9">
	<div class="row">
		<div class="col-lg-12">
			<input type="submit" name="submit" value="Add_New" class="btn btn-primary" id="add-product">
			<hr>
		</div>
	</div>
	<div class="row mt-2">
		<div class="col-lg-8">
			<!-- <div class="card">
				<div class="card-body">
					
				</div>
			</div> -->
		</div>
		<div class="col-lg-4">
			<div class="card hide" id="insert-product">
					<div class="card-body">
						<div class="form-group" action="#" onsubmit="return product_Name();">
							<h4>Product_Name</h4>
							<input type="text" name="category" class="form-control mb-2" id="category_Name" readonly="readonly" placeholder="Category_Name">
							<input type="text" name="sub_category" class="form-control mb-2" id="sub_category_Name" readonly="readonly" placeholder="Sub_Category_Name">
							<input type="text" name="product" class="form-control mb-2" id="product_Name" placeholder="Product_Name">
							<input type="text" name="product" class="form-control desc" id="product_Desc" placeholder="Product_Description">
							<input type="submit" name="submit" value="submit" class="mt-2 btn btn-primary" id="product_name_submit">
						</div>
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