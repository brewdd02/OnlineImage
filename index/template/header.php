<?php require_once("connectToDb.php"); ?>

<header>
	<img id="logo" src="images/logo.png" alt="logo">
	<?php if (isset($_SESSION["uid"])): ?>
	<!-- show username when logged in -->
	<span>You are logged in as <?php echo getUsername(); ?></span>
	<?php endif ?>
	<hr>
</header>
