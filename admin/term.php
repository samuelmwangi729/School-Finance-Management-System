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
					<table class="table breadcrumb">
						<tr>
							<td>Add A New Term</td>
						</tr>
					</table>
					<?php
						if(isset($_POST['submit'])){
							$year=$_POST['year'];
							$term=$_POST['term'];
						$ins="UPDATE term SET Term='$term' WHERE year='$year'";
						$upd="UPDATE student SET fees_amount=0 WHERE id>0";
						$upd1="UPDATE fees SET amount=0 WHERE id>0";
						$ins_res=mysqli_query($conn,$ins);
						$upd_res=mysqli_query($conn,$upd);
						$upd_res1=mysqli_query($conn,$upd1);
						if($ins_res && $upd_res && $upd_res1){
							echo "<script>alert('Term Successfully Added');</script>";
							echo "<script>window.open('../admin','_self');</script>";
						}
						}
						?>
				<div class="row">
					<?php
					$ye="SELECT * FROM term";
					$get_year=mysqli_query($conn,$ye);
					if($ww=mysqli_fetch_array($get_year)){
						$year=$ww['year'];
					}
					?>
					<form method="POST" action="term.php">
						<div class="span4">
							<label for="Year" class="label-control">Year</label>
							<input type="number" name="year" class="input-md" value="<?php echo $year;?>" readonly>
						</div>
						<div class="span4">
							<label for="Year" class="label-control">Term</label>
							<select name="term" class="input-md">
								<option>
									--SELECT TERM--
								</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
							</select>
						</div>
						<div class="span4" style="padding-top: 26px">
							<button type="submit" class="btn btn-info btn-block"  name="submit">Add Term</button>
						</div>
					</form><br>
				</div>
				</div>
				<div class="row">
					<form method="POST" action="term.php">
						<div class="span4">
							<label for="new Academic Year" class="label-control">Add New Academic Year</label>
							<input type="text" name="ay" class="form-control input-md" value="<?php echo date('Y');?>">
						</div>
						<div class="span3" style="padding-top: 27px">
							<button type="submit" class="btn btn-info btn-block" name="addd">Add Year</button>
						</div>
						<div class="span4" style="color: red">
							Please add the new academic year when we get back for a new year apart from the one displayed above
						</div>
					</form>
				</div>
			</div>
			<?php
			if(isset($_POST['addd'])){
				$year=$_POST['ay'];
				$uy="UPDATE term SET year='$year'";
				$query=mysqli_query($conn,$uy);
				if($query){
					echo "<script>alert('Success,,New Year Added');</script>";
					echo "<script>window.open('term.php','_self');;</script>";
				}
			}
			?>
	</div><!--/.fluid-container-->
		<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
	<?php 	include("includes/layouts/footer.php"); ?>
<?php } ?>	