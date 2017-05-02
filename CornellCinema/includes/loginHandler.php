<h1>Login Form for Cornell Cinema</h1>

<?php 
	$username = filter_input( INPUT_POST, 'username', FILTER_SANITIZE_STRING );
	$password = filter_input( INPUT_POST, 'password', FILTER_SANITIZE_STRING );
	if ( empty( $_POST['username'] ) || empty( $_POST['password'] ) ) {
	?>
	<h2>Log in</h2>
	<form action="adminLogin.php" method="post">
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
					username = ?
				";

	$stmt = $mysqli->stmt_init();

	if($stmt -> prepare($query)){
	$stmt -> bind_param("s", $username);

	$stmt -> execute();

	
	$result = $stmt -> get_result();

	while($row = $result->fetch_array(MYSQL_ASSOC)){

		$hashpassword = $row['hashpassword'];

		if( password_verify( $password, $hashpassword ) ) {
			$db_username = $row['username'];
			$_SESSION['logged_user'] = $db_username;
		}
	}
	
	}

	if ( isset($_SESSION['logged_user'] ) ) {
		print("<p>You are now logged in!<p>");
	} else {
		echo '<p>You did not login successfully.</p>';
		echo '<p>Please <a href="adminLogin.php">try</a> again.</p>';
	}
}
?>



