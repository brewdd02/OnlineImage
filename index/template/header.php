<?php require_once("connectToDb.php");?>
	
<header>
	<input type="image" id="logo" name="logo" src="images/logo.png" alt="logo" onClick="window.location.href = 'dashboard.php';"/>
	<?php if (isset($_SESSION["uid"])): ?>
	<!-- show username when logged in -->
	<span>You are logged in as <?php echo getUsername(); ?></span>
	<?php endif ?>
	<hr>
</header>
