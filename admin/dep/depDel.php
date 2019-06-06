<?php 
require_once "../../php_note/inc/conn/connDelete.php";
require_once "../CommonFunction/queryData.php";

if(isset($_GET["dep"])){
	$depName = $_GET["dep"];
	$sql = "delete from yefh_dep where dep_name = '{$depName}'";
	mysqli_query($connect,$sql);
	if(mysqli_affected_rows($connect) > 0){
		$jsonVal = array('success' => true);
	}else{
		$jsonVal = array('error' => "1001");
	}
	header('Content-Type: text/json');
	$jsonVal = json_encode($jsonVal);
	echo $jsonVal;
}

?>