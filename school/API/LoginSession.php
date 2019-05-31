<?php 

session_start();
if ($_SESSION["name"] == null) {
	header("Location: ../../login.html");
}


?>