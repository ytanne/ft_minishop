<?php
session_start();
$dbhost = "remotemysql.com";
$dbuser = "A8DC7p12Ba";
$dbpass = "DkajEpXTBK";
$connection = mysqli_connect($dbhost, $dbuser, $dbpass) or die ("No connection. Died\n");
$errors = array();
mysqli_select_db($connection, $GLOBALS["dbuser"]);

function	insert_user_info($conn, $user_data)
{

	$user_login = $user_data['user_login'];
	$user_password = $user_data['user_password'];
	$user_cookie = "123";
	$sql = "INSERT INTO user_accounts " .
			"(user_login, user_pass, user_cookie) " . "VALUES " .
			"('$user_login','$user_password','$user_cookie')";
	if (!($retval = mysqli_query($conn, $sql)))
		die ('Could not enter data ' . mysqli_error($conn));
}

if (isset($_POST["reg_user"])){
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
if (isset($_POST["login_user"])){
	$username = mysqli_real_escape_string($connection, $_POST["username"]);
	$pass = mysqli_real_escape_string($connection, $_POST["pass"]);
	$pass = hash("whirlpool", $pass);
	if (empty($username))
		array_push($errors, "Username is required!");
	if (empty($pass))
		array_push($errors, "Password is required!");
	if (count($errors) === 0){
		$query = "SELECT * FROM user_accounts WHERE user_login='$username' AND user_pass='$pass'";
		$result = mysqli_query($connection, $query);
		if (!$result)
    		die(mysqli_error($connection));
		if (mysqli_num_rows($result) == 1){
			$_SESSION["username"] = $username;
			$_SESSION["loggedin"] = "You are now logged in.";
			header("Location: success.php");
	}
		else
			array_push($errors, "Wrong Username/Password!");
	}
}
?>