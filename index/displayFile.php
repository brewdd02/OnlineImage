<?php require("template/head.php"); ?>
<?php require("template/header.php"); ?>
<section id="displayFile">
	<?php 
		$fileType = "application/pdf"; //change this to the actual file type
		$filePath = "test/a.pdf"; //change this to the actual file path
		
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