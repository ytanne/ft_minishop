<?php
include ("dbmanipulate.php");
session_start();
$GLOBALS["dbhost"] = 'remotemysql.com:3306';
$GLOBALS["dbuser"] = 'A8DC7p12Ba';
$dbhost = $GLOBALS["dbhost"];
$dbuser = $GLOBALS["dbuser"];
$dbpass = $GLOBALS["dbpass"];
$connection = connect_to_db();
$errors = array();

if (isset($_POST["reg_user"]))
{
	// Receive all info
	$username = mysqli_real_escape_string($connection, $_POST["username"]);
	$pass = mysqli_real_escape_string($connection, $_POST["pass"]);
	$pass = hash("whirlpool", $pass);
	$conpass = mysqli_real_escape_string($connection, $_POST["conpass"]);
	$conpass = hash("whirlpool", $conpass);
	// Error handling stuff
	if (empty($username))
		array_push($errors, "Username is required!");
	if (empty($pass))
		array_push($errors, "Password is required!");
	if ($pass != $conpass)
		array_push($errors, "The passwords do not match!");
	// Check the DB to make sure a user does not already exists with the same username
	$user_check_query = "SELECT * FROM user_accounts WHERE user_login='$username'";
	$result = mysqli_query($connection, $user_check_query);
	if (mysqli_num_rows($result) == 1)
		array_push($errors, "Username already exists!");
	if (count($errors) == 0){
		$data = array();
		$data["user_login"] = $username;
		$data["user_password"] = $pass;
		insert_user_info($connection, $data);
		$_SESSION["username"] = $username;
		$_SESSION["loggedin"] = "You are now logged in.";
		header("Location: success.php");
	}
}

// Login user
if (isset($_POST["login_user"]))
{
	$username = mysqli_real_escape_string($connection, $_POST["username"]);
	$pass = mysqli_real_escape_string($connection, $_POST["pass"]);
	$pass = hash("whirlpool", $pass);
	if (empty($username))
		array_push($errors, "Username is required!");
	if (empty($pass))
		array_push($errors, "Password is required!");
	if (count($errors) === 0)
	{
		$query = "SELECT * FROM user_accounts WHERE user_login='$username' AND user_pass='$pass'";
		$result = mysqli_query($connection, $query);
		if (!$result)
    		die(mysqli_error($connection));
		if (mysqli_num_rows($result) == 1)
		{
			$_SESSION["username"] = $username;
			$_SESSION["loggedin"] = "You are now logged in.";
			header("Location: success.php");
		}
		else
			array_push($errors, "Wrong Username/Password!");
	}
}

?>