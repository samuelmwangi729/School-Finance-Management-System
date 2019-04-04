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
<marquee style="color: red;font-size: 20px;font-family: courier;">Please Select the Class</marquee>
<div class="container">
	<a class="brand" href="../admin" style="color: black;text-decoration: none;font-size: 30px;padding-top: 10px">Add New Fees Please<br> Select the class</a>
</div>
<div class="container">
	<div class="table">
		<form method="POST" action="upd_fees.php">
			<table class="table">
				<tr>
					<td>
						<?php
						$sel="SELECT * FROM term";
						$qry=mysqli_query($conn,$sel);
						while($t=mysqli_fetch_array($qry)){
							$ter=$t['Term'];
						}
						?>
						<label for="Admission " class="label-control">Term</label>
						<input type="text" name="term" class="form-control input-md" value="<?php echo $ter;?>" required autofocus minlength="2" readonly>
					</td>
					<td>
						<label for="term" class="label-control">Class</label>
						<a href="upd_f1.php" class="btn btn-info">Form 1</a>
						<a href="upd_f2.php" class="btn btn-info">Form 2</a>
						<a href="upd_f3.php" class="btn btn-info">Form 3</a>
						<a href="upd_fees.php" class="btn btn-info">Form 4</a>
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>
<!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
	<?php 	include("includes/layouts/footer.php"); ?>
<?php } ?>