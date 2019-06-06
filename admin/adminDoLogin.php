<?php 

// 引入登录数据库用户
require_once "../php_note/inc/conn/connSelect.php";
// 登录成功就跳转页面，并且设置session,登录失败返回这里
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username  = $_POST["username"];
    $password = md5($_POST["password"]);
    // echo $account."---".$password."-----".$role;
    $sql = "select * from yefh_back where admin_name = '{$username}' and admin_pa = '{$password}';";
    $query = mysqli_query($connect, $sql);
    if (mysqli_affected_rows($connect) == 1) {
        // 1711140136-查询用户名字
        $row = mysqli_fetch_assoc($query);
        // 1711140136-设置session
        session_start();
        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;
        $jsonValue = array('success' => true);
        $jsonValue = json_encode($jsonValue);
    }else{
        $jsonValue = array('error' => '1001');
        $jsonValue = json_encode($jsonValue);
    }
    header("Content-Type: application/json");
    echo $jsonValue;
}
 ?>