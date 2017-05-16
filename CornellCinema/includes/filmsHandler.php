<?php
	require_once 'config.php';
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
	$mysqli->set_charset("utf8");
	
?>	<div class="row content">
		<p class="text">
			<form action="allFilms.php" method='post' id="sort">
				Sort By:
				<select name="select" id="select">
					<option value="">Select an Option</option>
					<option value="title">Title</option>
					<option value="release">Release Date</option>
					<option value="time">Runtime</option>
				</select>
				<select name="ascdesc" id="ascdesc">
					<option value="asc">Ascending</option>
					<option value="desc">Descending</option>
				</select>
				<input type="submit" name="sortform" value="Sort"> 
			</form>
			
		</p>
	</div>

<?php	
	$query = "SELECT * FROM Movies";	
	if(isset($_POST['sortform'])){
		if (!empty($_POST['select'])) {
			$selectoption = $_POST['select'];
			$ascdesc = $_POST['ascdesc'];
			if ($selectoption == 'title'){
				$query = 'SELECT * FROM movies ORDER BY title ';
			}
			if ($selectoption == 'release') {
				$query = 'SELECT * FROM movies ORDER BY ReleaseYearCountry ';
			}
			if ($selectoption == 'time') {
				$query = 'SELECT * FROM movies ORDER BY Runtime ';
			}
			if ($ascdesc == 'asc') {
				$query = $query.'ASC';
			}
			if ($ascdesc == 'desc') {
				$query = $query.'DESC';
			}
		} else {
			print("<div class='row content'><p class='text'>Please select valid sort option!</p></div>");
		}
	}
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