<?php
$counter=0;
session_start();
error_reporting(0);
if($_SESSION['username']==""){
	echo "<script>alert('Please Login')</script>";
	echo "<script>window.open('../','_self');</script>";
}
else{
	$year=$_POST['year'];
	$term=$_POST['term'];
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
<div id="content" class="container-fluid">

<table class="table">
 <tr>
  <?php
 $sql1 = "SELECT * FROM `school` ORDER BY id DESC";
 $sc=mysqli_query($conn,$sql1);
 if($dd=mysqli_fetch_array($sc)){
  $name=$dd['name'];
  $head=$dd['head'];
  $tel=$dd['phone'];
  $po=$dd['po'];
 }
  ?><br><br>
  <td><span style='font-size:30.0pt;text-align: center;font-family: courier;color:green;'><?php echo "<br>".$name." " ?>Secondary School<o:p></o:p><br></span></b>Tel: <?php echo "0".$tel;?><br>P.o Box <?php echo $po."<br><br>";?></p>
  </td>
 </tr>
 <tr>
 	<td colspan="2" style="text-align: center;padding-left: 100px;">Payment Statement produced on  <?php echo date("D M-Y");?></td>
 </tr>
</table>
			<div class="container-fluid">
				<table class="table table-bordered table-striped">
					<tr>
						<td>Id</td>
						<td>Registration Number</td>
						<td>Amount Paid</td>
						<td>Receipt</td>
						<td>Term</td>
						<td>Year</td>
					</tr>
					<tr>
					<?php 
					$id=1;
						$sql="SELECT * FROM payments WHERE term='$term' AND year='$year' ORDER BY term ASC";
						$retval = mysqli_query($conn,$sql);
						while($rows=mysqli_fetch_array($retval)){
							$user=$rows['Registration_number'];
						 ?>
						<td><?php echo $id;?></td>
						<td ><?php echo $user;?></td>
						<td><?php echo $rows['amount_paid'];?></td>
						<td><?php echo $rows['receipt'];?></td>
						<td><?php echo $rows['term'];?></td>
						<td><?php echo $rows['year'];?></td>
						 </tr>
					<?php 
					$id=$id+1;} ?>
				</table>
			</div>
      </div><!--/.fluid-container-->
	
			<!-- end: Content -->
			<script type="text/javascript">
				window.load(print());
			</script>
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
	<?php 	include("includes/layouts/footer.php"); ?>
<?php } ?>