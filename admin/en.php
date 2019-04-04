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
		<form method="POST" action="en.php">
			<fieldset>
				<legend class="text-success col-lg-12">
					Edit Events For the School Newsletter
					<?php $id=$_GET['view'];
					$sql="SELECT * FROM events WHERE id='$id'";
					$retval=mysqli_query($conn,$sql);
					if($ret=mysqli_fetch_array($retval)){
						$i=$ret['id'];
						$title=$ret['title'];
						$desc=$ret['description'];
					}
					?>
				</legend>
				<div class="table table-bordered table-success" style="padding-top: 20px">
					<table class="col-lg-12">
						<tr>
							<th>Please Record Any Event Here</th>
						</tr>
					</table>
				</div>
					<div class="row">
						<div class="col-lg-4">
						<div class="form-group">
							<input type="hidden" name="id" class="form-control input-md" value="<?php echo $i;?>" required>
							<label for="First Name" class="label-control">Title</label>
							<input type="text" name="class" class="form-control input-md" value="<?php echo $title;?>" required>
						</div>
					</div>
					<div class="col-lg-8">
						<div class="form-group">
							<label for="First Name" class="label-control">About Event</label>
							<textarea class="form-control input-md" rows="5" style="width: 730px;" name="description"><?php echo $desc;?></textarea>
						</div>
					</div>
				</div>
			</fieldset>
			<div class="row-fluid">
				<button class="btn btn-primary btn-block" type="submit" name="submit">Update Newsletter Contents</button><br>
			</div>
		</form>
	</div>
	<?php
	if(isset($_POST['submit'])){
		$id=$_POST['id'];
		$title=($_POST['class']);
		$votehead=($_POST['description']);
		//update the events table
		$upd="UPDATE  events SET title='$title',description='$votehead' WHERE id='$id'";
		$updq=mysqli_query($conn,$upd);
		if($updq){
			echo "<script>alert('Event Successfully Updated')</script>";
			echo "<script>window.open('newsletter.php','_self');</script>";	
		}
	}
	?>
</body>
</html>