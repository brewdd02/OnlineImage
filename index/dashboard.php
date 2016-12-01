<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<?php include('template/head.php'); ?>
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
		<?php include('template/footer.php'); ?>
	</body>
</html>