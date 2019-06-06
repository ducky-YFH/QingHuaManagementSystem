<?php 
include "./API/LoginSession.php";
require_once "connSelect.php";
// 1711140136-查询学生信息
$query = mysqli_query($connect,"select * from yefh_stu;");



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>清华大学教务管理系统菜单管理</title>
	<link rel="stylesheet" href="../../php_note/inc/css/reset.css">
	<link rel="stylesheet" href="../../php_note/inc/css/login_index.css">
	<script src="../../php_note/inc/js/jQuery/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" href="../../php_note/inc/vendors/bootstrap4/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../php_note/inc/vendors/font-awesome/css/font-awesome.min.css">
	<script src="../php_note/inc/js/jQuery/jquery-3.3.1.min.js"></script>
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
				<li><a href="../menu/menuAdmin.php">菜单管理</a></li>
				<li><a href="../dep/depAdmin.php">二级学院管理</a></li>
				<li><a href="../te/teAdmin.php">教师管理</a></li>
				<li><a href="../stu/stuAdmin.php">学生管理</a></li>
				<li><a href="../cou/couAdmin.php">课程管理</a></li>
				<li><a href="../menu/menuAdmin.php">教学任务管理</a></li>
				<li><a href="../adminLogOut.php">注销</a></li>
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
			<p>当前位置：<i class="fa fa-users" aria-hidden="true"></i>&nbsp首页-菜单首页</p>
			<hr>

			<table class="table table-hover">
				<button class="btn btn-primary">添加菜单</button>
				<thead>
			        <tr>
			            <th scope="col">序号</th>
			            <th scope="col">菜单名称</th>
			            <th scope="col">超级链接目的地</th>
			            <th scope="col">备注</th>
			            <th scope="col">教师权限</th>
			            <th scope="col">学生权限</th>
			            <th scope="col">操作修改</th>
			           
			        </tr>
			    </thead>

				<tbody>

					<?php foreach ($depSum as $key => $value): ?>
					    <tr>
						    <th scope="row">1</th>
						    <td>教师成绩录入</td>
						    <td>te_score_in.php</td>
						    <td>任课教师本页面录入各个班级某门课程的成绩</td>
						    <td>有</td>
						    <td>否</td>
						    <td>修改|删除</td>
					    </tr>
					    <tr>
						    <th scope="row">2</th>
						    <td>教师任务查询</td>
						    <td>te_task_search.php</td>
						    <td>教师或学生在本页面查询课程的人可见教师及课程信息</td>
						    <td>有</td>
						    <td>有</td>
						    <td>修改|删除</td>
					    </tr>
					    <tr>
						    <th scope="row">3</th>
						    <td>学生成绩查询</td>
						    <td>stu_score_search.php</td>
						    <td>教师或学生在本页面查询某门课程的成绩</td>
						    <td>有</td>
						    <td>有</td>
						    <td>修改|删除</td>
					    </tr>
					    <tr>
						    <th scope="row">4</th>
						    <td>学生课表查询</td>
						    <td>stu_ctable_search.php</td>
						    <td>教师或学生在本页面查询某个班级的成绩</td>
						    <td>有</td>
						    <td>有</td>
						    <td>修改|删除</td>
					    </tr>
					    <tr>
						    <th scope="row">5</th>
						    <td>用户设置</td>
						    <td>user.php</td>
						    <td>教师或学生在本页面修改自己的密码</td>
						    <td>有</td>
						    <td>有</td>
						    <td>修改|删除</td>
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