<?php 
	$connect = mysqli_connect("127.0.0.1","insertUser","123456","yefh_school");
	if(!$connect){
		echo "连接数据库失败！";
	}
?>