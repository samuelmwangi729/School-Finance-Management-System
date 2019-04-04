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
		<div class="header text-center">
			<form method="GET" action="balance.php" target="_blank">
			<div class="row">
				<div class="col-lg-4">
					<label for="class" class="label-control">Class</label>
					<input type="text" name="class" class="form-control input-md" value="formers" readonly="true">
				</div>
				<div class="col-lg-4">
					<label for="term" class="label-control">Stream</label>
						<select class="form-control input-md" name="stream">
							<option>All</option>
							<?php
						$sel="SELECT * FROM stream";
						$qry=mysqli_query($conn,$sel);
						while($t=mysqli_fetch_array($qry)){
							$ter=$t['stream'];
						?>
							<option>
								<?php echo $ter;?>
							</option>
						<?php }?>
						</select>
				</div>
				<div class="col-lg-4" style="padding-top: 27px">
					<button type="submit" class="btn btn-success btn-block" style="padding-top: 10px" name="search">Search</button>
				</div>
			</div>
			</form>
		</div>
				<table class="table table-striped table-bordered">
					<tr>
						<td>First Name</td>
						<td>Last Name</td>
						<td>Reg.No</td>
						<td>Class</td>
						<td>Stream</td>
						<td>Year Left</td>
						<td>Fees Balance</td>
						<td>View</td>
					</tr>
					<tr>
					<?php 
						$sql="SELECT * FROM student WHERE class='formers' ORDER BY id ASC";
						$retval = mysqli_query($conn,$sql);
						while($rows=mysqli_fetch_array($retval)){
						 ?>
						<td><?php echo $rows['fname'];?></td>
						<td><?php echo $rows['tname'];?></td>
						<td><?php echo $rows['reg_no'];?></td>
						<td><?php echo $rows['class'];?></td>
						<td><?php echo $rows['stream'];?></td>
						<td><?php echo $rows['leaving'];?></td>
						<td style="color: red"><?php if($rows['balance']==0){
							echo "Cleared";
						}
						else{
							echo $rows['balance'];
						}
						?></td>
						<td><a href="info.php?view=<?php echo $rows['reg_no'];?>" class="btn btn-warning btn-block">Info</a></td>
						 </tr>
					<?php } ?>
				</table>
			</div>
</body>
</html>