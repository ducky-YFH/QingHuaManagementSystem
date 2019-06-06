<?php 
include "./API/LoginSession.php";
require_once "../php_note/inc/conn/connSelect.php";
// 1711140136-查询学生信息
$query = mysqli_query($connect,"select * from yefh_stu;");



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>清华大学教务管理系统首页</title>
	<link rel="stylesheet" href="/php_note/inc/css/reset.css">
	<link rel="stylesheet" href="/php_note/inc/css/login_index.css">
	<script src="/php_note/inc/js/jQuery/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" href="/php_note/inc/vendors/bootstrap4/css/bootstrap.min.css">
	<link rel="stylesheet" href="/php_note/inc/vendors/font-awesome/css/font-awesome.min.css">
	<script src="/php_note/inc/js/jQuery/jquery-3.3.1.min.js"></script>
</head>
<body style="background-color: #212529;">
	<!-- 1711140136-logo -->
	<div id="logo">
		<div class="content">
			<a href="">
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
				<span class="span_avatar">
					<a class="avatar_link" href="<?php echo $_SESSION["avatar"]; ?>"><img class="avatar" src="<?php echo $_SESSION["avatar"]; ?>" alt=""></a>你好！
				</span><li><?php echo $_SESSION["name"] ?></li>
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
				<li><a href="user.php">用户设置</a></li>
				<li><a class="upload" href="#">上传头像</a></li>
				<li><a href="API/login_out.php">注销</a></li>
			</ul>
			<div class="uploadAvatar">
				<span><!-- <i class="fa fa-times-circle" aria-hidden="true"></i> --></span>
				<form action="upPic.php" method="post" enctype="multipart/form-data">
					<div class="custom-file">
						<input name="avatarFile" type="file">
					</div>										
					<button class="btn btn-primary">上传头像</button>
				</form>
			</div>
		</div>
	</div>
	<!-- 1711140136-某个班级学生列表 -->
	<div id="stu_table">
		<div class="content">
			<p>当前位置：<i class="fa fa-users" aria-hidden="true"></i>&nbsp学生-首页</p>
			<hr>
			<table class="table table-hover">
				<thead>
			        <tr>
			            <th scope="col">序号</th>
			            <th scope="col">二级学院</th>
			            <th scope="col">专业数</th>
			            <th scope="col">班级数</th>
			            <th scope="col">学生数</th>
			        </tr>
			    </thead>
				<tbody>
					<?php 
						/* 1711140136-查询学院名字*/
						$sql = "select dep_name from yefh_major";
						$re = mysqli_query($connect,$sql);
						while ($row = mysqli_fetch_assoc($re)) {
							@$depSum[$row["dep_name"]] += 1;
						}
						/* 1711140136-统计班级数*/
						$sql = "select dep_name from yefh_class,yefh_major where yefh_class.major_name = yefh_major.major_name";
						$re = mysqli_query($connect,$sql);
						while ($row = mysqli_fetch_assoc($re)) {
							@$classSum[$row["dep_name"]] += 1;
						}
						/* 1711140136-统计学生数*/
						$sql = "select dep_name from yefh_stu,yefh_class,yefh_major where yefh_class.major_name = yefh_major.major_name and yefh_class.stu_class = yefh_stu.stu_class";
						$re = mysqli_query($connect,$sql);
						while ($row = mysqli_fetch_assoc($re)) {
							@$stuSum[$row["dep_name"]] += 1;
						}
						$n = 1;
					?>
					<?php foreach ($depSum as $key => $value): ?>
					    <tr>
						    <th scope="row"><?php echo $n++ ?></th>
						    <td><?php echo $key; ?></td>
						    <td><?php echo $value; ?></td>
						    <td><?php echo @$classSum[$key]; ?></td>
						    <td><?php echo @$stuSum[$key] ?></td>
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
	$(function(){
		$(".upload").on("click",function(event){
			$(".uploadAvatar").stop().slideDown(200);
			$(this).css({"background-color":"#ffffff","color":"#9370db"});
			return false;
		});
		$(document).on("click",function(){
			$(".uploadAvatar").slideUp(200);
			$(".upload").css({"background-color":"#563d7c","color":"#fcfcfc"});
		})
		$(".uploadAvatar").on("click",function(event){
			/* 1711140136-防止事件冒泡*/
			event.stopPropagation();
		})
	});
</script>
</body>
</html>