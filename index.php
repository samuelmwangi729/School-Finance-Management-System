<?php
include('config.php');
session_start();
$error_username=$error_password=$error_ulevel="";
if(isset($_POST['submit'])){
$username=$_POST['username'];
$password=$_POST['password'];
$ulevel=$_POST['ulevel'];
if(strlen($username)<4){
}
elseif (strlen($password)<8) {
	$error_password="Please Enter a longer Password";
}
else{
//echo $username,$password,$ulevel;
$sql="SELECT * FROM users WHERE username='".$username."' and  password='".$password."' and level='".$ulevel."' LIMIT 1";
$retval=mysqli_query($conn,$sql);
if($user=mysqli_num_rows($retval)==1){
	if($ulevel=="Principal"){
		echo "<script>window.open('admin/','_self');</script>";
		$_SESSION['username']=$username;
	}
	elseif ($ulevel=="Deputy_Principal") {
		echo "<script>window.open('admin/','_self');</script>";
		$_SESSION['username']=$username;
	}
	elseif ($ulevel=="admin") {
		$_SESSION['username']=$username;
		echo "<script>window.open('admin/','_self');</script>";
	}
	else{

		$error_username="Please Check Your Details!!!!";
	}
}
else{
	$error_username="Please Check Your Details!!!!,Wrong Login Details";
}
}
}?>
<!DOCTYPE html>
<html>
<head>
	<title>School Fees Management System</title>
	<meta name="author" content="mwangi samwel">
	<meta name="viewport" content="width=device-width" user-scalable="true">
	<meta http-equiv="X-UA-Compatible" content="IE=EDGE">
	<link rel="shortcut icon" href="assets/icons/Cash-register-icon.png">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
</head>
<body>
<div class="container-fluid col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-top: 10px">
	<div class="jumbotron" style="height: 100px;">
		<h2 class="text-danger col-lg-12 col-md-12 col-sm-12 col-xs-12"><img src="assets/icons/Cash-register-icon.png" width="100px" height="100px" title="ZSchool Fees Management System" style="border: 1px solid purple;border-radius: 70px" >School Fees Management System</h2>
	</div>
	<!--END HEADER-->
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6" style="padding-top: 30px">
		<div class="container">
			<!--Start of login form-->
			<fieldset>
				<span style="color: red"><?php echo $error_username;?></span>
				<legend class="text-success"><span class="text-center">
				Please Login to Continue</span></legend>
				<form class="form-group" method="POST" action="<?php $_PHP_SELF?>">
					<div class="row">
						<label for="Username" class="label-control">Username</label>
					<input type="text" name="username" class="form-control input-md" placeholder="Enter the Username" required autofocus="true">
					</div>
					<br>
					<div class="row">
						<label for="Password" class="label-control">Password</label>
						<input type="password" name="password" class="form-control" placeholder="Enter The Password Here" required autofocus="true" title="Please Enter The Username " title="Please Enter the Password">
						<br>
					</div>
					<br>
					<div class="row">
							<label for="userlevel" class="label-control">UserLevel</label>
							<select class="form-control input-md" required="true" autofocus="true" name="ulevel" title="Please Select The UserLevel">
								<option>--SELECT USER LEVEL--</option>
								<option>Principal</option>
								<option>Deputy_Principal</option>
								<option>admin</option>
							</select>
					</div>
					<br>
					<div class="row">
						<button type="submit" name="submit" class="btn btn-success btn-block" title="Please Login">Login</button>
					</div>
					<br>
				</form>
			</fieldset>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6">
		<div class="panel panel-primary">
			<div class="row">
				<div class="col-lg-12">
					<div class="jumbotron">
						<span class="text-success"><h4 class="text-center">We provide Quality Management Systems</h4></span>
					</div>
				</div>
			</div>
			<div class="row container-fluid" style="padding-top: 15px">
				<div class="col-lg-6">
						<div class="row" style="background-color: white"><img src="assets/icons/money1.png" class="img-responsive media-left" alt="Big image" align="right">
							<span class="text-success">Efficiently Manage The School Resources</span>
						</div>
				</div>
				<div class="col-lg-6">
						<div class="row" style="background-color: white">
							<img src="assets/icons/credit.png" class="img-responsive" alt="Big image" align="center">
							<span class="text-success">Be Accountable In Everything</span>
						</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<!--END LEFT SIDE -->
	<div class="row-fluid" style="color: red;font-size: 15px;">
				<div class="col-md-6">
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
	<!--START RIGTH SIDE -->
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</div>
</body>
</html>