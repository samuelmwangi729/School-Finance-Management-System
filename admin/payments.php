<?php
session_start();
error_reporting(0);
$id_error=$phone_error="";
if($_SESSION['username']==""){
	echo "<script>alert('Please Login')</script>";
	echo "<script>window.open('../','_self');</script>";
}
else{

 require_once("../config.php"); ?>

<?php 	include("head.php"); ?>	
<marquee style="color: red;font-size: 20px;font-family: courier;">School Fees Management System</marquee>
<div class="container">
	<a class="brand" href="../admin" style="color: black;text-decoration: none;font-size: 30px;padding-top: 10px">School Fees Management System</a>
</div>
<div class="container">
	<div class="table">
		<form method="POST" action="payments.php">
			<table class="table">
				<tr>
					<td>
						<label for="Admission " class="label-control">Registration Number</label>
						<input type="text" name="adm" class="form-control input-md" placeholder="Student Registration Number" required autofocus minlength="2">
					</td>
					<td>
						<label for="Amount" class="label-control">Amount Payed</label>
						<input type="number" name="amount" class="form-control input-md" placeholder="Amount" required autofocus minlength="2">
					</td>
					<td>
						<label for="Amount" class="label-control">Receipt Number</label>
						<input type="number" name="Receipt" class="form-control input-md" placeholder="Receipt No" required autofocus minlength="2">
					</td>
					<td>
						<label for="term" class="label-control">Term</label>
						<select class="form-control input-md" name="term">
							<?php
						$sel="SELECT * FROM term";
						$qry=mysqli_query($conn,$sel);
						while($t=mysqli_fetch_array($qry)){
							$ter=$t['Term'];
						?>
							<option>
								<?php echo $ter;?>
							</option>
						<?php }?>
						</select>
					</td>
				</tr>
			</table>
			<button type="submit" name="submit" class="btn btn-success btn-block">Accept Payments</button>
		</form>
	</div>
</div>
<!--/.fluid-container-->
	<?php
if(isset($_POST['submit'])){
$adm=($_POST['adm']);
$amount=($_POST['amount']);
$red=$_POST['Receipt'];
$term=($_POST['term']);
if(strlen($adm)==0){
	echo "<script>alert('Please Choose a Valid Admission number');</script>";
}else{
//select the amount from the loan table 
	$select="SELECT * FROM student WHERE reg_no='$adm'";
	$yr=date("Y");
	$std=mysqli_query($conn,$select);
	if($std1=mysqli_fetch_array($std)){
		$balance=$std1['balance'];
	}
	$nb=$balance-$amount;
	$upd="UPDATE student SET  balance='$nb' WHERE reg_no='$adm'";
	$query=mysqli_query($conn,$upd);
	//to insert the recod into t he payment table 
	$ins="INSERT INTO payments(Registration_number,amount_paid,receipt,term,year)VALUES('$adm','$amount','$red','$term','$yr')";
	$insert=mysqli_query($conn,$ins);
	if($query && $insert){
		echo "<script>alert('the Details have been updated');</script>";
		echo "<script>window.open('../admin','_self');</script>";
	}
}}
?>
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
	<?php 	include("includes/layouts/footer.php"); ?>
<?php } ?>