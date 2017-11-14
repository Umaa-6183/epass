<?php
session_start();
$_SESSION["username"] = "";
$_SESSION['type']="";
session_destroy();
header("Location: login.php");
?>
