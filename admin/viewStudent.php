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
			<li><a href="../admin" class="btn btn-primary">Back</a></li>
		</ul>
	</div>
	<div class="container table-condensed">
		<div class="header text-right" style="float: right;">
			<form method="GET" action="student.php">
				<table>
					<tr>
						<td>
							<input type="text" name="search" class="form-control" placeholder="Search Student" required autofocus="true">
						</td>
						<td><button type="submit" name="sub" class="btn btn-primary">Search</button></td>
					</tr>
				</table>
			</form>
		</div>
				<table class="table table-striped table-bordered">
					<tr>
						<td>Number</td>
						<td>First Name</td>
						<td>Last Name</td>
						<td>Reg.No</td>
						<td>Gender</td>
						<td>Parent</td>
						<td>Contact</td>
						<td>Fees Amount</td>
						<td>Fees Balance</td>
						<td>Delete</td>
					</tr>
					<tr>
					<?php 
					$number=1;
						$sql="SELECT * FROM student ORDER BY id ASC";
						$retval = mysqli_query($conn,$sql);
						while($rows=mysqli_fetch_array($retval)){
						 ?>
						<td><?php echo $number;?></td>
						<td><?php echo $rows['fname'];?></td>
						<td><?php echo $rows['tname'];?></td>
						<td><?php echo $rows['reg_no'];?></td>
						<td><?php echo $rows['gender'];?></td>
						<td><?php echo $rows['parent_name'];?></td>
						<td><?php echo $rows['parent_contact'];?></td>
						<td><?php echo $rows['fees_amount'];?></td>
						<td><?php echo $rows['balance'];?></td>
						<td><a href="viewStudent.php?delete=<?php echo $rows['id'];?>" class="btn btn-danger btn-block">Delete</a></td>
						 </tr>
					<?php $number++;} ?>
				</table>
			</div>
			<?php
			if(isset($_GET['delete'])){
				$delid=$_GET['delete'];
				$del="DELETE FROM student WHERE id ='$delid'";
				$delete=mysqli_query($conn,$del);
				if($delete){
					echo "<script>alert('deleted');</script>";
					echo "<script>window.open('../admin','_self');</script>";
				}
			}


			?>
</body>
</html>