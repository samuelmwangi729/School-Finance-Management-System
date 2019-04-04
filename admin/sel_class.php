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
	<a class="brand" href="../admin" style="color: black;text-decoration: none;font-size: 30px;padding-top: 10px"><br> Select the class To Print Their Fees Structure</a>
</div>
<div class="container">
	<div class="table">
		<form method="GET" action="fee_structure.php">
			<table class="table">
				<tr>
					<td>
						<label for="term" class="label-control">Please Select The Class</label>
						<a href="fee_structure.php?class=<?php echo "1"?>" class="btn btn-info">Form 1</a>
						<a href="fee_structure.php?class=<?php echo "2"?>" class="btn btn-info">Form 2</a>
						<a href="fee_structure.php?class=<?php echo "3"?>" class="btn btn-info">Form 3</a>
						<a href="fee_structure.php?class=<?php echo "4"?>" class="btn btn-info">Form 4</a>
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