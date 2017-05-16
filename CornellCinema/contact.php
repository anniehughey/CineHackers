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
	<title>Contact</title>
</head>

<body>
	<div class="row header">
		<?php include "includes/header.php" ?>
	</div>
	<div class="container">
		<!-- end of header row div -->
		<!-- include contact info in addition to a contact form here -->
		<?php include "includes/contactHandler.php" ?>
	</div>
	<div class="row footer">
		<?php include "includes/footer.php" ?>
	</div>
	<!-- end of container div -->
</body>
