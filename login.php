<?php
include "auth.php";
session_start();
if (isset($POST["signin"])){
	$login = $_POST["login"];
	$passwd = $_POST["passwd"];
	if (auth($login, $passwd)){
		$_SESSION["loggedin"]["login"] = $login;
		$_SESSION["loggedin"]["passwd"] = $passwd;
		header("Location: success.php");
	}
	else{
		echo "<script type=\"text/javascript\">
            alert('Invalid Username or Password!')
            </script>";
		header("Location: login.php");
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
	<body>
		<form method="POST" action="login.php">
			Username: <br />
			<input type="text" name="login"><br />
			Password: <br />
			<input type="password" name="passwd"><br />
			<input type="submit" value="Sign In" name="signin"><br /><br />
			<p>Don't have an account? <a href="register.php">Register.</a></p>
		</form>
	</body>
</html>