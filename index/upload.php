<?php
	if(!empty($_FILES))
	{
		require_once("connectToDb.php");
		
		$conn = connect();
		
		$username = 'test';
		
		if (!file_exists($username))
		{
			mkdir($username);
		}
		
		$targetDir = $username . "/";
		$fileName = $_FILES['file']['name'];
		$targetFile = $targetDir.$fileName;
		$mimeType = $_FILES['file']['type'];

		if(move_uploaded_file($_FILES['file']['tmp_name'],$targetFile))
		{
			//insert file information into db table
			$conn->query('INSERT INTO files (username, fileLoc, mimeType) VALUES ("'.$username.'", "'.$targetFile.'", "'.$mimeType.'")');
		}
	}
?>