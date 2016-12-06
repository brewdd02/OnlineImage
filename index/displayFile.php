<?php 
	require("template/head.php");
	require("template/header.php"); 
	require_once("connectToDb.php");
	session_start();
?>

<section id="displayFile">
	<?php 
		$conn = connect();
		
		$id = $_GET['file'];
		$sql = "SELECT fileLoc, mimeType FROM files WHERE id=" . $id;
		$file = $conn->query($sql) or die(mysqli_error());
		$row = $file->fetch_assoc();
		
		$fileType = $row['mimeType']; 
		$filePath = $row['fileLoc']; 
		
		if ($fileType == "image/jpeg" || $fileType == "image/gif" || $fileType == "image/png")
		{
		   echo "<img id='userImg' src='". getUsername() . "/" . $filePath."'>";
		}
		else
		{
			echo "<iframe id='userFile' src='". getUsername() . "/" . $filePath . "'></iframe>";
		}
	?>
</section>

<?php require("template/footer.php"); ?>