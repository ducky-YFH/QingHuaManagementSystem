<?php 
	include "./API/LoginSession.php";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>清华大学教务管理系统首页</title>
	<link rel="stylesheet" href="/php_note/inc/css/reset.css">
	<link rel="stylesheet" href="/php_note/inc/css/stu_score_search.css">
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
				<li><a href="#">学生成绩查询</a></li>
				<li><a href="">学生课表查询</a></li>
				<li><a href="user.php">用户设置</a></li>
				<li><a href="API/login_out.php">注销</a></li>
			</ul>
		</div>
	</div>
	<!-- 1711140136-查询表单 -->
	<div id="search_content">
		<div class="content">
			<p>当前位置：<i class="fa fa-users" aria-hidden="true"></i>&nbsp学生-学生成绩查询</p>
			<div class="box_search">
				<div class="search">
					<form action="">
							<select class="form-control" name="learn_year" id="learn_year">
								<option value="" disabled selected style='display:none;'>学年</option>
								<option value="all">默认-学年</option>
								<option value="">2016</option>
								<option value="">2017</option>
								<option value="">2018</option>
							</select>
							<select class="form-control" name="term" id="learn_year">
								<option value="" disabled selected style='display:none;'>学期</option>
								<option value="all">默认-学期</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select>
							<select class="form-control" name="term" id="learn_year">
								<option value="" disabled selected style='display:none;'>院系</option>
								<option value="all">默认-院系</option>
								<option value="">计算机学院</option>
								<option value="">软件学院</option>
								<option value="">数字媒体学院</option>
							</select>
							<select class="form-control" name="term" id="learn_year">
								<option value="" disabled selected style='display:none;'>班级</option>
								<option value="all">默认-班级</option>
								<option value="">16计算机应用3-1班</option>
								<option value="">16计算机应用3-3班</option>
								<option value="">17计算机应用3-2班</option>
							</select>
						<button class="btn">查询</button>
					</form>	
				</div>		
				<div class="search">
					<form action="">
							<select class="form-control" name="learn_year" id="learn_year">
								<option value="" disabled selected style='display:none;'>课程</option>
								<option value="all">默认-课程</option>
								<option value="">web项目应用</option>
								<option value="">linux运维</option>
								<option value="">python编程技术</option>
							</select>
						<button class="btn">查询</button>
					</form>
					<form action="">
							<select class="form-control" name="learn_year" id="learn_year">
								<option value="" disabled selected style='display:none;'>课程类型</option>
								<option value="all">默认-课程类型</option>
								<option value="">支撑课</option>
								<option value="">素质拓展课</option>
								<option value="">基础课</option>
							</select>
						<button class="btn">查询</button>
					</form>
					<form action="">
						<input type="text" class="form-control" placeholder="学号">
						<button class="btn">查询</button>
					</form>					
					<form action="">
						<input type="text" class="form-control" placeholder="姓名">
						<button class="btn">查询</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- 1711140136-教学任务查询结果 -->
	<div id="search_result">
		<div class="content">
			<table class="table table-hover">
				<thead>
				  <tr>
				    <th scope="col">班级名称</th>
				    <th scope="col">任课教师</th>
				    <th scope="col">课程名称</th>
				    <th scope="col">课程类型</th>
				    <th scope="col">周课时</th>
				    <th scope="col">起止周</th>
				    <th scope="col">总课时</th>
				    <th scope="col">考核方式</th>
				  </tr>
				</thead>
				<tbody>
				  <tr>
				    <th scope="row">15计算机应用技术3-1</th>
				    <td>刘楠</td>
				    <td>企业级网站开发与部署</td>
				    <td>支撑课</td>
				    <td>4.0-0.0</td>
				    <td>01-14</td>
				    <td>56</td>
				    <td>过程</td>
				  </tr>
					<tr>
				    <th scope="row">15计算机应用技术3-1</th>
				    <td>刘楠</td>
				    <td>企业级网站开发与部署</td>
				    <td>支撑课</td>
				    <td>4.0-0.0</td>
				    <td>01-14</td>
				    <td>56</td>
				    <td>过程</td>
				  </tr>
				  <tr>
				    <th scope="row">15计算机应用技术3-1</th>
				    <td>刘楠</td>
				    <td>企业级网站开发与部署</td>
				    <td>支撑课</td>
				    <td>4.0-0.0</td>
				    <td>01-14</td>
				    <td>56</td>
				    <td>过程</td>
				  </tr>
				  <tr>
				    <th scope="row">15计算机应用技术3-1</th>
				    <td>刘楠</td>
				    <td>企业级网站开发与部署</td>
				    <td>支撑课</td>
				    <td>4.0-0.0</td>
				    <td>01-14</td>
				    <td>56</td>
				    <td>过程</td>
				  </tr>
				</tbody>
			</table>
		</div>
	</div>
	<!-- 1711140136-版权说明 -->
	<div id="footer">
		<li class="fa fa-exclamation-triangle"></li>&nbsp&nbsp<span>版权所有@清华大学教务处 地址：北京市海淀区清华大学12号漏 邮编:100084</span>
	</div>
</body>