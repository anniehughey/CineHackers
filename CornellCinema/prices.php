<?php session_start(); ?>
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
	<title>Prices</title>
</head>

<body>
	<div class="container">
		<div class="row header">
			<?php include "includes/header.php" ?>
		</div>
		<!-- end of header row div -->
		<!-- list the ticket prices and provide a link to the online ticketing website -->

		<div class="row thumbnails">
			<div class="col-sm-12 col-lg-4 map">
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
				<p class="text">Please note: special ticket prices may be charged for some events. The Box Office opens 20 minutes before the scheduled showtime, and remains open 30 minutes after the film has started.</p>
			</div>
			<!-- end of thumbnail 1 div -->
			<div class="col-sm-12 col-lg-4 prices">
				<h2>Cornell Cinema Six Pass</h2>
				<ul>
					<li>Students: $27</li>
					<li>Senior Citizens (62+): $35</li>
					<li>General Admission: $40</li>
				</ul>
				<p class="text">The Cornell Cinema Six Pass is good for six admissions. It is valid for one year from the date of purchase and can be used for 2 admissions per screening. Cards are available at the box office before screenings or online at <a href="http://cornellcinematickets.universitytickets.com/user_pages/event_listings.asp">CornellCinemaTickets.com</a>. Use your credit card, cash, or check at the Willard Straight Theatre box office.</p>

			</div>
			<!-- end of thumbnail 2 div -->
			<div class="col-sm-12 col-lg-4 media">
				<h1>Group Rates</h1>
				<ul>
					<li>10-19 people: $5.25 per ticket</li>
					<li>20-49 people: $5.00 per ticket</li>
					<li>50-199 people: $4.00 per ticket</li>
					<li>200+ people: $3.50 per ticket</li>
				</ul>
				<p class="text">Group Rates are available through the Cornell Cinema office, located in 104 Willard Straight Hall. Arrangements for group rates must be made by contacting the Cinema office (607-255-3522) at least one day in advance of the screening your group would like to attend. We can bill your department if you provide us with an account number. Sorry, no refunds for unused tickets</p>

			</div>
			<!-- end of thumbnail 3 div -->

		</div>
		<!-- end of thumbnail row div -->

		<div class="row footer">
			<?php include "includes/footer.php" ?>
		</div>
		<!-- end of footer row div -->
	</div>
	<!-- end of container div -->
</body>
