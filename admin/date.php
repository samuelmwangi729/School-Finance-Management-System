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
 $cdate=$_POST['cdate'];
 $sql="INSERT INTO closing(cdate)VALUES('$cdate')";
 $query=mysqli_query($conn,$sql);
 if($query){
 	echo "<script>alert('Date  Successfully added')</script>";	
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
					<form method="POST" action="date.php">
						<label>Closing Date</label>
						<input type="date"  class="form-control" name="cdate"required><br>
						<button type="submit" class="btn btn-primary" name="close">Add Closing Date</button>
					</form>
				</div>
				
			</div>
	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
	<?php 	include("includes/layouts/footer.php"); ?>
<?php } ?>