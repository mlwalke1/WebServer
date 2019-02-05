<?php 
	require('header.php');
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
	} 
?>
		<div class="span10 offset1">
			<div class="row">
				<h3>Update a Customer</h3>
			</div>
			<form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">
				<?php Customers::customerForm("update"); ?>
				<div class="form-actions">
					<button type="submit" class="btn btn-success">Update</button>
					<a class="btn" href="index.php">Back</a>
				</div>
			</form>
		</div>
		
	</div>
</body>
</html>