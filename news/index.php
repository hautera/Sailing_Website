<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name = "description" content = "The official University of Washington sailing team webpage. Home of Husky Sailing.">
		<meta name = "keywords" content = "Sailing, University of Washington, Husky, Husky Sailing, Husky sailing team, University of Washington Sailing team, College sailing, club sports">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="/uwsails/css/team-website1.css" type="text/css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="icon" href="/uwsails/images/favicon.png">
		<title>UW Sailing Team News</title>
		<script src="https://www.gstatic.com/firebasejs/4.7.0/firebase.js"></script>
		<script src="https://www.gstatic.com/firebasejs/4.6.2/firebase-auth.js"></script>
	</head>

	<body>
		<?php include "../include/header.html"; ?>

		<article>
			<h1>NEWS:</h1>
		</article>
			<?php
				$dir = "../news/articles";

				//open news article directory
				if( $dh = opendir( $dir )){
					while( ($file = readdir( $dh )) !== False ){
						//reads the files in the directory
						if( strpos( $file, ".") === False ){ //so . .. and .DS_Store aren't included :)

								//puts that there article on that there screen
								include "../news/articles/".$file. "/prev.html";
						}
					}
				}
			?>

		<?php include "../include/footer.html"; ?>
	</body>
</html>
