<?php
error_reporting(0);
$loggedin="admin";
session_start();
error_reporting();
if($_SESSION['username']==""){
	echo "<script>alert('Please Login')</script>";
	echo "<script>window.open('../','_self');</script>";
}
else{
	$counter=0;
	$cc=0;
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
					<a href="../admin">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Dashboard</a></li>
			</ul>

			<div class="row-fluid">
				
				<div class="span3 statbox green" onTablet="span6" onDesktop="span3">
					
					<div class="title">
						<?php 
						$sql="SELECT * FROM student WHERE class='1'";
						$cc=mysqli_query($conn,$sql);
						$s_no=mysqli_num_rows($cc);
						?><h4 style="float: left;font-weight: bold">Form 1</h4>
						 <sup><span class="badge badge-warning"><b><?php echo $s_no; ?></b></span></sup>
						 <br>
						 <?php
						 $sql="SELECT * FROM student WHERE class='1' AND gender='Male'";
						$cc=mysqli_query($conn,$sql);
						$m_no=mysqli_num_rows($cc);
						 ?>
						 Boys=<?php echo $m_no;?><br>Girls=<?php echo $s_no-$m_no;?><br><br>
						 </div>
				</div>
					<div class="span3 statbox green" onTablet="span6" onDesktop="span3">
					
					<div class="title">
						<?php 
						$sql="SELECT * FROM student WHERE class='2'";
						$cc=mysqli_query($conn,$sql);
						$s_no=mysqli_num_rows($cc);
						?><h4 style="float: left;font-weight: bold">Form 2</h4>
						 <sup><span class="badge badge-warning"><b><?php echo $s_no; ?></b></span></sup>
						 <br>
						 <?php
						 $sql="SELECT * FROM student WHERE class='2' AND gender='Male'";
						$cc=mysqli_query($conn,$sql);
						$m_no=mysqli_num_rows($cc);
						 ?>
						  Boys=<?php echo $m_no;?><br>Girls=<?php echo $s_no-$m_no;?><br><br></div>
				</div>
				<div class="span3 statbox blue noMargin" onTablet="span6" onDesktop="span3">
					<?php 
						$sql="SELECT * FROM student WHERE class='3'";
						$cc=mysqli_query($conn,$sql);
						$s_no=mysqli_num_rows($cc);
						?>
					
					<div class="title"><h4><B>Form 3</B><sup><span class="badge badge-warning"><b><?php echo $s_no; ?></b></span></sup>
					<br>
						 <?php
						 $sql="SELECT * FROM student WHERE class='3' AND gender='Male'";
						$cc=mysqli_query($conn,$sql);
						$m_no=mysqli_num_rows($cc);
						 ?>
						  Boys=<?php echo $m_no;?><br>Girls=<?php echo $s_no-$m_no;?><br><br></h4>
						
					</div>
				</div>
				<div class="span3 statbox yellow" onTablet="span6" onDesktop="span3">
					<?php 
						$sql="SELECT * FROM student WHERE class='4'";
						$cc=mysqli_query($conn,$sql);
						$s_no=mysqli_num_rows($cc);
						?>
					<div class="title"><h4><B>Form 4</B><sup><span class="badge badge-success"><b><?php echo $s_no; ?></b></span></sup>
					<br> <?php
						 $sql="SELECT * FROM student WHERE class='3' AND gender='Male'";
						$cc=mysqli_query($conn,$sql);
						$m_no=mysqli_num_rows($cc);
						 ?>
						  Boys=<?php echo $m_no;?><br>Girls=<?php echo $s_no-$m_no;?><br><br></h4>
						
					</div>
					
				</div>	
				</div>
				<div class="row-fluid text-success">
				<div class="col-md-5 col-md-offset-1">
				<h4><span id=tick2>
				</span>&nbsp;| 
<script>
				function show2(){
				if (!document.all&&!document.getElementById)
				return
				thelement=document.getElementById? document.getElementById("tick2"): document.all.tick2
				var Digital=new Date()
				var hours=Digital.getHours()
				var minutes=Digital.getMinutes()
				var seconds=Digital.getSeconds()
				var dn="PM"
				if (hours<12)
				dn="AM"
				if (hours>12)
				hours=hours-12
				if (hours==0)
				hours=12
				if (minutes<=9)
				minutes="0"+minutes
				if (seconds<=9)
				seconds="0"+seconds
				var ctime=hours+":"+minutes+":"+seconds+" "+dn
				thelement.innerHTML=ctime
				setTimeout("show2()",1000)
				}
				window.onload=show2
				//-->
</script>
	      <?php
            $date = new DateTime();
            echo $date->format('l, F jS, Y');
          ?><h4>
            </div>
            </div>
			
			</div>
			</div>
			
        </div>


    </div>
	
				</div>
				
			</div>	
	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->

	<div class="clearfix"></div>
	<?php 	include("includes/layouts/footer.php"); ?>
<?php } ?>