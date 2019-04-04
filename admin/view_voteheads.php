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
						<td>Votehead Name</td>
						<td>Delete</td>
						<td>Approve</td>
						<td>Reject</td>
					</tr>
					<tr>
					<?php 
						$sql="SELECT * FROM voteheads ORDER BY id ASC";
						$retval = mysqli_query($conn,$sql);
						while($rows=mysqli_fetch_array($retval)){
							$Id=$rows['id'];
							$name=$rows['username'];
						 ?>
						 	<td><?php echo $rows['id'];?></td>
						 	<td><?php echo $rows['votehead'];?></td>
						 	<td><a href="view_voteheads.php?delete=<?php echo $rows['votehead'];?>" class="btn btn-danger btn-block"><i class="icon-remove">Delete</i></td>
						 	<td><a href="view_voteheads.php?approve=<?php echo $rows['id'];?>" class="btn btn-warning btn-block"><i class="icon-unlock">Approve</i></td>
						 		<td><a href="view_voteheads.php?reject=<?php echo $rows['id'];?>" class="btn btn-primary btn-block"><i class="icon-lock">Reject</i></td>
						 </tr>
				<?php  } ?>
				</table>
			</div><?php
		if(isset($_GET['approve'])){
			$appid=$_GET['approve'];
			$ssl="UPDATE voteheads SET status=1 WHERE id='$appid'";
			$res=mysqli_query($conn,$ssl);
			if($res){
			echo "<script>alert('Voteheads Has Been Successfully Approved');</script>";
			echo "<script>window.open('voteheads_info.php','_self');</script>";
			}
	}

	?>
	<?php
		if(isset($_GET['reject'])){
			$rejid=$_GET['reject'];
			$ssl="UPDATE voteheads SET status=0 WHERE id='$rejid'";
			$res=mysqli_query($conn,$ssl);
			if($res){
			echo "<script>alert('Voteheads Rejected!!!!!');</script>";
			echo "<script>window.open('voteheads_info.php','_self');</script>";
			}
	}

	?>

      </div><!--/.fluid-container-->
      <?php
		if(isset($_GET['delete'])){
			$del=$_GET['delete'];
			echo $del;
			$sql1="DELETE from voteheads WHERE votehead='$del'";
			$sqldel="DELETE FROM fees WHERE votehead='$del'";
			$sdel=mysqli_query($conn,$sqldel);
			$query=mysqli_query($conn,$sql1);
			if($sdel && $query){
				echo "<script>alert('Voteheads Has Been Successfully Deleted');</script>";
			    echo "<script>window.open('voteheads_info.php','_self');</script>";
			}
	}

	?>
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
	<div class="clearfix"></div>
	<?php 	include("includes/layouts/footer.php"); ?>
<?php } ?>