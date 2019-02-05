<?php

class Customers {
	
	public function __construct() {
		die('Init function is not allowed');
	}
	
	public function listCustomers() {
		echo '<table class="table table-striped table-bordered">';
		echo 	'<thead>';
		echo 		'<tr>';
		echo 			'<th>Name</th>';
		echo 			'<th>Email Address</th>';
		echo 			'<th>Mobile Number</th>';
		echo 			'<th>Action</th>';
		echo 		'</tr>';
		echo 	'</thead>';
		echo 	'<tbody>';
		$pdo = Database::connect();
		$sql = 'SELECT * FROM customers ORDER BY id DESC';
		foreach ($pdo->query($sql) as $row) {
			echo '<tr>';
			echo 	'<td>'. $row['name'] . '</td>';
			echo 	'<td>'. $row['email'] . '</td>';
			echo 	'<td>'. $row['mobile'] . '</td>';
			echo 	'<td width=250>';
			echo 		'<a class="btn" href="read.php?id='.$row['id'].'">Read</a>';
			echo 		' ';
			echo 		'<a class="btn btn-success" href="update.php?id='.$row['id'].'">Update</a>';
			echo 		' ';
			echo 		'<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Delete</a>';
			echo 	'</td>';
			echo '</tr>';
		}
		Database::disconnect();
		echo 	'</tbody>';
		echo '</table>';
	}
	
	public function read() {
		$id = null;
		if(!empty($_GET['id'])) {
			$id = $_REQUEST['id'];
		}
		if($id == null) {
			header("Location: index.php");
		}
		else {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "SELECT * FROM customers where id = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($id));
			$data = $q->fetch(PDO::FETCH_ASSOC);
			Database::disconnect();
		}
		echo '<div class="control-group">';
		echo 	'<label class="control-label">Name</label>';
		echo 	'<div class="controls">';
		echo 		'<label class="checkbox">' . $data['name'] . '</label>';
		echo 	'</div>';
		echo '</div>';
		echo '<div class="control-group">';
		echo 	'<label class="control-label">Email Address</label>';
		echo 	'<div class="controls">';
		echo 		'<label class="checkbox">' . $data['email'] . '</label>';
		echo 	'</div>';
		echo '</div>';
		echo '<div class="control-group">';
		echo 	'<label class="control-label">Mobile Number</label>';
		echo 	'<div class="controls">';
		echo 		'<label class="checkbox">' . $data['mobile'] . '</label>';
		echo 	'</div>';
		echo '</div>';
	}
	
	public function customerForm($option) {
			if($option == 'update') {
				$id = null;
				if(!empty($_GET['id'])) {
					$id = $_REQUEST['id'];
				}
				if($id == null) {
					header("Location: index.php");
				}
			}
			
		if(!empty($_POST)) {
			// keep track of validation errors
			$nameError = null;
			$emailError = null;
			$mobileError = null;
		
			// keep track of post values
			$name = $_POST['name'];
			$email = $_POST['email'];
			$mobile = $_POST['mobile'];
			
			// validate input
			$valid = true;
			if(empty($name)) {
				$nameError = "Please enter Name";
				$valid = false;
			}
			
			if(empty($email)) {
				$emailError = "Please enter a valid Email Address";
				$valid = false;
			}
			
			if(empty($mobile)) {
				$mobileError = "Please enter Mobile Number";
				$valid = false;
			}
			if($valid) {
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				if($option == 'create') {
					$sql = "INSERT INTO customers (name,email,mobile) values(?,?,?)";
					$q = $pdo->prepare($sql);
					$q->execute(array($name,$email,$mobile));
				}
				else {
					$sql = "UPDATE customers set name = ?, email = ?, mobile = ? WHERE id = ?";
					$q = $pdo->prepare($sql);
					$q->execute(array($name,$email,$mobile,$id));
				}
				Database::disconnect();
				header("Location: index.php");
			}
		}
		else {
			if($option == 'update') {
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "SELECT * FROM customers where id = ?";
				$q = $pdo->prepare($sql);
				$q->execute(array($id));
				$data = $q->fetch(PDO::FETCH_ASSOC);
				$name = $data['name'];
				$email = $data['email'];
				$mobile = $data['mobile'];
				Database::disconnect();
			}
		}
		echo '<div class="control-group' . (!empty($nameError)?'error':'') . '">';
		echo 	'<label class="control-label">Name</label>';
		echo 	'<div class="controls">';
		echo 		'<input name="name" type="text" placeholder="Name" value="' . (!empty($name)?$name:'') . '">';
		if(!empty($nameError)):
			echo 	'<span class="help-inline">' .  $nameError . '</span>';
		endif;
		echo 	'</div>';
		echo '</div>';
		echo '<div class="control-group' . (!empty($emailError)?'error':'') . '">';
		echo 	'<label class="control-label">Email Address</label>';
		echo 	'<div class="controls">';
		echo 		'<input name="email" type="text" placeholder="Email Address" value="' . (!empty($email)?$email:'') . '">';
		if(!empty($emailError)):
			echo 		'<span class="help-inline">' . $emailError . '</span>';
		endif;
		echo 	'</div>';
		echo '</div>';
		echo '<div class="control-group' . (!empty($mobileError)?'error':'') . '">';
		echo 	'<label class="control-label">Mobile Number</label>';
		echo 	'<div class="controls">';
		echo 		'<input name="mobile" type="text" placeholder="Mobile Number" value="' . (!empty($mobile)?$mobile:'') . '">';
		if(!empty($mobileError)):
			echo 		'<span class="help-inline">' . $mobileError . '</span>';
		endif;
		echo 	'</div>';
		echo '</div>';
	}
	
	public function remove() {
		$id = 0;
		if(!empty($_GET['id'])) {
			$id = $_REQUEST['id'];
		}
		if(!empty($_POST)) {
			// keep track post values
			$id = $_POST['id'];
		
			// delete data
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "DELETE FROM customers WHERE id = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($id));
			Database::disconnect();
			header("Location: index.php");
		}
		return $id;
	}
}
?>