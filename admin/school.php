<?php
session_start();
error_reporting(0);
$id_error=$phone_error="";
if($_SESSION['username']==""){
	echo "<script>alert('Please Login')</script>";
	echo "<script>window.open('../','_self');</script>";
}
else{

 require_once("../config.php"); 
 if(isset($_POST['close'])){
 $name=$_POST['name'];
 $head=$_POST['head'];
 $phone=$_POST['phone'];
 $po=$_POST['po'];
 $sql="INSERT INTO school(name,head,phone,po)VALUES('$name','$head','$phone','$po')";
 $query=mysqli_query($conn,$sql);
 if($query){
 	echo "<script>alert('School Details Successfully added')</script>";	
	echo "<script>window.open('../admin','_self');</script>";
 }
}
?>
<?php 	include("head.php"); ?>	
		<div class="container-fluid-full">
		<div class="row-fluid">
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>Please Make sure that Javascript is enabled</p>
				</div>
			</noscript>
			
			<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="../admin">Home</a> >>
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="../admin">Dashboard</a></li>
			</ul>
			<div class="container">
				<div class="form-group">
					<form method="POST" action="school.php">
						<label>Name of The School</label>
						<input type="text"  class="form-control" name="name"required><br>
						<label>Name Of The Principal</label>
						<input type="text"  class="form-control" name="head"required><br>
						<label>Phone Number</label>
						<input type="text"  class="form-control" name="phone"required><br>
						<label>Post Office Box</label>
						<input type="text"  class="form-control" name="po"required><br>
						<button type="submit" class="btn btn-primary" name="close">Add School Details</button>
					</form>
				</div>
				
			</div>
	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
	<?php 	include("includes/layouts/footer.php"); ?>
<?php } ?>