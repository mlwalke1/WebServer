<?php require('header.php'); ?>
		<div class="span10 offset1">
			<div class="row">
				<h3>Create a Customer</h3>
			</div>
			<form class="form-horizontal" action="create.php" method="post">
				<?php Customers::customerForm("create"); ?>
				<div class="form-actions">
					<button type="submit" class="btn btn-success">Create</button>
					<a class="btn" href="index.php">Back</a>
				</div>
			</form>
		</div>
		
	</div>
</body>
</html>