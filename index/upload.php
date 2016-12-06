<?php
	require_once("connectToDb.php");
	session_start();
	
	if(!empty($_FILES))
	{
		
		$conn = connect();
		
		if(getOS())
		{
			$username = getcwd() . "/" . getUsername();
		}
		else
		{
			$username = getcwd() . DIRECTORY_SEPARATOR . "" . getUsername();
		}
		
		
		
		if (!file_exists($username))
		{
			mkdir($username);
		}
		
		$fileName = $_FILES['file']['name'];
		$fileSize = $_FILES['file']['size'];
		$mimeType = $_FILES['file']['type'];
		
		
		if(getOS())
		{
			$targetDir = "" . $fileName;
			$targetFile = getcwd() . "/" . getUsername() . "/" . $targetDir;
		}
		else
		{
			$targetDir = "" . $fileName;
			$targetFile = getcwd() . DIRECTORY_SEPARATOR . getUsername() . DIRECTORY_SEPARATOR . $targetDir;
		}
		
	
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