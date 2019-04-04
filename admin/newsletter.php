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
		<form method="POST" action="newsletter.php">
			<fieldset>
				<legend class="text-success col-lg-12">
					Events For the School Newsletter
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
							<label for="First Name" class="label-control">Title</label>
							<input type="text" name="class" class="form-control input-md" required>
						</div>
					</div>
					<div class="col-lg-8">
						<div class="form-group">
							<label for="First Name" class="label-control">About Event</label>
							<textarea class="form-control input-md" rows="5" style="width: 730px" name="description" required="true"></textarea>
						</div>
					</div>
				</div>
			</fieldset>
			<div class="row-fluid">
				<button class="btn btn-primary btn-block" type="submit" name="submit">Add To Newsletter</button><br>Newsletter Events
			</div>
		</form>
	</div>
	<div class="container">
		<div class="table">
			<table class="table table-bordered">
				<tr>
					<td>Title</td>
					<td>Description</td>
					<td>Edit</td>
					<td>Delete</td>
				</tr>
				<?php
			$disp="SELECT * FROM events";
			$qry=mysqli_query($conn,$disp);
			while($dd=mysqli_fetch_array($qry)){
				$title=$dd['title'];
				$vhead=$dd['description'];
			?>
				<tr>
					<td><?php echo $title;?></td>
					<td><?php echo $vhead;?></td>
					<td><a href="en.php?view=<?php echo $dd['id'];?>" class="btn btn-warning" >Edit</a></td>
					<td><a href="newsletter.php?delete=<?php echo $dd['id'];?>" class="btn btn-danger" >Delete</a></td>					
				</tr>
			<?php }?>
			</table>
			<br>
		</div>
	</div>
	<?php
	if(isset($_POST['submit'])){
		$title=($_POST['class']);
		$votehead=($_POST['description']);
		//update the fees table
		$upd="INSERT INTO events(title,description)VALUES('$title','$votehead')";
		$updq=mysqli_query($conn,$upd);
		if($upd){
			echo "<script>alert('Event Successfully Added')</script>";
			echo "<script>window.open('newsletter.php','_self');</script>";	
		}
	}
	if(isset($_GET['delete'])){
		$delid=$_GET['delete'];
		echo $delid;
		$ssl="DELETE from events WHERE id='$delid'";
		$query=mysqli_query($conn,$ssl);
		if($query){
			echo "<script>alert('NewsLetter Event Deleted Successfully')</script>";
			echo "<script>window.open('newsletter.php','_self');</script>";
		}
	}
	?>
</body>
</html>