<?php
require_once "../adminSession/session.php";
require_once "../../php_note/inc/conn/connSelect.php";
require_once "../CommonFunction/queryData.php";

$sql = "select dep_name from yefh_major";
$res = mysqli_query($connect,$sql);
while ($row = mysqli_fetch_array($res))
{
	@$sum[$row[dep_name]] += 1;
}
$sql = "select dep_name from yefh_class,yefh_major
		where yefh_class.major_name = yefh_major.major_name";
$res = mysqli_query($connect,$sql);
while($row = mysqli_fetch_array($res))
{
	@$sumC[$row[dep_name]] += 1;
}
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
	<style>
		.addBtn{
			margin-left: 28px;
		}
		.updateBox{
			width: 100%;
			height: 200px;
			border:1px solid #007bff;
			border-radius: 5px;
			box-shadow: 0 0 3px #007bff; 
		}
		.updateBox input{
			width: 80%;
		}
		.updateBox p{
			color: #007bff;
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
			<p>当前位置：<i class="fa fa-users" aria-hidden="true"></i>&nbsp首页-二级学院管理</p>
			<a class="btn btn-primary addBtn" href="depAdd.php">添加二级学院</a>
			<hr>
			<table class="table table-hover" >
				<thead>
			        <tr>
			            <th scope="col">序号</th>
			            <th scope="col">二级学院名称</th>
			            <th scope="col">专业数</th>
			            <th scope="col">班级数</th>
			            <th scope="col">操作</th>
			            <th scope="col">操作</th>
			        </tr>
			    </thead>
				<tbody>
					<?php
						$i = 1;
						foreach ($sum as $key => $value) {
					?>					
					    <tr>
						    <th scope="row"><?php echo $i ?></th>
						    <td><?php echo $key ?></td>
						    <td><?php echo $value ?></td>
						    <td><?php echo @$sumC[$key] == "" ? 0 : $sumC[$key] ?></td>
						    <td><a href="javascript:;" class="updateDep">修改</a>|<a class="delete" href="javascript:;" data-depName="<?php echo $key ?>">删除</a></td>
						    <td><a href="majorAdmin.php?dep=<?php echo $key ?>">管理专业</a>|<a href="">管理班级</a></td>
					    </tr>
					<?php
						$i++;
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
	<!-- 删除的模态框（Modal） -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					你确定要删除这个学院?
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">关闭
					</button>
					<button type="button" class="DeleteSure btn btn-primary">
						确定
					</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal -->
	</div>
	<!-- 更改院系的模态框 -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<form action="depModiDeal.php" method="get">
				<div class="modal-content">
					<div class="modal-body">
						<h3>二级学院名称修改</h3>
						<div class="updateBox">
							<p>二级学院原名字：</p><input class="form-control" type="text" name="oldName">
							<p>二级学院的新名字：</p><input class="form-control" type="text" name="newName">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">关闭
						</button>
						<button class="updateSure btn btn-primary">
							确定
						</button>
					</div>
				</div><!-- /.modal-content -->
			</form>
		</div><!-- /.modal -->
	</div>
	<!-- 1711140136-版权说明 -->
	<div id="footer">
		<li class="fa fa-exclamation-triangle"></li>&nbsp&nbsp<span>版权所有@清华大学教务处 地址：北京市海淀区清华大学12号漏 邮编:100084</span>
	</div>
	
<script>
	$(function(){
		// 删除院系的代码
		$(".delete").on("click",function(){
			$('#myModal').modal();
			window.depName = $(this).attr("data-depName");
		});
		$(".DeleteSure").on("click",function(){
			// console.log(window.depName);
			$.ajax({
				url: 'depDel.php',
				type: 'get',
				dataType: 'json',
				data: {dep: window.depName},
				success: function(data){
					if(data.success){
						alert("删除二级学院成功！");
						window.location.reload();
					}else{
						alert("删除二级学院失败！");
					}
				}
			})
			$(this).attr("data-dismiss","modal");
		})
		// 更改院系模态框
		$(".updateDep").on('click',function(){
			$("#myModal2").modal();
		})
	})
</script>
</body>
</html>