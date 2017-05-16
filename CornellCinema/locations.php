<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="styles/style.css">
	<link rel="stylesheet" href="styles/bootstrap.css">
	<link rel="icon"       type="image/png"       href="http://example.com/myicon.png">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="js/scripts.js"></script>
	<title>Location</title>
</head>

<body>
	<div class="container">
		<div class="row header">
			<?php include "includes/header.php" ?>
		</div>
		<!-- end of header row div -->
		<!-- List the locations and provide google maps containers and links to directions for each -->
		<!-- also provide links to parking -->
		<div class="row content">
			<div class="row">
				<h1 class="title">WILLARD STRAIGHT HALL</h1>
				<div class="col-sm-12 col-lg-3">
					<p class="text">
						Films are screened five nights a week (Wed–Sun) in the beautiful and historic Willard Straight Theatre (pictured) during the academic year. Occasional screenings are held in Sage Chapel and outside on the Willard Straight Terrace.
					</p>
					<p class="text">Willard Straight Theatre is equipped with Dolby Digital Surround Sound, DCP, 35mm reel-to-reel (w/silent speed option), Blu-ray and DVD projection facilities. 16mm can also be accommodated with portable projectors. A concession stand in the lobby sells reasonably priced popcorn, beverages, candy and organic snacks from the Greenstar Cooperative Market. Seating capacity is 340.Click here for information about <a href="parking.php">directions and parking</a>.</p>
				</div>
				<div class="col-sm-12 col-lg-9">
					<img src="images/theater_image.jpg" alt="Willard Straight Hall" id="WSH">
					<!-- img src: Cornell Cinema -->
				</div>
				<!--end of img div-->
			</div>
			<!-- end of WSH div-->
			<div class="row">
				<h1 class="title">SAGE CHAPEL</h1>
				<div class="col-sm-12 col-lg-3">
					<p class="text">Cornell Cinema hosts one or two free special events each semester in Sage Chapel. This magnificent, non-denominational chapel was designed by Charles Babcock, Cornell’s first professor of architecture, in 1875, with additions to the building in 1898, 1905 and 1940. There are Tiffany windows, memorial windows to war veterans and one to the civil rights workers murdered together during the Freedom Summer of 1964: Michael Schwerner '61, James Chaney, and Andrew Goodman. Sage Chapel also features Cornell's largest organ, an Aoelian-Skinner installed in 1940, which sometimes features in our screenings there. Seating capacity is 748. Click here for information about<a href="parking.php">directions and parking</a>.</p>
				</div>
				<div class="col-sm-12 col-lg-9">
					<img src="images/sage.jpg" alt="Sage chapel" id="sage">
					<!-- img src: Cornell Cinema -->
				</div>
				<!--end of img div-->
			</div>
			<!-- end of WSH div-->
		</div>
		<!-- end of content div -->
		<div class="row footer">
			<?php include "includes/footer.php" ?>
		</div>
		<!-- end of footer row div -->
	</div>
	<!-- end of container div -->
</body>
