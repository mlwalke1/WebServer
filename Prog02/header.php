<?php
	session_start();
	if(!isset($_SESSION["username"])) {
		header("Location: login.php");
	}
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
		<div style="float: right;">
			<a href='logout.php'>Log Out</a>
		</div>