<?php 
    require_once "../adminSession/session.php";
    require_once "../../vendor/autoload.php";
    require_once "../../php_note/inc/conn/connInsert.php";
    use PhpOffice\PhpSpreadsheet\IOFactory;
    //----------------------------1711140136-上传excel文件----------------------------
    @$excelFile = $_FILES["upExcel"];
    if(isset($excelFile)){
        $targetPath = "../../php_note/inc/upload/excel/uploadCou.xls";
        @move_uploaded_file($excelFile["tmp_name"],$targetPath);
    }
    //----------------------------1711140136-上传excel文件----------------------------
    //1711140136-准备excel文件
    $file = "../../php_note/inc/upload/excel/uploadCou.xls";
    date_default_timezone_set('PRC');
    $spreadSheet = IOFactory::load($file);
    //1711140136-读取第一张表
    $SheetOne = $spreadSheet->getSheet(0);
    //1711140136-统计excel有多少条数据
    $sum = $SheetOne->getHighestRow();
    $count = 0;
    for ($i=3; $i <=$sum ; $i++) {
        $c_code = $SheetOne->getCell("A$i")->getValue();
        $c_name = $SheetOne->getCell("B$i")->getValue();
        $c_grade = $SheetOne->getCell("C$i")->getValue();
        $major_name = $SheetOne->getCell("D$i")->getValue();
        $c_term = $SheetOne->getCell("E$i")->getValue();
        $c_point = $SheetOne->getCell("F$i")->getValue();
        $c_weekh = $SheetOne->getCell("G$i")->getValue();
        $c_week = $SheetOne->getCell("H$i")->getValue();
        $c_totalh = $SheetOne->getCell("I$i")->getValue();
        $c_type = $SheetOne->getCell("J$i")->getValue();
        $c_exam = $SheetOne->getCell("K$i")->getValue();
        $sql = "select c_code from yefh_course
                where yefh_course.c_code = '$c_code'";
        $couRe = mysqli_query($connect,$sql);
        $couRow = mysqli_fetch_array($couRe);
        if ($c_code == null) {
            break;
        }
        if ($c_code == $couRow["c_code"]) {
            continue;
        }
        $sql = "insert into yefh_course(c_id,c_code,c_name,c_grade,major_name,c_term,c_point,c_weekh,c_week,c_totalh,c_type,c_exam)
                values 
                (null,'$c_code','$c_name','$c_grade','$major_name','$c_term','$c_point','$c_weekh','$c_week','$c_totalh','$c_type','$c_exam');";
        $re = mysqli_query($connect,$sql);
        $count += 1;
    }
    if($count >= 1)
    {
        ?>
        <script type="text/javascript">
        alert("成功插入<?=$count?>条记录!");
        window.history.back();
        </script>
        <?php
    }
    else{
        ?>
        <script type="text/javascript">
        alert("插入记录失败！");
        window.history.back();
        </script>
        <?php
    }
?>