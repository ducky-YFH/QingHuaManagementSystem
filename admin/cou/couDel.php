<?php 

// 引入session
require_once "../adminSession/session.php";
// 连接数据库用户，必须
require_once "../../php_note/inc/conn/connDelete.php";

if(isset($_GET["c_code"])){
	$c_code = $_GET["c_code"];
	$sql = "delete from yefh_course where c_code = '{$c_code}'";
	mysqli_query($connect,$sql);
	if(mysqli_affected_rows($connect) == 1){
?>
	<script>
		alert("删除成功！");
		window.location = "couAdmin.php";
	</script>
<?php
	}else{
?>
	<script>
		alert("删除失败！");
		window.location = "couAdmin.php";
	</script>
<?php
	}
}


?>