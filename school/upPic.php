<?php 
require_once "API/LoginSession.php";
/* 1711140136-引入封装好的功能函数*/
require_once "connUpdate.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$avatarFile = $_FILES["avatarFile"];
	$avatarType = $avatarFile["type"];
	$avatarSize = $avatarFile["size"];
	/*--------------------1711140136-限制文件的格式,只允许上传gif,jpg,png格式--------------------*/
	$types = ["image/x-icon","image/png","image/jpeg"];
	if(!in_array($avatarType, $types)){
	?>
	<script>
		alert("只支持jpg,icon,png文件格式!");
		window.history.back();
	</script>
	<?php
		exit();
	}
	/*-----------------------1711140136-限制文件大小,如果大于100k就退出上传-----------------------*/
	// var_dump($avatarFile);
	if($avatarSize > 100000){
	?>
	<script>
		alert("图片大小超出范围!");
		window.history.back();
	</script>
	<?php
		exit();
	}
	/* -------------------------------1711140136-判断是否上传文件了-------------------------------*/
	if($avatarFile["error"] !== 0){
	?>
	<script>
		alert("请提交上传图片!");
		window.history.back();
	</script>
	<?php
		exit();
	}
	/* 1711140136-获取当前头像的地址,目的是为了后面如果上传成功就删掉这个旧的*/
	$currentAvatar = $_SESSION["avatar"];
	/* 1711140136-给头像名字用md5加密,生成独一无二的名字*/
	$avatarName = substr(md5(uniqid(mt_rand(), true)), 0, 5);
	$path = "../php_note/inc/upload/";
	/* 1711140136-获取今天的日期*/
	$date = date("Y-m-d");
	/* 1711140136-拼接存储头像文件夹路径*/
	$newPath = $path . $date;
	/* 1711140136-获取登录账号*/
	$account = $_SESSION["account"];
	/* 1711140136-创建存储今天头像的日期路径*/
	if(!file_exists($newPath)){
		mkdir($newPath);
	}
	/* 1711140136-拼接完整头像路径*/
	$avatarPath = $newPath . "/" . $avatarName;
	/* 1711140136-将头像文件存到新路径*/
	if(move_uploaded_file($avatarFile["tmp_name"], $avatarPath . ".jpg")){
		/* 1711140136-将头像路径上传到数据库,图片名字没有加后缀的*/ 
		if($_SESSION["role"] === "teacher"){
			$table = "yefh_te";
			$id = "te_id";
		}else{
			$table = "yefh_stu";
			$id = "stu_id";
		}
		$sql = "update `{$table}`
				set `avatar` = '{$avatarPath}'
				where `{$id}` = '{$account}'";
		mysqli_query($connect,$sql);
		if(mysqli_affected_rows($connect) > 0){
			/* 1711140136-更新新的头像删掉旧的头像*/
			$_SESSION["avatar"] =  $avatarPath . ".jpg";
			/* 1711140136-默认的头像地址,这个不能删*/
			$defaultPath = "/php_note/inc/upload/stu.jpg";
			if($currentAvatar !== $defaultPath){
				unlink($currentAvatar);
			}
		}
	?>
	<script>
		alert("上传头像成功!");
		window.history.back();
	</script>
	<?php
	}else{
	?>
	<script>
		alert("上传头像失败!");
		window.history.back();
	</script>
	<?php
	}
}