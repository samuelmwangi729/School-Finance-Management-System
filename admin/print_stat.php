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
			<div class="container-fluid">
				<div class="jumbotron" style="height: 85px">
					<!-- <legend style="float: center;color: red"><img src="../assets/icons/Cash-register-icon.png" class="img-responsive" width="100px" height="90px" align="left">Payment Statement as at: <span class="text-danger" style="font-family:courier;font-size: 18px;color: blue"><script type="text/javascript">
							date=new Date();
							document.write(date);
						</script></span></legend>
				</div> -->
				<div class="table">
					<form method="POST" action="pselected.php">
					<table class="table">
						<th>
							<tr>
								<td colspan="3" style="text-align: center;font-weight: bold">
								Please Select a Record </td>
							</tr>
						</th>
						<tr>
							<td>
								<label for="Year">Year</label>
								<select name="year" class="form-control">
									<option>2019</option>
									<option>2020</option>
									<option>2021</option>
									<option>2022</option>
									<option>2023</option>
									<option>2024</option>
									<option>2025</option>
								</select>
							</td>
							<td>
								<label for="Year">Term</label>
								<select name="term" class="form-control">
									<option>1</option>
									<option>2</option>
									<option>3</option>
								</select>
							</td>
							<td style="padding-top: 35px">
								<button class="btn btn-primary" type="submit">Print Record</button>
							</td>
						</tr>
					</table>
					</form>
				</div>
				<table class="table table-bordered table-striped">
					<tr>
						<td>Id</td>
						<td>Registration Number</td>
						<td>Amount Paid</td>
						<td>Term</td>
					</tr>
					<tr>
					<?php 
					$y=date("Y");
						$sql="SELECT * FROM payments where year='$y' ORDER BY term ASC";
						$retval = mysqli_query($conn,$sql);
						while($rows=mysqli_fetch_array($retval)){
							$user=$rows['Registration_number'];
						 ?>
						<td><?php echo $rows['id'];?></td>
						<td><?php echo $user;?></td>
						<td><?php echo $rows['amount_paid'];?></td>
						<td><?php echo $rows['term'];?></td>
						 </tr>
					<?php } ?>
				</table>
			</div>
      </div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
	<?php 	include("includes/layouts/footer.php"); ?>
<?php } ?>