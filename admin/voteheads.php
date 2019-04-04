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

<?php 	include("head.php"); ?>	
		<div class="container">
		<div class="row">			
			<!-- start: Content -->
			<div id="content" class="span12">
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
          	<?php echo "<button type='button' class='btn btn-primary' style='float:right' onclick=window.open('../admin','_self')>Back</button>";?>
            </div>
            </div>
			
			</div>
			</div>
			
        </div>


    </div>
	
				</div>
				
			</div>	
	</div><!--/.fluid-container-->
	<div class="container">
		<div class="row">
			<form method="POST" action="voteheads.php">
				<div class="row">
					<div class="col-lg-6">
						<label class="label-control" for="Voteheads">Votehead</label>
					<input type="text" name="voteheads" class="form-control input-md" required="true">
					</div>
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
				<div class="row">
					<button type="submit" class="btn btn-primary"  name="add">Add Votehead</button>
					<?php if(isset($_POST['add'])){
						if(strlen($_POST['voteheads'])<4){
							echo "<span class='alert alert-danger'>Enter A valid Votehead Name</span>";
						}else{
							$votehead=$_POST['voteheads'];
							$term=$_POST['term'];
						$sql="INSERT INTO voteheads(votehead,Term)VALUES('$votehead','$term')";
						$result=mysqli_query($conn,$sql);
						if($result){
						echo "<span class='alert alert-success'>Votehead Successfully Added</span>";
						}
						}
						} ?>
				</div>
			</form>
		</div>
	</div>
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
<?php } ?>