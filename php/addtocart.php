<?php
include("dbmanipulate.php");
$cart_db = "cart_table";
$arguments = $_POST;

$user_db = "user_accounts";
$goods_db = "good_table";

$conn = connect_to_db();
$GLOBALS["connection"] = $conn;
mysqli_select_db($conn, $GLOBALS["dbuser"]);
if (check_table_exists($conn, $cart_db) === FALSE)
        create_cart_table($conn, $cart_db);

if ($arguments && $arguments["submit"] === "Buy")
{
    $item_data['item_id'] = $arguments['item_id'];
	$item_data['item_name'] = $arguments['item_name'];
	$item_data['item_price'] = $arguments['item_price'];
    $item_data['item_quantity'] = $arguments['item_quantity'];
    insert_items_to_cart($conn, $item_data);
    header("Location: ../");
}
elseif ($arguments && $arguments["submit"] === "Delete")
{
    delete_item_from_cart($conn, $arguments["product_id"]);
    header("Location: shopcart.php");
}

?>