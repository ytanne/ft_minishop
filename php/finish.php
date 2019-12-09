<?php 
session_start();
include("dbmanipulate.php");
$GLOBALS["dbhost"] = 'remotemysql.com:3306';
$GLOBALS["dbuser"] = 'A8DC7p12Ba';
$GLOBALS["dbpass"] = 'DkajEpXTBK';

$conn = connect_to_db();
$GLOBALS["connection"] = $conn;
mysqli_select_db($conn, $GLOBALS["dbuser"]);
?>
<html>
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
            <div class="menu_button">
                <a href="shopcart.php">
                    <img id="shop_cart" src="https://tinyurl.com/sut2whc"/>
                </a>
            </div>
        </div>
        <div id="main" style="height: 800px;">
            <center>
                <?php
                    if (!$_SESSION["username"])
                    {
                        echo("
                            <p>Please login first</p>
                        ");
                    }
                    else
                    {
                        echo ("
                            <p>Thanks for shopping. Your items will be delivered soon.</p>
                        ");
                        clear_cart_table($conn);
                    }
                ?>
            </center>
        </div>
    </body>
</html>
