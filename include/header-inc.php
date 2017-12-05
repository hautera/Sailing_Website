<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link href="https://students.washington.edu/uwsails/css/headerStyle2.css" rel="stylesheet" type="text/css">
</head>

<body>
	<header class="thin-strip">
		<img src="../images/Fancylogo.svg" class="logo" alt="Really cool logo">
		<h1 class="main-title">University of Washington Sailing Team</h1>
		<?php //checks if the user has signed in
		if(isset($_SESSION['email'])){
		  echo '
				<p class="sign-in-text">Welcome <a href="https://students.washington.edu/uwsails/articleForm.php" class="sign-in-text, link">'. $_SESSION['first']. '</a><br><a href="https://students.washington.edu/uwsails/include/logout-inc.php" class="sign-in-text, link">Logout</a></p>';
			
		} else {
			echo '<p class="sign-in-text">Current Sailor? 
					<br> <a href="https://students.washington.edu/uwsails/signIn.php" class="sign-in-text, link">Sign in</a></p>';
		}
		?>
	</header>

	<nav class = "thin-strip-white">
			<a href="/" class="nav-links">About</a>				
			<!a href="http://students.washington.edu/uwsails/sailors.php" class="nav-links"Sailors a>
			<a href="/pictures/" class="nav-links">Pictures</a>
			<a href="https://students.washington.edu/uwsails/news.php" class="nav-links">News and Events</a>
			<a href="" class="nav-links">Schedule</a>	
			<a href="https://students.washington.edu/uwsails/joinUs.php" class="nav-links">Join the Team</a>
			<a href="https://students.washington.edu/uwsails/support.php" class="nav-links">Support us</a>
		</nav>
</body>
</html>