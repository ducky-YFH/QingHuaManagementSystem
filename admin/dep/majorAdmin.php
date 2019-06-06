<?php
require_once "../adminSession/session.php";
require_once "../../php_note/inc/conn/connSelect.php";
require_once "../CommonFunction/queryData.php";

//查看所有专业
$dep = $_GET["dep"];
$sql = "select * from yefh_major where dep_name = '{$dep}'";
$res = mysqli_query($connect,$sql);

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
	<script src="../../php_note/inc/js/jQuery/jquery-3.3.1.min.js"></script>
	<script src="../../php_note/inc/vendors/bootstrap4/js/bootstrap.min.js"></script>
	<style>
		.formBox{
			margin-left: 30px;
			width: 500px;
			line-height: 50px;
			border-radius: 10px;
			box-shadow: 0 0 5px #007bff;
			margin-bottom: 30px;
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
	<div id="stu_table">
		<div class="content">
			<p>当前位置：<i class="fa fa-users" aria-hidden="true"></i>&nbsp首页-->二级学院管理-->管理专业</p>
			<hr>
			<form action="majorAdd.php" method="post" enctype="multipart/form-data" class="formBox">
				<input type="file" name="upExcel">
				<button class="btn btn-primary">确定</button>
				<a href="../../php_note/inc/excelFIle/downMajorTemp.xlsx" class="btn btn-primary">下载模板</a>
			</form>
			<table class="table table-hover" >
				<thead>
			        <tr>
			            <th scope="col">序号</th>
			            <th scope="col">专业名称</th>
			            <th scope="col">学制</th>
			            <th scope="col">操作</th>
			        </tr>
			    </thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($res as $item): ?>
					    <tr>
						    <th scope="row"><?php echo $i ?></th>
						    <td><?php echo $item['major_name'] ?></td>
						    <td><?php echo $item['major_lenght'] ?></td>
						    <td><a href="">修改</a>|<a href="">删除</a></td>
						    <?php $i++ ?>
					    </tr>
					<?php endforeach ?>
				</tbody>
			</table>
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