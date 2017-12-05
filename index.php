<?php session_start();?>
<!doctype html>

<html>
<head>
<meta charset="UTF-8">
<title>UW Sailing Team</title>
<link href="css/team-website1.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	
	<?php include("include/header-inc.php"); ?>
	<div class="container">
		<div>
			<h3>About the team</h3>
			<p>Welcome to the University of Washington Sailing team webpage. We are in the Northwest intercolegiate sailing association (NWICSA for short) we compete against other schools in the region, and in the nation. We currently practice every Monday, Tuesday, Wednesday, and Friday at <a href="sailsandpoint.org">Sail Sand Point</a> from 3pm until around 6pm (or unitl dark). If you're a student at UW and would like to sail: come join us! No experience necessary.</p>
			<img src="images/TeamPic3.jpg" width="500px" >
		</div>
		<div class="news">
			<h3 class="news-text">NEWS AND EVENTS</h3>
			<div class="asdf">
				<div class="outer-container">
					<div class="inner-container">
						<img class = "header-image" src="TowLine2.png" alt="<Insert Image>">
						<h4 class="title">Title</h4>
						<p>Short intro to article/ blog</p>
						<a href="#" class="link-container">Read More</a>
					</div>
					</div>


				<div class="outer-container">
					<div class="inner-container">
						<img class = "header-image" src="images/TowLine2.jpg" alt="<Insert Image>">
						<h4 class="title">Title</h4>
						<p>Short intro to article/ blog</p>
						<a href="#" class="link-container">Read More</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include("include/footer-inc.php"); ?>
</body>
</html>
