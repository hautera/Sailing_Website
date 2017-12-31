<!doctype html>

<html>
	<head>
		<meta charset="UTF-8">
		<title>UW Sailing Team</title>
		<link rel="icon" href="/uwsails/images/favicon.png">
		<link href="/uwsails/css/team-website1.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
		<div id ="header"></div>
			<article>
				<?php
					$album = $_GET['album'];
					$dir = getcwd() . '/' . $album;
					if( isset( $_GET[ 'picture' ])){
						echo "<a href='?album=".$album."'><input type = 'button' value='< Back' class ='big-btn' style = 'left: 0px;'></input></a>";

						if( $dh = opendir( $dir ))  {
							//read all the files
							echo "<div class='image_box'>";
							$i = 0;
							while( ($file = readdir($dh)) !== False ) {
								if(strpos( $file, ".JPG") !== False or strpos( $file, ".jpg") !== False or strpos( $file, ".png") !== False){
									$i += 1;
									echo "<img src='".$album.'/'.$file."' class = 'img-slide'>";
									if( $_GET[ 'picture' ] === $file){
										$index = $i;
									}
							}
						}
						echo "</div>";
						echo"<input type = 'button' class = 'next slideshow-btn' id = 'next' value = 'Next Image >'></input>";
						echo "<input type = 'button' class = 'prev slideshow-btn' id ='prev' value = '< Prev Image'></input>";
					}
				} else {
					echo "<a href='../'><input type = 'button' value='< Back' class ='big-btn' style = 'left: 0px;'></input></a>";
					echo "<h1>".str_replace("_", " ", $album)." pictures:</h1>";
					if( $dh = opendir( $dir ))  {
						//read all the files
						while( ($file = readdir($dh)) !== False ) {
							if(strpos( $file, ".JPG") !== False or strpos( $file, ".jpg") !== False or strpos( $file, ".png") !== False){
								echo "<div class ='image_box'><a href='?album=".$album."&picture=".$file."' class='album_link'><img src='".$album.'/'.$file."' class='smoll_img'/></a></div>";
							}
						}
					}
				}
				?>
				<script>
					var images = document.getElementsByClassName('img-slide');
					var index = parseInt( "<?php echo $index; ?>" ) - 1;
					console.log( index );

					for( var i = 0; i < images.length; i ++){
						if( i != index ){
							images[i].style.display = 'none';
						}
					}

					//Displays the image at index i
					function display( currIndex, prevIndex ){
						images[ prevIndex ].style.display = 'none';
						images[ currIndex ].style.display = 'block';
					}

					document.getElementById('next').addEventListener( 'click', e => {
						prevIndex = index;
						index ++;
						if( index == images.length ){
							index = 0;
						}
						console.log( index );
						display( index,  prevIndex );
					});

					document.getElementById('prev').addEventListener( 'click', e => {
						prevIndex = index;
						index --;
						if( index == -1 ){
							index = images.length - 1;
						}
						console.log( index );
						display( index,  prevIndex );
					});
				</script>
			</article>
		<div id ="footer"></div>
	</body>
</html>
