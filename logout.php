<?php
	session_start();
	$_SESSION["loggedin"] = "";
	header("Location: login.php");
?>