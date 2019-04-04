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
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Dashboard</a></li>
			</ul>
			<div class="container-fluid">
				<table class="table table-bordered table-striped">
					<tr>
						<td>Id</td>
						<td>Stream</td>
						<td>Action</td>
					</tr>
					<tr>
					<?php 
						$sql="SELECT * FROM stream";
						$retval = mysqli_query($conn,$sql);
						while($rows=mysqli_fetch_array($retval)){
						 ?>
						<td><?php echo $rows['id'];?></td>
						<td><?php echo $rows['stream'];?></td>
						 <td><a href="stream.php?view=<?php echo $rows['id'];?>" class="btn btn-danger btn-block" ><i class="icon-remove"> </i>Delete</td>
						 </tr>
					<?php } ?>
				</table>
				<table class="table">
					<form method="POST" action="stream.php">
						<div class="span3">
							<label>
							Stream
						</label>
						<input type="text" name="class" class="form-control" placeholder="Enter the Class Stream Here" required="true" minlength="2">
							<button type="submit" class="btn btn-success" name="add">Add</button>
						</div>
					</form>
				</table>
			</div>
      </div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		<?php 
		if(isset($_GET['view'])){
			$del_id=$_GET['view'];
			$del="DELETE stream FROM stream where id='$del_id'";
			$query=mysqli_query($conn,$del);
			if($query){
				echo "<script>alert('Stream Deleted')</script>";
				echo "<script>window.open('stream.php','_self');</script>";
			}
		}
		?>
	<div class="clearfix"></div>
	<?php 
	if(isset($_POST['add'])){
		$class=$_POST['class'];
		$ssl="INSERT INTO stream(stream)VALUES('$class')";
		$insert=mysqli_query($conn,$ssl);
		if($insert){
			echo "<script>alert('Stream Added Added')</script>";
			echo "<script>window.open('stream.php','_self');</script>";
		}
	}
	?>
	<?php 	include("includes/layouts/footer.php"); ?>
<?php } ?>