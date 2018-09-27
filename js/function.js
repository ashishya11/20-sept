const DELETE = 'click here to delete'
const EDIT = 'click here to edit'
const STATUS = 'click here to change status'
const PATH = '../media/brand-logo/'

$(document).ready(function(){
	// $("#category_name_submit").click(function(){
	// 	debugger;
	// 	category_Name();
	// })
	// $("#login_submit").click(function(){
	// 	debugger;
	// })
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
		$("#insert-product").removeClass("hide");
		$("#add-product").addClass("hide");
	})
	$("#can-product").click(function(){
		debugger;
		$("#insert-product").addClass("hide");
		$("#add-product").removeClass("hide");
	})
});
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
	var res, counter, table;
	$.ajax({
		url:"../controllers/category_controller.php",
		method:"POST",
		success:function(result){
			debugger;
			counter = 0;
			if (result != '') {
				table = "<table style='width: -webkit-fill-available;'><tr>" +
				"<th>S.No</th><th>Category_Name</th><th>Action</th></tr>";
				res = JSON.parse(result);
				for (var i = 0; i < res.length; i++) {
					debugger;
					table += "<tr><td>" + ++counter + "</td><td>" + res[i].category_name + 
					"</td><td class='select'><span><i class='fas fa-pencil-alt action2'title='"+ EDIT +"'"  +
					" onClick='edit_category("+res[i].id+")'></i></span>" +
					"<span class='ml-left'><i class='fas fa-exclamation-circle action1'title='"+ STATUS +"'"  +
					" onClick='status_category("+res[i].id+")'></i></span><span class='ml-left action'>" +
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
function list_sub_category(){
	debugger;
	var res, counter, table;
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
				"<th>S.No</th><th>Sub_Category_Name</th><th>Category_Name</th><th>Action</th></tr>";
				res = JSON.parse(result);
				for (var i = 0; i < res.length; i++) {
					debugger;
					table += "<tr><td>" + ++counter + "</td><td>" + res[i].sub_category_name + 
					"</td><td>" + res[i].category_name +
					"</td><td class='select'><span><i class='fas fa-pencil-alt action2' title='"+ EDIT +"'" +
					" onClick='edit_sub_category("+res[i].id+")'></i></span>" +
					"<span class='ml-left'><i class='fas fa-exclamation-circle action1' title='"+ STATUS +"'" +
					" onClick='status_sub_category("+res[i].id+")'></i></span><span class='ml-left action'>" +
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
function list_brand(){
	var res, counter, table;
	$.ajax({
		url:"../controllers/brand_controller.php",
		method:"POST",
		success:function(result){
			debugger;
			counter = 0;
			if (result != '') {
				table = "<table style='width: -webkit-fill-available;'><tr>" +
				"<th>S.No</th><th>Brand_Name</th><th>Brand_Logo</th><th>Action</th></tr>";
				res = JSON.parse(result);
				for (var i = 0; i < res.length; i++) {
					debugger;
					table += "<tr><td>" + ++counter + "</td><td>" + res[i].brand_name + 
					"</td><td><img class='img-cap' src='"+PATH+''+res[i].brand_img+"'></td><td class='select'>" +
					"<span><i class='fas fa-pencil-alt action2'title='"+ EDIT +"'"  +
					" onClick='edit_brand("+res[i].id+")'></i></span>" +
					"<span class='ml-left'><i class='fas fa-exclamation-circle action1'title='"+ STATUS +"'"  +
					" onClick='status_brand("+res[i].id+")'></i></span><span class='ml-left action'>" +
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
	var name,id,img;
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
			id = data[0].id;
			$("#insert-brand,#brand_name_update,#add-brand").removeClass("hide");
			$("#brand_Name").val(name);
			$("#brand_img").val().replace(/C:\\fakepath\\/i,img);
			$("#brand_Id").val(id);
			$("#brand_name_submit").addClass("hide");
		}
	})
}