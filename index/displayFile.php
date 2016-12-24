<?php 
	require_once("connectToDb.php");
	require("template/head.php");
	require("template/header.php"); 
	session_start();
?>

<section id="displayFile">
	<?php 
		$conn = connect();
		
		$id = $_GET['file'];
		$sql = "SELECT username, fileLoc, mimeType FROM files WHERE id=" . $id;
		$file = $conn->query($sql) or die(mysqli_error());
		$row = $file->fetch_assoc();
		$username = $row['username'];
		$fileType = $row['mimeType']; 
		$fileCheck = explode('.', $row['fileLoc']);
		
		if(getOS())
		{
			$filePath = $username . "/" . $row['fileLoc']; 
		}
		
		else
		{
			$filePath = $username . DIRECTORY_SEPARATOR . $row['fileLoc'];
		}
		
		if ($fileCheck[1] == "php")
		{
			$fileToShow = "admin/phpFile/show.txt";
			copy($filePath, $fileToShow);
			echo "<iframe id='userFile' src='" . $fileToShow . "'></iframe>";
		}
		
		else if ($fileType == "image/jpeg" || $fileType == "image/gif" || $fileType == "image/png")
		{
		   echo "<img id='userImg' src='". $filePath. "'>";
		}
		
		else
		{
			echo "<iframe id='userFile' src='" . $filePath . "'></iframe>";
		}
	?>
</section>

<?php require("template/footer.php"); ?>
