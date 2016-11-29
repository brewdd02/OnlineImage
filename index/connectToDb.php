<?php
	function connect()
	{
		//database configuration
		$dbHost = 'localhost';
		$dbUsername = 'root';
		$dbPassword = '';
		$dbName = 'boxdrop';
		
		//connect with the database
		$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
		
		if($conn->connect_errno)
		{
			echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			return;
		}
		
		return $conn;
	}
?>