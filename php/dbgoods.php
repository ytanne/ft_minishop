<?php

$good_table = 'good_table';

function    create_good_table($connection, $good_table)
{
	$sql = "CREATE TABLE $good_table( " .
            "product_id INT NOT NULL AUTO_INCREMENT, " .
            "product_number INT UNSIGNED, " .
            "product_name CHAR(100) NOT NULL, " .
            "product_price INT UNSIGNED, " .
			"product_quantity INT UNSIGNED, " .
			"product_image varchar(30) NOT NULL, " .
            "PRIMARY KEY ( product_id )); ";
	mysqli_query($connection, $sql)
	or die('Could not create table: ' . mysqli_error($connection));
}

function	fill_with_goods($connection, $good_table, $goods)
{
	$goods_number = $goods[0];
	$goods_name = $goods[1];
	$goods_price = $goods[2];
	$goods_quantity = $goods[3];
	$goods_img_url = $goods[4];
	$sql = "INSERT INTO $good_table" .
			"(product_number, product_name, product_price, product_quantity, product_image) " . "VALUES " .
			"('$goods_number','$goods_name','$goods_price', '$goods_quantity', '$goods_img_url')";
	mysqli_query($connection, $sql)
	or die ('Could not enter data ' . mysqli_error($connection));
}

function	get_goods($connection)
{
	$sql = "SELECT * FROM good_table";
	$goods_array = mysqli_fetch_all($connection->query($sql));
	return ($goods_array);
}

?>