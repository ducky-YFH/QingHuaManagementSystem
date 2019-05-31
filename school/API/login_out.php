<?php 
session_start();
unset($_SESSION["account"]);
unset($_SESSION["role"]);
unset($_SESSION["password"]);
unset($_SESSION["name"]);
unset($_SESSION["avatar"]);
header("Location: ../../login.html");
?>