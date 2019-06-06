<?php
//  1711140136-引入连接数据库脚本
require_once "../php_note/inc/conn/connSelect.php";
?>


<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $account  = $_POST["account"];
    $password = md5($_POST["password"]);
    $role = $_POST["role"];
    // echo $account."---".$password."-----".$role;
    if ($role === "teacher") {
        $sql = "select * from yefh_te where te_id = '{$account}' and te_pa = '{$password}';";
        $who = "te_name";
    } else {
        $sql = "select * from yefh_stu where stu_id = '{$account}' and stu_pa = '{$password}';";
        $who = "stu_name";
    }
    $query = mysqli_query($connect, $sql);
    if (mysqli_affected_rows($connect) == 1) {
        // 1711140136-查询用户名字
        $row = mysqli_fetch_assoc($query);
        // 1711140136-设置session
        session_start();
        $_SESSION["account"] = $account;
        $_SESSION["password"] = $password;
        $_SESSION["role"] = $role;
        $_SESSION["name"] = $row[$who];
        /* 1711140136-判断数据库里有没有存有自定义头像,没有就用默认的*/
        if($row["avatar"] == "te" || $row["avatar"] == "stu"){
            $_SESSION["avatar"] = "/php_note/inc/upload/" .$row["avatar"] . '.jpg';
        }else{
            $_SESSION["avatar"] = $row["avatar"] . '.jpg';
        }
?>
	<script>
		window.location = 'index.php';
        alert('<?php echo $account ?>登录成功');
	</script>
<?php
    }else{
?>
	<script>
		alert('<?php echo $account ?>登录失败');
		window.location = '../login.html';
	</script>
<?php
    }
}
?>