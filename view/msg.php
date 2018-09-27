<?php
if (isset($_GET['msg']) && $_GET['msg'] == 'inserted') {
?>
<script>
	$(document).ready(function(){
		debugger;
		$("#msg").text("Record inserted successfully..!");
		$("#msg").delay(1000).fadeOut();
		window.setTimeout(function(){
			window.location.replace("./category-name.php");
		},1000);
	})
</script>
<?php
}
if (isset($_GET['msg']) && $_GET['msg'] == '!inserted'){
?>
	<script>
		$(document).ready(function(){
			debugger;
			$("#msg").text("Record doesnot inserted..!");
			$("#msg").delay(1000).fadeOut();
			window.setTimeout(function(){
				window.location.replace("./category-name.php");
			},1000);
		})
	</script>
<?php
}
if (isset($_GET['msg']) && $_GET['msg'] == 'updated') {
?>
	<script>
		$(document).ready(function(){
			debugger;
			$("#msg").text("Record updated successfully..!");
			$("#msg").delay(1000).fadeOut();
			window.setTimeout(function(){
				window.location.replace("./category-name.php");
			},1000);
		})
	</script>
<?php
}
if (isset($_GET['msg']) && $_GET['msg'] == '!updated') {
?>
	<script>
		$(document).ready(function(){
			debugger;
			$("#msg").text("Record doesnot updated..!");
			$("#msg").delay(1000).fadeOut();
			window.setTimeout(function(){
				window.location.replace("./category-name.php");
			},1000);
		})
	</script>
<?php
}
?>