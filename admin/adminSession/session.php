<?php  
session_start();
if ($_SESSION["username"] == null) {
	header("Location: ../adminLogin.php");
}
?>