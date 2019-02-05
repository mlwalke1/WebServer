<?php
	session_start();
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	require('database.php');
	if($_GET) { 
		$errorMessage = $_GET['errorMessage'];
	}
	else { 
		$errorMessage = ' ';
	}
	if($_POST) {
		$success = false;
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password = MD5($password); 
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
		$q = $pdo->prepare($sql);
		$q->execute(array());
		$data = $q->fetch(PDO::FETCH_ASSOC);
		//print_r($data); exit();
		if($data) {
			$_SESSION["username"] = $username;
			header("Location: success.php");
		}
		else {
			header("Location: login.php?errorMessage=Invalid username or password");
		}
	}
	// else just show empty login form
?>
<h1>Log in</h1>
<form class="form-horizontal" action="login.php" method="post">
	<input name="username" type="text" placeholder="me@email.com" required>
	<input name="password" type="password" required>
	<button type="submit" class="btn btn-success">Sign in</button>
	<a href='register.php'>Register</a>
	
	<p style="color: red;"><?php echo $errorMessage; ?></p>
</form>