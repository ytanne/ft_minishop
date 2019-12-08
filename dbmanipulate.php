<?php

$GLOBALS["dbhost"] = 'remotemysql.com:3306';
$GLOBALS["dbuser"] = 'A8DC7p12Ba';
$GLOBALS["dbpass"] = 'DkajEpXTBK';
$user_db = "user_accounts";

$conn = connect_to_db();
mysqli_select_db($conn, $GLOBALS["dbuser"]);

if (check_table_exists($conn, $user_db) === FALSE)
	create_table($conn, $user_db);
$user_data['user_login'] = 'yorazaye';
$user_data['user_password'] = 'FD9D94340DBD72C11B37EBB0D2A19B4D05E00FD78E4E2CE8923B9EA3A54E900DF181CFB112A8A73228D1F3551680E2AD9701A4FCFB248FA7FA77B95180628BB2';
$user_data['user_cookie'] = 'c1d6b72a5a68e5bd323aa6465393c68d';
//insert_user_info($conn, $user_data);
check_password($conn, 'yorazaye', '123');
mysqli_close($conn);

function    connect_to_db()
{
	$conn = mysqli_connect($GLOBALS["dbhost"], $GLOBALS["dbuser"], $GLOBALS["dbpass"])
	or die ("Error when connecting to database\n");
	return ($conn);
}

function    create_table($conn, $table_name)
{
	$sql = "CREATE TABLE $table_name( " .
            "user_id INT NOT NULL AUTO_INCREMENT, " .
            "user_login VARCHAR(100) NOT NULL, " .
            "user_pass VARCHAR(128) NOT NULL, " .
            "user_cookie VARCHAR(32) NOT NULL, " .
            "PRIMARY KEY ( user_id )); ";
	$retval = mysqli_query($conn, $sql)
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
	if(! get_magic_quotes_gpc() ) {
		$user_login = addslashes ($user_data['user_login']);
		$user_password = addslashes ($user_data['user_password']);
	}
	else
	{
		$user_login = $user_data['user_login'];
		$user_password = $user_data['user_password'];
	}
	$user_cookie = $user_data['user_cookie'];
	$sql = "INSERT INTO user_accounts " .
			"(user_login, user_pass, user_cookie) " . "VALUES " .
			"('$user_login','$user_password','$user_cookie')";
	$retval = mysqli_query($conn, $sql)
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

function	check_cookie($conn, $user, $cookie)
{
	$sql = "SELECT user_login, user_cookie FROM user_accounts WHERE user_login = '$user'";
	$user_credentials = mysqli_fetch_all($conn->query($sql));
	print_r($user_credentials);
}

?>