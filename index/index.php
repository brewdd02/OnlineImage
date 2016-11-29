<?php
	//refresh to same page by default
	function refresh($url = ".") {
		header("refresh:2; url=". $url);
	}

	function register_user($user, $pass) {
		$db = new mysqli("localhost", "root", "", "OnlineImage");
		$stAddUser = $db->prepare("INSERT INTO Users(username, password) VALUES (?, ?)");
		$hashed = password_hash($pass, PASSWORD_DEFAULT);
		$stAddUser->bind_param("ss", $user, $hashed);
		$stAddUser->execute();
	}

	function login_user($user, $pass) {
		$db = new mysqli("localhost", "root", "", "OnlineImage");
		$stGetUser = $db->prepare("SELECT id, password FROM Users WHERE username = (?) LIMIT 1");
		$stGetUser->bind_param("s", $user);
		$stGetUser->execute();
		$stGetUser->bind_result($rId, $rPass);
		if (!$stGetUser->fetch()) {
			return false;
		}
		//returns true if passwords match
		return password_verify($pass, $rPass);
	}

	//register or login
	function try_post_index() {
		$hasUser = isset($_POST["username"]);
		$hasPass = isset($_POST["password"]);
		if (!$hasUser || !$hasPass) {
			refresh();
			printf('Incomplete request.');
			return;
		}
		$user = $_POST["username"];
		$pass = $_POST["password"];
		if (empty($user) || empty($pass)) {
			refresh();
			printf('Please fill out the form.');
			return;
		}

		if (isset($_POST["register"])) {
			//register
			register_user($user, $pass);
			refresh();
			printf('User %s created with password %s.', $user, $pass);
		} else {
			//or login
			if (login_user($user, $pass)) {
				refresh('dashboard.php'); //move to dashboard
				printf('Logged in as %s.', $user, $pass);
			} else {
				refresh();
				printf('Bad username/password.');
			}
		}
	}

	$isPOST = $_SERVER['REQUEST_METHOD'] === "POST";
	if ($isPOST) {
		try_post_index();
	} else {
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Online Image</title>
		<link rel="stylesheet" type="text/css" href="css/dropzone.css">
		<link rel="stylesheet" type="text/css" href="css/styles.css">
		<script src="js/dropzone.js"></script>
	</head>
	<body>
		<header>
			<img id="logo" src="images/logo.png" alt="logo">
			<!--<hr>
			<nav>
				<a href="">link1</a>
				<a href="">link2</a>
				<a href="">link3</a>
				<a href="">link4</a>
			</nav>-->
			<hr>
		</header>
		<section>
			<h1>Login</h1>
			<form method="post">
				<div>
					<label for="username">Username</label>
					<input name="username" type="text" />
				</div>
				<div>
					<label for="password">Password</label>
					<input name="password" type="text" />
				</div>
				<div>
					<input type="submit" name="register" value="register" />
					<input type="submit" name="login" value="login" />
				</div>
			</form>
		</section>
		<footer>
			Created for CS372<br>
			Fall 2016
		</footer>
	</body>
</html>
<?php
}
?>