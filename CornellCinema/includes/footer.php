<ul>
	<li><a href="contact.php" class="footer_item">CONTACT US</a></li>
	<li><a href="donate.php" class="footer_item">DONATE</a></li>
	<li><a href="advertise.php" class="footer_item">ADVERTISE</a></li>
	<li><a href="getInvolved.php" class="footer_item">GET INVOLVED</a></li>
	<?php
		if(!isset($_SESSION['logged_user'])){
			echo "<li><a href='login.php' class='nav_item'>ADMIN LOG IN</a></li>";
		}else{
			echo "<li><a href='index.php?logout=true' class='nav_item'>ADMIN LOG OUT</a></li>";
		}
	?>
</ul>
