<?php 
include "./API/LoginSession.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>清华大学教务管理系统首页</title>
	<link rel="stylesheet" href="/php_note/inc/css/reset.css">
	<link rel="stylesheet" href="/php_note/inc/css/user.css">
	<script src="/php_note/inc/js/jQuery/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" href="/php_note/inc/vendors/bootstrap4/css/bootstrap.min.css">
	<link rel="stylesheet" href="/php_note/inc/vendors/font-awesome/css/font-awesome.min.css">
	<script src="../php_note/inc/js/jQuery/jquery-3.3.1.min.js"></script>
	<script src="../php_note/inc/js/jquery-validation-1.14.0/dist/jquery.validate.min.js"></script>
	<script src="../php_note/inc/js/user.js"></script>
</head>
<body style="background-color: #212529;">
	<!-- 1711140136-logo -->
	<div id="logo">
		<div class="content">
			<a href="index.php">
				<img src="../php_note/inc/pic/logo_1.svg" alt="">
				<span>教务管理系统</span>			
			</a>
		</div>
	</div>
	<!-- 1711140136-欢迎信息(登陆人信息显示) -->
	<div id="personal_details">
		<div class="content">
			<ul>
				<!-- 1711140136-显示学号或工号 -->
				<span><i class="fa fa-user-circle-o"></i>你好！</span><li><?php echo $_SESSION["name"] ?></li>
				<span><?php echo $_SESSION["role"] === "teacher" ? "工号：" : "学号："?></span><li><?php echo $_SESSION["account"] ?></li>
				<span>院系：</span><li>计算机学院</li>
				<span>班级：</span><li>17计算机应用技术3-3班</li>
			</ul>
		</div>
	</div>
	<!-- 1711140136-导航栏(教师成绩录入、教学任务查询、学生成绩查询、学生课表查询、用户设置、注销) -->
	<div id="top-nav">
		<div class="content">
			<ul>
				<li><a href="te_score_in.php">教师成绩录入</a></li>
				<li><a href="te_task_search.php">教学任查询</a></li>
				<li><a href="stu_score_search.php">学生成绩查询</a></li>
				<li><a href="">学生课表查询</a></li>
				<li><a href="">用户设置</a></li>
				<li><a href="API/login_out.php">注销</a></li>
			</ul>
		</div>
	</div>
	<!-- 1711140136-用户设置 -->
	<div id="user_settings">
		<div class="content">
			<p>当前位置：<i class="fa fa-graduation-cap"></i>&nbsp教师-用户设置</p>
			<div class="clear"></div>
			<div class="setting">
				<form class="changePa" action="change_pa.php" method="post">
					<label>
						<p>用户名:</p>
						<input type="text" class="form-control" placeholder="<?php echo $_SESSION["name"] ?>" disabled="disabled">
					</label>
					<label>
						<p>旧密码:</p>
						<input id="oldPa" name="oldPa" type="password" class="form-control" placeholder="旧密码">
					</label>
					<label>
						<p>新密码:</p>
						<input id="newPa" name="newPa" type="password" class="form-control" placeholder="新密码">
					</label>
					<label>
						<p>新密码确认:</p>
						<input id="newPa1" name="newPa1" type="password" class="form-control" placeholder="新密码确认">
					</label>
					<label>
						<p>E-mail:</p>
						<input id="Email" name="Email" type="text" class="form-control" placeholder="E-mail">
					</label>
					<button class="btn btn-success sure" >确定</button>
				</form>
				<!-- 修改错误信息提示 -->
				<!-- <div class="alert alert-danger"></div> -->
			</div>
		</div>
	</div>
	<!-- 1711140136-版权说明 -->
	<div id="footer">
		<li class="fa fa-exclamation-triangle"></li>&nbsp&nbsp<span>版权所有@清华大学教务处 地址：北京市海淀区清华大学12号漏 邮编:100084</span>
	</div>
</body>