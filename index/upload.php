<?php
	require_once("connectToDb.php");
	session_start();
	
	if(!empty($_FILES))
	{
		
		$conn = connect();
		
		$username = getcwd() . DIRECTORY_SEPARATOR . "" . getUsername();
		
		if (!file_exists($username))
		{
			mkdir($username);
		}
		
		$fileName = $_FILES['file']['name'];
		$targetDir = "" . getUsername() . DIRECTORY_SEPARATOR . $fileName;
		$fileSize = $_FILES['file']['size'];
		$targetFile = getcwd().DIRECTORY_SEPARATOR.$targetDir;
		$mimeType = $_FILES['file']['type'];
	
		if(move_uploaded_file($_FILES['file']['tmp_name'],$targetFile))
		{
			$sql = "INSERT INTO `files` (`id`, `username`, `fileLoc`, `mimeType`, `size`) VALUES ('','". getUsername() ."', '".$targetDir."', '".$mimeType."',
					'". $fileSize . "')";
			//insert file information into db table
			$conn->query($sql);
		}
		
		$conn->close();
	}
?>