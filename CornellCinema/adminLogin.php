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
	<title>Admin Log In</title>
</head>

<body>
	<div class="container">
		<div class="row header">
			<?php include "includes/header.php"; 
			if(isset($_SESSION['logged_user'])){
				echo("<p>You are already logged in. 
				Click <a href=\"index.php?logout=true\">here</a> to log out.<p>");
			}
			?>
		</div>
		<!-- end of header row div -->
		<div class="row admin">
			<?php include "includes/loginHandler.php" ?>
		</div><!-- end of admin row div-->
		<div class="row footer">
			<?php include "includes/footer.php" ?>
		</div>
		<!-- end of footer row div -->
	</div>
	<!-- end of container div -->
</body>
