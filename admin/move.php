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
							<td>Promote Students To A New Class</td>
						</tr>
					</table>
					<?php
						if(isset($_POST['submit'])){
							$from=$_POST['from'];
							$to=$_POST['to'];
							$fm=date("Y");
						$upd="UPDATE student SET class='$to',leaving='$fm' WHERE class='$from'";
						$move=mysqli_query($conn,$upd);
						if($move){
							echo "<span class='alert-success'>Students Promoted</span>";
						}
						}
						?>
				<div class="row-fluid">
					<form method="POST" action="move.php">
						<div class="span4">
							<label for="Year" class="label-control">Please Select Class To Promote</label>
							<select name="from" class="form-control" required="true" autofocus="true">
							<option>--Please Select The class--</option>
							<?php 
							$sql="SELECT * FROM class ORDER BY id ASC LIMIT 4";
							$clients=mysqli_query($conn,$sql);
							while($rows=mysqli_fetch_array($clients)){
								$cname=$rows['class'];
							?>
							<option class="text-danger">
								<?php echo $cname;?>
							</option>
						<?php } ?>
						</select>

						</div>
						<div class="span4">
							<label for="Year" class="label-control">Please Select Class To Promote To</label>
							<select name="to" class="form-control" required="true" autofocus="true">
							<option>--Please Select The class--</option>
							<?php 
							$sql="SELECT * FROM class ORDER BY id ASC";
							$clients=mysqli_query($conn,$sql);
							while($rows=mysqli_fetch_array($clients)){
								$cname=$rows['class'];
							?>
							<option class="text-danger">
								<?php echo $cname;?>
							</option>
						<?php } ?>
						</select>
						</div>
						<div class="span4" style="padding-top: 26px">
							<button type="submit" class="btn btn-info btn-block"  name="submit">Promote</button>
						</div>
					</form><br>
				</div>
				</div>
			</div>
	</div><!--/.fluid-container-->
		<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
	<?php 	include("includes/layouts/footer.php"); ?>
<?php } ?>	