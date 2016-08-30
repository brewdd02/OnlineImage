<?php
	if (isset($_POST['submit']))
	{
		$link = mysqli_connect("localhost", "root", "", "OnlineImage");

		if (!$link) 
		{
			echo "Error: Unable to connect to MySQL.";
			return;
		}
		
		$filename = $_FILES['fileToUpload']['name'];
		$mimeType = $_FILES['fileToUpload']['type'];
		$username = $_POST['username'];
		
		if (!file_exists($username))
		{
			mkdir($username);
		}
		
		$file = $_FILES['fileToUpload']['tmp_name'];
		
		rename($file, $username."/".$filename);
		
		$file = $username."/".$filename;
		
		if (!file_exists($file))
		{
			echo 'file not found';
			return;
		}
		
		$sql = 'INSERT INTO images (username, imageLoc) VALUES ("'.$username.'", "'.$file.'")';
		$link->query($sql);
	}
?>