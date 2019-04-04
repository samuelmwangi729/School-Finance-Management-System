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
			<div class="container-fluid">
				<form method="POST" action="penalty.php">
					<div class="span3">
					<label for="regNum" class="label-control">Registration Number</label>
					<input type="text" name="r_no" placeholder="Enter the Registration Number" required="true">
				</div>
				<div class="span3">
					<label for="Amount" class="label-control">Penalty Amount</label>
					<input type="number" name="amount" class="form-control input-md" placeholder="Enter the Amount Here" required="true">
				</div>
				<div class="span3">
					<label for="Details" class="label-control">Why Panalise?</label>
					<textarea name="details" rows="1">
						
					</textarea>
				</div>
				<div class="span3" style="padding-top: 20px">
					<button type="submit" class="btn btn-danger btn-block" name="penalty">Penalize</button>
				</div>
				</form>
			</div>
      </div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		<?php
if(isset($_POST['penalty'])){
$reg=$_POST['r_no'];
$f_amount=$_POST['amount'];
$why=$_POST['details'];
if($f_amount==0){
	echo "<script>alert('Please Choose a Valid Amount');</script>";
}else{
	$sqli="SELECT * FROM student WHERE reg_no='$reg' ORDER BY id ASC";
	$retval = mysqli_query($conn,$sqli);
	if($rows=mysqli_fetch_array($retval)){
		$bal=$rows['balance'];
		$exp=$rows['expense'];
	}
//select the amount from the loan table 
	$exp=$exp+$f_amount;
	$nb=$bal+$f_amount;
	$sql="UPDATE student SET expense='$exp' WHERE reg_no='$reg'";
	$sql1="UPDATE student SET balance='$nb' WHERE reg_no='$reg'";
	$sql2="INSERT INTO penalty(reg_no,amount,about)VALUES('$reg','$f_amount','$why')";
	$update=mysqli_query($conn,$sql);
	$add=mysqli_query($conn,$sql1);
	$add_b=mysqli_query($conn,$sql2);
if($add && $update && $add_b){
echo "<script>alert('Details  Successfully Updated')</script>";	
echo "<script>window.open('../admin','_self');</script>";
}
}
}
?>
	<?php 	include("includes/layouts/footer.php"); ?>
<?php } ?>