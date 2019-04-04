<?php
$counter=0;
session_start();
error_reporting(0);
if($_SESSION['username']==""){
	echo "<script>alert('Please Login')</script>";
	echo "<script>window.open('../','_self');</script>";
}
else{

 require_once("../config.php"); ?>

<?php 	include("includes/layouts/header.php"); ?>
<?php   include("includes/layouts/topnavigation.php");?>
	
		<div class="container-fluid-full">
		<div class="row-fluid">
				
			<?php   include("includes/layouts/mainmenu.php");?>

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
					<a href="index.php">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Dashboard</a></li>
			</ul>
			<div class="row">
				<form method="GET" action="preg.php">
					<table class="table">
						<tr>
							<td style="text-align: right" class="text-success">
								Search payment Records
							</td>
							<td><label style="color: red" class="label-control">Enter the Admission Number</label></td>
							<td><input type="number" name="reg" class="input-md" required ></td>
							<td style="text-align: left"><button type="submit" class="btn btn-primary">Search</button></td>
						</tr>
					</table>
				</form>
			</div>
			<div class="container-fluid">
				<table class="table table-bordered table-striped">
					<tr>
						<td>Id</td>
						<td>Name</td>
						<td>Amount Paid</td>
						<td>Receipt Number</td>
						<td>Term</td>
						<td>Year</td>
					</tr>
					<tr>
					<?php 
						$sql="SELECT * FROM payments";
						$retval = mysqli_query($conn,$sql);
						while($rows=mysqli_fetch_array($retval)){
							$user=$rows['Registration_number'];
						 ?>
						<td><?php echo $rows['id'];?></td>
						<td><?php echo $user;?></td>
						<td><?php echo $rows['amount_paid'];?></td>
						<td><?php echo $rows['receipt'];?></td>						
						<td><?php echo $rows['term'];?></td>
						<td><?php echo $rows['year'];?></td>
						 </tr>
					<?php } ?>
				</table>
			</div>
      </div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
	<div class="clearfix"></div>
	<?php 	include("includes/layouts/footer.php"); ?>
<?php } ?>