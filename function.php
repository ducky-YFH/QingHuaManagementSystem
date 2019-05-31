<?php 
/**
 * 1711140136-封装公用的函数
 * 2019.4.4
 */

/**
 *  封装数据库函数(获取数据库的数据)
 *  return 为数组类型
 */
function mysql_search($sql){
	$connect = mysqli_connect("127.0.0.1","root","123456","yefh_school");
	//查询语句
	if(!$connect){
		exit('连接失败');
	}
	$query = mysqli_query($connect,$sql);
	if(!$query){
		exit("查询语句有错");
	}
	while ($row = mysqli_fetch_assoc($query)) {
		$rows[] = $row;
	}
	mysqli_free_result($query);
	mysqli_close($connect);
	if(empty($rows)){
		return;
	}
	return $rows;
}

// 连接数据库
$connect = mysqli_connect("127.0.0.1", "root", "123456", "yefh_school");
if (!$connect) {
    die('连接数据库失败: ' . mysql_error());
}
?>