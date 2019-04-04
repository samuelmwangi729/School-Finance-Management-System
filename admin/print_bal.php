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
	<title><?php echo "Balance Statement as at ".date('M-d-y G.i:s',time());?></title>
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
	<div class="container table-condensed">
				<table class="table table-striped table-bordered">
					<tr>
						<td>First Name</td>
						<td>Last Name</td>
						<td>Reg.No</td>
						<td>Class</td>
						<td>Stream</td>
						<td>Fees Amount</td>
						<td>Fees Balance</td>
					</tr>
					<tr>
					<?php 
						$sql="SELECT * FROM student WHERE class='3' ORDER BY id ASC";
						$retval = mysqli_query($conn,$sql);
						while($rows=mysqli_fetch_array($retval)){
						 ?>
						<td><?php echo $rows['fname'];?></td>
						<td><?php echo $rows['tname'];?></td>
						<td><?php echo $rows['reg_no'];?></td>
						<td><?php echo $rows['class'];?></td>
						<td><?php echo $rows['stream'];?></td>
						<td><?php echo $rows['fees_amount'];?></td>
						<td style="color: red"><?php echo $rows['balance'];?></td>
						 </tr>
					<?php } ?>
				</table>
			</div>
			<script type="text/javascript">
				window.load(print());
			</script>
</body>
</html>