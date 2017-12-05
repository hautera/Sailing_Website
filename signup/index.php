<?php session_start() ?>
<!doctype html>

<html>
<head>
<meta charset="UTF-8">
<title>Sign In Page</title>
<link href="../css/Team website1.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php include("include/header-inc.php"); ?>
	<form action = "include/signUp-inc.php" method="POST"> <h3> <b>Sign Up: </b></h3>
			First name:<br>
			<input type="text" name = "firstname"><br>
			Last name:<br>
			<input type="text" name = "lastname"><br>
			Email:<br>
			<input type="text" name="email"><br>
			Password:<br>
			<input type="password" name="password"><br>
			<input type="submit" name = 'submit' Value="Sign Up">
		</form>
	<?php include("include/footer-inc.php"); ?>
</body>
</html>
