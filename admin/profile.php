<?php 
session_start();
include('../config.php');
$error_name=$error_pass="";
error_reporting(0);
if($_SESSION['username']==""){
	echo "<script>alert('You better Login');</script>";
	echo "<script>window.open('../','_self');</script>";
}
else{
	if (isset($_POST['submit'])) {
		$upd=$_SESSION['username'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		if(strlen($password)<8){
			$error_pass="Please Enter a Longer Password";
		}
		else{
			$sql="UPDATE users SET password='$password' WHERE username='$upd'";
			$result=mysqli_query($conn,$sql);
			if($result){
				echo "<script>alert('Details Updated..Please Login Once Again');</script>";
				echo "<script>window.open('../','_self');</script>";
			}
		}
		}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $_SESSION['username'];?> User Profile</title>
	
	<link id="stylesheet" href="../assets/css/bootstrap.min.css" rel="stylesheet">
	<link id="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
	<div class="container-fluid" style="padding-top: 10px;">
		<ul class="breadcrumb">
			<li>
				<a href="../admin">Home</a> >>
			</li>
			<li><a href="../admin">Dashboard</a>
			</li>
		</ul>
	</div>
	<div class="container">
		<form method="POST" action="profile.php">
				<fieldset style="margin: auto">
					<legend class="text-success" style="font-size: 15px">Update Your User Password</legend>
					<div class="row-fluid">
						<label for="password" class="label-control">Password</label>
						<span class="text-danger"><?php echo $error_pass;?></span>
						<input type="password" class="form-control input-md" name="password" placeholder="Enter your new Password"required minlength="8">
					</div>
					<br>
					<div class="row-fluid">
						<button type="submit" class="btn btn-success btn-block" name="submit">Update</button>
					</div>
				</fieldset>			
		</form>
	</div>
	<?php
		$sel="SELECT * FROM school";
		$qry=mysqli_query($conn,$sel);
		while($row=mysqli_fetch_array($qry)){
		$name=$row['name'];
		$head=$row['head'];
		$phone=$row['phone'];
		$po=$row['po'];
	    }
		?>
	<div class="container"><br>
		<div class="row" style="border:2px solid red;border-radius: 20px">
			<div class="col-lg-4">
				<form method="POST" action="profile.php">
						<label>Name of The School</label>
						<input type="text"  class="form-control input-sm" name="name" value="<?php echo $name;?>">
						<label>Name Of The Principal</label>
						<input type="text"  class="form-control" name="head" value="<?php echo $head;?>">
						<label>Phone Number</label>
						<input type="text"  class="form-control" name="phone"value="<?php echo $phone?>">
						<label>Post Office Box</label>
						<input type="text"  class="form-control" name="po" value="<?php echo $po;?>"><br>
						<button type="submit" class="btn btn-primary btn-block" name="close">Update School Details</button><br>
					</form>
			</div>
			<div class="col-lg-8">
				<form method="POST" action="profile.php">
					<fieldset>
						<legend class="text-success pull-right">Add A new User Into The System</legend>
						<span style="color: red"><?php echo $error_name;?></span>
						<div class="row">
							<div class="col-lg-6">
							<label for="first_name" class="label-control">First Name</label>
							<input type="text" name="fname" class="form-control input-md" placeholder="Enter the first Name Here" required="true">
							<label for="second_name" class="label-control">Second Name</label>
							<input type="text" name="sname" class="form-control input-md" placeholder="Enter the Second Name Here" required="true">
							<label for="username" class="label_control">Username</label>
							<input type="text" name="uname" class="form-control input-md" placeholder="Enter the UserName Here" required="true">
							<label for="email" class="label-control">Email</label>
							<input type="email" name="email" class="form-control input-md" placeholder="Enter the Email Here" required="true">
						</div>
						<div class="col-lg-6">
							<label for="userlevel" class="label-control">UserLevel</label>
							<select class="form-control input-md" required="true" autofocus="true" name="ulevel" title="Please Select The UserLevel">
								<option>--SELECT USER LEVEL--</option>
								<option>Principal</option>
								<option>Deputy_Principal</option>
								<option>admin</option>
							</select>
							<label for="password" class="label-control">Password</label>
							<input type="password" name="password" class="form-control input-md" placeholder="Enter the Password Here" required="true" minlength="8">
							<label for="password" class="label-control">Confirm User Password</label>
							<input type="password" name="cpassword" class="form-control input-md" placeholder="Enter the Password Here" required="true" minlength="8"><br>
							<div class="row-fluid" style="padding-top: 10px">
								<button type="submit" class="btn btn-primary btn-block" name="user">Add User</button>
							</div>
						</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div><br>
		<div class="container-fluid" style="border:2px solid grey;border-radius: 20px">
			<form method="POST" action="profile.php">
				<div class="row">
					<div class="col-lg-6">
						<label for="date" class="label-control">Enter Opening Date </label>
						<input type="date" class="form-control input-md" name="closing_date" required="true"><br>
					</div>
					<div class="col-lg-6" style="padding-top: 30px">
						<button type="submit"  class="btn btn-info" name="adddate">Add Date</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<?php
	//to add the new user into the system
	if(isset($_POST['user'])){
		$fname=$_POST['fname'];
		$sname=$_POST['sname'];
		$uname=$_POST['uname'];
		$email=$_POST['email'];
		$ulevel=$_POST['ulevel'];
		$password=$_POST['password'];
		$cpass=$_POST['cpassword'];
		if($password==$cpass){
			$ins="INSERT INTO users(first_name,second_name,username,email,password,level)VALUES('$fname','$sname','$uname','$email','$password','$ulevel')";
			$retval=mysqli_query($conn,$ins);
			if($retval){
				echo "<script>alert('User Successfuly Added')</script>";
				echo "<script>window.open('../admin','_self')</script>";

			}else{
			echo "<script>alert('Error!!!!The User Was Not Added')</script>";
			echo "<script>window.open('profile.php','_self')</script>";			}
		
		}
		else{
			echo "<script>alert('Passwords Dont Match')</script>";
			echo "<script>window.open('profile.php','_self')</script>";
		}
	}
	if(isset($_POST['adddate'])){
		$cdate=$_POST['closing_date'];
		$insd="UPDATE closing SET cdate='$cdate' WHERE id>0";
		$query=mysqli_query($conn,$insd);
		if($query){
			echo "<div class='container-fluid'>";
			echo "<span class='alert-success'>Opening Date Successfully Added</span>";
			echo "</div>";
		}
	}
if(isset($_POST['close'])){
 $name=$_POST['name'];
 $head=$_POST['head'];
 $phone=$_POST['phone'];
 $po=$_POST['po'];
 $sql="UPDATE school SET name='$name',head='$head',phone='$phone',po='$po' WHERE id>0";
 $query=mysqli_query($conn,$sql);
 if($query){
 	echo "<script>alert('School Details Successfully updated')</script>";	
	echo "<script>window.open('profile.php','_self');</script>";
 }
}?>
</body>
</html>
<?php } ?>