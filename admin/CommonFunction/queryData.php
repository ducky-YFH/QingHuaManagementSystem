<?php 

function mysql_search($sql,$connect){
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
	// mysqli_close($connect);
	if(empty($rows)){
		return;
	}
	return $rows;
}
?>