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

	<link rel="stylesheet" href="styles/style.css">
	<link rel="stylesheet" href="styles/bootstrap.css">
	<link rel="icon"       type="image/png"       href="http://example.com/myicon.png">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="js/scripts.js"></script>
	<title>Cornell Cinema</title>
</head>

<body>
	<div class="container">
		<div class="row header">
			<?php include "includes/header.php" ?>
		</div>
		<!-- end of header row div-->
		<div class="row footer">
			<div class="col-sm-12 col-lg-12">


			</div>
			<!-- end of carousel div -->

		</div>
		<!-- end of carousel row div-->

		<div class="row">
			<div class="col-sm-12 col-lg-4">


			</div>
			<!-- end of thumbnail 1 div -->
			<div class="col-sm-12 col-lg-4">


			</div>
			<!-- end of thumbnail 2 div -->
			<div class="col-sm-12 col-lg-4">


			</div>
			<!-- end of thumbnail 3 div -->

		</div>
		<!-- end of thumbnail row div -->

		<div class="row footer">
			<?php include "includes/footer.php" ?>
		</div>
		<!-- end of footer row div-->
	</div>
	<!-- end of container div -->


</body>

</html>
