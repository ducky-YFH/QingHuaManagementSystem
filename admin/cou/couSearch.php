<?php 

require_once "../adminSession/session.php";
require_once "../../php_note/inc/conn/connSelect.php";
require_once "../CommonFunction/queryData.php";

if(isset($_GET["term"]) && isset($_GET["dep"])){
	$dep = $_GET["dep"];
	$term = $_GET["term"];
	$sql = "select *
			from yefh_course
			inner join yefh_major on yefh_major.major_name = yefh_course.major_name
			where dep_name = '{$dep}' and c_term = '{$term}';";
   	$res = mysql_search($sql,$connect);
   	if($res !== NULL){
		$jsonValue = array("success"=>$res);
   	}else{
		$jsonValue = array("error"=>'1001');
   	}
   	$jsonValue = json_encode($jsonValue);
	header("Content-Type: application/json");
	echo $jsonValue;
}
if(isset($_GET["major"])){
	$major = $_GET["major"];
	$sql = "select yefh_course.* from yefh_course where yefh_course.major_name = '{$major}';";
	$res = mysql_search($sql,$connect);
	if($res !== NULL){
		$jsonValue = array("success"=>$res);
	}else{
		$jsonValue = array("error"=>'1001');
	}
	$jsonValue = json_encode($jsonValue);
	header("Content-Type: application/json");
	echo $jsonValue;
}

?>