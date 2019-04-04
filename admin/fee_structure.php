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
  $class=$_GET['class'];
 require_once("../config.php"); ?>
<html>
<head>
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>

<body lang=EN-US>
<div class="container">
  <div class="row">
<table class="table table-bordered" style="width: 100%;padding-bottom: 20px" class="table">
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
  <br>
  <td width="38%" colspan=3 style='width:20%;border:solid windowtext 1.0pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:45.65pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><b style='mso-bidi-font-weight:normal'><span style='font-size:50.0pt;text-align: center;font-family: courier;color:green;
  mso-bidi-font-size:11.0pt'><?php echo $name." " ?>Secondary School<o:p></o:p><br></span></b>Tel: <?php echo "0".$tel;?><br>P.o Box <?php echo $po;?></p>
  </td>
 </tr>
 <tr>
  <td  colspan="2" class="text-success" style="font-size: 30px;text-align: center">
       Form <?php echo " ".$class."";?> Fees Structure
      </td>
 </tr><tr>
      <td>
       Name
      </td>
      <td>
       Amount
      </td>
    </tr>
    <?php
  $sql1 = "SELECT * FROM `fees` WHERE class='$class' ORDER BY id ASC"; 
  $fees=mysqli_query($conn,$sql1);
  $qty=0;
  while($nt=mysqli_fetch_array($fees)){
    $vhead=$nt['votehead'];
    $amt=$nt['amount'];
    $qty=$qty+$nt['amount'];
  ?>
    <tr>
      <td><?php echo $vhead?></td>
      <td><?php echo $amt?></td>
      <br>
    </tr>
  <?php }?>
  <tr>
    <td style="color: red">Total</td>
    <td style="color:#FA0E8A"><?php echo "<b>".$qty."</b>";?></td>
  </tr>
  </table>
  </div>
  </td>
 </tr>
</table>
</div>
</div>
<br>
<br>
<br>
<script type="text/javascript">
  window.load(print());
</script>
</body>
</html>
<?php } ?>