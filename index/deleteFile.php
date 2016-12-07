<?php
	require_once("connectToDb.php");
	session_start();
	
	$conn = connect();
	
	$files = substr($_GET['filesToDelete'], 2);
	
	$ids = explode(", ", $files);
	$id = '';
	$username = getUsername();
	
		foreach ($ids as $id)
		{
			$sql = "SELECT fileLoc FROM files WHERE id=".$id;
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
		
			if(getOS()){
				$fileLoc = $username . "/" . $row['fileLoc'];
			}
		
			else{
				$fileLoc = $username . DIRECTORY_SEPARATOR . $row['fileLoc'];
			}
		
			unlink($fileLoc);
		
			$sql = "DELETE FROM files WHERE id=".$id;
		
			$result = $conn->query($sql);
		}
	
	
		header("Location:dashboard.php");
	
?>