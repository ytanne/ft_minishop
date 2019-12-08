<?php
if (isset($_POST["submit"])){
	$login = $_POST["login"];
	$passwd = $_POST["passwd"];
	if (!$login || !$passwd){
		echo "<script type=\"text/javascript\">
            alert('Username/Password field is empty!')
            </script>";
        header ("Location: register.php");
	}
	if (!file_exists("/private") || !file_exists("/private/passwd")){
		mkdir("./private", 0755);
		$pos = -1;
	}
	else{
		$storage = unserialize(file_get_contents("/private/passwd"));
		foreach ($storage as $pos => $user)
			if ($user["login"] === $login)
				exit("ERROR\n");
	}
	$storage[$pos + 1]["login"] = $login;
	$storage[$pos + 1]["passwd"] = hash("whirlpool", $passwd);
	file_put_contents("/private/passwd", serialize($storage));
}
else if (isset($_POST["back"]))
	header ("Location: login.php");
?>

<html><body>
	<form method="POST" action="register.php">
		Username: <input type="text" name="login" value="" />
    	<br />
    	Password: <input type="password" name="passwd" value="" />
    	<br />
    	<input type="submit" name="submit" value="Register" />
    	<br />
    	<input type="submit" name="back" value="Go back" />
    </form>
</body></html>