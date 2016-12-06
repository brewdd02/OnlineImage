<?php

require_once('connectToDb.php');
session_start();

if(!empty($_POST['file'])){

	$conn = connect();
	$sql = "SELECT fileLoc FROM files WHERE id=" . $_POST['search'];
	$file = $conn->query($sql) or die(mysqli_error());
	
	echo "<iframe src=\"" . $file ."\" height=\"500\" width=\"300\"></iframe>";
	
	

	$conn->close();
}



?>