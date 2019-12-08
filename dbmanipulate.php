<?php

$GLOBALS["dbhost"] = 'remotemysql.com:3306';
$GLOBALS["dbuser"] = 'A8DC7p12Ba';
$user_db = "user_accounts";

$conn = connect_to_db();
if (check_table_exists($conn, $user_db) === FALSE)
	create_table($conn, $user_db);
$user_data['user_login'] = 'yorazaye';
$user_data['user_password'] = 'FD9D94340DBD72C11B37EBB0D2A19B4D05E00FD78E4E2CE8923B9EA3A54E900DF181CFB112A8A73228D1F3551680E2AD9701A4FCFB248FA7FA77B95180628BB2';
$user_data['user_cookie'] = 'c1d6b72a5a68e5bd323aa6465393c68d';
insert_user_info($conn, $user_data);






function    connect_to_db()
{
	$conn = mysqli_connect($GLOBALS["dbhost"], $GLOBALS["dbuser"], $GLOBALS["dbpass"])
	or die ("Error when connecting to database\n");
	echo ("Connected to database successfully\n");
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
	mysqli_select_db($conn, $GLOBALS["dbuser"]);
	if (!($retval = mysqli_query($conn, $sql)))
		die('Could not create table: ' . mysqli_error($conn));
	echo "Table created successfully\n";
}

function    check_table_exists($conn, $table_name)
{
	echo (mysqli_query($conn, "select 1 from `$table_name` LIMIT 1"));
	/*
	if (!mysqli_query($conn, "select 1 from `$table_name` LIMIT 1"))
		return (FALSE);
	*/
	return (TRUE);
}

function    delete_table($conn, $table_name)
{
	$sql = "DROP TABLE $table_name";
	mysqli_select_db($conn, $GLOBALS["dbuser"]);
	if(!mysqli_query($conn, $sql))
		die('Could not delete table: ' . mysqli_error($conn));
	echo "Table deleted successfully\n";
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
	mysqli_select_db($conn, $GLOBALS["dbuser"]);
	if (!($retval = mysqli_query($conn, $sql)))
		die ('Could not enter data ' . mysqli_error($conn));
	echo ("Data entered successfully\n");
}



?>