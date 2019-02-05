<?php require('header.php'); ?>
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
