<?php
	require_once 'config.php';
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); //this depends where it is hosted
	
	//$email = $_GET['
	$query = "SELECT * 
				FROM Movies";	
	$result = $mysqli->query( $query );
	
	while($row = $result->fetch_assoc()) {
		print(json_encode($row));
	}
?>