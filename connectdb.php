<?php
$dbhost = "remotemysql.com";
$dbuser = "A8DC7p12Ba";
$connection = mysqli_connect($dbhost, $dbuser, $dbpass) or die ("No connection. Died\n");
echo ("Connection established\n");
mysqli_select_db($connection, "A8DC7p12Ba") or die ("Error when selecting database\n");
echo ("Database is selected\n");

/*
$sql = "CREATE TABLE tutorials_tbl( ".
        "tutorial_id INT NOT NULL AUTO_INCREMENT, ".
        "tutorial_title VARCHAR(100) NOT NULL, ".
        "tutorial_author VARCHAR(40) NOT NULL, ".
        "submission_date DATE, ".
        "PRIMARY KEY ( tutorial_id )); ";
*/

$sql = "DROP TABLE tutorials_tbl";

mysqli_query($connection, $sql) or die ("Error when creating a table");
echo ("Table was created\n");
mysqli_close($connection);
?>