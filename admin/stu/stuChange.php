<?php
// 引入session
require_once "../adminSession/session.php";
// 连接数据库用户，必须
require_once "../../php_note/inc/conn/connSelect.php";
// 必须要有，请自行创建queryData.php查询代码
require_once "../CommonFunction/queryData.php";


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
			width: 100%;
			height: 400px;
		}
		.formBox form select{
			width: 500px;
			height: 400px;
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
			<p>当前位置：<i class="fa fa-users" aria-hidden="true"></i>&nbsp首页-->二级学院管理-->转班</p>
			<hr>
		</div>
		<div class="formBox">
			<h3>请为学生<span style="color: red"><?php echo $_GET["stuId"] ?></span>，<span class="stuName" style="color:red"><?php echo $_GET["stuName"] ?></span>选择新的班级</h3>
			<form action="" method="get">
				<select class="form-control" name="dep">
					<option value="" disabled="" selected="" style="display:none;">选择系</option>
					<?php 
						$sql = "select * from yefh_dep";
						$res = mysql_search($sql,$connect);
						foreach ($res as $item) {
					?>
						<option  value="<?php echo $item['dep_name'] ?>"><?php echo $item['dep_name'] ?></option>
					<?php
						}
					 ?>
				</select>
				<select class="form-control" name="major">
					<option value="" disabled="" selected="" style="display:none;">选择专业</option>
				</select>
				<select class="form-control" name="class">
					<option value="" disabled="" selected="" style="display:none;">选择班级</option>
				</select>
				<button type="button" class="sureBtn btn btn-primary">确定转班</button>
			</form>
		</div>
	</div>
	<!-- 1711140136-版权说明 -->
	<div id="footer">
		<li class="fa fa-exclamation-triangle"></li>&nbsp&nbsp<span>版权所有@清华大学教务处 地址：北京市海淀区清华大学12号漏 邮编:100084</span>
	</div>
<script>
	$(function(){
		$("[name=dep]").on("change",function(){
			var $dep = $(this).val();
			$("[name=class]").html('<option value="" disabled="" selected="" style="display:none;">选择班级</option>');
			// 获取这个学院对应的专业
			$.ajax({
				url: 'stuChangeAjax.php',
				type: 'get',
				dataType: 'json',
				data: {dep: $dep},
				success : function(data){
					if(data.success){
						var arrayData = data.success;
						$("[name=major]").html("");
						arrayData.forEach( function(item, index) {
							$("[name=major]").append('<option value="' +item['major_name']+ '">' + item['major_name'] + '</option>');
						});
					}else{
						$("[name=major]").html("");
						$("[name=major]").html('<option value="">没有对应的专业</option>');	
					}
				}
			})
		})
		$("[name=major]").on("change",function(){
			var $major = $(this).val();
			// 获取这个学院对应的专业
			$.ajax({
				url: 'stuChangeAjax.php',
				type: 'get',
				dataType: 'json',
				data: {major: $major},
				success : function(data){
					console.log(data);
					if(data.success){
						var arrayData = data.success;
						$("[name=class]").html("");
						arrayData.forEach( function(item, index) {
							$("[name=class]").append('<option value="' +item['stu_class']+ '">' + item['stu_class'] + '</option>');
						});
					}else{
						$("[name=class]").html("");
						$("[name=class]").html('<option value="">没有对应的班级</option>');	
					}
				}
			})
		})
		$(".sureBtn").on("click",function(){
			var $class = $("[name=class]").val();
			var $stuName = $(".stuName").html();		
			$.ajax({
				url: 'stuChangeAjax.php',
				type: 'get',
				dataType: 'json',
				data: {class: $class,stuName:$stuName},
				success: function(data){
					if(data.success){
						alert("转班级成功！");
						window.location = "stuAdmin.php";
					}else{
						alert("你已经是本班的了");
					}
				}
			})
		})
	})
</script>
</body>
</html>