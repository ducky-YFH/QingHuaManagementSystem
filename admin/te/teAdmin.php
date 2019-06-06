<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>清华大学教务管理系统教师管理</title>
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
			<a href=../admin.php">
				<img src="../../php_note/inc/pic/logo_1.svg" alt="">
				<span>教务管理系统后台管理</span>	
			</a>
		</div>
	</div>
	<!-- 1711140136-导航栏(教师成绩录入、教学任务查询、学生成绩查询、学生课表查询、用户设置、注销) -->
	<div id="top-nav">
		<div class="content">
			<ul>
				<li><a href="../admin.php">菜单管理</a></li>
				<li><a href="../dep/depAdmin.php">二级学院管理</a></li>
				<li><a href="../te/teAdmin.php">教师管理</a></li>
				<li><a href="../stu/stuAdmin.php">学生管理</a></li>
				<li><a href="../cou/couAdmin.php">课程管理</a></li>
				<li><a href="taskAdmin.html">教学任务管理</a></li>
				<li><a href="">注销</a></li>
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
	<!-- 教师列表 -->
	<div id="stu_table">
		<div class="content">
			<p>当前位置：<i class="fa fa-users" aria-hidden="true"></i>&nbsp后台-教师管理</p>
			<hr>

			<table class="table table-hover">
			教室列表
				<thead>
					    	<tr>
							    <th scope="col">序号</th>
							    <th scope="col">教师工号</th>
							    <th scope="col">老师姓名</th>
							    <th scope="col">所属二级学生</th>
							    <th scope="col">操作</th>
							    
						 	</tr>
			    </thead>

				<tbody>
			        <tr>
						    <th scope="row">1</th>
						    <td>2005100046</td>
						    <td>王焕军</td>
						    <td>应用外语学院</td>
						    <td>修改删除</td>
					    </tr>
					    <tr>
						    <th scope="row">2</th>
						    <td>2006100057</td>
						    <td>黄哲</td>
						    <td>公共教学部</td>
						    <td>修改删除</td>
					    </tr>
					    <tr>
						    <th scope="row">3</th>
						    <td>2007300024</td>
						    <td>桂荣枝</td>
						    <td>计算机学院</td>
						    <td>修改删除</td>
					    </tr>
					    <tr>
						    <th scope="row">3</th>
						    <td>2007300024</td>
						    <td>王秀兰</td>
						    <td>计算机学院</td>
						    <td>修改删除</td>
					    </tr>
					    <tr>
						    <th scope="row">3</th>
						    <td>2007300024</td>
						    <td>彭程</td>
						    <td>计算机学院</td>
						    <td>修改删除</td>
					    </tr>
					    <tr>
						    <th scope="row">3</th>
						    <td>2007300024</td>
						    <td>李丹</td>
						    <td>计算机学院</td>
						    <td>修改删除</td>
					    </tr>
				</tbody>
			</table>
		</div>
		<!-- 教师信息 -->
		<form>
		<p>途径1：添加1位教师账号</p>
					老师工号：
					<select name="">
								<option value="">2001</option>
								<option value="">2002</option>
								<option value="">2003</option>
								<option value="">2004</option>
								<tr><input type="submit" class=""  value="查看工号是否重复"></tr>
					</select>
		</form>

		<from>
					老师姓名：
					<select name="">
								<option value="">桂荣枝</option>
								<option value="">唐琪</option>
								<option value="">汪未明</option>
					</select>
		</from>	
		<form>
					所属二级学院
					<select name="">
								<option value="">--请选择二级学院--</option>
								<option value="">计算机学院</option>
								<option value="">软件学院</option>
								<option value="">应用外语学院</option>
								<option value="">管理学院</option>
								<option value="">中德学院</option>
					</select>
		</form>			
					<tr><input type="submit" class=""  value="确定"></tr>
					<tr><input type="submit" class=""  value="重置"></tr>
		
	</div>
	<!-- 1711140136-版权说明 -->
	<div id="footer">
		<li class="fa fa-exclamation-triangle"></li>&nbsp&nbsp<span>版权所有@清华大学教务处 地址：北京市海淀区清华大学12号漏 邮编:100084</span>
	</div>
<script>
	
</script>
</body>
</html>