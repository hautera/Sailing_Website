<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link href="css/Team website1.css" type="text/css" rel="stylesheet">
<title>UW Sailing Team News</title>
	<style>
		.banner{
			background-color: #d9d9d9;
			text-align: center;
		}
		.banner-text {
			color: #4b2e83;
		}
		.img-main {
			left: 60%;
			height: 300px;
			width: auto;
			float: right;
			padding-left: 20px;
		}

    </style>
</head>

<body>
	<?php 
		include("include/header-inc.php");
		$conn = mysqli_connect("vergil.u.washington.edu", "root", "HuskySailingSiteAdmin!", "blog_data", 8800);
		if(!isset($_GET['article_id'])){	//if we dont know which artcle, we show them all
			$query = "SELECT * FROM article_data";
			$result = mysqli_query($conn, $query);
			echo '<table>' ;
			while($row = mysqli_fetch_array($result)){
				echo '<tr><td><a href="http://students.washington.edu/uwsails/news.php?article_id='.$row['article_id'].'">'.$row['article_title'].'</a></td></tr>';
			}
			echo '</table>';
		} else {
			//if there is an article id, we show that article
			$id = $_GET['article_id'];
			$query = "SELECT * FROM article_data WHERE article_id = $id;";
			$result = mysqli_query($conn, $query);
			$result = mysqli_fetch_array($result);
			echo '<header class="banner">
		<h1 class="banner-text" >'.$result['article_title'].'</h1>
	</header>';
			echo '<img src="images/'.$result['article_pic_name'].'" class ="img-main"/><p>'.$result['article_text'].'</p><p>By:'.$result['article_author_id'].'</p>';
		}

		include("include/footer-inc.php");
	?>
</body>
</html>