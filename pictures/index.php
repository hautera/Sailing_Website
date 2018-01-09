<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>UW Sailing Pictures</title>
		<meta name="Description" content="Pictures of UW the UW Sailing Team">
		<meta name="Content-Type" content="Pictures">
		<link href="/uwsails/css/team-website1.css" type="text/css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="icon" href="/uwsails/images/favicon.png">
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="https://www.gstatic.com/firebasejs/4.7.0/firebase.js"></script>
		<script src="https://www.gstatic.com/firebasejs/4.6.2/firebase-auth.js"></script>
		<script>
			$(function(){
				$("#header").load("/uwsails/include/header.html");
				$("#footer").load("/uwsails/include/footer.html");
			});
		</script>
		</head>

	<body>
		<?php include "../include/header.html"; ?>

		<article>
			<h1>Husky Sailing albums:</h1>

			<?php
			//writes all the pictures to the file :)
				$dir = "../pictures/albums";
				//open the directory
				if( $dh = opendir( $dir ))  {
					//read all the files
					while( ($file = readdir($dh)) !== False ) {
						if( strpos( $file, ".") === False ){
							$absolute_path = $dir . "/". $file;
							$album_file = opendir( $absolute_path );

							//gets all
							while( ($album_front = readdir($album_file)) !== False ){
								if(strpos( $album_front, ".JPG") !== False or strpos( $album_front, ".jpg") !== False or strpos( $album_front, ".png") !== False) {
									break;
								}
							}

							//put out the pictures :)
							echo "<div class ='image_box'><h2 class='img_caption'>".str_replace("_", " ", $file)."</h2><a href='/uwsails/pictures/albums?album=".$file."' class='album_link'><img src='/uwsails/pictures/albums/".$file. "/".$album_front."' class='smoll_img'/></a></div>";
						}
					}
				}

			?>
		</article>

		<?include "../include/footer.html"; ?>
	</body>
</html>
