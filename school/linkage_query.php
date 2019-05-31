<?php 
		require_once "../function.php";
		// 引入session
		include "./API/LoginSession.php";
		if(isset($_GET["dep"])){
			$DepName = $_GET["dep"];
			// 1711140136-查询班级
			$class_sql = "select
					yefh_class.stu_class
					from yefh_dep
					inner join yefh_major on(yefh_dep.dep_name = yefh_major.dep_name)
					inner join yefh_class on(yefh_class.major_name = yefh_major.major_name)
					where yefh_dep.dep_name = '{$DepName}';";
			$class_res = mysql_search($class_sql);
			// 1711140136因为在array_merge()函数里如果有空的数组就会警告并且显示为NULL所以对空的结果转换为空数组
			if(empty($class_res)){
				// 1711140136再加一个array是为了对应有结果的数组，因为它是[[{}],[{}],[{}]]这样的格式的
				$class_res = array(array('stu_class' => '')); // 不加多一个array是这样的结果的[{}];
			}
			// 1711140136-查询课程
			$course_sql = "select
					yefh_course.c_name
					from yefh_dep
					inner join yefh_major on(yefh_dep.dep_name = yefh_major.dep_name)
					inner join yefh_course on(yefh_major.major_name = yefh_course.major_name)
					where yefh_dep.dep_name = '{$DepName}';";
			$course_res = mysql_search($course_sql);	
			if(empty($course_res)){
				$course_res =array(array('c_name' => ''));
			}
			// 1711140136-查询老师		
			$te_sql = "select
						yefh_te.te_name
						from yefh_te
						where yefh_te.dep_name = '{$DepName}';";
			$te_res = mysql_search($te_sql);
			if(empty($te_res)){
				$te_res = array(array('te_name' => ''));
			}
			// 1711140136数组合并
			$Res = array_merge($class_res,$course_res,$te_res); 
			header('Content-Type: text/json');
			$json = json_encode($Res);
			echo $json;
		}
 ?>