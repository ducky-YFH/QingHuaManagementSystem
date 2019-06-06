<?php

include "../API/LoginSession.php";
require_once "../../function.php";

if($_SERVER["REQUEST_METHOD"] === "GET"){
    $stuClass = $_GET["stuClass"];
    $courseName = $_GET["courseName"];
    // 查询老师对应班级的信息
    $detailSql = "select yefh_te.te_name,yefh_course.c_name,yefh_task.stu_class,yefh_task.task_term,yefh_course.c_type,yefh_course.c_exam
                from yefh_task
                inner join yefh_course on yefh_task.c_id = yefh_course.c_id
                inner join yefh_te on yefh_te.te_id = yefh_task.te_id
                where yefh_task.stu_class = '{$stuClass}' and yefh_course.c_name = '{$courseName}';";
    $detailRes = mysql_search($detailSql)[0];
    // 查询老师对应班级的学生
    $stuSql = "select yefh_stu.stu_class,yefh_stu.stu_id,yefh_stu.stu_name,yefh_score.sc_final,yefh_score.sc_overall,yefh_course.c_name
                from yefh_score
                inner join yefh_stu on yefh_score.stu_id = yefh_stu.stu_id
                inner join yefh_task on yefh_stu.stu_class = yefh_task.stu_class
                inner join yefh_course on yefh_task.c_id = yefh_course.c_id
                where yefh_stu.stu_class = '{$stuClass}' and yefh_course.c_name = '{$courseName}';";
    $stuRes = mysql_search($stuSql);
    $jsonValue = array("detail"=>$detailRes,"stu"=>$stuRes);
    $jsonValue = json_encode($jsonValue);
    header("Content-Type: application/json");
    echo $jsonValue;
}
