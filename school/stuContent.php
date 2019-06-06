<?php
	// 引入session
	include "./API/LoginSession.php";
	//1711140136导入数据库查询api
	require_once "../php_note/inc/conn/connSelect.php";
	require_once "../function.php";
	// ------------------------171140136-学年、学期、院系、院系查询------------------------
			if(isset($_GET["learn_year"]) && isset($_GET["learn_term"]) && isset($_GET["dep"]) && isset($_GET["class"])){
				$search_res = searchData();
			}
			function searchData(){
				// 1711140136-将客户端提交的学年和学期拼接对应数据库里的格式
				$year = $_GET["learn_year"];  //获取学年
				$new_year1 = substr($year, 2,2); //如19
				$new_year2 = substr($year, 7,2); //如20
				$learn_term = '0' . $_GET["learn_term"];  //01或02  //获取学期
				$task_term = $new_year1 . $new_year2 . $learn_term; 
				// --------------------------
				$dep = $_GET["dep"];  //获取院系
				$class = $_GET["class"]; //获取班级
				$sql = "select yefh_task.task_term,yefh_stu.stu_name,yefh_course.c_name,yefh_course.c_code,yefh_course
								.c_type,yefh_course.c_exam,yefh_score.sc_overall,yefh_course.c_point
								from
								yefh_score
								inner join yefh_stu on yefh_score.stu_id = yefh_stu.stu_id
								inner join yefh_task on yefh_stu.stu_class = yefh_task.stu_class
								inner join yefh_course on yefh_task.c_id = yefh_course.c_id
								inner join yefh_dep
								where yefh_task.task_term = 181902 and yefh_dep.dep_name = '{$dep}' and yefh_task.stu_class = '{$class}'";
				return mysql_search($sql);
			}
	// -------------------------171140136-课程查询-------------------------
			if(isset($_GET["course"])){
				$search_res = search_course();
			}
			function search_course(){
				$course_name = $_GET["course"];
				$sql = "select yefh_task.task_term,yefh_stu.stu_name,yefh_course.c_name,yefh_course.c_code,yefh_course
								.c_type,yefh_course.c_exam,yefh_score.sc_overall,yefh_course.c_point
								from
								yefh_score
								inner join yefh_stu on yefh_score.stu_id = yefh_stu.stu_id
								inner join yefh_task on yefh_stu.stu_class = yefh_task.stu_class
								inner join yefh_course on yefh_task.c_id = yefh_course.c_id
								where yefh_course.c_name = '{$course_name}';";
				return mysql_search($sql);
			}
 ?>

<table class="table table-hover">
	<thead>
	  <tr>
	    <th scope="col">学年</th>
	    <th scope="col">学期</th>
	    <th scope="col">姓名</th>
	    <th scope="col">课程名称</th>
	    <th scope="col">课程代码</th>
	    <th scope="col">课程类型</th>
	    <th scope="col">考核方式</th>
	    <th scope="col">总评成绩</th>
	    <th scope="col">补考成绩</th>
	    <th scope="col">重修成绩</th>
	    <th scope="col">学分</th>
	  </tr>
	</thead>
	<tbody>
	<?php if(isset($search_res)){
		foreach ($search_res as $item) {
			$learn_year = substr($item['task_term'],0,4);
			$learn_term = substr($item['task_term'],4,6);
	?>
		<tr>
		    <th scope="row"><?php echo $learn_year ?></th>
		    <td><?php echo $learn_term ?></td>
		    <td><?php echo $item['stu_name'] ?></td>
		    <td><?php echo $item['c_name'] ?></td>
		    <td><?php echo $item['c_code']  ?></td>
		    <td><?php echo $item['c_type'] ?></td>
		    <td><?php echo $item['c_exam'] ?></td>
		    <td><?php echo $item['sc_overall'] ?></td>
		    <td></td>
		    <td></td>
		    <td><?php echo $item['c_point'] ?></td>				
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