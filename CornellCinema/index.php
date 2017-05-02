<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<?php
	if(strpos($_SERVER['REQUEST_URI'], 'index.php?logout=true') !== false){
		if (isset($_SESSION['logged_user'])) {
			$olduser = $_SESSION['logged_user'];
			unset($_SESSION['logged_user']);
		} else {
			$olduser = false;
		}
	}
?>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="stylesheet" href="styles/bootstrap.css">
		<link rel="icon"       type="image/png" href="http://example.com/myicon.png">
		<link rel="stylesheet" type="text/css" href="js/slick/slick.css" />
		<link rel="stylesheet" type="text/css" href="js/slick/slick-theme.css" />
		<link rel="stylesheet" href="styles/style.css">
		<link rel="stylesheet" href="styles/coin-slider-styles.css" type="text/css" />

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="js/scripts.js"></script>
		<script src="js/jquery.slides.min.js"></script>
		<script type="text/javascript" src="js/coin-slider.min.js"></script>

		<title>Cornell Cinema</title>
	</head>

	<body>
		<div class="row header">
			<?php include "includes/header.php" ?>
		</div>
		<div class="container-fluid">
			<!-- end of header row div-->
			<div class="row row-centered">
				<div class="col-sm-12 col-lg-12 col-centered" id='coin-slider'>
					<a href="img01_url" target="_blank">
						<img id="img1" src="images/theaterLogo.png" alt="Cornell Cinema" target="_blank">
						<!-- img src: -->
						<span>WELCOME TO CORNELL CINEMA!</span>
					</a>
					<a href="img02_url" target="_blank">
						<!-- img src: -->
						<img id="img2" src="images/psycho.png" alt="Psycho" target="_blank">
						<!-- img src: -->
						<span>ALFRED HITCHCOCK'S PSYCHO</span>
					</a>
					<a href="img03_url" target="_blank">
						<img id="img1" src="images/theaterLogo.png" alt="Cornell Cinema">
						<!-- img src: -->
						<span>WELCOME TO CORNELL CINEMA!</span>
					</a>
					<a href="img04_url" target="_blank">
						<!-- img src: -->
						<img id="img2" src="images/psycho.png" alt="Psycho" target="_blank">
						<!-- img src: -->
						<span>ALFRED HITCHCOCK'S PSYCHO</span>
					</a>
				</div>
				<!-- end of carousel container div -->
			</div>
			<!-- end of carousel row div-->

			<div class="row thumbnails">
				<div class="col-sm-12 col-lg-4 map">
					<h1>GOOGLE MAPS PLUG IN</h1>

				</div>
				<!-- end of thumbnail 1 div -->
				<div class="col-sm-12 col-lg-4 prices">
					<h1>PRICE AND TICKET INFO HERE</h1>

				</div>
				<!-- end of thumbnail 2 div -->
				<div class="col-sm-12 col-lg-4 media">
					<h1>SOCIAL MEDIA PLUG INS</h1>

				</div>
				<!-- end of thumbnail 3 div -->

			</div>
			<!-- end of thumbnail row div -->
		</div>
		<!-- end of container div -->
		<div class="row footer">
			<?php include "includes/footer.php" ?>
		</div>
		<!-- end of footer row div-->

	</body>

</html>
