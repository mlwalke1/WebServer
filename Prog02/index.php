<?php require('header.php'); ?>
	<div class="row">
				<h3>Customers</h3>
    </div>
		<div class="row">
			<div >
				<p><a href="create.php" class="btn btn-success">Create</a></p>
			</div>
			
		</div>
		<div class="row">
	<?php Customers::listCustomers(); ?>
		</div>
	</div>
</body>
</html>