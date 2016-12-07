<?php
	require_once("connectToDb.php");

	//refresh to same page by default
	function refresh($url = ".") {
		header("refresh:2; url=". $url);
	}

	function register_user($user, $pass) {
		$db = connect() or die(mysqli_error($db));
		$stAddUser = $db->prepare("INSERT INTO users(username, password) VALUES (?, ?)") or die(mysqli_error($db));
		$hashed = password_hash($pass, PASSWORD_DEFAULT);
		$stAddUser->bind_param("ss", $user, $hashed) or die(mysqli_error($db));
		$stAddUser->execute() or die(mysqli_error($db));
	}

	function login_user($user, $pass) {
		$db = connect() or die(mysqli_error($db));
		$stGetUser = $db->prepare("SELECT id, password FROM users WHERE username = (?) LIMIT 1") or die(mysqli_error($db));
		$stGetUser->bind_param("s", $user) or die(mysqli_error($db));
		$stGetUser->execute() or die(mysqli_error($db));
		$stGetUser->bind_result($rId, $rPass) or die(mysqli_error($db));
		if (!$stGetUser->fetch()) {
			return false;
		}
		//returns true if passwords match
		$goodpass = password_verify($pass, $rPass);
		if ($goodpass) {
			$_SESSION["uid"] = $rId;
			return true;
		}
		return false;
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
			echo '<span id="created">Account Successfully Created</span>';
		} else {
			//or login
			if (login_user($user, $pass)) {
				//uid session var is now set
				refresh('dashboard.php'); //move to dashboard
				printf('Logging in as %s.', $user, $pass);
			} else {
				refresh();
				printf('Bad username/password.');
			}
		}
	}

	//create/load a session
	session_start();

	$isPOST = $_SERVER['REQUEST_METHOD'] === "POST";
	if ($isPOST):
		try_post_index();
	else:
?>

<!DOCTYPE html>
<html>
	<?php include('template/head.php'); ?>
	<body>
		<?php include('template/header.php'); ?>
		<section id="login">
			<?php
				$isLoggedIn = isset($_SESSION["uid"]);
				if ($isLoggedIn) {
					include('template/login_already.php');
				} else {
					include('template/login_form.php');
				}
			?>
		</section>
		<?php include('template/footer.php'); ?>
	</body>
</html>
<?php endif ?>
