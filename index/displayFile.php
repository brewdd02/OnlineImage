<?php require("template/head.php"); ?>
<?php require("template/header.php"); ?>
<section id="displayFile">
	<?php 
		$fileType = "text/plain"; //change this to the actual file type
		$filePath = "test/hello.txt"; //change this to the actual file path
		
		if ($fileType == "image/jpeg" || $fileType == "image/gif" || $fileType == "image/png")
		{
		   echo "<img id='userImg' src='".$filePath."'>";
		}
		else
		{
			echo "<iframe id='userFile' src='".$filePath."'></iframe>";
		}
	?>
</section>

<?php require("template/footer.php"); ?>