<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Sign In Page</title>
		<link href="/uwsails/css/team-website1.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="icon" href="images/favicon.svg">
	</head>

	<body>
		<?php include("include/header.html"); ?>
		<form class="container"><h1><u>Sign In</u>:</h1>
			<?php
				if(isset($_GET['error'])){
					echo '<p class="signin-error">ERROR SIGNING IN</p>';
				}
			?>
			<input type="email" name="email" placeholder="email" id = "userEmail" class="big-form container"><br>
			<input type="password" name="pwd" placeholder="password" id ="pwd" class="big-form"><br>
			<input type="submit" name="submit" value ="Sign In" id="sign-in" class="big-btn"><br>
			<script src="/include/signin.js"></script>
		</form>
		<?php include_once("include/footer.html"); ?>
	</body>
</html>
