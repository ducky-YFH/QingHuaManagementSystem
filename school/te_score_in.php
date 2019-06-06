<?php 
include "./API/LoginSession.php";
require_once "../function.php";

// ---------------选择录入成绩的课程---------------
// (1)先将数据查询的选项完善
$UserId = $_SESSION["account"];
$sql = "select yefh_course.c_name,yefh_task.stu_class
		from yefh_course
		inner join yefh_task on yefh_task.c_id = yefh_course.c_id
		inner join yefh_te on yefh_task.te_id = yefh_te.te_id
		where yefh_te.te_id = '{$UserId}';";
$scoreSelect = mysql_search($sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>清华大学教务管理系统首页</title>
	<link rel="stylesheet" href="/php_note/inc/css/reset.css">
	<link rel="stylesheet" href="/php_note/inc/css/te_score_in.css">
	<link rel="stylesheet" href="/php_note/inc/vendors/bootstrap4/css/bootstrap.min.css">
	<link rel="stylesheet" href="/php_note/inc/vendors/font-awesome/css/font-awesome.min.css">
	<script src="/php_note/inc/js/jQuery/jquery-3.3.1.min.js"></script>
	<script src="/php_note/inc/js/te_score_in.js"></script>
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
				<li><a href="te_task_search.php">教学任查询</a></li>
				<li><a href="stu_score_search.php">学生成绩查询</a></li>
				<li><a href="">学生课表查询</a></li>
				<li><a href="user.php">用户设置</a></li>
				<li><a href="API/login_out.php">注销</a></li>
			</ul>
		</div>
	</div>
	<!-- 1711140136-成绩录入单 -->
	<div id="score_in">
		<div class="content">
			<p>当前位置：<i class="fa fa-graduation-cap"></i>&nbsp教师-成绩录入</p>
			<div class="score_content">
				<hr>
				<table class="introduce_table">
					<tr>
						<td>教师姓名：<?php echo $_SESSION["name"] ?></td>
						<td>课程名称：</td>
					</tr>
					<tr>
						<td>班级：</td>
						<td>学年学期：</td>
					</tr>
					<tr>
						<td>课程性质：</td>
						<td>考核方式：</td>
					</tr>
					<tr>
						<td>输入规范提示：数字成绩不得超过100分</td>
						<td>输入记分制：总评好成绩保存为：</td>
					</tr>
				</table>
				<hr>
				<div class="insert_select">
					<p>请选择录入成绩的课程：</p>
					<form action="javascript:;" class="searchForm">
						<select name="find_score" id="" class="form-control">
							<?php foreach ($scoreSelect as $item) { ?>
								<option value="<?php echo $item['stu_class'] . ">" . $item['c_name'] ?>"><?php echo $item['stu_class'] . "----" . $item['c_name'] ?></option>
								<?php $task_id = $item['task_id'] ?>
							<?php } ?>
						</select>
						<button class="btn searchBtn">查询</button>
					</form>
				</div>
				<hr>
				<form action="" method="post" class="total_score">
					<p>平时(%)</p>
					<input type="text" class="form-control" onkeyup="value=value.replace(/[^\d\.]/g,'')" onblur="value=value.replace(/[^\d\.]/g,'')">
				 	<p>期中(%)</p>
					<input type="text" class="form-control" onkeyup="value=value.replace(/[^\d\.]/g,'')" onblur="value=value.replace(/[^\d\.]/g,'')">
					<p>实验(%)</p>
					<input type="text" class="form-control" onkeyup="value=value.replace(/[^\d\.]/g,'')" onblur="value=value.replace(/[^\d\.]/g,'')">
					<p>期末(%)</p>
					<input type="text" class="form-control" onkeyup="value=value.replace(/[^\d\.]/g,'')" onblur="value=value.replace(/[^\d\.]/g,'')">
					<p>折算总评成绩之前请先清空总评成绩</p>
					<button class="btn btn-danger">清空总评成绩</button>
				</form>
				<div class="clear"></div>
				<form action="addScore.php" method="post" class="insert_file" enctype="multipart/form-data">
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="customFile" name="upExcel">
						<label class="custom-file-label" for="customFile">Excel成绩文件</label>
					</div>
					<input type="hidden" name="<?php echo $task_id; ?>">									
					<button class="btn btn-primary">载入</button>
					<a href="downloadExcel.php?stuClass=17计算机应用技术3-3&courseName=网络安全管理" class="btn btn-primary">成绩模板下载</a>
				</form>
			</div>
			<hr>
			<div class="insert_table">
				<form action="" method="post">
					<table class="table table-hover">
						<thead>
						  	<tr>
							    <th scope="col">序号</th>
							    <th scope="col">班级名称</th>
							    <th scope="col">学号</th>
							    <th scope="col">姓名</th>
							    <th scope="col">平时成绩</th>
							    <th scope="col">期中成绩</th>
							    <th scope="col">实验成绩</th>
							    <th scope="col">期末成绩</th>
							    <th scope="col">总评成绩</th>
						 	</tr>
						</thead>
						<tbody class="tbodyStu">
							<!-- <tr>
								<th scope="row"></th>
								<td></td>
								<td></td>
								<td></td>
								<td><input placeholder="" type="text" class="form-control" onkeyup="value=value.replace(/[^\d{1,}\.\d{1,}|\d{1,}]/g,'')"></td>
								<td><input type="text" class="form-control" onkeyup="value=value.replace(/[^\d{1,}\.\d{1,}|\d{1,}]/g,'')"></td>
								<td><input type="text" class="form-control" onkeyup="value=value.replace(/[^\d{1,}\.\d{1,}|\d{1,}]/g,'')"></td>
								<td><input type="text" class="form-control" onkeyup="value=value.replace(/[^\d{1,}\.\d{1,}|\d{1,}]/g,'')"></td>
								<td><input placeholder="" type="text" class="form-control" onkeyup="value=value.replace(/[^\d{1,}\.\d{1,}|\d{1,}]/g,'')"></td>
							</tr> -->
						</tbody>
					</table>
					<div class="insert_btn">
						<input class="btn btn-info" type="submit" name="score_save" value="保存">
						<input class="btn btn-info" type="submit" name="score_reviser" value="成绩校对打印">
						<input class="btn btn-info" type="submit" name="score_submit" value="提交">
						<input class="btn btn-info" type="submit" name="score_output" value="成绩输出打印">
						<input class="btn btn-info" type="submit" name="score_photo" value="学生照片查看">	
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="clear"></div>
	<!-- 1711140136-版权说明 -->
	<div id="footer">
		<li class="fa fa-exclamation-triangle"></li>&nbsp&nbsp<span>版权所有@清华大学教务处 地址：北京市海淀区清华大学12号漏 邮编:100084</span>
	</div>
</body>