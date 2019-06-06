<?php 
// 引入数据库的更新用户
require_once "../../php_note/inc/conn/connUpdate.php";

// 判断表单是否为空，为空就提示重新输入
if($_GET["oldName"] == "" || $_GET["newName"] == ""){
	?>
	<script>
		window.location = "depAdmin.php";
		alert("提交表单不能为空！");
	</script>
	<?php
}
if(isset($_GET["oldName"]) && isset($_GET["newName"])){
	$oldName = $_GET["oldName"];
	$newName = $_GET["newName"];
	$sql = "update yefh_dep set dep_name = '{$newName}' where dep_name = '{$oldName}';";
	mysqli_query($connect,$sql);
	if(mysqli_affected_rows($connect) > 0){
		?>
		<script>
			window.location = "depAdmin.php";
			alert("修改成功！");
		</script>
		<?php		
	}else{
		?>
		<script>
			window.location = "depAdmin.php";
			alert("原名字不匹配！");
		</script>
		<?php
	}

}

?>