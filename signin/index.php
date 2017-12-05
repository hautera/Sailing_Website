<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Sign In Page</title>
<style type="text/css">
</style>
<link href="../css/Team website1.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php include("../include/header-inc.php"); ?>
	<form action="../include/signIn-inc.php" method="post">
		<h4><u>Email:</u></h4>
		<input type="email" name="email" placeholder="email"><br>
		<h4><u>Password:</u></h4>
		<input type="password" name="pwd" placeholder="password"><br>
		<input type="submit" name="submit" value ="Sign In"><br>
	</form>
	<?php include_once("../include/footer-inc.php"); ?>
</body>
</html>
