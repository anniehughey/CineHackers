<h1>Admin Edit Form for Cornell Cinema</h1>
<?php 
require_once 'config.php';
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	if(isset($_SESSION['logged_user'])){
		if (!isset($_POST['submitEdits'])) {
			?>
			<form action="adminLogin.php" method="post">
				<!-- Insert input to choose editable object, ie movies-->
				Select Movie to Edit: <select name = "selectMovieTitle">
				<?php
					$movietitle = "SELECT * FROM Movies";
					$result = $mysqli -> query($movietitle);
					while($row = $result -> fetch_assoc()) {
						echo("<option value = ".$row["movieID"].">" . $row["Title"] . "</option>");
					}
				?>
				</select>
				<!-- Insert input to choose specific editable feature, ie description-->
				<?php

						
							echo("<br /><br />");
							echo('Edit Title: <input type = "text" name = "editMovieTitle">');
							echo("<br /><br />");
							echo('Edit Runtime: <input type = "text" name = "editRuntime" >');
							echo("<br /><br />");
							echo('Edit Release Year/Country: <input type = "text" name = "editRYCountry">');
							echo("<br /><br />");
							echo('Edit Director: <input type = "text" name = "editDirector">');
							echo("<br /><br />");
							echo('Edit Cast: <input type = "text" name = "editCast">');
							echo("<br /><br />");
							echo('Edit Website: <input type = "text" name = "editWebsite">');
							echo("<br /><br />");
							echo('Edit Description: <textarea name = "editDescription" rows = "4" cols = "50"></textarea>');
							echo("<br /><br />");
							echo('Edit Image: <input type = "text" name = "editImage">');
							echo("<br /><br />");
							echo('Edit Trailer: <input type = "text" name = "editTrailer">');
							echo("<br /><br />");
							echo('Edit Subtitles: <input type = "text" name = "editSubtitles">');
							echo("<br /><br />");
						
					

				?>
				<!-- Insert text input for edits -->
				<input type="submit" name = "submitEdits" value="Edit">
			</form>
			<?php
		} 
		if(isset($_POST['submitEdits'])){
			$query = "SELECT * FROM Movies WHERE movieID = " . $_POST['selectMovieTitle'];
			$result2 = $mysqli -> query($query);
			$currentMovie = $result2 -> fetch_array(MYSQLI_ASSOC);
			// insert code to process editing. this will be similar to project 3
			if(!empty($_POST['editMovieTitle'])){
				/**if(!preg_match('/^[a-z0-9_\s]+$/i', $_POST['editalbumtitle'])){
					echo("Album title may only contain letters, numbers, spaces, and underscores.");
				}else{*/
				//Update movie title.
				$sql = "UPDATE Movies
				SET Title = '".$_POST['editMovieTitle']."'
				WHERE movieID = ".$currentMovie['movieID'];
				$result = $mysqli -> query($sql);
				echo("Movie title successfully edited.<br>");
				//}
			}

			if(!empty($_POST['editRuntime'])){
				if(!preg_match('/^[1-9][0-9]{0,2}$/', $_POST['editRuntime'])){
					echo('Runtime must be integer value between 0 and 999 minutes.');
				}
				else{
					$sql = "UPDATE Movies
					SET Runtime = '".$_POST['editRuntime']."'
					WHERE movieID = ".$currentMovie['movieID'];
					$result = $mysqli -> query($sql);
					echo("Runtime successfully edited.<br>");
				}
			}

			if(!empty($_POST['editRYCountry'])){
				if(!preg_match('/^[0-9]{4}[a-z\s]+$/i', $_POST['editRYCountry'])){
					echo('Release Year/Country must contain 4-digit year, space, and country\'s name.');
				}
				else{
					$sql = "UPDATE Movies
					SET ReleaseYearCountry = '".$_POST['editRYCountry']."'
					WHERE movieID = ".$currentMovie['movieID'];
					$result = $mysqli -> query($sql);
					echo("Release Year/Country successfully edited.<br>");
				}
			}

			if(!empty($_POST['editDirector'])){
				if(!preg_match('/^[a-z\s]+$/i', $_POST['editDirector'])){
					echo("Director's name must only contain alphabetical characters.");
				}
				else{
					$sql = "UPDATE Movies
					SET Director = '".$_POST['editDirector']."'
					WHERE movieID = ".$currentMovie['movieID'];
					$result = $mysqli -> query($sql);
					echo("Director successfully edited.<br>");
				}
			}

			if(!empty($_POST['editCast'])){
				if(!preg_match('/^[a-z\s]+$/i', $_POST['editCast'])){
					echo("Cast must only contain alphabetical characters and spaces.");
				}
				else{
					$sql = "UPDATE Movies
					SET Cast = '".$_POST['editCast']."'
					WHERE movieID = ".$currentMovie['movieID'];
					$result = $mysqli -> query($sql);
					echo("Cast successfully edited.<br>");
				}
			}

			if(!empty($_POST['editWebsite'])){
				if (!filter_var($_POST['editWebsite'], FILTER_VALIDATE_URL) === false) {
				    $sql = "UPDATE Movies
					SET Website = '".$_POST['editWebsite']."'
					WHERE movieID = ".$currentMovie['movieID'];
					$result = $mysqli -> query($sql);
					echo("Website successfully edited.<br>");
				} else {
					echo("Website input is not a valid URL.");
				}
			}

			if(!empty($_POST['editDescription'])){
				/**if(!preg_match('/^[a-z0-9_\s]+$/i', $_POST['editalbumtitle'])){
					echo("Album title may only contain letters, numbers, spaces, and underscores.");
				}else{*/
				//Update movie title.
				$sql = "UPDATE Movies
				SET Description = '".$_POST['editDescription']."'
				WHERE movieID = ".$currentMovie['movieID'];
				$result = $mysqli -> query($sql);
				echo("Description successfully edited.<br>");
				//}
			}





			echo("<p> 
				Click <a href=\"adminLogin.php\">here</a> to make another edit.<p>");
		}
		
	}
?>