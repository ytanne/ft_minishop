<?php
	session_start();
	if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == false){
		header("Location: login.php");
	}
?>

<html><body>
	<h2>You have logged in!<br />
	<form method="POST" action="success.php">
		<a href="logout.php">Log out</a>
    </form>
</body></html>
