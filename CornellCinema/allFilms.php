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
	<title>All Films</title>
</head>

<body>
	<div class="row header">
		<?php include "includes/header.php" ?>
	</div>
	<div class="container">
		<!-- end of header row div -->
		<?php include "includes/filmsHandler.php" ?>
		<!-- Display all films alphabetically by default. Each film will show up in its own container, and the container will include the film photo, title, director, and year of production. Clicking on a film will bring the user to a specific movie page with more detail. -->
		<!-- A sorting feature will be implemented here where we can sort films by series, date of showing, alphabetically by title, numerically by year, or even by director. -->
	</div>
	<div class="row footer">
		<?php include "includes/footer.php" ?>
	</div>
	<!-- end of container div -->
</body>
