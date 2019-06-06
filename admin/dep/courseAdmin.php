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
	<title>清华大学教务管理系统学生管理</title>
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
	<!-- 选择文件 -->
	<div id="stu_table">
		<div class="content">
			<p>当前位置：<i class="fa fa-users" aria-hidden="true"></i>&nbsp首页->添加课程</p>
			<p>批量导入课程（课程ID不允许重复）</p>
			<hr>
			<table class="table table-hover" >
				<thead>
			       <ul>
						<li><input type="file" name="" class="" ></li>
						<tr><input type="submit" class=""  value="确定"></tr>
						<tr><input type="submit" name=""  value="下载模板"></tr>
					</ul>
			    </thead>
				<tbody>
		<!-- 查询课程 -->
			<form>
				<ul>
					<h5>查询课程</h5>
					</ul>
					学期
					<select name="">
								<option value="all">1</option>
								<option value="">2</option>
								<option value="">3</option>
								<option value="">4</option>
					</select>
			</form>
			
   				<form>
   					系：
					<select name="">
								<option value="">--请选择二级学院--</option>
								<option value="">计算机学院</option>
								<option value="">软件学院</option>
								<option value="">应用外语学院</option>
								<option value="">管理学院</option>
					</select>					
								<button class="btn btn-primary">查询</button>
				</form>	
					
				<form>	
						<ul>
						<tr>按专业查询>>专业</tr>
						<select name="">
								<option value="">专业</option>
								<option value="">计算机学院</option>
								<option value="">外语学院</option>
								<option value="">软件学院</option>
								<option value="">数字媒体学院</option>
							</select>
							<button class="btn btn-primary">查询</button>
						</ul>
				</form>  
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