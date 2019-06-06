<?php

require_once "../adminSession/session.php";
require_once "../../php_note/inc/conn/connUpdate.php";

$sql = "update yefh_course set ";

foreach ($_GET AS $key=>$value)
{
	if($value !== ""){
		$sql .= $key . "=" . "'" . $value . "'"  . ",";
	}
}
$sql = substr($sql, 0 , strlen($sql)-1);
mysqli_query($connect,$sql);
if(mysqli_affected_rows($connect) > 0){
	?>
	<script>
		window.location = "couAdmin.php";
		alert("更改数据成功！");
	</script>
	<?php
}else{
	?>
	<script>
		window.location = "couAdmin.php";
		alert("更爱数据失败！");
	</script>
	<?php

}


?>