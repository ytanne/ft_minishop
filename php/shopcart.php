<?php
session_start();
include("dbmanipulate.php");
$GLOBALS["dbhost"] = 'remotemysql.com:3306';
$GLOBALS["dbuser"] = 'A8DC7p12Ba';
$GLOBALS["dbpass"] = 'DkajEpXTBK';

$user_db = "user_accounts";
$goods_db = "good_table";
$cart_db = "cart_table";

$conn = connect_to_db();
$GLOBALS["connection"] = $conn;
mysqli_select_db($conn, $GLOBALS["dbuser"]);

?>
<html>
    <head>
        <title>Darknet shop</title>
        <link rel="stylesheet" type="text/css" href="../css/main.css">
    </head>
    <body>
        <div id="menu">
            <div id="darknet_logo">
                <a href="../">
                    <img id="darknet_logo" src="https://tinyurl.com/rgqfw2w" />
                </a>
            </div>
            <div class="menu_button">
				<?php
					if (!$_SESSION['username'])
						echo ("
							<a href='login.php'>
								<img id='user_account' src='https://tinyurl.com/r2fwt85'/>
							</a>
						");
					else
						echo ("
							<a href='logout.php'>
								<img id='user_account' src='https://tinyurl.com/rh5cp9n' />
							</a>
						");
				?>
            </div>
        </div>
        <div id="central">
            <div id="items_list">
                    <ul>
                        <?php
                            $items = get_items_from_cart($conn);
                            if (!$items)
                                echo ("<p>Your cart is empty</p>");
                            else
                            {
                                $total_cost = 0;
                                foreach($items as $product)
                                {
									echo ("
									<form action='addtocart.php' method='POST'>
									<li>$product[2] - price is $product[3]</li>
                                    <input type='hidden' name='product_id' value='$product[0]'>
                                    <input type='submit' name='submit' value='Delete'>
                                    </form>");
                                    $total_cost += $product[3];
                                }
                            }
                        ?>
                    </ul>
                </form>
            <hr>
            <div id="total_cost">
				<form method="POST" action="finish.php">
					<p>Your total price is - $<?php if ($total_cost) { echo($total_cost); } else { echo (0); } ?></p>
					<?php
						if ($total_cost)
							echo ("
							<input type='submit' name='final' value='Buy' />
							");
					?>
				</form>
            </div>
        </div>
    </body>
</html>