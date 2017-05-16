<?php
	require_once 'config.php';
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
	$mysqli->set_charset("utf8");
	
	$query = "SELECT * 
				FROM Movies";	
	$result = $mysqli->query( $query );
	echo("<div class = 'filmContainer'>");
	while($row = $result -> fetch_assoc()) {
		echo("<div class = 'filmEntry'>");
			echo("<img src = " . $row['Image'] . ">");
			echo("<div class = 'filmDescription'>");
				echo("<div class = 'filmHeading'>");
					echo("<h1>".$row['Title']."</h1><h3>".$row['ReleaseYearCountry']."</h3>");
				echo("</div>");
				echo("<h5><b>Director:</b> ".$row['Director']."</h5>");
				echo("<h5><b>Cast:</b> ".$row['Cast']."</h5>");
				echo("<p><b>Description:</b> ".$row['Description']."</p>");
				echo("<h5><b>Runtime:</b> ".$row['Runtime']." min</h5>");
				echo("<h5><b>Format:</b> ".$row['Format']."</h5>");
				echo("<h5><b>Subtitles:</b> ");
					if($row['Subtitles'] == '0'){echo("No ");}
					if($row['Subtitles'] == '1'){echo("Yes ");}
				echo("</h5>");
			echo("</div>");
		echo("</div>");
	}
	echo("</div>");



?>