<?php 
// 1711140136-引入公用函数
require_once "../function.php";
include "./API/LoginSession.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>清华大学教务管理系统首页</title>
	<link rel="stylesheet" href="/php_note/inc/css/reset.css">
	<link rel="stylesheet" href="/php_note/inc/css/te_task_search.css">
	<script src="/php_note/inc/js/jQuery/jquery-3.3.1.min.js"></script>
	<script src="/php_note/inc/js/te_task_search.js"></script>
	<link rel="stylesheet" href="/php_note/inc/vendors/bootstrap4/css/bootstrap.min.css">
	<link rel="stylesheet" href="/php_note/inc/vendors/font-awesome/css/font-awesome.min.css">
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
				<li><a href="#">教学任查询</a></li>
				<li><a href="stu_score_search.php">学生成绩查询</a></li>
				<li><a href="">学生课表查询</a></li>
				<li><a href="user.php">用户设置</a></li>
				<li><a href="API/login_out.php">注销</a></li>
			</ul>
		</div>
	</div>
	<!-- 1711140136-查询表单 -->
	<div id="search_content">
		<div class="content">
			<p>当前位置：<i class="fa fa-graduation-cap"></i>&nbsp教师-教学任务查询</p>
			<div class="box_search">
				<div class="search">
					<!-- --------------------1711140136-学年、学期、院系查询表单-------------------- -->
					<form action='' method="get">
							<select class="form-control" name="learn_year">
								<option value="" disabled selected style='display:none;'>学年</option>
								<?php
									date_default_timezone_set('prc');
									$time = date('y',time()); //19
									$time = '20' . $time; //2019
									settype($time, 'int');
									$time_interval = $time - 2003;
									$time_interval++; //让时间加到到2020年;
									for ($i=0; $i < $time_interval; $i++) {
										$start_time = 2003 + $i;
										$end_time = $start_time + 1;
										$time_res = $start_time . "-" . $end_time;
								?>
									<option value='<?php echo $start_time . "-" . $end_time; ?>'>
										<?php echo $time_res; ?>
									</option>
								<?php
									}							 
								?>
							</select>
							<select class="form-control" name="learn_term">
								<option value="" disabled selected style='display:none;'>学期</option>
								<option value="1" <?php echo isset($_GET['learn_term']) && $_GET["learn_term"] === '1' ? 'selected' : "" ?>>1</option>
								<option value="2" <?php echo isset($_GET['learn_term']) && $_GET["learn_term"] === '2' ? 'selected' : "" ?>>2</option>
							</select>
							<select class="form-control" name="dep">
								<option value="" disabled selected style='display:none;'>院系</option>
								<?php 
									$sql = "select * from yefh_dep;";
									$res = mysql_search($sql);
								?>
								<?php foreach ($res as $item): ?>
									<option value="<?php echo $item["dep_name"]; ?>"><?php echo $item["dep_name"]; ?></option>
								<?php endforeach ?>
							</select>
						<button type="button" class="btn LTD_btn">查询</button>
					</form>
				</div>		
				<div class="search">
					<!-- --------------------1711140136-班级查询表单-------------------- -->
					<form name="class_form" action='' method="get">
							<select class="form-control" name="search_class">
								<option value="">班级查询</option>
								<?php 
									$sql = "select * from yefh_class;";
									$res = mysql_search($sql);
								?>
								<?php foreach ($res as $item): ?>
									<option value="<?php echo $item["stu_class"]; ?>">
										<?php echo $item["stu_class"]; ?>
									</option>
								<?php endforeach ?>
							</select>
						<button type="button" class="btn" onclick="showContent(document.class_form.search_class.value,'search_class','content.php' )">查询</button>
					</form>
					<!-- --------------------1711140136-课程查询表单-------------------- -->
					<form name="course_form" action='' method="get">
							<select class="form-control" name="search_course" id="search_course">
								<option value="">课程查询</option>
								<?php 
									$sql = "select * from yefh_course;";
									$res = mysql_search($sql);
								?>
								<?php foreach ($res as $item): ?>
									<option value="<?php echo $item["c_name"]; ?>"><?php echo $item["c_name"]; ?></option>
								<?php endforeach ?>
							</select>
						<button type="button" class="btn" onclick="showContent(document.course_form.search_course.value,'search_course','content.php' )">查询</button>
					</form>
					<!-- --------------------1711140136-老师查询表单-------------------- -->
					<form name="te_form" action='' method="get">
							<select class="form-control" name="search_te">
								<option value="" >老师查询</option>
								<?php 
									$sql = "select * from yefh_te;";
									$res = mysql_search($sql);
								?>
								<?php foreach ($res as $item): ?>
									<option value="<?php echo $item["te_name"]; ?>" <?php echo isset($_GET['search_te']) && $_GET["search_te"] === $item["te_name"] ? 'selected' : "" ?>>
										<?php echo $item["te_name"]; ?>
									</option>
								<?php endforeach ?>
							</select>
						<button type="button" class="btn" onclick="showContent(document.te_form.search_te.value,'search_te','content.php' )">查询</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- 1711140136-教学任务查询结果 -->
	<div id="search_result">
		<div class="content">
			<div id="ContentArea">
				
			</div>
		</div>
	</div>
	<!-- 1711140136-版权说明 -->
	<div id="footer">
		<li class="fa fa-exclamation-triangle"></li>&nbsp&nbsp<span>版权所有@清华大学教务处 地址：北京市海淀区清华大学12号漏 邮编:100084</span>
	</div>
</body>
