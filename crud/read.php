<?php
	require('customers.php');
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
				<h3>Read a Customer</h3>
			</div>
			<div class="form-horizontal">
				<?php Customers::read(); ?>
				<div class="form-actions">
					<a class="btn" href="index.php">Back</a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
