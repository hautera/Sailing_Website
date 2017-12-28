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
		<div id="header"></div>

		<article>
			<h1>Husky Sailing albums:</h1>
			<?php
				$dir = "../pictures/Albums";
				//open the directory
				if( $dh = opendir( $dir ))  {
					//read all the files
					while( ($file = readdir($dh)) !== False ) {
						if( strpos( $file, ".") === False ){
							$absolute_path = $dir . "/". $file;
							//echo $absolute_path . "</br>";
							$album_file = opendir( $absolute_path );
							while( ($album_front = readdir($album_file)) !== False ){
								if(strpos( $album_front, ".JPG") !== False or strpos( $album_front, ".jpg") !== False or strpos( $album_front, ".png") !== False) {
									break;
								}
							}

							//echo $album_front; ///debugggggggggggg       ;)
							//put out the pictures :)
							echo "<div class ='image_box'><a href='uwsails/pictures/albums/".$file."' class='album_link'><h3 class='img_caption'>".preg_replace("_", " ", $file)."</h3><img src='/uwsails/pictures/albums/".$file. "/".$album_front."' class='smoll_img'/></a></div>";
						}
					}
				}

			?>
		</article>

		<div id="footer"></div>
	</body>
</html>
