<?php

$GLOBALS["dbhost"] = 'remotemysql.com:3306';
$GLOBALS["dbuser"] = 'A8DC7p12Ba';
$GLOBALS["dbpass"] = 'DkajEpXTBK';

function    connect_to_db()
{
	$connection = mysqli_connect($GLOBALS["dbhost"], $GLOBALS["dbuser"], $GLOBALS["dbpass"])
	or die ("Error when connecting to database\n");
	mysqli_select_db($connection, $GLOBALS["dbuser"]);
	return ($connection);
}

function    create_user_table($conn, $table_name)
{
	$sql = "CREATE TABLE $table_name( " .
            "user_id INT NOT NULL AUTO_INCREMENT, " .
            "user_login VARCHAR(100) NOT NULL, " .
            "user_pass VARCHAR(128) NOT NULL, " .
            "PRIMARY KEY ( user_id )); ";
	mysqli_query($conn, $sql)
	or die('Could not create table: ' . mysqli_error($conn));
}

function    check_table_exists($conn, $table_name)
{
	$tables = array_column(mysqli_fetch_all($conn->query('SHOW TABLES')), 0);
	foreach ($tables as $table)
		if ($table === $table_name)
			return (TRUE);
	return (FALSE);
}

function    delete_table($conn, $table_name)
{
	$sql = "DROP TABLE $table_name";
	mysqli_query($conn, $sql)
	or die('Could not delete table: ' . mysqli_error($conn));
}

function	insert_user_info($conn, $user_data)
{
	$user_login = $user_data['user_login'];
	$user_password = $user_data['user_password'];
	$sql = "INSERT INTO user_accounts " .
			"(user_login, user_pass) " . "VALUES " .
			"('$user_login','$user_password','$user_cookie')";
	mysqli_query($conn, $sql)
	or die ('Could not enter data ' . mysqli_error($conn));
}

function	check_user_in_db($conn, $username)
{
	$sql = 'SELECT user_login FROM user_accounts';
	$user_logins = array_column(mysqli_fetch_all($conn->query($sql)), 0);
	if (array_search($username, $user_logins) === FALSE)
		return (FALSE);
	return (TRUE);
}

function	check_password($conn, $user, $password)
{
	$sql = "SELECT user_login, user_pass FROM user_accounts WHERE user_login = '$user'";
	$user_credentials = mysqli_fetch_all($conn->query($sql));
	print_r($user_credentials);
}

?>