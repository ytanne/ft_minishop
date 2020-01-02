<?php
include("php/dbmanipulate.php");

$user_db = "user_accounts";
$goods_db = "good_table";
$cart_db = "cart_table";

$conn = connect_to_db();
$GLOBALS["connection"] = $conn;
mysqli_select_db($conn, $GLOBALS["dbuser"]);

if (check_table_exists($conn, $user_db) === FALSE)
	create_user_table($conn, $user_db);
if (check_table_exists($conn, $goods_db) === FALSE)
{
	fill_with_goods($connection, $good_table, array("1", "Holy Stone HS720 Foldable GPS Drone with 2K FHD Camera", "100", "4", "https://tinyurl.com/twml6og"));
	fill_with_goods($connection, $good_table, array("2", "Nintendo Switch with Neon Blue and Neon Red Joy‑Con", "100", "4", "https://tinyurl.com/twml6og"));
	fill_with_goods($connection, $good_table, array("3", "Oculus Rift S PC-Powered VR Gaming Headset", "100", "5", "https://tinyurl.com/thmsoak"));
	fill_with_goods($connection, $good_table, array("4", "Little Tikes 3 Trampoline", "100", "4", "https://tinyurl.com/tyrjo2g"));
	fill_with_goods($connection, $good_table, array("5", "Rally and Roar Foosball Tabletop Game", "100", "4", "https://tinyurl.com/u8txgq9"));
	fill_with_goods($connection, $good_table, array("6", "MindKoo Bluetooth Headphones Wireless Over Ear Cat Ear", "100", "4", "https://tinyurl.com/qsm8ka4"));
	fill_with_goods($connection, $good_table, array("7", "Makartt Portable Gel Nail Polish Organizer", "100", "4", "https://tinyurl.com/t95l8dy"));
	fill_with_goods($connection, $good_table, array("8", "Matney Stealing Coin Cat Box", "100", "5", "https://tinyurl.com/ukryy25"));
	fill_with_goods($connection, $good_table, array("9", "RIMABLE Complete 22 Inches Skateboard", "100", "5", "https://tinyurl.com/yx87hl3t"));
	fill_with_goods($connection, $good_table, array("10", "LETSCOM Smart Watch Fitness Tracker", "100", "3", "https://tinyurl.com/ulnlghm"));
	fill_with_goods($connection, $good_table, array("11", "True Wireless Earbuds Bluetooth 5.0 Headphones", "100", "6", "https://tinyurl.com/wmbdal9"));
	fill_with_goods($connection, $good_table, array("12", "Arcade Classics - Pac-Man Retro Mini Arcade Game", "100", "7", "https://tinyurl.com/wc8rmhx"));
}
if (check_table_exists($conn, $cart_db) === FALSE)
{
	echo ("im here mf\n");
	create_cart_table($conn);
}
else
	clear_cart_table($conn);

?>