<?php session_start() ?>
<!doctype html>

<html>
<head>
	<meta charset="UTF-8">
	<title>Sign Up Page</title>
	<link href="css/team-website1.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" href="images/favicon.svg">
</head>

<body>
	<?php include("include/header.html"); ?>
	 <h1> <b>Sign Up: </b></h1><p class = "signin-error" id="Error-Text"></p>
		<input type="text" id="firstname" class="big-form" placeholder="First Name">
		<input type="text" id='lastname' class="big-form" placeholder="Last Name">
		<input type="email" id="signup_email" class="big-form" placeholder="Email">
		<input type="password"  id="signup_pwd" class="big-form" placeholder="Pasword">
		<input type="button"  Value="Sign Up" id="submit" class="big-btn">
		<script src="include/signup.js"></script>
	<?php include("include/footer.html"); ?>
</body>
</html>
