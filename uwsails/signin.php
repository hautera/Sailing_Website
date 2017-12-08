<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Sign In Page</title>
		<link href="css/Team website1.css" rel="stylesheet" type="text/css">
	</head>

	<body>
		<?php include("include/header.html"); ?>
		<form>
			<h4><u>Email:</u></h4>
			<input type="email" name="email" placeholder="email" id = "userEmail"><br>
			<h4><u>Password:</u></h4>
			<input type="password" name="pwd" placeholder="password" id ="pwd"><br>
			<input type="submit" name="submit" value ="Sign In" id="sign-in"><br>
			<script src="/include/signin.js"></script>
			<?php
				if(isset($_GET['error'])){

				}
			?>
		</form>
		<?php include_once("include/footer-inc.php"); ?>
	</body>
</html>
