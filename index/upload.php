<?php
	require_once("connectToDb.php");
	session_start();
	
	if(!empty($_FILES))
	{
		$conn = connect();
		
		if(getOS())
		{
			$userpath = getcwd() . "/" . getUsername() . "/";
		}
		else
		{
			$userpath = getcwd() . DIRECTORY_SEPARATOR . "" . getUsername() . DIRECTORY_SEPARATOR;
		}
		
		
		
		if (!file_exists($userpath))
		{
			mkdir($userpath);
		}
		
		$fileName = $conn->real_escape_string($_FILES['file']['name']);
		$fileSize = $_FILES['file']['size'];
		$mimeType = $_FILES['file']['type'];
		$file =  $userpath . $fileName;
		
		if (file_exists($file))
		{
			die('File already exists!');
		}
		
		else
		{
			$targetDir = "" . $fileName;
			$targetFile = $userpath . $targetDir;
			
			if(move_uploaded_file($_FILES['file']['tmp_name'],$targetFile))
			{
				
				$sql = "INSERT INTO `files` (`id`, `username`, `fileLoc`, `mimeType`, `size`) VALUES ('','". getUsername() ."', '".$targetDir."', '".$mimeType."',
						'". $fileSize . "')";
				//insert file information into db table
				$conn->query($sql);
			}
		
			$conn->close();
		}
	}
?>