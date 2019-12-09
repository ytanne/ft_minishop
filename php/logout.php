<?php
session_start();
include("dbmanipulate.php");
$GLOBALS["dbhost"] = 'remotemysql.com:3306';
$GLOBALS["dbuser"] = 'A8DC7p12Ba';

$user_db = "user_accounts";
$goods_db = "good_table";
$cart_db = "cart_table";

$conn = connect_to_db();
$GLOBALS["connection"] = $conn;
mysqli_select_db($conn, $GLOBALS["dbuser"]);


if ($_SESSION["username"])
{
    session_destroy();
    unset($_SESSION['username']);
    clear_cart_table($conn);
}
header("location: ../");
?>