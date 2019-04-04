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
		<form method="POST" action="info.php">
			<fieldset>
				<legend class="text-success col-lg-12">
					Edit Student Details
				</legend>
				<div class="table table- table-success" style="padding-top: 20px">
					<table class="col-lg-12">
						<tr>
							<th>Personal details</th>
						</tr>
					</table>
				</div>
					<div class="row">
					<div class="col-lg-3">
						<div class="form-group">
							<?php
							$delid=$_GET['view'];
							$view="SELECT * FROM student WHERE reg_no='$delid'";
							$retval=mysqli_query($conn,$view);
							while($st=mysqli_fetch_array($retval)){
								$fname=$st['fname'];
								$sname=$st['sname'];
								$tname=$st['tname'];
								$gender=$st['gender'];
								$physical=$st['challenge'];
								$pname=$st['parent_name'];
								$po=$st['parent_occupation'];
								$pp=$st['parent_contact'];
								$reg=$st['reg_no'];
								$class=$st['class'];
								$stream=$st['stream'];
								$fa=$st['fees_amount'];
								$bal=$st['balance'];
								$exp=$st['expense'];
							}?>
							<label for="First Name" class="label-control">First Name</label>
							<input type="text" name="first" class="form-control input-md" placeholder="enter the First Name Here" value="<?php echo $fname; ?>" autofocus="true" required>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label for="Middle Name" class="label-control">Middle Name</label>
							<input type="text" name="middle" class="form-control input-md" placeholder="enter the Middle  Name Here" value="<?php echo $sname; ?>" autofocus="true" required>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label for="Last Name" class="label-control">Last Name</label>
							<input type="text" name="last" class="form-control input-md" placeholder="enter the Last Name Here" value="<?php echo $tname; ?>" autofocus="true" required>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label for="Gender" class="label-control">Gender</label>
							<input type="text" name="gender"  class="form-control input-md" value="<?php echo $gender; ?>">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3">
						<div class="form-group">
							<label for="Physically Challenged" class="label-control">Physically Challenged</label>
							<input type="text" name="physical" class="form-control input-md" value="<?php echo $physical?>">
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label for="First Name" class="label-control">Parent Name</label>
							<input type="text" name="pname" class="form-control input-md" placeholder="Parent Name Here" value="<?php echo $pname?>" required="true" autofocus="true">
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label for="First Name" class="label-control">Occupation</label>
							<input type="text" name="occupation" class="form-control input-md" placeholder="Parent Occupation Here" value="<?php echo $po?>" required="true" autofocus="true">
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label for="First Name" class="label-control">Phone Number</label>
							<input type="number" name="pno" class="form-control input-md" placeholder="Parent Phone Number" value="<?php echo $pp?>" required="true" autofocus="true">
						</div>
					</div>
				</div>
				<div class="table table-bordered table-success" style="padding-top: 20px">
					<table class="col-lg-12">
						<tr>
							<th>Academic Details</th>
						</tr>
					</table>
				</div>
					<div class="row">
					<div class="col-lg-4">
						<div class="form-group">
							<label for="First Name" class="label-control">Registration Number</label>
							<input type="text" name="reg1" class="form-control input-md" placeholder="Enter the Registration Number" value="<?php echo $reg?>" readonly>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label for="First Name" class="label-control">Form</label>
							<input type="text" class="form-control" name="class" value="<?php echo $class?>" readonly>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label for="First Name" class="label-control">Stream</label>
							<input type="text" class="form-control" name="stream" value="<?php echo $stream?>" readonly>
						</div>
					</div>
				</div>
				<div class="table table-bordered table-success" style="padding-top: 20px">
					<table class="col-lg-12">
						<tr>
							<th>About Fees</th>
						</tr>
					</table>
				</div>
				<div class="row">
					<div class="col-lg-4">
						<div class="form-group">
							<label for="First Name" class="label-control">Fees Amount</label>
							<input type="text" name="reg1" class="form-control input-md" placeholder="Enter the Registration Number" value="<?php echo $fa?>" autofocus="true" readonly>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label for="First Name" class="label-control">Balance</label>
							<input type="text" class="form-control" name="class" value="<?php echo $bal?>"readonly>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label for="First Name" class="label-control">Penalty</label>
							<input type="text" class="form-control" name="stream" value="<?php echo $exp?>" readonly='true'>
						</div>
					</div>
				</div>
			</fieldset>
			<div class="row">
				<div class="col-lg-6">
					<button class="btn btn-primary btn-block" type="submit" name="submit">Update</button>
				</div>
				<div class="col-lg-6">
					<button class="btn btn-primary btn-block" type="submit" name="del">Delete</button>
				</div>
			</div>
		</form>
	</div>
	<?php
	if(isset($_POST['submit'])){
		$fname=$_POST['first'];
		$sname=($_POST['middle']);
		$tname=($_POST['last']);
		$gender=($_POST['gender']);
		$physical=($_POST['physical']);
		$pname1=($_POST['pname']);
		$occupation=($_POST['occupation']);
		$phone=($_POST['pno']);
		$reg1=($_POST['reg1']);
		$class=($_POST['class']);
		$stream=($_POST['stream']);
		$ins="UPDATE student  SET fname='$fname',sname='$sname',tname='$tname',gender='$gender',challenge='$physical',parent_name='$pname1',parent_occupation='$occupation',parent_contact='$phone' WHERE reg_no='$delid'";
		$result=mysqli_query($conn,$ins);
		if($result){
		echo "<script>alert('Successfully Updated ');</script>";
		echo "<script>window.open('../admin','_self');</script>";
	}else{
		echo "<script>alert('Student Not Added');</script>";
	}
	}
	?>
	<?php
	if(isset($_POST['del'])){
		$del="DELETE FROM student WHERE reg_no='$delid'";
		$delete=mysqli_query($conn,$del);
		if($delete){
			echo "<script>alert('deleted');</script>";
			echo "<script>window.open('../admin','_self');</script>";
		}
	}
	?>
</body>
</html>