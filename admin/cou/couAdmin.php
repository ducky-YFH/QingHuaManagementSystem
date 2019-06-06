<?php
// 引入session
require_once "../adminSession/session.php";
// 连接数据库用户，必须
require_once "../../php_note/inc/conn/connSelect.php";
// 必须要有，请自行创建queryData.php查询代码
require_once "../CommonFunction/queryData.php";

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
			<p>当前位置：<i class="fa fa-users" aria-hidden="true"></i>&nbsp首页-->课程管理</p>
			<hr>
			<h5 style="margin-left: 31px;text-shadow: 0px 1px 2px #563d7c;">批量导入课程（课程ID不允许重复）：</h5>	
			<form action="couAdd.php" method="post" enctype="multipart/form-data" class="formBox">
				<input type="file" name="upExcel">
				<button class="btn btn-primary">确定</button>
				<a href="../../php_note/inc/excelFIle/downCouTemp.xls" class="btn btn-primary">下载模板</a>
			</form>
			<h5 style="margin-left: 31px;text-shadow: 0px 1px 1px #0069d9;">查询课程</h5>
			<div class="searchBox">
				<form action="">
					<label for="">学期</label>
					<select name="term" id="">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
					<label for="">系：</label>
					<select name="dep" id="">
						<?php 
							$sql = "select dep_name from yefh_dep";
							$res = mysql_search($sql,$connect);
							foreach ($res as $item) {
						?>
							<option value="<?php echo $item["dep_name"] ?>"><?php echo $item["dep_name"] ?></option>
						<?php
							}
						 ?>
					</select>
					<button type="button" class="depBtn btn btn-primary" style="height:33px;line-height: 20px;margin-top: -5px">查询</button>
				</form>
			</div>
			<div class="searchBox" style="margin-top: 10px">
				<form action="">
					<label for="">按专业查询>>专业：</label>
					<select name="major" id="">
						<?php 
							$sql = "select major_name from yefh_major";
							$res = mysql_search($sql,$connect);
							foreach ($res as $item) {
						?>
								<option value="<?php echo $item['major_name'] ?>"><?php echo $item['major_name'] ?></option>
						<?php
							}
						 ?>
					</select>
					<button type="button" class="majorBtn btn btn-primary" style="height:33px;line-height: 20px;margin-top: -5px">查询</button>
				</form>
			</div>
			<table class="table table-hover" >
				<thead>
			        <tr>
			            <th scope="col">课程ID</th>
			            <th scope="col">课程名称</th>
			            <th scope="col">开课学期</th>
			            <th scope="col">学分</th>
			            <th scope="col">周课时</th>
			            <th scope="col">起止周</th>
			            <th scope="col">课程类型</th>
			            <th scope="col">考核方式</th>
			            <th scope="col">开课专业</th>
			            <th scope="col">适合年级</th>
			            <th scope="col">操作</th>
			        </tr>
			    </thead>
				<tbody class="dataContent">
<!-- 				    <tr>
					    <th scope="row"></th>
					    <td></td>
					    <td></td>
					    <td></td>
					    <td></td>
					    <td></td>
					    <td></td>
					    <td></td>
					    <td></td>
					    <td></td>
					    <td></td>
				    </tr> -->
				</tbody>
			</table>
		</div>
	</div>
	<!-- 1711140136-版权说明 -->
	<div id="footer">
		<li class="fa fa-exclamation-triangle"></li>&nbsp&nbsp<span>版权所有@清华大学教务处 地址：北京市海淀区清华大学12号漏 邮编:100084</span>
	</div>

<!-- 搜索专业的模板引擎 -->
<script type="text/template" id="dataTemplate">
	<% for(var i=0; i < success.length ; i++ ){ %>
	<tr>
		<th scope="row"><%=success[i].c_code%></th>
		<td><%=success[i].c_name%></td>
		<td><%=success[i].c_term%></td>
		<td><%=success[i].c_point%></td>
		<td><%=success[i].c_weekh%></td>
		<td><%=success[i].c_week%></td>
		<td><%=success[i].c_type%></td>
		<td><%=success[i].c_exam%></td>
		<td><%=success[i].major_name%></td>
		<td><%=success[i].c_grade%></td>
		<td><a href="couDel.php?c_code=<%=success[i].c_code%>">删除</a>|<a href="couModi.php?c_code=<%=success[i].c_code%>">修改</a></td>
	</tr>
	<% } %>
</script>
<script>
	$(function(){
		$(".depBtn").on("click",function(){
			var $term = $("[name=term]").val();
			var $dep = $("[name=dep]").val();
			$.ajax({
				url: 'couSearch.php',
				type: 'get',
				dataType: 'json',
				data: {term: $term,dep:$dep},
				success: function(data){
					console.log(data);
					//引用模板引擎
					if(data.success){
						$(".dataContent").html(template("dataTemplate",data));
					}else{
						$(".dataContent").html("没有数据！");
					}
				}
			})
		})
		$(".majorBtn").on("click",function(){
			var $major = $("[name=major]").val();
			$.ajax({
				url: 'couSearch.php',
				type: 'get',
				dataType: 'json',
				data: {major: $major},
				success: function(data){
					console.log(data);
					//引用模板引擎
					if(data.success){
						$(".dataContent").html(template("dataTemplate",data));
					}else{
						$(".dataContent").html("没有数据！");
					}
				}
			})
		})
	})
</script>
</body>
</html>