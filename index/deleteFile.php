<?php
	require_once("connectToDb.php");
	session_start();
	
	$conn = connect();
	
	$files = substr($_GET['filesToDelete'], 2);
	
	$ids = explode(", ", $files);
	
	print_r($ids);
	
	
	$id = '';
	$username = getUsername();
	
	foreach ($ids as $id)
	{
		$sql = "SELECT fileLoc FROM files WHERE id=".$id;
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		
		$fileLoc = $row['fileLoc'];
		
		unlink($fileLoc);
		
		$sql = "DELETE FROM files WHERE id=".$id;
		
		$result = $conn->query($sql);
	}
	
	header("Location:dashboard.php");
	
?>