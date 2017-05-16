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
	<title>Donate</title>
</head>

<body>
	<div class="container">
		<div class="row header">
			<?php include "includes/header.php" ?>
		</div>
		<!-- end of header row div -->
		<!-- Include more information on the Cornell Cinema, reasons for donating, and a donation form. -->
		<div class="content">
			<h2>In 2010, Cornell Cinema celebrated its 40th anniversary, and for 4 decades, we managed to keep our projectors rolling with little assistance from individual donations. But with rapidly evolving technologies changing the ways films are released and experienced, we now critically need your help.</h2>
			<div class="row thumbnails">
				<div class="col-sm-12 col-lg-4 map">
					<h1>“I didn't need to go to film school. Cornell Cinema was my film school.” —Doug Block ’75, Sundance, Emmy and Peabody-award winning filmmaker</h1>


				</div>
				<!-- end of thumbnail 1 div -->
				<div class="col-sm-12 col-lg-4 prices">
					<h1>“In my mind, Cornell Cinema is the single best extra-curricular program that the University offers. Stimulating, well-organized, smart…” —Josi Ward, graduate student in College of Architecture, Art and Planning</h1>


				</div>
				<!-- end of thumbnail 2 div -->
				<div class="col-sm-12 col-lg-4 media">
					<h1>“One of the greatest sources of culture available to the Cornell community.” —Paul Cueva ’10, College of Engineering</h1>

				</div>
				<!-- end of thumbnail 3 div -->

			</div>
			<!-- end of thumbnail row div -->


			<p class="text">A donation from you, large or small, will help us continue to offer the wide variety and quality of films patrons have come to expect from Cornell Cinema, as well as present the increasingly important live events (visiting filmmakers, live music/film performances) that bring people into the theatre at a time when there are so many alternative ways to view a film on its own.<br> Please accept our invitation to become a Friend of Cornell Cinema by making a tax-deductible contribution. Unrestricted gifts, no matter what the amount, help support Cornell Cinema. Gifts may also be designated to support a specific area of our activities. We are happy to send you a list of particular needs and funding opportunities—simply email director Mary Fessenden at mkf2@cornell.edu for more information.</p>
			<a href="https://www.giving.cornell.edu/give/?gifttype=5&gifttype2=88&comments=Cornell%20Cinema%20%23%20065118">
				<div class="donate">
					<h1 class="donateButton">DONATE NOW</h1>

				</div>
			</a>
			<!-- end of donate div-->


		</div>
		<!-- end of content div -->
		<div class="row footer">
			<?php include "includes/footer.php" ?>
		</div>
		<!-- end of footer row div -->
	</div>
	<!-- end of container div -->
</body>
