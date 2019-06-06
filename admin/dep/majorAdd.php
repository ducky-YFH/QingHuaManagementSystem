<?php 
	require_once "../adminSession/session.php";
	require_once "../../vendor/autoload.php";
	require_once "../../php_note/inc/conn/connInsert.php";
	require_once "../CommonFunction/queryData.php";
	use PhpOffice\PhpSpreadsheet\IOFactory;
	//----------------------------1711140136-上传excel文件----------------------------
	@$excelFile = $_FILES["upExcel"];
	if(isset($excelFile)){
	    $targetPath = "../../php_note/inc/upload/excel/uploadMajor.xls";
	    @move_uploaded_file($excelFile["tmp_name"],$targetPath);
	}
	//----------------------------1711140136-上传excel文件----------------------------
    //1711140136-准备excel文件
    $file = "../../php_note/inc/upload/excel/uploadMajor.xls";
    $spreadSheet = IOFactory::load($file);
    //1711140136-读取第一张表
    $SheetOne = $spreadSheet->getSheet(0);
    //1711140136-统计excel有多少条数据
    $sum = $SheetOne->getHighestRow();
    $sql = "insert into yefh_major values";
    // 统计一共有多少条专业数据
    $count = 0;
    insertData($sql,$SheetOne,$sum,$connect,$count);
    function insertData($sql,$SheetOne,$sum,$connect,$count){
        $okCount = 0;
        $falseCount = 0; 
        //1711140136-读取所有信息    
        for ($i=2; $i<$sum+1; $i++) {
        	$count ++;
            //1711140136-获取专业名称
            $majorName = $SheetOne->getCell("A$i")->getValue();
            //1711140136-获取学制
            $majorLength = $SheetOne->getCell("B$i")->getValue();
            //1711140136-获取二级学院
            $depName = $SheetOne->getCell("C$i")->getValue();
            //1711140136-如果学生最后一行数据为空就中断循环
            if ($depName == null)
            {
                break;
            }
            //1711140136-拼接插入字符串
            $sql .= "('{$majorName}','{$majorLength}','{$depName}');";
            mysqli_query($connect,$sql);
            if(mysqli_affected_rows($connect) == 1){
                $okCount ++;
            }else{
                $falseCount ++;
            }
            unset($majorName);
            unset($majorLength);
            unset($depName);
            $sql = "insert into yefh_major values";
        }
        ?>
            <script>
                alert("成功插入<?php echo $okCount ?>数据，<?php echo $falseCount ?>数据插入失败");
                window.location = 'majorAdmin.php';
            </script>
        <?php
    }
?>