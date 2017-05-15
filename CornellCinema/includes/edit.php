<h1>Admin Edit Form for Cornell Cinema</h1>
<?php 
require_once 'config.php';
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	if(isset($_SESSION['logged_user'])){
		if (!isset($_POST['submitEdits'])) {
			?>
			<form action="adminLogin.php" method="POST" enctype="multipart/form-data">
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
				

						
							<br /><br />
							Edit Title: <input type = "text" name = "editMovieTitle">
							<br /><br />
							Edit Runtime: <input type = "text" name = "editRuntime" >
							<br /><br />
							Edit Release Year/Country: <input type = "text" name = "editRYCountry">
							<br /><br />
							Edit Director: <input type = "text" name = "editDirector">
							<br /><br />
							Edit Cast: <input type = "text" name = "editCast">
							<br /><br />
							Edit Website: <input type = "text" name = "editWebsite">
							<br /><br />
							Edit Description: <textarea name = "editDescription" rows = "4" cols = "50"></textarea>
							<br /><br />
							Edit Image: <input type="file" name="editImage" /> 
							<br /><br />
							Edit Trailer: <input type = "text" name = "editTrailer">
							<br /><br />
							Edit Subtitles: <input type = "text" name = "editSubtitles">
							<br /><br />
						
					

		
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

			if(isset($_FILES['editImage'])){
				$errors = array();
				$file_name = $_FILES['editImage']['name'];
			    $file_size =$_FILES['editImage']['size'];
			    $file_tmp =$_FILES['editImage']['tmp_name'];
			    $file_type=$_FILES['editImage']['type'];
			    $file_ext=strtolower(end(explode('.',$_FILES['editImage']['name'])));

			    $expensions= array("jpeg","jpg","png");
      
		      if(in_array($file_ext,$expensions)=== false){
		         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
		      }
		      
		      if($file_size > 2097152){
		         $errors[]='File size cannot exceed 2 MB';
		      }
		      
		      if(empty($errors)==true){
		         move_uploaded_file($file_tmp,"dbImages/".$file_name);
		         	$sql = "UPDATE Movies
					SET Image = 'dbImages/".$file_name."'
					WHERE movieID = ".$currentMovie['movieID'];
					$result = $mysqli -> query($sql);
		         echo ("Image successfully uploaded.<br>");
		      }else{
		         print_r($errors);
		      }

			}

			if(!empty($_POST['editTrailer'])){
				if (!filter_var($_POST['editTrailer'], FILTER_VALIDATE_URL) === false) {
				    $sql = "UPDATE Movies
					SET Trailer = '".$_POST['editTrailer']."'
					WHERE movieID = ".$currentMovie['movieID'];
					$result = $mysqli -> query($sql);
					echo("Trailer successfully edited.<br>");
				} else {
					echo("Trailer input is not a valid URL.");
				}
			}

			echo("<p> 
				Click <a href=\"adminLogin.php\">here</a> to make another edit.<p>");
		}
		
	}
?>