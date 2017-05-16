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
		<link rel="icon" href="images/faveIcon.png" type="image/png">
		<!-- img src: made by Annie Hughey in Illustrator-->
		<link rel="stylesheet" type="text/css" href="js/slick/slick.css" />
		<link rel="stylesheet" type="text/css" href="js/slick/slick-theme.css" />
		<link rel="stylesheet" href="styles/style.css">
		<link rel="stylesheet" href="styles/coin-slider-styles.css" type="text/css" />

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/coin-slider.min.js"></script>
		<!-- jquery plug in from coin slider-->
		<script src="js/scripts.js"></script>

		<title>Cornell Cinema</title>
	</head>

	<body>
		<div class="row header">
			<?php include "includes/header.php" ?>
		</div>
		<!-- end of header row div-->
		<div class="container-fluid">
			<div class="row row-centered">
				<div class="col-sm-12 col-lg-12 col-centered" id='coin-slider'>
					<a href="img01_url" target="_blank">
						<img id="img1" src="images/theaterLogo.png" alt="Cornell Cinema">
						<!-- img src: -->
						<span class="caption">WELCOME TO CORNELL CINEMA!</span>
					</a>
					<a href="img02_url" target="_blank">
						<!-- img src: -->
						<img id="img2" src="images/psycho.png" alt="Psycho">
						<!-- img src: -->
						<span>ALFRED HITCHCOCK'S PSYCHO</span>
					</a>
					<a href="img03_url" target="_blank">
						<img id="img3" src="images/theaterLogo.png" alt="Cornell Cinema">
						<!-- img src: -->
						<span>WELCOME TO CORNELL CINEMA!</span>
					</a>
					<a href="img04_url" target="_blank">
						<!-- img src: -->
						<img id="img4" src="images/psycho.png" alt="Psycho">
						<!-- img src: -->
						<span>ALFRED HITCHCOCK'S PSYCHO</span>
					</a>
				</div>
				<!-- end of carousel container div -->
			</div>
			<!-- end of carousel row div-->

			<div class="row thumbnails">
				<div class="col-sm-12 col-lg-4 map">
					<h2>Our Location</h2>
					<a href="locations.php"><img src="images/map.png" class="googleMap" alt="Cornell Cinema Location Google Maps"></a>
					<!-- img src: google maps -->

				</div>
				<!-- end of thumbnail 1 div -->
				<div class="col-sm-12 col-lg-4 prices">
					<h2>Ticket Prices</h2>
					<ul>
						<li>Cornell Students: $5.50</li>
						<li>Grad Students: $6</li>
						<li>General Public: $8.50</li>
						<li>Senior Citizens (62+): $6.50</li>
						<li>Kids 12 &amp; Under: $5.50</li>
						<li>Saturday and Sunday Matinees: $5.50 all</li>
						<li>Ithakid Film Fest Tickets: $5.00 /$4.00 Kids 12 and Under</li>
					</ul>

				</div>
				<!-- end of thumbnail 2 div -->
				<div class="col-sm-12 col-lg-4 media">
					<h2>Connect With Us</h2>
					<a href="https://www.facebook.com/Cornell-Cinema-215249100528/" target="_blank"><img src="images/facebook.png" alt="Facebook Logo" class="icon"></a>
					<!-- img src: free icons from iconfinder.com-->
					<a href="https://www.youtube.com/channel/UCEsbzELlJGpmPBDKUikprIw" target="_blank"><img src="images/youtube.png" alt="Youtube Logo" class="icon"></a>
					<!-- img src: free icons from iconfinder.com-->
					<a href="https://twitter.com/CornellCinema?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" target="_blank"><img src="images/twitter.png" alt="Twitter Logo" class="icon"></a>
					<!-- img src: free icons from iconfinder.com-->

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
