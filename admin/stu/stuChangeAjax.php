<?php

require_once "../../php_note/inc/conn/connUpdate.php";
require_once "../adminSession/session.php";
require_once "../CommonFunction/queryData.php";

if(isset($_GET["dep"])){
	$dep = $_GET["dep"];
	// 查询所有对应的专业
	$sql = "select major_name from yefh_major where dep_name = '{$dep}'";
	$res = mysql_search($sql,$connect);
	if($res !== NULL){
		$jsonValue = array("success"=>$res);
	}else{
		$jsonValue = array("error"=>"1001");
	}
	$jsonValue = json_encode($jsonValue);
	header("Content-Type: application/json");
	echo $jsonValue;
}

if(isset($_GET["major"])){
	$major = $_GET["major"];
	// 查询所有对应的专业
	$sql = "select stu_class from yefh_class where major_name = '{$major}'";
	$res = mysql_search($sql,$connect);
	if($res !== NULL){
		$jsonValue = array("success"=>$res);
	}else{
		$jsonValue = array("error"=>"1001");
	}
	$jsonValue = json_encode($jsonValue);
	header("Content-Type: application/json");
	echo $jsonValue;
}

if(isset($_GET["class"]) && $_GET["stuName"]){
	$class = $_GET["class"];
	$stuName = $_GET["stuName"];
	$sql = "update yefh_stu set stu_class = '{$class}' where stu_name = '{$stuName}'";
	mysqli_query($connect,$sql);
	if(mysqli_affected_rows($connect) > 0){
		$jsonValue = array("success"=>true);
	}else{
		$jsonValue = array("error"=>"1001");
	}
	$jsonValue = json_encode($jsonValue);
	header("Content-Type: application/json");
	echo $jsonValue;
}





?>