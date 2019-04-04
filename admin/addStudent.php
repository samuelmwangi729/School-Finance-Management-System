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
		<form method="POST" action="addStudent.php">
			<fieldset>
				<legend class="text-success col-lg-12">
					Add New Student
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
							<label for="First Name" class="label-control">First Name</label>
							<input type="text" name="first" class="form-control input-md" placeholder="enter the First Name Here" minlength="2" autofocus="true" required>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label for="Middle Name" class="label-control">Middle Name</label>
							<input type="text" name="middle" class="form-control input-md" placeholder="enter the Middle  Name Here" minlength="2" autofocus="true" required>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label for="Last Name" class="label-control">Last Name</label>
							<input type="text" name="last" class="form-control input-md" placeholder="enter the Last Name Here" minlength="2" autofocus="true" required>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label for="Gender" class="label-control">Gender</label>
							<select name="gender" class="form-control input-md" required>
								<option>--SELECT THE GENDER--</option>
								<option>Male</option>
								<option>Female</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3">
						<div class="form-group">
							<label for="Physically Challenged" class="label-control">Physically Challenged</label>
							<select name="physical" class="form-control input-md" required>
								<option>--SELECT--</option>
								<option>No</option>
								<option>Yes</option>
							</select>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label for="First Name" class="label-control">Parent Name</label>
							<input type="text" name="pname" class="form-control input-md" placeholder="Parent Name Here" minlength="5" required="true" autofocus="true">
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label for="First Name" class="label-control">Occupation</label>
							<input type="text" name="occupation" class="form-control input-md" placeholder="Parent Occupation Here" minlength="2" required="true" autofocus="true">
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label for="First Name" class="label-control">Phone Number</label>
							<input type="number" name="pno" class="form-control input-md" placeholder="Parent Phone Number" minlength="10" required="true" autofocus="true">
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
							<input type="text" name="reg" class="form-control input-md" placeholder="Enter the Registration Number" minlength="3" required="true" autofocus="true">
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label for="First Name" class="label-control">Class</label>
							<select name="class" class="form-control" required="true" autofocus="true">
							<option>--Please Select The class--</option>
							<?php 
							$sql="SELECT * FROM class ORDER BY id ASC LIMIT 4";
							$clients=mysqli_query($conn,$sql);
							while($rows=mysqli_fetch_array($clients)){
								$cname=$rows['class'];
							?>
							<option class="text-danger">
								<?php echo $cname;?>
							</option>
						<?php } ?>
						</select>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label for="First Name" class="label-control">Stream</label>
							<select name="stream" class="form-control" required="true" autofocus="true">
							<option>--Please Select The Stream--</option>
							<?php 
							$sql="SELECT * FROM stream ORDER BY id ASC";
							$clients=mysqli_query($conn,$sql);
							while($rows=mysqli_fetch_array($clients)){
								$cname=$rows['stream'];
							?>
							<option class="text-danger">
								<?php echo $cname;?>
							</option>
						<?php } ?>
						</select>
						</div>
					</div>
				</div>
			</fieldset>
			<div class="row-fluid">
				<button class="btn btn-primary btn-block" type="submit" name="submit">Admit</button>
			</div>
		</form>
	</div>
	<?php
	if(isset($_POST['submit'])){
		$fname=($_POST['first']);
		$sname=($_POST['middle']);
		$tname=($_POST['last']);
		$gender=($_POST['gender']);
		$physical=($_POST['physical']);
		$pname1=($_POST['pname']);
		$occupation=($_POST['occupation']);
		$phone=($_POST['pno']);
		$reg=($_POST['reg']);
		$class=($_POST['class']);
		$stream=($_POST['stream']);
		//get the fees amount to add to the added student
		$qu="SELECT amount FROM fees WHERE class='$class'";
		$qty=0;
		$qyy=mysqli_query($conn,$qu);
		while($row=mysqli_fetch_array($qyy)){
		$qty=$qty+$row['amount'];
		}
		$ins="INSERT INTO student(fname,sname,tname,gender,challenge,parent_name,parent_occupation,parent_contact,reg_no,class,stream,fees_amount,balance)VALUES('$fname','$sname','$tname','$gender','$physical','$pname1','$occupation','$phone','$reg','$class','$stream','$qty','$qty')";
		$result=mysqli_query($conn,$ins);
		if($result){
		echo "<script>alert('Successfully Added ');</script>";
		echo "<script>window.open('../admin','_self');</script>";
	}else{
		echo "<script>alert('Student Not Added');</script>";
	}
	}
	?>
</body>
</html>