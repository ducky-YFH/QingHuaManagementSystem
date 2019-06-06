<?php 

// 数据用户
require_once "../../php_note/inc/conn/connInsert.php";

?>

<?php

if($_GET["dep"] === ""){
	?>
	<script>
		alert("请输入学院！");
		window.location = "depAdd.php";
	</script>
	<?php
}

if(@$_GET["check"]){
	$depValue = $_GET["dep"];
	$sql = "select * from yefh_dep where dep_name = '{$depValue}'";
	$res = mysqli_query($connect,$sql);
	if(mysqli_affected_rows($connect) == 0){
		?>
			<script>
				alert("可以使用这个学院");
				window.location = "depAdd.php";
			</script>
		<?php
	}else{
		?>
		<script>
			alert("已经存在该学院！");
			window.location = "depAdd.php";
		</script>
		<?php
	}
}
if(@$_GET['sure']){
	$depValue = $_GET["dep"];
	$sql = "insert into yefh_dep value('{$depValue}')";
	mysqli_query($connect,$sql);
	if(mysqli_affected_rows($connect) > 0){
		?>
		<script>
			alert("添加学院成功！");
			window.location = "depAdmin.php";
		</script>
		<?php
	}else{
		?>
		<script>
			alert("已经存在该学院！");
			window.location = "depAdd.php";
		</script>
		<?php
	}
}

?>