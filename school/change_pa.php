<?php
// 1711140136-引入数据库查询文件
require_once "../php_note/inc/conn/connUpdate.php";
// 1711140136-引入session文件
require_once "API/LoginSession.php";


if($_SERVER["REQUEST_METHOD"] === "POST"){
	$accountId = $_SESSION["account"];
	$name = $_SESSION["name"];
	$role = $_SESSION["role"];
	$oldPa = md5($_POST["oldPa"]);
	$newPa = md5($_POST["newPa"]);
	if($role === "teacher"){
		$sql = "update
				yefh_te
				set te_pa = '{$newPa}' where te_id='{$accountId}' and te_pa='{$oldPa}';";
	}else{
		$sql = "update
				yefh_stu
				set stu_pa = '{$newPa}' where stu_id='{$accountId}' and stu_pa='{$oldPa}';";
	}
	$query = mysqli_query($connect,$sql);
	if(mysqli_affected_rows($connect) > 0){
		unset($_SESSION["account"]);
		unset($_SESSION["role"]);
		unset($_SESSION["password"]);
		unset($_SESSION["name"]);
?>
	<script>
		alert("修改成功!");
		window.location = "../login.html";
	</script>
<?php
	}else{
?>
	<script>
		alert('旧密码不正确!');
		window.location = "user.php";
	</script>
<?php
	}
}
?>