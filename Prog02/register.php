<?php
	require("database.php");
	if(!empty($_POST)) {
		// keep track validation errors
		$nameError = null;
		$passwordError = null;
		
		// keep track post values
		$name = $_POST['name'];
		$password = $_POST['password'];
		
		// validate input
		$valid = true;
		if (empty($name)) {
			$nameError = 'Please enter Name';
			$valid = false;
		}
		
		if (empty($password)) {
			$passwordError = 'Please enter Email Address';
			$valid = false;
		} 
		
		// insert data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO users (username,password) values(?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($name,Md5($password)));
			Database::disconnect();
			header("Location: login.php");
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="span10 offset1">
			<div class="row">
				<h3>Register</h3>
			</div>
			<form class="form-horizontal" action="register.php" method="post">
				<div class="control-group <?php echo !empty($nameError)?'error':'';?>">
					<label class="control-label">name</label>
					<div class="controls">
						<input name="name" type="text"  placeholder="name" value="<?php echo !empty($name)?$name:'';?>">
						<?php if (!empty($nameError)): ?>
							<span class="help-inline"><?php echo $nameError;?></span>
						<?php endif; ?>
					</div>
				</div>
				<div class="control-group <?php echo !empty($passwordError)?'error':'';?>">
					<label class="control-label">Password</label>
						<div class="controls">
							<input name="password" type="password" placeholder="password" value="<?php echo !empty($password)?$password:'';?>">
								<?php if (!empty($passwordError)): ?>
									<span class="help-inline"><?php echo $passwordError;?></span>
								<?php endif;?>
						</div>
				</div>
				<div class="form-actions">
					<button type="submit" class="btn btn-success">Register</button>
					<a class="btn" href="login.php">Back</a>
				</div>
			</form>
		</div>
	</div> <!-- /container -->
</body>
</html>
        