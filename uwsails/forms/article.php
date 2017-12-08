<?php
session_start();
if(!isset($_SESSION['uid'])){
	header("Location: ../uwsails");
	exit();
}
?>

<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Write an article for the Sailing team</title>
		<link href="../../css/Team website1.css" type="text/css" rel="stylesheet">
	</head>

	<body>
		<?php include("../../include/header-inc.php"); ?>
		<form action = "../../include/make-article-inc.php" method="post">
			<h5>Title:</h5><br>
			<input type="text" name = "title" placeholder="Title of Article"><br>
			<h5>Brief article description:</h5><br>
			<input type="text" name="article_desc" placeholder="Article Description"><br><h5>Article:</h5>
			<textarea name="Text1" cols="70" rows="20"></textarea><br>
			<input type="submit" name="submit">
		</form>
		<?php include("../../include/footer-inc.php"); ?>
	</body>
</html>
