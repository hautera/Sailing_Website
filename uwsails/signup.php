<?php session_start() ?>
<!doctype html>

<html>
<head>
	<meta charset="UTF-8">
	<title>Sign Up Page</title>
	<link href="css/team-website1.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<?php include("include/header.html"); ?>
	 <h3> <b>Sign Up: </b></h3>
		First name:<br>
		<input type="text" id="firstname"><br>
		Last name:<br>
		<input type="text" id='lastname'><br>
		Email:<br>
		<input type="text"  id="signup_email"><br>
		Password:<br>
		<input type="password"  id="signup_pwd"><br>
		<input type="button"  Value="Sign Up" id="submit">
		<script src="https://www.gstatic.com/firebasejs/4.7.0/firebase.js"></script>
		<script src="include/signup.js"></script>
	<?php include("include/footer.html"); ?>
</body>
</html>
