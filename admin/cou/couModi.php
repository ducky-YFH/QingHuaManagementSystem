<?php
// 引入session
require_once "../adminSession/session.php";
// 连接数据库用户，必须
require_once "../../php_note/inc/conn/connSelect.php";
// 必须要有，请自行创建queryData.php查询代码
require_once "../CommonFunction/queryData.php";

$c_code = $_GET["c_code"];
$sql = "select * from yefh_course where c_code = '{$c_code}'";
$res = mysql_search($sql,$connect)[0];


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
	<script src="../../php_note/inc/vendors/artTemplate/template-native.js"></script>
	<style>
		.formBox{
			margin-left: 30px;
			width: 500px;
			line-height: 50px;
			border-radius: 10px;
			box-shadow: 0 0 5px #563d7c;
			margin-bottom: 30px;
		}
		.searchBox{
			margin-left: 33px;
			width: 500px;
			height: 60px;
			line-height: 60px;
			border: 1px solid #0069d9;
			border-radius: 12px;
			box-shadow: 0 0 5px #0069d9;
		}
		.searchBox form{
			
		}
		.searchBox form select{
			height: 33px;
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
			<p>当前位置：<i class="fa fa-users" aria-hidden="true"></i>&nbsp首页-->课程管理-->修改课程</p>
			<hr>
			<form action="couModiDeal.php" method="get">
				<table class="table table-hover" >
					<thead>
				        <tr>
				            <th scope="col"></th>
				            <th scope="col"></th>
				        </tr>
				    </thead>
					<tbody class="dataContent">
					    <tr>
						    <th scope="row">课程编码</th>
						    <td><input name="c_code" type="text" placeholder="<?php echo $res['c_code'] ?>"></td>
						    <th scope="row">课程名称</th>
						    <td><input name="c_name" type="text" placeholder="<?php echo $res['c_name'] ?>"></td>
					    </tr>
						<tr>
						    <th scope="row">适用年级</th>
						    <td><input name="c_grade" type="text" placeholder="<?php echo $res['c_grade'] ?>"></td>
						    <th scope="row">适用专业</th>
						    <td><input name="major_name" type="text" placeholder="<?php echo $res['major_name'] ?>"></td>
					    </tr>
						<tr>
						    <th scope="row">学期</th>
						    <td><input name="c_term" type="text" placeholder="<?php echo $res['c_term'] ?>"></td>
						    <th scope="row">学分</th>
						    <td><input name="c_point" type="text" placeholder="<?php echo $res['c_point'] ?>"></td>
					    </tr>
						<tr>
						    <th scope="row">周学时</th>
						    <td><input name="c_weekh" type="text" placeholder="<?php echo $res['c_weekh'] ?>"></td>
						    <th scope="row">起止周</th>
						    <td><input name="c_week" type="text" placeholder="<?php echo $res['c_week'] ?>"></td>
					    </tr>
						<tr>
						    <th scope="row">总学时</th>
						    <td><input name="c_totalh" type="text" placeholder="<?php echo $res['c_totalh'] ?>"></td>
					    </tr>
						<tr>
						    <th scope="row">课程类型</th>
						    <td>
								<select name="c_type" id="">
									<option value="专业核心课">专业核心课</option>
									<option value="专业基础课">专业基础课</option>
								</select>
						    </td>
						    <th scope="row">考核方式</th>
						    <td>
								<select name="c_exam" id="">
									<option value="集中考试">集中考试</option>
									<option value="过程考试">过程考试</option>
									<option value="考查考试">考查考试</option>
								</select>		    	
						    </td>
					    </tr>
						<tr>
						    <th scope="row"><button class="btn btn-info">确定修改</button></th>
					    </tr>
					</tbody>
				</table>
			</form>
		</div>
	</div>
	<!-- 1711140136-版权说明 -->
	<div id="footer">
		<li class="fa fa-exclamation-triangle"></li>&nbsp&nbsp<span>版权所有@清华大学教务处 地址：北京市海淀区清华大学12号漏 邮编:100084</span>
	</div>

<!-- 搜索专业的模板引擎 -->
<script type="text/template" id="dataTemplate">

</script>
<script>

</script>
</body>
</html>