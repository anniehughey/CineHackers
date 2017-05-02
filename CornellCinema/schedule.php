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
	<title>Schedule</title>
</head>

<body>
	<div class="container">
		<div class="row header">
			<?php include "includes/header.php" ?>
		</div>
		<!-- end of header row div -->
		<iframe src="https://www.google.com/calendar/embed?title=Cornell%20Cinema&amp;src=cornellcinemacalendar%40gmail.com&amp;height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;ctz=America%2FNew_York" 
			style=" border-width:0 "
			width="900" height="800" 
			frameborder="0" scrolling="no"></iframe>
		<div class="row footer">
			<?php include "includes/footer.php" ?>
		</div>
		<!-- end of footer row div -->
	</div>
	<!-- end of container div -->
</body>
