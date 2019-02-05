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
		<div class="row">
			<div >
                                <a href="http://localhost/cis355/Prog03/uploads/">http://localhost/cis355/Prog03/uploads/</a>
                                <br><br>
				<p><a href="upload01.html" class="btn btn-success">Upload 01</a></p>
                                <p><a href="upload02.html" class="btn btn-success">Upload 02</a></p>
                                <p><a href="upload03.html" class="btn btn-success">Upload 03</a></p>
			</div>
			
		</div>
	</div>
</body>
</html>