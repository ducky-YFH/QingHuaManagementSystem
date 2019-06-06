<?php 

require_once "../adminSession/session.php";
require_once "../../php_note/inc/conn/connUpdate.php";
require_once "../CommonFunction/queryData.php";

$stuID = $_GET["stu_id"];
//获取班级，重置后跳回到当前班级的页面
$class = $_GET["class"];
//获取学号后六位
$nwePa=md5(substr($stuID,-6));
$sql = "update yefh_stu set stu_pa = '{$nwePa}' where stu_id = '{$stuID}'";
mysqli_query($connect,$sql);
if(mysqli_affected_rows($connect) > 0){
	?>
	<script>
		window.location = 'stuShow.php?class=<?php echo $class ?>';
		alert('重置成功！');
	</script>
	<?php
}else{ 
	?>
	<script>
		window.location = 'stuShow.php?class=<?php echo $class ?>';
		alert('已经重置！');
	</script>
	<?php
}

?>