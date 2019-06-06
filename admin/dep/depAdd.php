<?php 
require_once "../adminSession/session.php";
require_once "../../php_note/inc/conn/connSelect.php";
require_once "../CommonFunction/queryData.php";

$sql = "select * from yefh_major;";
$res = mysql_search($sql,$connect);
$classSql = "select count(1) from yefh_class;";


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>清华大学教务管理系统二级学院管理首页</title>
	<link rel="stylesheet" href="../../php_note/inc/css/reset.css">
	<link rel="stylesheet" href="../../php_note/inc/css/login_index.css">
	<script src="../../php_note/inc/js/jQuery/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" href="../../php_note/inc/vendors/bootstrap4/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../php_note/inc/vendors/font-awesome/css/font-awesome.min.css">
	<script src="../php_note/inc/js/jQuery/jquery-3.3.1.min.js"></script>
	<style>
		.formBox{
			position: relative;
			border: 1px solid #563d7c;
			height: 400px;
			width: 600px;
			left: 50%;
			margin-left: -300px;
			border-radius: 10px;
			text-align: center;
		}
		.addForm{
			margin-top: 100px;
			margin-left: 80px;
		}
		.addForm .input{
			width: 215px;
		}
		.addForm p{
			height: 25px;
			line-height: 40px;
		}
		.addForm .sureBtn,.clearBtn{
			margin-top: 10px;
			width: 60%;
		}

	</style>
</head>
<body style="background-color: #212529;">
	<!-- 1711140136-logo -->
	<div id="logo">
		<div class="content">
			<a href="../admin.php">
				<img src="../../php_note/inc/pic/logo_1.svg" alt="">
				<span>教务管理系统后台管理</span>	
			</a>
		</div>
	</div>
	<!-- 1711140136-欢迎信息(登陆人信息显示) -->
	<div id="personal_details">
		<div class="content">
			<ul>
				<!-- 1711140136-显示学号或工号 -->
				<span class="span_avatar">
					<a class="avatar_link" href="../../php_note/inc/img/avatar.jpg"><img class="avatar" src="../../php_note/inc/img/avatar.jpg" alt=""></a>你好！
				</span><li><?php echo $_SESSION["username"] ?></li>
			</ul>
		</div>
	</div>
	<!-- 1711140136-导航栏(教师成绩录入、教学任务查询、学生成绩查询、学生课表查询、用户设置、注销) -->
	<div id="top-nav">
		<div class="content">
			<ul>
				<li><a href="../menu/menuAdmin.php">菜单管理</a></li>
				<li><a href="../dep/depAdmin.php">二级学院管理</a></li>
				<li><a href="../te/teAdmin.php">教师管理</a></li>
				<li><a href="../stu/stuAdmin.php">学生管理</a></li>
				<li><a href="../cou/couAdmin.php">课程管理</a></li>
				<li><a href="../menu/menuAdmin.php">教学任务管理</a></li>
				<li><a href="../adminLogOut.php">注销</a></li>
			</ul>
		</div>
	</div>
	<!-- 1711140136-某个班级学生列表 -->
	<div id="stu_table">
		<div class="content">
			<p>当前位置：<i class="fa fa-users" aria-hidden="true"></i>&nbsp管理-添加二级学院</p>
			<div class="formBox">
				<form class="form-inline addForm" action="depAddDeal.php" method="get">
					<div class="form-group">
						<label class="sr-only">Email</label>
						<p class="form-control-static">二级学院名：</p>
					</div>
					<div class="form-group">
						<input type="text" class="form-control input" name="dep">
					</div>
				  <button type="submit" class="btn btn-warning" style="margin-left: 15px;" name="check" value="check">查看是否可用</button>
				  <button type="submit" class="btn btn-primary sureBtn" name="sure" value="sure">确定</button>
				  <button type="button" class="btn btn-danger clearBtn">清空</button>
				</form>
			</div>	
		</div>
	</div>
	<!-- 1711140136-版权说明 -->
	<div id="footer">
		<li class="fa fa-exclamation-triangle"></li>&nbsp&nbsp<span>版权所有@清华大学教务处 地址：北京市海淀区清华大学12号漏 邮编:100084</span>
	</div>
<script>
	
</script>
</body>
</html>