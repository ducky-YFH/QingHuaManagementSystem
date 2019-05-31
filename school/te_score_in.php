<?php 
include "./API/LoginSession.php";
require_once "../function.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>清华大学教务管理系统首页</title>
	<link rel="stylesheet" href="/php_note/inc/css/reset.css">
	<link rel="stylesheet" href="/php_note/inc/css/te_score_in.css">
	<script src="/php_note/inc/js/jQuery/jquery-3.3.1.min.js"></script>
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
						<td>教师姓名：刘楠</td>
						<td>课程名称：企业级网站开发与部署</td>
					</tr>
					<tr>
						<td>班级：16计算机应用技术3-1班</td>
						<td>学年学期：2017-2018-1</td>
					</tr>
					<tr>
						<td>课程性质：支撑课</td>
						<td>考核方式：过程</td>
					</tr>
					<tr>
						<td>输入规范提示：数字成绩不得超过100分</td>
						<td>输入记分制：总评好成绩保存为：</td>
					</tr>
				</table>
				<hr>
				<div class="insert_select">
					<p>请选择录入成绩的课程：</p>
					<form action="" method="post">
						<select name="find_score" id="" class="form-control">
							<option value="">16计算机应用技术3-1 企业级网站开发与部署</option>
							<option value="">17计算机应用技术3-3 企业级网站开发与部署</option>
							<option value="">18计算机应用技术3-2 企业级网站开发与部署</option>
						</select>
						<button class="btn">查询</button>
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
					<button class="btn btn-primary">载入</button>
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
						<tbody>
							<?php
								$sql = "select yefh_stu.stu_id,sc_id,sc_final,sc_overall,stu_name,stu_class
										from yefh_score
										inner join yefh_stu on yefh_score.stu_id = yefh_stu.stu_id";
								$res = mysqli_query($connect,$sql);
								if(mysqli_affected_rows($connect) !== 0){
								while ($rows = mysqli_fetch_assoc($res)) {
							?>
								<tr>
									<th scope="row"><?php echo $rows["sc_id"];?></th>
									<td><?php echo $rows["stu_class"];?></td>
									<td><?php echo $rows["stu_id"];?></td>
									<td><?php echo $rows["stu_name"];?></td>
									<td><input placeholder="<?php echo $rows["sc_final"] ?>" type="text" class="form-control" onkeyup="value=value.replace(/[^\d{1,}\.\d{1,}|\d{1,}]/g,'')"></td>
									<td><input type="text" class="form-control" onkeyup="value=value.replace(/[^\d{1,}\.\d{1,}|\d{1,}]/g,'')"></td>
									<td><input type="text" class="form-control" onkeyup="value=value.replace(/[^\d{1,}\.\d{1,}|\d{1,}]/g,'')"></td>
									<td><input type="text" class="form-control" onkeyup="value=value.replace(/[^\d{1,}\.\d{1,}|\d{1,}]/g,'')"></td>
									<td><input placeholder="<?php echo $rows["sc_overall"] ?>" type="text" class="form-control" onkeyup="value=value.replace(/[^\d{1,}\.\d{1,}|\d{1,}]/g,'')"></td>
								</tr>
							<?php
									}
								}
							?>
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