<h1>Login</h1>
<form method="post" action="login.php">
	<div id="outer">
		<div>
			<input id="username" name="username" type="text" placeholder="Username" class="form-control"/>
		</div>
		<br>
		<div>
			<input id="password" name="password" type="password" placeholder="Password"  class="form-control"/>
		</div>
		<br>
		<div>
			<input type="submit" id="registerBtn" class="btn btn-primary" name="register" value="Register" />
			<input type="submit" id="loginBtn" class="btn btn-primary" name="login" value="Login" />
		</div>
	</div>
</form>

<script>
	$(document).ready(function() {
	  $(window).keydown(function(event){
		if(event.keyCode == 13) {
		  event.preventDefault();
		  $('#loginBtn').click();
		  return false;
		}
	  });
	});
</script>
