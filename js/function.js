const DELETE = 'click here to delete'
const EDIT = 'click here to edit'
const STATUS = 'click here to change status'
var list2 = [];
$(document).ready(function(){
	updateClock();
	// $("#category_name_submit").click(function(){
	// 	debugger;
	// 	category_Name();
	// })
	// $("#login_submit").click(function(){
	// 	debugger;
	// })
	$(".file-upload").on('change', function(){
	    readURL(this);
	})
	$("#add-category").click(function(){
		debugger;
		$("#insert-category,#category_name_submit").removeClass("hide");
		$("#add-category,#category_name_update").addClass("hide");
		$("#category_Name").val("");
	})
	$(".can-category").click(function(){
		debugger;
		$("#insert-category").addClass("hide");
		$("#add-category").removeClass("hide");
	})
	$("#add-sub-category").click(function(){
		debugger;
		$("#insert-sub-category,#sub_category_name_submit").removeClass("hide");
		$("#add-sub-category,#sub_category_name_update").addClass("hide");
		$("#sub_category_name").val("");
	})
	$("#can-sub-category").click(function(){
		debugger;
		$("#insert-sub-category").addClass("hide");
		$("#add-sub-category").removeClass("hide");
	})
	$("#add-brand").click(function(){
		debugger;
		$("#insert-brand,#brand_name_submit").removeClass("hide");
		$("#add-brand,#brand_name_update").addClass("hide");
		$("#brand_Name").val("");
	})
	$(".can-brand").click(function(){
		debugger;
		$("#insert-brand").addClass("hide");
		$("#add-brand").removeClass("hide");
	})
	$("#add-product").click(function(){
		debugger;
		$("#insert-product,#product_name_submit").removeClass("hide");
		$("#add-product,#product_name_update").addClass("hide");
		$("#product_Name,#product_Id,#product_quantity,#product_price,#product_Desc").val('');
	})
	$("#can-product").click(function(){
		debugger;
		$("#insert-product").addClass("hide");
		$("#add-product").removeClass("hide");
	})
});
var updateClock = function() {
    function pad(n) {
        return (n < 10) ? '0' + n : n;
    }

    var now = new Date();
    var s = pad(now.getHours()) + ':' +
            pad(now.getMinutes()) + ':' +
            pad(now.getSeconds());

    $('#clock').html(s);

    var delay = 1000 - (now % 1000);
    setTimeout(updateClock, delay);
};
var readURL = function(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.avatar,.avatar1').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
function category_Name(){
	debugger;
	var x = $("#category_Name").val();
	var xlength = x.length;
	if (x != '' && xlength >= 0) {
		// category_submit();  // call the submit function.
		console.log(x +' '+ xlength);
		return true;
	} else {
		// console.log(x +' '+ xlength);
		return false;
	}
}
function login_check(){
	debugger;
	var email = $("#email").val();
	var passcode = $("#passcode").val();
	if(email != '' && passcode != ''){
		console.log("vaild");
		return 1;
	} else {
		console.log("Not_Vaild");
		return 0;
	}
}
function list_category(){
	var res, counter, table, status;
	$.ajax({
		url:"../controllers/category_controller.php",
		method:"POST",
		success:function(result){
			debugger;
			counter = 0;
			if (result != '') {
				table = "<table style='width: -webkit-fill-available;'><tr>" +
				"<th>S.No</th><th>Category_Name</th><th>Status</th><th>Action</th></tr>";
				res = JSON.parse(result);
				for (var i = 0; i < res.length; i++) {
					debugger;
					if (res[i].status != 0) {
						status = "Active";
					}else{
						status = "In-Active";
					}
					table += "<tr><td>" + ++counter + "</td><td>" + res[i].category_name + 
					"</td><td>" + status + 
					"</td><td class='select'><span><i class='fas fa-pencil-alt action2'title='"+ EDIT +"'"  +
					" onClick='edit_category("+res[i].id+")'></i></span>" +
					"<span class='ml-left'><i class='fas fa-exclamation-circle action1'title='"+ STATUS +"'"  +
					" onClick='status_category("+res[i].id+','+res[i].status+")'></i></span><span class='ml-left action'>" +
					"<i class='fas fa-trash-alt' title='"+ DELETE +"' onClick='delete_category("+res[i].id+")'>" +
					"</i></span></td></tr>";
				}
				table += "</table>";
				$("#list_category_table").html(table);
				// window.location.href = "./category-name.php";	
			} else {
				$("#msg").text("Category is not defiend yet...");
				$("#msg").delay(1000).fadeOut();
				// window.setTimeout(function(){
				// 	window.location.replace("./category-name.php");
				// },1000);
			}
		}
	})
}
function delete_category(id){
	debugger;
	var obj = {};
	obj.id = id;
	// obj.name = $($(row).parent().parent().children()[1]).text();
	obj.submit = "delete";
	$.ajax({
		url:"../controllers/category_controller.php",
		method:"POST",
		data:obj,
		success:function(result){
			debugger;
			if (result == 1) {
				$("#msg").text("Record deleted successfully..!");
				$('#msg').removeAttr("style");
				$("#msg").delay(1000).fadeOut();
				window.setTimeout(function(){
					window.location.replace("./category-name.php");
				},1000);
			} else {
				$("#msg").text("Record doesnot deleted..!");
				$('#msg').removeAttr("style");
				$("#msg").delay(1000).fadeOut();
				// window.setTimeout(function(){
				// 	window.location.replace("./category-name.php");
				// },1000);
			}
			list_category();
		}
	})
}
function edit_category(id){
	debugger;
	var name,id;
	var obj = {};
	obj.id = id;
	obj.submit = "check";
	$.ajax({
		url:"../controllers/category_controller.php",
		method:"POST",
		data:obj,
		success:function(result){
			debugger;
			var data = JSON.parse(result);
			name = data[0].category_name;
			id = data[0].id;
			$("#insert-category,#category_name_update,#add-category").removeClass("hide");
			$("#category_Name").val(name);
			$("#category_Id").val(id);
			$("#category_name_submit").addClass("hide");
		}
	})
}
function category_list(){
	var res, counter, option;
	var obj = {};
	obj.submit = "check";
	$.ajax({
		url:"../controllers/sub_category_controller.php",
		method:"POST",
		data:obj,
		success:function(result){
			debugger;
			counter = 0;
			if (result != '') {
				res = JSON.parse(result);
				option = "<select>";
				for (var i = 0; i < res.length; i++) {
				option += "<option value="+res[i].id+">" + res[i].category_name + "</option>";	
				}
				option += "</select>";
				$("#category_list").html(option);
			}
		}
	})
}
function sub_category_list(){
	var res, counter, option;
	var obj = {};
	obj.submit = "check";
	$.ajax({
		url:"../controllers/product_controller.php",
		method:"POST",
		data:obj,
		success:function(result){
			debugger;
			counter = 0;
			if (result != '') {
				list2 = JSON.parse(result);
				option = "<select>";
				for (var i = 0; i < list2.length; i++) {
				option += "<option value="+list2[i].id+">" + list2[i].sub_category_name + "</option>";	
				}
				option += "</select>";
				$("#sub_category_list").html(option);
			}
		}
	})
}
function status_category(id,status){
	debugger;
	var id,status,obj;
	id = id;
	status = status;
	obj = {};
	obj.id = id;
	obj.status = status;
	obj.submit = "update_status";
	$.ajax({
		url:"../controllers/category_controller.php",
		method:"POST",
		data:obj,
		success:function(result){
			debugger;
			list_category();
		}
	})
}
function list_sub_category(){
	debugger;
	var res, counter, table, status;
	var obj = {};
	obj.submit = "list";
	$.ajax({
		url:"../controllers/sub_category_controller.php",
		method:"POST",
		data:obj,
		success:function(result){
			debugger;
			counter = 0;
			if (result != '') {
				table = "<table style='width: -webkit-fill-available;'><tr>" +
				"<th>S.No</th><th>Sub_Category_Name</th><th>Category_Name</th><th>Status</th><th>Action</th></tr>";
				res = JSON.parse(result);
				// list2.push(res);
				for (var i = 0; i < res.length; i++) {
					debugger;
					if (res[i].status != 0) {
						status = "Active";
					}else{
						status = "In-Active";
					}
					table += "<tr><td>" + ++counter + "</td><td>" + res[i].sub_category_name + 
					"</td><td>" + res[i].category_name +
					"</td><td>" + status +
					"</td><td class='select'><span><i class='fas fa-pencil-alt action2' title='"+ EDIT +"'" +
					" onClick='edit_sub_category("+res[i].id+")'></i></span>" +
					"<span class='ml-left'><i class='fas fa-exclamation-circle action1' title='"+ STATUS +"'" +
					" onClick='status_sub_category("+res[i].id+','+res[i].status+")'></i></span><span class='ml-left action'>" +
					"<i class='fas fa-trash-alt' title='"+ DELETE +"' " +
					"onClick='delete_sub_category("+res[i].id+")'></i></span></td></tr>";
				}
				table += "</table>";
				$("#list_sub_category_table").html(table);
			} else {
				$("#msg").text("Sub_Category is not defiend yet...");
				$("#msg").delay(1000).fadeOut();
			}
		}
	})
}
function edit_sub_category(id){
	debugger;
	var name,id;
	var obj = {};
	obj.id = id;
	obj.submit = "select";
	$.ajax({
		url:"../controllers/sub_category_controller.php",
		method:"POST",
		data:obj,
		success:function(result){
			debugger;
			var data = JSON.parse(result);
			name = data[0].sub_category_name;
			id = data[0].id;
			$("#insert-sub-category,#sub_category_name_update,#add-sub-category").removeClass("hide");
			$("#sub_category_Name").val(name);
			$("#sub_category_id").val(id);
			$("#sub_category_name_submit").addClass("hide");
		}
	})
}
function delete_sub_category(id){
	debugger;
	var obj = {};
	obj.id = id;
	// obj.name = $($(row).parent().parent().children()[1]).text();
	obj.submit = "delete";
	$.ajax({
		url:"../controllers/sub_category_controller.php",
		method:"POST",
		data:obj,
		success:function(result){
			debugger;
			if (result == 1) {
				$("#msg").text("Record deleted successfully..!");
				$('#msg').removeAttr("style");
				$("#msg").delay(1000).fadeOut();
				window.setTimeout(function(){
					window.location.replace("./sub-category-name.php");
				},1000);
			} else {
				$("#msg").text("Record doesnot deleted..!");
				$('#msg').removeAttr("style");
				$("#msg").delay(1000).fadeOut();
				// window.setTimeout(function(){
				// 	window.location.replace("./category-name.php");
				// },1000);
			}
			list_category();
		}
	})
}
function status_sub_category(id,status){
	debugger;
	var id,status,obj;
	id = id;
	status = status;
	obj = {};
	obj.id = id;
	obj.status = status;
	obj.submit = "update_status";
	$.ajax({
		url:"../controllers/sub_category_controller.php",
		method:"POST",
		data:obj,
		success:function(result){
			debugger;
			list_sub_category();
		}
	})
}
function list_brand(){
	var PATH = '../media/brand-logo/';
	var res, counter, table, status;
	$.ajax({
		url:"../controllers/brand_controller.php",
		method:"POST",
		success:function(result){
			debugger;
			counter = 0;
			if (result != '') {
				table = "<table style='width: -webkit-fill-available;'><tr>" +
				"<th>S.No</th><th>Brand_Name</th><th>Brand_Logo</th><th>Status</th><th>Action</th></tr>";
				res = JSON.parse(result);
				for (var i = 0; i < res.length; i++) {
					if (res[i].status != 0) {
						status = "Active";
					}else{
						status = "In-Active";
					}
					debugger;
					table += "<tr><td>" + ++counter + "</td><td>" + res[i].brand_name + 
					"</td><td><img class='img-cap' src='"+PATH+''+res[i].brand_img+"'></td><td>"+ status +"</td>" +
					"<td class='select'>" +
					"<span><i class='fas fa-pencil-alt action2'title='"+ EDIT +"'"  +
					" onClick='edit_brand("+res[i].id+")'></i></span>" +
					"<span class='ml-left'><i class='fas fa-exclamation-circle action1'title='"+ STATUS +"'"  +
					" onClick='status_brand("+res[i].id+','+res[i].status+")'></i></span><span class='ml-left action'>" +
					"<i class='fas fa-trash-alt' title='"+ DELETE +"' onClick='delete_brand("+res[i].id+")'>" +
					"</i></span></td></tr>";
				}
				table += "</table>";
				$("#list_brand_table").html(table);
				// window.location.href = "./category-name.php";	
			} else {
				$("#msg").text("Brand Name is not defiend yet...");
				$("#msg").delay(1000).fadeOut();
				// window.setTimeout(function(){
				// 	window.location.replace("./category-name.php");
				// },1000);
			}
		}
	})
}
function delete_brand(id){
	debugger;
	var obj = {};
	obj.id = id;
	// obj.name = $($(row).parent().parent().children()[1]).text();
	obj.submit = "delete";
	$.ajax({
		url:"../controllers/brand_controller.php",
		method:"POST",
		data:obj,
		success:function(result){
			debugger;
			if (result == 1) {
				$("#msg").text("Record deleted successfully..!");
				$('#msg').removeAttr("style");
				$("#msg").delay(1000).fadeOut();
				window.setTimeout(function(){
					window.location.replace("./brand-name.php");
				},1000);
			} else {
				$("#msg").text("Record doesnot deleted..!");
				$('#msg').removeAttr("style");
				$("#msg").delay(1000).fadeOut();
				// window.setTimeout(function(){
				// 	window.location.replace("./category-name.php");
				// },1000);
			}
			list_brand();
		}
	})
}
function edit_brand(id){
	debugger;
	var name,id,img,img_path;
	var obj = {};
	obj.id = id;
	obj.submit = "check";
	$.ajax({
		url:"../controllers/brand_controller.php",
		method:"POST",
		data:obj,
		success:function(result){
			debugger;
			var data = JSON.parse(result);
			name = data[0].brand_name;
			img = data[0].brand_img;
			img_path = "../media/brand-logo/" + img;
			id = data[0].id;
			$("#insert-brand,#brand_name_update,#add-brand").removeClass("hide");
			$("#brand_Name").val(name);
			$("#img1").attr('src',img_path);
			$("#brand_Id").val(id);
			$("#brand_name_submit").addClass("hide");
		}
	})
}
function status_brand(id,status){
	debugger;
	var id,status,obj;
	id = id;
	status = status;
	obj = {};
	obj.id = id;
	obj.status = status;
	obj.submit = "update_status";
	$.ajax({
		url:"../controllers/brand_controller.php",
		method:"POST",
		data:obj,
		success:function(result){
			debugger;
			list_brand();
		}
	})
}
function funct(value){
	
	console.log(list2);
}
function brand_list(){
	debugger;
	var res, counter, option;
	var obj = {};
	obj.submit = "check_brand";
	$.ajax({
		url:"../controllers/product_controller.php",
		method:"POST",
		data:obj,
		success:function(result){
			debugger;
			counter = 0;
			if (result != '') {
				res = JSON.parse(result);
				option = "<select>";
				for (var i = 0; i < res.length; i++) {
				option += "<option value="+res[i].id+">" + res[i].brand_name + "</option>";	
				}
				option += "</select>";
				$("#brand_list").html(option);
			}
		}
	})
}
function product_list(){
	debugger;
	var res, counter, option, PATH;
	PATH = "../media/product_logo/";
	var obj = {};
	obj.submit = "list_product";
	$.ajax({
		url:"../controllers/product_controller.php",
		method:"POST",
		data:obj,
		success:function(result){
			debugger;
			counter = 0;
			if (result != '') {
				table = "<table style='width: -webkit-fill-available;'><tr>" +
				"<th>S.No</th><th>Product_Name</th><th>Product_Logo</th><th>Status</th><th>Action</th></tr>";
				res = JSON.parse(result);
				for (var i = 0; i < res.length; i++) {
					var a = '';
					a = res[i].product_img;
					if (a != '') {
						var pic = JSON.parse(res[i].product_img);
					} 
					if (res[i].status != 0) {
						status = "Active";
					}else{
						status = "In-Active";
					}
					debugger;
					table += "<tr><td>" + ++counter + "</td><td>" + res[i].product_name + 
					"</td><td><img class='img-cap' src='"+PATH+''+pic[0]+"'></td><td>"+ status +"</td>" +
					"<td class='select'>" +
					"<span><i class='fas fa-pencil-alt action2'title='"+ EDIT +"'"  +
					" onClick='edit_product("+res[i].id+")'></i></span>" +
					"<span class='ml-left'><i class='fas fa-exclamation-circle action1'title='"+ STATUS +"'"  +
					" onClick='status_product("+res[i].id+','+res[i].status+")'></i></span><span class='ml-left action'>" +
					"<i class='fas fa-trash-alt' title='"+ DELETE +"' onClick='delete_product("+res[i].id+")'>" +
					"</i></span></td></tr>";
				}
				table += "</table>";
				$("#list_product_table").html(table);
				// window.location.href = "./category-name.php";	
			} else {
				$("#msg").text("Brand Name is not defiend yet...");
				$("#msg").delay(1000).fadeOut();
				// window.setTimeout(function(){
				// 	window.location.replace("./category-name.php");
				// },1000);
			}
		}
	})
}
function status_product(id,status){
	debugger;
	var id,status,obj;
	id = id;
	status = status;
	obj = {};
	obj.id = id;
	obj.status = status;
	obj.submit = "update_status";
	$.ajax({
		url:"../controllers/product_controller.php",
		method:"POST",
		data:obj,
		success:function(result){
			debugger;
			product_list();
		}
	})
}
function delete_product(id){
	debugger;
	var obj = {};
	obj.id = id;
	// obj.name = $($(row).parent().parent().children()[1]).text();
	obj.submit = "delete";
	$.ajax({
		url:"../controllers/product_controller.php",
		method:"POST",
		data:obj,
		success:function(result){
			debugger;
			if (result == 1) {
				$("#msg").text("Record deleted successfully..!");
				$('#msg').removeAttr("style");
				$("#msg").delay(1000).fadeOut();
				window.setTimeout(function(){
					window.location.replace("./product-name.php");
				},1000);
			} else {
				$("#msg").text("Record doesnot deleted..!");
				$('#msg').removeAttr("style");
				$("#msg").delay(1000).fadeOut();
				// window.setTimeout(function(){
				// 	window.location.replace("./category-name.php");
				// },1000);
			}
			product_list();
		}
	})
}
function edit_product(id){
	debugger;
	var name,id,img,img_path;
	var obj = {};
	obj.id = id;
	obj.submit = "product_check";
	$.ajax({
		url:"../controllers/product_controller.php",
		method:"POST",
		data:obj,
		success:function(result){
			debugger;
			var data = JSON.parse(result);
			name = data[0].product_name;
			img = data[0].brand_img;
			img_path = "../media/brand-logo/" + img;
			id = data[0].id;
			price = data[0].price;
			quantatity = data[0].quantity;
			desc = data[0].product_description;
			$("#insert-product,#product_name_update,#add-product").removeClass("hide");
			$("#product_Name").val(name);
			// $("#img1").attr('src',img_path);
			$("#product_Id").val(id);
			$("#product_quantity").val(quantatity);
			$("#product_price").val(price);
			$("#product_Desc").val(desc);
			$("#product_name_submit").addClass("hide");
		}
	})
}