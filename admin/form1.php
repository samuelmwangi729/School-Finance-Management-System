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
		<form method="POST" action="form1.php">
			<fieldset>
				<legend class="text-success col-lg-12">
					Set Form 1 Fees
				</legend>
				<div class="table table-bordered table-success" style="padding-top: 20px">
					<table class="col-lg-12">
						<tr>
							<th>Enter Details</th>
						</tr>
					</table>
				</div>
					<div class="row">
						<div class="col-lg-4">
						<div class="form-group">
							<label for="First Name" class="label-control">Class</label>
							<input type="number" name="class" class="form-control input-md" value="1" readonly>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label for="First Name" class="label-control">VoteHead</label>
							<select name="votehead" class="form-control" required="true" autofocus="true">
							<option>--Please Select The VoteHead--</option>
							<?php 
							$sql="SELECT * FROM voteheads WHERE status=1";
							$clients=mysqli_query($conn,$sql);
							while($rows=mysqli_fetch_array($clients)){
								$cname=$rows['votehead'];
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
							<label for="First Name" class="label-control">Amount</label>
							<input type="number" name="amount" class="form-control input-md" placeholder="Enter the Value Here" required autofocus="true" minlength="2">
						</div>
					</div>
				</div>
			</fieldset>
			<div class="row-fluid">
				<button class="btn btn-primary btn-block" type="submit" name="submit">Add</button>
			</div>
		</form>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				Voteheads
			</div>
			<div class="col-lg-6">
				Amount
			</div>
		</div>
		<div class="row">
			<?php
			$disp="SELECT votehead,amount FROM fees WHERE class='1'";
			$qry=mysqli_query($conn,$disp);
			while($dd=mysqli_fetch_array($qry)){
				$class=$dd['class'];
				$vhead=$dd['votehead'];
				$amt=$dd['amount'];
			?>
			<div class="col-lg-6">
				<input type="text" name="voteheads" class="form-control input-md" value="<?php echo $vhead?>" readonly>
			</div>
			<div class="col-lg-6">
				<input type="text" name="voteheads" class="form-control input-md" value="<?php echo $amt?>" readonly>
			</div>
			<br>
		<?php }?>
		</div>
	</div>
	<div class="container">
		<table style="float: right">
			<?php 
						$sql1="SELECT * FROM fees WHERE class='1'";
						$retval1 = mysqli_query($conn,$sql1);
						$qty=0;
						while($rows1=mysqli_fetch_assoc($retval1)){
							$qty=$qty+$rows1['amount'];
						}?>
			<tr>
				<td align="right">==============</td>
			</tr>
			<tr><td align="right">Total Here<span class="text-danger"><?php echo ":".$qty?></span></td></tr>
			<tr>
				<td align="right">==============</td>
			</tr>
		</table>
	</div>
	<?php
	if(isset($_POST['submit'])){
		$class=($_POST['class']);
		$votehead=($_POST['votehead']);
		$amount=($_POST['amount']);
		$ins="INSERT INTO fees(class,votehead,amount)VALUES('$class','$votehead','$amount')";
		$result=mysqli_query($conn,$ins);
		if($result){
		echo "<script>alert('Fees Successfully Added ');</script>";
		echo "<script>window.open('form1.php','_self');</script>";
	}else{
		echo "<script>alert('Error Occurred or A dublicate Entry Encountered');</script>";
	}
	}
	?>
</body>
</html>