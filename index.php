<?php
session_start();
include("php/dbmanipulate.php");
$GLOBALS["dbhost"] = 'remotemysql.com:3306';
$GLOBALS["dbuser"] = 'A8DC7p12Ba';
$GLOBALS["dbpass"] = 'DkajEpXTBK';

$user_db = "user_accounts";
$goods_db = "good_table";

$conn = connect_to_db();
$GLOBALS["connection"] = $conn;
mysqli_select_db($conn, $GLOBALS["dbuser"]);
?>

<html>
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Darknet shop</title>
        <link rel="stylesheet" type="text/css" href="css/main.css">
    </head>
    <body>
        <div id="menu">
            <div id="darknet_logo">
                <a href="index.php">
                    <img id="darknet_logo" src="https://tinyurl.com/rgqfw2w" />
                </a>
            </div>
            <div class="menu_button">
				<?php
					if (!$_SESSION['username'])
						echo ("
							<a href='php/login.php'>
								<img id='user_account' src='https://tinyurl.com/r2fwt85'/>
							</a>
						");
					else
						echo ("
							<a href='php/logout.php'>
								<img id='user_account' src='https://tinyurl.com/rh5cp9n' />
							</a>
						");
				?>
				</div>
            <div class="menu_button">
                <a href="php/shopcart.php">
                    <img id="shop_cart" src="https://tinyurl.com/sut2whc"/>
                </a>
            </div>
        </div>
        <div id="central">
            <div id="left_panel">
                <div><a href="#">ALL</a></div>
                <div><a href="#">FOR HIM</a></div>
                <div><a href="#">FOR HER</a></div>
                <div><a href="#">FOR PARENTS</a></div>
                <div><a href="#">FOR CHILDREN</a></div>
            </div>
            <div id="central_panel">
                <div class="product_item">
					<form method="POST" action="php/addtocart.php">
						<div class="product_image">
							<img class="product" src="https://tinyurl.com/twml6og" style="width:35%;height:90%">
						</div>
						<p>Holy Stone HS720 Foldable GPS Drone with 2K FHD Camera</p>
                        <p>100$</p>
						<input type="hidden" name="item_id" value="1">
						<input type="hidden" name="item_name" value="Holy Stone HS720 Foldable GPS Drone with 2K FHD Camera">
                        <input type="hidden" name="item_price" value="100">
                        <input type="hidden" name="item_quantity" value="1">
						<input type="submit" name="submit" value="Buy">
					</form>
                </div>
                <div class="product_item">
					<form method="POST" action="php/addtocart.php">
                        <div class="product_image">
                            <img class="product" src="https://tinyurl.com/qkw7buo" style="width:50%;height:80%">
                        </div>
                        <p>Nintendo Switch with Neon Blue and Neon Red Joy‑Con</p>
                        <p>100$</p>
                        <input type="hidden" name="item_id" value="2">
						<input type="hidden" name="item_name" value="Nintendo Switch with Neon Blue and Neon Red Joy‑Con">
                        <input type="hidden" name="item_price" value="100">
                        <input type="hidden" name="item_quantity" value="1">
						<input type="submit" name="submit" value="Buy">
                    </form>
                </div>
                <div class="product_item">
                    <form method="POST" action="php/addtocart.php">
                        <div class="product_image">
                            <img class="product" src="https://tinyurl.com/thmsoak" style="width:80%;height:80%">
                        </div>
                        <p>Oculus Rift S PC-Powered VR Gaming Headset</p>
                        <p>100$</p>
                        <input type="hidden" name="item_id" value="3">
						<input type="hidden" name="item_name" value="Oculus Rift S PC-Powered VR Gaming Headset">
                        <input type="hidden" name="item_price" value="100">
                        <input type="hidden" name="item_quantity" value="1">
						<input type="submit" name="submit" value="Buy">
					</form>
                </div>
                <div class="product_item">
                    <form method="POST" action="php/addtocart.php">
                        <div class="product_image">
                            <img class="product" src="https://tinyurl.com/tyrjo2g" style="width:30%;height:80%">
                        </div>
                        <p>Little Tikes 3 Trampoline</p>
                        <p>100$</p>
                        <input type="hidden" name="item_id" value="4">
						<input type="hidden" name="item_name" value="Little Tikes 3 Trampoline">
                        <input type="hidden" name="item_price" value="100">
                        <input type="hidden" name="item_quantity" value="1">
						<input type="submit" name="submit" value="Buy">
					</form>
                </div>
                <div class="product_item">
                    <form method="POST" action="php/addtocart.php">
                        <div class="product_image">
                            <img class="product" src="https://tinyurl.com/u8txgq9" style="width:50%;height:80%">
                        </div>
                        <p>Rally and Roar Foosball Tabletop Game</p>
                        <p>100$</p>
                        <input type="hidden" name="item_id" value="5">
						<input type="hidden" name="item_name" value="Rally and Roar Foosball Tabletop Game">
                        <input type="hidden" name="item_price" value="100">
                        <input type="hidden" name="item_quantity" value="1">
						<input type="submit" name="submit" value="Buy">
					</form>
                </div>
                <div class="product_item">
                    <form method="POST" action="php/addtocart.php">
                        <div class="product_image">
                            <img class="product" src="https://tinyurl.com/wc8rmhx" style="width:27%;height:80%">
                        </div>
                        <p>Arcade Classics - Pac-Man Retro Mini Arcade Game</p>
                        <p>100$</p>
                        <input type="hidden" name="item_id" value="6">
						<input type="hidden" name="item_name" value="Arcade Classics - Pac-Man Retro Mini Arcade Game">
                        <input type="hidden" name="item_price" value="100">
                        <input type="hidden" name="item_quantity" value="1">
						<input type="submit" name="submit" value="Buy">
					</form>
                </div>
                <div class="product_item">
                    <form method="POST" action="php/addtocart.php">
                        <div class="product_image">
                            <img class="product" src="https://tinyurl.com/qsm8ka4" style="width:30%;height:80%">
                        </div>
                        <p>MindKoo Bluetooth Headphones Wireless Over Ear Cat Ear</p>
                        <p>100$</p>
                        <input type="hidden" name="item_id" value="7">
						<input type="hidden" name="item_name" value="MindKoo Bluetooth Headphones Wireless Over Ear Cat Ear">
                        <input type="hidden" name="item_price" value="100">
                        <input type="hidden" name="item_quantity" value="1">
						<input type="submit" name="submit" value="Buy">
					</form>
                </div>
                <div class="product_item">
                    <form method="POST" action="php/addtocart.php">
                        <div class="product_image">
                            <img class="product" src="https://tinyurl.com/t95l8dy" style="width:40%;height:80%">
                        </div>
                        <p>Makartt Portable Gel Nail Polish Organizer</p>
                        <p>100$</p>
                        <input type="hidden" name="item_id" value="8">
						<input type="hidden" name="item_name" value="Makartt Portable Gel Nail Polish Organizer">
                        <input type="hidden" name="item_price" value="100">
                        <input type="hidden" name="item_quantity" value="1">
						<input type="submit" name="submit" value="Buy">
					</form>
                </div>
                <div class="product_item">
					<form method="POST" action="php/addtocart.php">
						<div class="product_image">
							<img class="product" src="https://tinyurl.com/ukryy25" style="width:30%;height:80%">
						</div>
						<p>Matney Stealing Coin Cat Box</p>
						<p>100$</p>
						<input type="hidden" name="item_id" value="9">
						<input type="hidden" name="item_name" value="Matney Stealing Coin Cat Box">
						<input type="hidden" name="item_price" value="100">
						<input type="hidden" name="item_quantity" value="1">
						<input type="submit" name="submit" value="Buy">
					</form>
				</div>
                <div class="product_item">
                    <form method="POST" action="php/addtocart.php">
                        <div class="product_image">
                            <img class="product" src="https://tinyurl.com/yx87hl3t" style="width:27%;height:80%">
                        </div>
                        <p>RIMABLE Complete 22 Inches Skateboard</p>
                        <p>100$</p>
                        <input type="hidden" name="item_id" value="10">
						<input type="hidden" name="item_name" value="RIMABLE Complete 22 Inches Skateboard">
                        <input type="hidden" name="item_price" value="100">
                        <input type="hidden" name="item_quantity" value="1">
						<input type="submit" name="submit" value="Buy">
                    </form>
                </div>
                <div class="product_item">
                    <form method="POST" action="php/addtocart.php">
                        <div class="product_image">
                            <img class="product" src="https://tinyurl.com/ulnlghm" style="width:30%;height:80%">
                        </div>
                        <p>LETSCOM Smart Watch Fitness Tracker</p>
                        <p>100$</p>
                        <input type="hidden" name="item_id" value="11">
						<input type="hidden" name="item_name" value="LETSCOM Smart Watch Fitness Tracker">
                        <input type="hidden" name="item_price" value="100">
                        <input type="hidden" name="item_quantity" value="1">
						<input type="submit" name="submit" value="Buy">
					</form>
                </div>
                <div class="product_item">
                    <form method="POST" action="php/addtocart.php">
                        <div class="product_image">
                            <img class="product" src="https://tinyurl.com/wmbdal9" style="width:40%;height:80%">
                        </div>
                        <p>True Wireless Earbuds Bluetooth 5.0 Headphones</p>
                        <p>100$</p>
                        <input type="hidden" name="item_id" value="12">
						<input type="hidden" name="item_name" value="True Wireless Earbuds Bluetooth 5.0 Headphones">
                        <input type="hidden" name="item_price" value="100">
                        <input type="hidden" name="item_quantity" value="1">
						<input type="submit" name="submit" value="Buy">
					</form>
                </div>
            </div>
        </div>
    </body>
</html>