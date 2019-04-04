<?php
session_start();
error_reporting(0);
$id_error=$phone_error="";
if($_SESSION['username']==""){
	echo "<script>alert('Please Login')</script>";
	echo "<script>window.open('../','_self');</script>";
}
include('../config.php');
?>
<!DOCTYPE html>
<html>
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>School Finance Management System</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Samuel Mwangi">
	<meta name="keyword" content="loans,management">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="../assets/css/bootstrap.min.css" rel="stylesheet">	
	<link rel="shortcut icon" href="icons/201558.jpg">	
</head>
<body>
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="../admin/" class="btn btn-primary">Back</a></li>
		</ul>
	</div>
	<div class="container">
		<form method="GET" action="pp.php">
			<fieldset>
				<legend class="text-success col-lg-12">
					Reprint a student End Term Balance Slip
				</legend>
				<div class="table table-bordered table-success" style="padding-top: 20px">
					<table class="col-lg-12">
						<tr>
							<th>Please Enter The Registration Number</th>
						</tr>
					</table>
				</div>
					
						<div class="form-group">
							<label for="Reg Number" class="label-control">Registration Number</label>
							<input type="text" name="reg" class="form-control input-md" required>
					   
				    </div>
			</fieldset>
			<div class="row-fluid">
				<button class="btn btn-primary btn-block" type="submit" name="submit">Print</button><br>
			</div>
		</form>
	</div>
</body>
</html>