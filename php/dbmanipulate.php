<?php

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
            "user_login VARCHAR(100) NOT NULL, " .
			"user_pass VARCHAR(128) NOT NULL, " .
            "PRIMARY KEY ( user_login )); ";
	mysqli_query($conn, $sql)
	or die('Could not create table: ' . mysqli_error($conn));
}

function    create_cart_table($connection, $cart_table)
{
	$sql = "CREATE TABLE $cart_table( " .
            "product_id INT NOT NULL AUTO_INCREMENT, " .
            "product_number INT UNSIGNED, " .
            "product_name CHAR(100) NOT NULL, " .
            "product_price INT UNSIGNED, " .
			"product_quantity INT UNSIGNED, " .
            "PRIMARY KEY ( product_id )); ";
	mysqli_query($connection, $sql)
	or die('Could not create table: ' . mysqli_error($connection));
}

function    check_table_exists($conn, $table_name)
{
	$tables = array_column(mysqli_fetch_all($conn->query('SHOW TABLES')), 0);
	foreach ($tables as $table)
		if ($table === $table_name)
			return (TRUE);
	return (FALSE);
}

function	insert_items_to_cart($conn, $item_data)
{
	$item_id = $item_data['item_id'];
	$item_name = $item_data['item_name'];
	$item_price = $item_data['item_price'];
	$item_quantity = $item_data['item_quantity'];
	$sql = "INSERT INTO cart_table " .
			"(product_number, product_name, product_price, product_quantity) " . "VALUES " .
			"('$item_id','$item_name','$item_price', '$item_quantity')";
	mysqli_query($conn, $sql)
	or die ('Could not enter data ' . mysqli_error($conn));
}

function	delete_item_from_cart($conn, $item_id)
{
	$sql = "DELETE FROM cart_table WHERE product_id = $item_id";
	mysqli_query($conn, $sql)
	or die ('Could not delete from the cart ' . mysqli_error($conn) . "\n");
}

function	clear_cart_table($conn)
{
	$sql = "TRUNCATE TABLE cart_table";
	mysqli_query($conn, $sql)
	or die ('Could not clear the cart ' . mysqli_error($conn) . "\n");
}

function	get_items_from_cart($conn)
{
	$sql = "SELECT * FROM cart_table";
	$cart_items = mysqli_fetch_all($conn->query($sql));
	return ($cart_items);
}

function    delete_table($conn, $table_name)
{
	$sql = "DROP TABLE $table_name";
	mysqli_query($conn, $sql)
	or die('Could not delete table: ' . mysqli_error($conn) . "\n");
}

function	insert_user_info($conn, $user_data)
{
	$user_login = $user_data['user_login'];
	$user_password = $user_data['user_password'];
	$sql = "INSERT INTO user_accounts " .
			"(user_login, user_pass) " . "VALUES " .
			"('$user_login','$user_password')";
	mysqli_query($conn, $sql)
	or die ('Could not enter data ' . mysqli_error($conn) . "\n");
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