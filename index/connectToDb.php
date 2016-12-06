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

	function getUsername()
	{
		$uid = $_SESSION["uid"];
		$db = connect();
		$stGetUser = $db->prepare("SELECT username FROM users WHERE id = (?) LIMIT 1") or die(mysqli_error($db));
		$stGetUser->bind_param("i", $uid) or die(mysqli_error($db));
		$stGetUser->execute() or die(mysqli_error($db));
		$stGetUser->bind_result($rUsername) or die(mysqli_error($db));
		if (!$stGetUser->fetch()) {
			return 'nobody';
		}
		return $rUsername;
	}
?>