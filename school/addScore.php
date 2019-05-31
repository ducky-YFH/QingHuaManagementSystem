<?php  
    require_once "./API/LoginSession.php";
    require_once "../vendor/autoload.php";
    require_once "../function.php";
    use PhpOffice\PhpSpreadsheet\IOFactory;
    //----------------------------1711140136-上传excel文件----------------------------
    $excelFile = $_FILES["upExcel"];
    if(isset($excelFile)){
        $targetPath = "../php_note/inc/excelFIle/学生成绩.xls";
        move_uploaded_file($excelFile["tmp_name"],$targetPath);
    }
   //----------------------------1711140136-上传excel文件----------------------------
    //1711140136-准备excel文件
    $file = "../php_note/inc/excelFIle/学生成绩.xls";
    $spreadSheet = IOFactory::load($file);
    //1711140136-读取第一张表
    $SheetOne = $spreadSheet->getSheet(0);
    //1711140136-统计excel有多少个学生
    $sum = $SheetOne->getHighestRow();
    //1711140136-先查询数据库是否为空如果为空就插入数据，否则就更新数据
    $res = mysqli_query($connect,"select sc_id from yefh_score");
    if(mysqli_fetch_assoc($res) === null){
        $sql = "insert into yefh_score
        (task_id,stu_id,sc_final,sc_overall) values ";
        insertData($sql,$SheetOne,$sum,$connect);
    }else{
        updateData($SheetOne,$sum,$connect);
    }
    
    function insertData($sql,$SheetOne,$sum,$connect){
        //1711140136-读取所有信息    
        for ($i=5; $i<$sum; $i++) {
            //1711140136-获取学生id
            $userId = $SheetOne->getCell("B$i")->getValue();
            //1711140136-获取平时成绩
            $UsuallyScore = $SheetOne->getCell("D$i")->getValue();
            //1711140136-获取期末成绩
            $finalScore = $SheetOne->getCell("G$i")->getValue();
            //1711140136-如果学生最后一行数据为空就中断循环
            if ($finalScore == null)
            {
                break;
            }
            //1711140136-拼接插入字符串
            $sql .="(null,$userId,$UsuallyScore,$finalScore),";
            unset($finalScore);
            unset($userId);
        }
        //1711140136-去分号
        $sql = substr($sql, 0 , strlen($sql)-1);
        //1711140136-存数据
        mysqli_query($connect,$sql);
        if(mysqli_affected_rows($connect) !== 0){
            echo '插入数据成功';
        }
    }

    function updateData($SheetOne,$sum,$connect){
        //1711140136-读取所有信息    
        for ($i=5; $i<$sum; $i++) {
            //1711140136-获取学生id
            $userId = $SheetOne->getCell("B$i")->getValue();
            //1711140136-获取平时成绩
            $UsuallyScore = $SheetOne->getCell("D$i")->getValue();
            //1711140136-获取期末成绩
            $finalScore = $SheetOne->getCell("G$i")->getValue();
            //1711140136-如果学生最后一行数据为空就中断循环
            if ($finalScore == null)
            {
                break;
            }
            //1711140136-拼接插入字符串
            $sqlList[] = 
            "update yefh_score
            set 
            sc_final = '{$UsuallyScore}',sc_overall = '{$finalScore}' where stu_id = '{$userId}';";
            unset($finalScore);
            unset($userId);
        }
        // 1711140136-存数据
        for ($i=0; $i < count($sqlList); $i++) { 
            mysqli_query($connect,$sqlList[$i]);
        }
        ?>
            <script>
                alert("更新excel文件成功！");
                location = "te_score_in.php";
            </script>
        <?php
    }
?>