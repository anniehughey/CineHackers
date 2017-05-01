<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Cornell Cinema Log In</title>
	</head>
	<body>
		<h1>Log In Form for Cornell Cinema</h1>
		<?php 
		$username = filter_input( INPUT_POST, 'username', FILTER_SANITIZE_STRING );
		$password = filter_input( INPUT_POST, 'password', FILTER_SANITIZE_STRING );
		if ( empty( $username ) || empty( $password ) ) {
		?>
			<h2>Log in</h2>
			<form action="login.php" method="post">
				Username: <input type="text" name="username"> <br>
				Password: <input type="password" name="password"> <br>
				<input type="submit" value="Submit">
			</form>
			
		<?php

		} else {
			
			require_once 'config.php';
			$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			if( $mysqli->connect_errno ) {
				echo "<p>$mysqli->connect_error<p>";
				die( "Couldn't connect to database");
			}
			
			$query = "SELECT * 
						FROM users
						WHERE
							username = '$username'";

			$result = $mysqli->query($query);
			
			
			if ( $result && $result->num_rows == 1) {
				
				$row = $result->fetch_assoc();
				
				$db_hash_password = $row['hashpassword'];
				
				if( password_verify( $password, $hashpassword ) ) {
					$db_username = $row['username'];
					$_SESSION['logged_user_by_sql'] = $db_username;
				}
			} 
			
			$mysqli->close();
			
			if ( isset($_SESSION['logged_user_by_sql'] ) ) {
				print("<p>You are now logged in!<p>");
			} else {
				echo '<p>You did not login successfully.</p>';
				echo '<p>Please <a href="login.php">try</a> again.</p>';
			}
			
		} 
			
		
		
		?>
	</body>
</html>
