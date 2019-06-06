<?php 
	require_once "adminSession/session.php";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>清华大学教务管理系统二级学院管理首页</title>
	<link rel="stylesheet" href="../php_note/inc/css/reset.css">
	<link rel="stylesheet" href="../php_note/inc/css/login_index.css">
	<script src="../php_note/inc/js/jQuery/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" href="../php_note/inc/vendors/bootstrap4/css/bootstrap.min.css">
	<link rel="stylesheet" href="../php_note/inc/vendors/font-awesome/css/font-awesome.min.css">
	<script src="../php_note/inc/js/jQuery/jquery-3.3.1.min.js"></script>
	<script src="../php_note/inc/vendors/bootstrap4/js/bootstrap.min.js"></script>
	<style>

	</style>
</head>
<body style="background-color: #212529;">
	<!-- 1711140136-logo -->
	<div id="logo">
		<div class="content">
			<a href="">
				<img src="../../php_note/inc/pic/logo_1.svg" alt="">
				<span>教务管理系统后台管理</span>	
			</a>
		</div>
	</div>
	<!-- 1711140136-欢迎信息(登陆人信息显示) -->
	<div id="top-nav">
		<div class="content">
			<ul>
				<li><a href="menu/menuAdmin.php">菜单管理</a></li>
				<li><a href="dep/depAdmin.php">二级学院管理</a></li>
				<li><a href="te/teAdmin.php">教师管理</a></li>
				<li><a href="stu/stuAdmin.php">学生管理</a></li>
				<li><a href="cou/couAdmin.php">课程管理</a></li>
				<li><a href="menu/menuAdmin.php">教学任务管理</a></li>
				<li><a href="adminLogOut.php">注销</a></li>
			</ul>
		</div>
	</div>
	<div id="stu_table">
		<div class="content">
			 <p>当前位置：<i class="fa fa-users" aria-hidden="true"></i>&nbsp首页二级学院管理-->学生管理</p>
			<hr>
			<table class="table table-hover" >
				<thead>
			        <tr>
			            <th scope="col">后台管理内容</th>
			            <th scope="col">一级目录操作</th>
			            <th scope="col">二级目录操作</th>
			            <th scope="col">说明</th>
			        </tr>
			    </thead>
				<tbody>
	 				<tr>
						  <td>菜单管理</td>

						  <td>
						  <li>菜单信息显示</li>
					  <li>菜单操作导航</li>
						  </td>
					  <td>
					  <li>添加菜单|删除菜单|修改菜单</li>
					  </td>
					  <td>可对前台的导航栏进行管理</td>
						  
					</tr>
					<tr>
						 <td>二级学院管理</td>
						 <td>
						 <li>二级学院信息统计</li>
						 <li>二级学院操作导航</li>
						 <li>专业操作导航</li>
						 <li>班级操作导航</li>
						 </td>
						 <td>
						 <li>添加二级学院|删除二级学院|修改二级学院</li>
					 <li>管理专业（修改|删除|批量导入）</li>
					  <li>管理班级（修改|删除|批量导入）</li>
						 </td>
						 <td>可对二级学院进行管理</td>
					</tr>
					<tr>
						 <td>教师管理</td>
						 <td>
						 <li>教师信息显示</li>
						 <li>教师操作导航</li>
						 <td>
						 <li>删除教师|修改教师信息</li>
						 <li>添加教师</li>
						 <li>批量添加教师</li>
						 </td>
						 <td>可对教师账号进行管理</td>
					</tr>
					<tr>
						 <td>学生管理</td>
						 <td>
						 <li>班级学生统计</li>
						 <li>学生操作导航</li>
						 <li>下载模板|上传文件</li>
						 </td>
						 <td>
						 	<li>查看班级学生（重置密码|转班）</li>
						 	<li>批量添加学生</li>
						 </td>
						 <td>可对学生账号进行管理</td>
					</tr>
					<tr>
						 <td>课程管理</td>
						 <td>
						 <li>下载课程模板|上传课程文件</li>
						 <li>课程信息查询|显示课程|课程操作导航</li>
						 </td>
						 <td>
						 	<li>批量添加课程</li>
						 	<li>删除课程|修改课程</li>
						 </td>
						 <td>可对课程账号进行管理</td>
					</tr>
					<tr>
						 <td>教学任务管理</td>
						 <td>
						 <li>下载模板|上传教学任务文件</li>
						 <li>教学任务查询|教学任务信息显示|教学任务操作导航</li>
						 </td>
						 <td>
						 	<li>批量添加教学任务</li>
						 	<li>删除教学任务|修改教学任务</li>
						 </td>
						 <td>可对教学任务进行管理</td>
					</tr>
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