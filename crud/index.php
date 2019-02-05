<?php
	require("customers.php");
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
		<div class="row">
			<h3>PHP CRUD Grid</h3>
    </div>
		<div class="row">
			<p><a href="create.php" class="btn btn-success">Create</a></p>
		</div>
		<div class="row">
			<?php Customers::listCustomers(); ?>
		</div>
	</div>
</body>
</html>