<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>BoxDrop</title>
		<link rel="stylesheet" type="text/css" href="css/dropzone.css">
		<link rel="stylesheet" type="text/css" href="css/styles.css">
		<script src="js/dropzone.js"></script>
	</head>
	<body>
		<?php include("template/header.php"); ?>
		<section>
			<form action="upload.php" class="dropzone"></form>
			<br/>
			<br/>
			<form id="displayImage" action="displayImage.php" method="post">
				Input a username: <input type="text" name="username">
				<input type="submit" value="View images" name="submit">
			</form>
		</section>
		<footer>
			Created for CS372<br>
			Fall 2016
		</footer>
	</body>
</html>