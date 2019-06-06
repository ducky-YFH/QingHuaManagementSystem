<?php 
    require_once "../adminSession/session.php";
    require_once "../../vendor/autoload.php";
    require_once "../../php_note/inc/conn/connInsert.php";
    require_once "../CommonFunction/queryData.php";
    use PhpOffice\PhpSpreadsheet\IOFactory;
    //----------------------------1711140136-上传excel文件----------------------------
    @$excelFile = $_FILES["upExcel"];
    if(isset($excelFile)){
        $targetPath = "../../php_note/inc/upload/excel/uploadStu.xls";
        @move_uploaded_file($excelFile["tmp_name"],$targetPath);
    }
    //----------------------------1711140136-上传excel文件----------------------------
    //1711140136-准备excel文件
    $file = "../../php_note/inc/upload/excel/uploadStu.xls";
    $spreadSheet = IOFactory::load($file);
    //1711140136-读取第一张表
    $SheetOne = $spreadSheet->getSheet(0);
    //1711140136-统计excel有多少条数据
    $sum = $SheetOne->getHighestRow();
    // 统计一共有多少条数据
    $count = 0;
    insertData($SheetOne,$sum,$connect,$count);
    function insertData($SheetOne,$sum,$connect,$count){
        $okCount = 0;
        $falseCount = 0;
        $falseId = "";
        //1711140136-读取所有信息    
        for ($i=4; $i<$sum+1; $i++) {
            $count ++;
            //1711140136-获取专业名称
            $stuId = $SheetOne->getCell("A$i")->getValue();
            //1711140136-获取学制
            $stuName = $SheetOne->getCell("B$i")->getValue();
            //1711140136-获取二级学院
            $stuClass = $SheetOne->getCell("C$i")->getValue();
            // 1711140136-密码为学号后6位
            $stuPa = md5(substr($stuId,-6));
            //1711140136-如果学生最后一行数据为空就中断循环
            if ($stuId == null)
            {
                break;
            }
            //1711140136-拼接插入字符串
            $sql = "insert into yefh_stu(stu_id,stu_name,stu_pa,stu_class,avatar) 
                    values('{$stuId}','{$stuName}','{$stuPa}','{$stuClass}','stu');";
            mysqli_query($connect,$sql);
            if(mysqli_affected_rows($connect) == 1){
                $okCount ++;
            }else{
                $falseCount ++;
                $falseId .= $stuId . ",";
            }
            echo "<br>";
            unset($majorName);
            unset($majorLength);
            unset($depName);
        }
        ?>
            <script>
                alert("成功插入<?php echo $okCount ?>数据\n<?php echo $falseCount ?>数据插入失败\n失败的学号有：<?php echo $falseId ?>");
                window.location = 'stuAdmin.php';
            </script>
        <?php
    }
?>