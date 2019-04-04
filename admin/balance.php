<?php
session_start();
error_reporting(0);
$id_error=$phone_error=$disp="";
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
	<title><?php echo "Fees Balance Of Form ".$_GET['class']."As At ".date('m/d/y'); ?></title>
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
		<button type="BUTTON" class="btn btn-default" style="float: right" onclick="window.print()" >Print Information</button><br><hr>
	</div>
	</div>
	<div class="container table-condensed">
				<table class="table table-striped table-bordered" style="border:2px solid grey;">
					<tr>
						<td>Number</td>
						<td>First Name</td>
						<td>Last Name</td>
						<td>Reg.No</td>
						<td>Gender</td>
						<td>Parent</td>
						<td>Contact</td>
						<td><?php if($_GET['class']=='formers'){
							echo "Year Left";
							//$disp="$rows['leaving']";
						}else{
							echo "Fees Amount";
							//$disp="$rows['fees_amount']";
						}
						?></td>
						<td>Fees Balance</td>
					</tr>
					<tr>
					<?php 
						$class=$_GET['class'];
						$stream=$_GET['stream'];
						$balance=$_GET['bal'];
						$num=1;
						if($stream=="All"){
							$sql="SELECT * FROM student WHERE class='$class'";
						}else{
						$sql="SELECT * FROM student WHERE class='$class' AND stream='$stream'";
					    }
						$retval = mysqli_query($conn,$sql);
						while($rows=mysqli_fetch_array($retval)){
						 ?>
						<td><?php echo $num;?></td>
						<td><?php echo $rows['fname'];?></td>
						<td><?php echo $rows['tname'];?></td>
						<td><?php echo $rows['reg_no'];?></td>
						<td><?php echo $rows['gender'];?></td>
						<td><?php echo $rows['parent_name'];?></td>
						<td><?php echo $rows['parent_contact'];?></td>
						<td><?php 
						if($class=='formers'){
							echo $rows['leaving'];
						}else{
							echo $rows['fees_amount'];
						}
						?></td>
						<td style="color: red"><?php echo $rows['balance'];?></td>
						 </tr>
					<?php $num=$num+1; } ?>
				</table>
			</div>
</body>
</html>