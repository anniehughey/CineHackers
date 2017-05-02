<h1>Admin Edit Form for Cornell Cinema</h1>
<?php 
	if(isset($_SESSION['logged_user'])){
		if (empty($_POST['submit'])) {
			print("<p>Admin Edit Form</p>");
			?>
			<form action="adminLogin.php" method="post">
				<!-- Insert input to choose editable object, ie movies-->
				<!-- Insert input to choose specific editable feature, ie description-->
				<!-- Insert text input for edits -->
				<input type="submit" value="Edit">
			</form>
			<?php
		} else {
			// insert code to process editing. this will be similar to project 3
		}
	}
?>
