<?php
$counter=0;
session_start();
error_reporting(0);
if($_SESSION['username']==""){
	echo "<script>alert('Please Login')</script>";
	echo "<script>window.open('../','_self');</script>";
}
else{

 require_once("../config.php"); 
$reg=$_GET['reg'];
 ?>

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
			<div class="container-fluid">
				<table class="table table-bordered" style="border: 2px solid green;">
					<?php 
						$sql1="SELECT * FROM student WHERE reg_no='$reg'";
						$retval1 = mysqli_query($conn,$sql1);
						while($rows1=mysqli_fetch_array($retval1)){
							$name=$rows1['fname']." ".$rows1['sname']." ".$rows1['tname'];
							$class=$rows1['class'];
							$stream=$rows1['stream'];
							$balance=$rows1['balance'];
						}
						 ?>
					<tr>
						<td>
							Name: <?php echo " ".$name;?>
						</td>
						<td>
							Form: <?php echo " ".$class;?>
						</td>
					</tr>
					<tr>
						<td>
							Stream: <?php echo " ".$stream;?>
						</td>
						<td>
							Balance: <?php echo " ".$balance;?>
						</td>
					</tr>
				</table>
				<table class="table table-bordered table-striped">
					<tr>
						<td>Amount Paid</td>
						<td>Receipt Number</td>
						<td>Term</td>
						<td>Time Payed</td>
					</tr>
					<tr>
					<?php 
						$sql="SELECT * FROM payments WHERE Registration_number='$reg'";
						$retval = mysqli_query($conn,$sql);
						while($rows=mysqli_fetch_array($retval)){
							$user=$rows['Registration_number'];
						 ?>
						<td><?php echo $rows['amount_paid'];?></td>
						<td><?php echo $rows['receipt'];?></td>
						<td><?php echo $rows['term'];?></td>
						<td><?php echo $rows['date'];?></td>
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