<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="styles/style.css">
	<link rel="stylesheet" href="styles/bootstrap.css">
	<link rel="icon" href="images/faveIcon.png" type="image/png">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="js/scripts.js"></script>
	<title>Parking</title>
</head>

<body>
	<div class="container">
		<div class="row header">
			<?php include "includes/header.php" ?>
		</div>
		<!-- end of header row div -->
		<div class="row content">
			<h1 class="title">PARKING</h1>
			<div class="col-sm-12 col-lg-6">
				<p class="text">There are many parking options for Cornell Cinema screenings. We suggest the Willard Straight Lot, the Anabel Taylor Lot (some spots are unrestricted after 5pm — be sure to read the signs or you will be ticketed!), along South Avenue or Stewart Avenue, or the lot off Edgemoor Lane off West Avenue. Please note that some of these options do require walking uphill. Parking is also available at the Schoelkopf Parking Garage, where there is ample space and it is free after 5pm. It's a less than 10 minute walk to Willard Straight. Please pay close attention to all parking signs in case of any rule changes!</p>
				<h2>Directions From Collegetown:</h2>
				<p class="text">Take College Avenue into the Cornell campus. At the Main Quad, turn left onto Campus Road. The Willard Straight parking lot is your second right.</p>
				<h2>Directions From Downtown:</h2>
				<p class="text">Take Buffalo Street up the hill to Stewart Avenue (flashing yellow light). Turn left on Stewart. At Campus Road, bear right. Head up Campus Road to the Willard Straight Hall parking lot on your left (just after the Cornell Cinema marquee). Enter Willard Straight Hall through the doors at the end of the Parking Lot. The Theatre is just ahead!</p>
			</div>
			<!--end of txt div-->
			<div class="col-sm-12 col-lg-6">
				<img src="images/parkingmap.jpg" alt="cinema parking map" id="parkingMap">
				<!-- img src: Cornell Cinema-->
			</div>
			<!-- end of img div -->
		</div>
		<!-- end of content div -->
		<!-- provide images and directions for parking -->
		<div class="row footer">
			<?php include "includes/footer.php" ?>
		</div>
		<!-- end of footer row div -->
	</div>
	<!-- end of container div -->
</body>
