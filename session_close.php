<?php
session_start();
	$_SESSION["id_user"] = "";
	$_SESSION['username'] = "";
	$_SESSION["email"] = "";
	header("location: index.php");
?>