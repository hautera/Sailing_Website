<?php session_start();?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>UW Sailing Pictures</title>
<meta name="Description" content="Pictures of UW the UW Sailing Team">
<meta name="Content-Type" content="Pictures">
<link href="../css/Team website1.css" type="text/css" rel="stylesheet">
</head>

<body>
	<?php include("../include/header-inc.php")?>
	<div class="slideshow-container">
			<div class="mySlides fade">
				<div class="numbertext">1 / 12</div>
					<img src="../images/img1.png" style="width:100%">
					
			</div>

			<div class="mySlides fade">
				 <div class="numbertext">2 / 12</div>
					 <img src="../images/img2.png" style="width:100%">
				
			</div>

			<div class="mySlides fade">
				<div class="numbertext">3 / 12</div>
				<img src="../images/img3.png" style="width:100%">
				
			</div>

			<div class="mySlides fade">
				<div class="numbertext">4 / 12</div>
					<img src="../images/img4.png" style="width:100%">
				
			</div>
		
			<div class="mySlides fade">
				<div class="numbertext">5 / 12</div>
					<img src="../images/img5.jpg" style="width:100%">
				
			</div>
		
			<div class="mySlides fade">
				<div class="numbertext">6 / 12</div>
					<img src="../images/img6.jpg" style="width:100%">
			
			</div>
		<div class="mySlides fade">
				<div class="numbertext">7 / 12</div>
					<img src="../images/img7.jpg" style="width:100%">
				
			</div>
		<div class="mySlides fade">
				<div class="numbertext">8 / 12</div>
					<img src="../images/img8.jpg" style="width:100%">
				
			</div>
		<div class="mySlides fade">
				<div class="numbertext">9 / 12</div>
					<img src="../images/img9.jpg" style="width:100%">
				
			</div>
		<div class="mySlides fade">
				<div class="numbertext">10 / 12</div>
					<img src="../images/img10.jpg" style="width:100%">
				
			</div>
		<div class="mySlides fade">
				<div class="numbertext">11 / 12</div>
					<img src="../images/img11.jpg" style="width:100%">
				
			</div>
		<div class="mySlides fade">
				<div class="numbertext">12 / 12</div>
					<img src="../images/img12.jpg" style="width:100%">
				
			</div>
		

	  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
	  <a class="next" onclick="plusSlides(1)">&#10095;</a>
	</div>
	<br>

	<div style="text-align:center">
	  <span class="dot" onclick="currentSlide(1)"></span> 
	  <span class="dot" onclick="currentSlide(2)"></span> 
	  <span class="dot" onclick="currentSlide(3)"></span>
	  <span class="dot" onclick="currentSlide(4)"></span>
	  <span class="dot" onclick="currentSlide(4)"></span>
	  <span class="dot" onclick="currentSlide(5)"></span>
		<span class="dot" onclick="currentSlide(6)"></span>
		<span class="dot" onclick="currentSlide(7)"></span>
		<span class="dot" onclick="currentSlide(8)"></span>
		<span class="dot" onclick="currentSlide(9)"></span>
		<span class="dot" onclick="currentSlide(10)"></span>
		<span class="dot" onclick="currentSlide(11)"></span>
		<span class="dot" onclick="currentSlide(12)"></span>
	</div>
	<script>
		var slideIndex = 1;
		showSlides(slideIndex);

		function plusSlides(n) {
		  showSlides(slideIndex += n);
		}

		function currentSlide(n) {
		  showSlides(slideIndex = n);
		}

		function showSlides(n) {
		  var i;
		  var slides = document.getElementsByClassName("mySlides");
		  var dots = document.getElementsByClassName("dot");
		  if (n > slides.length) {slideIndex = 1} 
		  if (n < 1) {slideIndex = slides.length}
		  for (i = 0; i < slides.length; i++) {
			  slides[i].style.display = "none"; 
		  }
		  for (i = 0; i < dots.length; i++) {
			  dots[i].className = dots[i].className.replace(" active", "");
		  }
		  slides[slideIndex-1].style.display = "block"; 
		  dots[slideIndex-1].className += " active";
		}
	</script>
	<?php include("../include/footer-inc.php")?>
</body>
</html>
