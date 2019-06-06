<?php
    require_once "../vendor/autoload.php";
    use PhpOffice\PhpSpreadsheet\IOFactory;
    include "API/LoginSession.php";
    require_once "../function.php";
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


        //1711140136-准备excel文件
        $file = "../php_note/inc/excelFIle/成绩模板.xls";
        $spreadSheet = IOFactory::load($file);
        //1711140136-读取第一张表
        $SheetOne = $spreadSheet->getSheet(0);
        //1711140136-统计excel有多少个学生
        $sum = $SheetOne->getHighestRow();


        // 获取老师名字
        $teaName = $detailRes["te_name"];
        // 获取班级 
        $className = $detailRes["stu_class"];
        // 获取课程名称
        $courseName = $detailRes["c_name"];
        //1711140136-将数据插入excel
        for ($i=2; $i<$sum; $i++) {
            if($i >= 5){
                $finalScore = $SheetOne->getCell("G$i")->getValue();
                //1711140136-如果学生最后一行数据为空就中断循环
                if ($finalScore == null)
                {
                    break;
                }
                foreach ($stuRes as $item) {
                    // 
                }
            }
            // 写入课程名称
            if($i >=2 && $i < 3){
                $SheetOne->setCellValue("A2",$courseName);
            }
            //  写入班级名称和老师名称
            if($i >= 3 && $i < 4){
                $SheetOne->setCellValue("A3",$className);
                $SheetOne->setCellValue("E3",$teaName);
            }
            unset($finalScore);
        }
    }