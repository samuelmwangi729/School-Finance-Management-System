<?php
$counter=0;
session_start();
error_reporting(0);
if($_SESSION['username']==""){
  echo "<script>alert('Please Login')</script>";
  echo "<script>window.open('../','_self');</script>";
}
else{
  $user=$_POST['user'];
 require_once("../config.php"); ?>
<html>
<head>
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>

<body lang=EN-US>
<div class="container">
  <div class="row">
<table class="table" style="width: 100%;padding-bottom: 20px" class="table">
  <br><br><br><br><br>
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
  ?>
  <?php 
$sql="SELECT * FROM student";
$retval = mysqli_query($conn,$sql);
while($rows=mysqli_fetch_array($retval)){
  $class=$rows['class'];
  if($class=="formers"){
    continue;
  }
?>
  <td width="38%" colspan=3 style='width:20%;border:solid windowtext 1.0pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:45.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><b style='mso-bidi-font-weight:normal'><span style='font-size:50.0pt;text-align: center;font-family: courier;color:green;
  mso-bidi-font-size:11.0pt'><?php echo $name." " ?>Secondary School<o:p></o:p><br></span></b>Tel: <?php echo "0".$tel;?><br>P.o Box <?php echo $po;?></p>
  </td>
 </tr>
 <?php 
 $sql = "SELECT * FROM `closing` ORDER BY id DESC";
 $cdate=mysqli_query($conn,$sql);
 if($dd=mysqli_fetch_array($cdate)){
  $d=$dd['cdate'];
 }
  ?>
 <tr>
  <td colspan=3 style='width:38.32%;border:2px solid black;border-left:solid windowtext 1.0pt;
  mso-border-left-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;
  height:13.2pt'>
  <p>Dear <b><?php echo $rows['parent_name']?> </b>, This is to show that the Student <b><?php echo $rows['fname']." ".$rows['tname'] ?> </b>With  Registration Number <b style="color: red"><?php echo $rows['reg_no']?></b> In class <b><?php echo " ".$class." ".$rows['stream'];?></b> Have an Outstanding balance of Ksh<b><?php echo $rows['balance'];?></b> which is to be paid as per the Policy of School when they resume.</p> The school breaks today <b><?php echo date("D")." ".date("Y-m-d"); ?></b>  for a Mid term Break and resumes on  <b><?php echo $d;?></b>.<br>Thank You for Your continued Support<br><br>


  Yours Faithful  <?php echo "<b>".$head."</b>";?><br>
  Principal : <b><?php echo $name?> Secondary School </b><br>
  Sign: <img src="../assets/icons/sign.png" class="img-responsive" width="100px"height="50px"><br><BR><br><br>
  </div>
  </td>
 </tr>
 <?php } ?>
</table>
</div>
</div>
<br>
<br>
<br>
</body>
<script type="text/javascript">
  window.load(print());
</script>
</html>
<?php } ?>