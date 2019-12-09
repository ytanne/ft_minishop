<?php include('connectdb.php');?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="../css/form.css">
  <link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body>
  <div id="menu">
	<div id="darknet_logo">
		<a href="../index.php">
			<img id="darknet_logo" src="https://tinyurl.com/rgqfw2w" />
		</a>
	</div>
  </div>
  <div class="header">
  	<h2>Login</h2>
  </div>
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="pass">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="register.php">Sign up</a>
  	</p>
  </form>
</body>
</html>