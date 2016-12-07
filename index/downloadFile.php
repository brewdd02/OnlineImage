<?php

require_once('connectToDb.php');
session_start();

$connection = connect();

$files = substr($_GET['filesToDownload'], 2);
$ids = explode(', ', $files);
$username = getUsername();
$zipname = $username . "_Files.zip";
$zip = new ZipArchive;

if(count($ids) > 1)
{

	if($zip->open($zipname, ZipArchive::CREATE) === TRUE)
	{


	foreach( $ids as $id)
	{
		$sql = "SELECT fileLoc FROM files WHERE id=" . $id;
		$result = $connection->query($sql);
		$row = $result->fetch_assoc();
	
		if(getOS())
		{
			$fileLoc = $username . "/" . $row['fileLoc'];
		}
	
		else
		{
			$fileLoc = $username . DIRECTORY_SEPARATOR . $row['fileLoc'];
			
		}
	
		if(file_exists($fileLoc))
		{
		
			$zip->addFile($fileLoc);
		}	
		else{
			echo "file does not exist";
		}

	}

	$zip->close();

	}

	if (file_exists($zipname))
	{
		header('Content-type: application/zip');
		header('Content-Disposition: attachment; filename="'.$zipname.'"');
		readfile($zipname);
	}
}

else if(count($ids) === 1){
	
	$sql = "SELECT mimeType, fileLoc FROM files WHERE id=" . $ids[0];
	$result = $connection->query($sql);
	$row = $result->fetch_assoc();
	
	if(getOS())
		{
			$fileLoc = $username . "/" . $row['fileLoc'];
		}
	
		else
		{
			$fileLoc = $username . DIRECTORY_SEPARATOR . $row['fileLoc'];
			
		}
		
	if(file_exists($fileLoc))
	{
		header('Content-type: ' . $row['mimeType']);
		header('Content-Disposition: attachment; filename="'.$row['fileLoc'].'"');
		readfile($fileLoc);
	}
	
}





?>