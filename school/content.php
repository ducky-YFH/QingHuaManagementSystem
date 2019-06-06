<?php
	// 引入session
	include "./API/LoginSession.php";
	//1711140136导入数据库查询api
	require_once "../php_note/inc/conn/connSelect.php";
	require_once "../function.php";
	// ------------------------171140136-学年、学期、院系查询------------------------
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
				$sql = "select
						 * 
						from 
						yefh_task
						inner join yefh_course on (yefh_course.c_id = yefh_task.c_id)
						inner join yefh_te on (yefh_te.te_id = yefh_task.te_id)
						where yefh_task.task_term = '{$task_term}' and yefh_te.dep_name = '{$dep}';";
				return mysql_search($sql);
			}
 	// ------------------------171140136-班级查询------------------------
			if(isset($_GET["search_class"])){
				$search_res = search_class();
			}
			function search_class(){
				$class_name = $_GET["search_class"];
				$sql = "select
						*
						from 
						yefh_task
						inner join yefh_course on (yefh_course.c_id = yefh_task.c_id)
						inner join yefh_te on (yefh_te.te_id = yefh_task.te_id)
						where stu_class = '{$class_name}';";
				return mysql_search($sql);
			}
	// -------------------------171140136-课程查询-------------------------
			if(isset($_GET["search_course"])){
				$search_res = search_course();
			}
			function search_course(){
				$course_name = $_GET["search_course"];
				$sql = "select 
						* 
						from 
						yefh_course
						inner join yefh_task on (yefh_course.c_id = yefh_task.c_id)
						inner join yefh_te on (yefh_task.te_id = yefh_t
						e.te_id)
						where c_name = '{$course_name}';";
				return mysql_search($sql);
			}

	// --------------------------171140136-老师查询----------------------------				
		if(isset($_GET["search_te"])){
			$search_res = search_te();
		}
		// 1711140136-单个老师查询函数
		function search_te(){
			$te_name = $_GET["search_te"];
			// 1711140136-关联查询
			$sql = "select 
					* 
					from 
					yefh_te 
					inner join yefh_task on (yefh_task.te_id = yefh_te.te_id)
					inner join yefh_course on (yefh_course.c_id = yefh_task.c_id)
					where te_name = '{$te_name}';";
			// 1711140136- 将数据库查询封装到了一个公用函数脚本了
			return mysql_search($sql); 
		}
	// ---------------------1711140136-“系”联动班级的下拉菜单的事件驱动---------------------
		// if(isset($_GET["dep"])){
		// 	$DepName = $_GET["dep"];
		// 	// 1711140136-关联查询
		// 	$sql = "select
		// 			yefh_class.stu_class
		// 			from yefh_dep
		// 			inner join yefh_major on(yefh_dep.dep_name = yefh_major.dep_name)
		// 			inner join yefh_class on(yefh_class.major_name = yefh_major.major_name)
		// 			where yefh_dep.dep_name = '{$DepName}';";
		// 	$SearchRes = mysql_search($sql);
		// 	$json = json_encode($SearchRes);
		// 	header("content-type:application/json;charset=utf-8");
		// 	echo $json;
		// }
 ?>

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
	}else{
	?>
		<tr>
			<td colspan="8"><?php echo "查询为空" ?></td>
		</tr>
	<?php
	}
	?>
	</tbody>
</table>