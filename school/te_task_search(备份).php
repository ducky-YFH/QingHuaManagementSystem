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
				<span><i class="fa fa-user-circle-o"></i>你好！</span><li>叶富豪</li>
				<span>学号：</span><li>1711140136</li>
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
				<li><a href="user.html">用户设置</a></li>
				<li><a href="../login.php">注销</a></li>
			</ul>
		</div>
	</div>
	<!-- 1711140136-查询表单 -->
	<div id="search_content">
		<div class="content">
			<p>当前位置：<i class="fa fa-graduation-cap"></i>&nbsp教师-教学任务查询</p>
			<div class="box_search">
				<div class="search">
					<!-- ------------------------171140136-学年、学期、院系查询------------------------ -->
					<?php 
						if(isset($_GET["learn_year"]) && isset($_GET["learn_term"]) && isset($_GET["dep"])){
							$search_res = searchYearTermDep();
						}
						function searchYearTermDep(){
							// 1711140136-将客户端提交的学年和学期拼接对应数据库里的格式
							$year = $_GET["learn_year"];
							$new_year1 = substr($year, 2,2); //如19
							$new_year2 = substr($year, 7,2); //如20
							$learn_term = '0' . $_GET["learn_term"];  //01或02
							$task_term = $new_year1 . $new_year2 . $learn_term; 
							// --------------------------
							$dep = $_GET["dep"];
							$sql = "select * from 
									yefh_task
									inner join yefh_course on (yefh_course.c_id = yefh_task.c_id)
									inner join yefh_te on (yefh_te.te_id = yefh_task.te_id)
									where yefh_task.task_term = '{$task_term}' and yefh_te.dep_name = '{$dep}';";
							return mysql_search($sql);
						}
					?>
					<form action='<?php $_SERVER["PHP_SELF"]; ?>' method="get">
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
									<option value='<?php echo $start_time . "-" . $end_time; ?>' <?php echo isset($_GET['learn_year']) && $_GET["learn_year"] === $time_res ? 'selected' : "" ?>>
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
									<option value="<?php echo $item["dep_name"]; ?>" <?php echo isset($_GET['dep']) && $_GET["dep"] === $item["dep_name"] ? 'selected' : "" ?>><?php echo $item["dep_name"]; ?></option>
								<?php endforeach ?>
							</select>
						<button class="btn">查询</button>
					</form>	
					<!-- 错误提示 -->
					<div class="alert alert-danger" role="alert" style="display: none">
						请完善查询条件
					</div>
				</div>		
				<div class="search">
					 <!-- ------------------------171140136-班级查询------------------------ -->
					<?php 
						if(isset($_GET["search_class"]) && $_GET["search_class"] !== "class_all"){
							$search_res = search_class();
						}elseif (isset($_GET["search_class"]) && $_GET["search_class"] === "class_all") {
							$search_res = search_classAll();
						}
						function search_class(){
							$class_name = $_GET["search_class"];
							$sql = "select * from 
									yefh_task
									inner join yefh_course on (yefh_course.c_id = yefh_task.c_id)
									inner join yefh_te on (yefh_te.te_id = yefh_task.te_id)
									where stu_class = '{$class_name}';";
							return mysql_search($sql);
						}
						function search_classAll(){
							$sql = "select * from 
									yefh_te 
									inner join yefh_task on (yefh_task.te_id = yefh_te.te_id)
									inner join yefh_course on (yefh_course.c_id = yefh_task.c_id);";
							return mysql_search($sql);
						}
					?>
					<form action='<?php echo $_SERVER["PHP_SELF"] ?>' method="get">
							<select class="form-control" name="search_class">
								<option value="class_all">全部班级</option>
								<?php 
									$sql = "select * from yefh_class;";
									$res = mysql_search($sql);
								?>
								<?php foreach ($res as $item): ?>
									<option value="<?php echo $item["stu_class"]; ?>" <?php echo isset($_GET['search_class']) && $_GET["search_class"] === $item["stu_class"] ? 'selected' : "" ?>>
										<?php echo $item["stu_class"]; ?>
									</option>
								<?php endforeach ?>
							</select>
						<button class="btn">查询</button>
					</form>
  
				 <!-- -------------------------171140136-课程查询------------------------- -->
				<?php				
					if(isset($_GET["search_course"]) && $_GET["search_course"] !== "course_all"){
						$search_res = search_course();
					}elseif (isset($_GET["search_course"]) && $_GET["search_course"] === "course_all") {
						$search_res = search_courseAll();
					}
					function search_course(){
						$course_name = $_GET["search_course"];
						$sql = "select * from 
								yefh_course
								inner join yefh_task on (yefh_course.c_id = yefh_task.c_id)
								inner join yefh_te on (yefh_task.te_id = yefh_te.te_id)
								where c_name = '{$course_name}';";
						return mysql_search($sql);
					}
					function search_courseAll(){
						$sql = "select * from 
								yefh_te 
								inner join yefh_task on (yefh_task.te_id = yefh_te.te_id)
								inner join yefh_course on (yefh_course.c_id = yefh_task.c_id);";
						return mysql_search($sql);
					}
					?>
					<form action='<?php echo $_SERVER["PHP_SELF"] ?>' method="get">
							<select class="form-control" name="search_course" id="search_course">
								<option value="course_all">全部课程</option>
								<?php 
									$sql = "select * from yefh_course;";
									$res = mysql_search($sql);
								?>
								<?php foreach ($res as $item): ?>
									<option value="<?php echo $item["c_name"]; ?>" <?php echo isset($_GET['search_course']) && $_GET["search_course"] === $item["c_name"] ? 'selected' : "" ?>><?php echo $item["c_name"]; ?></option>
								<?php endforeach ?>
							</select>
						<button class="btn">查询</button>
					</form>

				<!-- -------------------------171140136-老师查询------------------------- -->
					<?php 						
						if(isset($_GET["search_te"]) && $_GET["search_te"] !== "te_all"){
							$search_res = search_te();
						}elseif (isset($_GET["search_te"]) && $_GET["search_te"] === "te_all") {
							$search_res = search_teAll();
						}
						// 1711140136-单个老师查询函数
						function search_te(){
							$te_name = $_GET["search_te"];
							// 1711140136-关联查询
							$sql = "select * from 
									yefh_te 
									inner join yefh_task on (yefh_task.te_id = yefh_te.te_id)
									inner join yefh_course on (yefh_course.c_id = yefh_task.c_id)
									where te_name = '{$te_name}';";
							// 1711140136- 将数据库查询封装到了一个公用函数脚本了
							return mysql_search($sql); 
						}
						// 1711140136-全部老师查询函数
						function search_teAll(){
							$sql = "select * from 
									yefh_te 
									inner join yefh_task on (yefh_task.te_id = yefh_te.te_id)
									inner join yefh_course on (yefh_course.c_id = yefh_task.c_id);";
							return mysql_search($sql);
						}
					?>
					<form action='<?php echo $_SERVER["PHP_SELF"] ?>' method="get">
							<select class="form-control" name="search_te">
								<option value="te_all" >全部老师</option>
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
				<?php if(isset($search_res)){
					foreach ($search_res as $item) {
				?>
					<tr>
					    <th scope="row"><?php echo $item["stu_class"]; ?></th>
					    <td><?php echo $item["te_name"] ?></td>
					    <td><?php echo $item["c_name"] ?></td>
					    <td><?php echo $item["c_type"] ?></td>
					    <td><?php echo $item["c_weekh"] ?></td>
					    <td><?php echo $item["c_week"] ?></td>
					    <td><?php echo $item["c_totalh"] ?></td>
					    <td><?php echo $item["c_exam"] ?></td>
					</tr>
				<?php
					}
				}
				?>
				</tbody>
			</table>
		</div>
	</div>
	<!-- 1711140136-版权说明 -->
	<div id="footer">
		<li class="fa fa-exclamation-triangle"></li>&nbsp&nbsp<span>版权所有@清华大学教务处 地址：北京市海淀区清华大学12号漏 邮编:100084</span>
	</div>
</body>
